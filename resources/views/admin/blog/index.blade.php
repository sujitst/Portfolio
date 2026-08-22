@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('blog.index') }}">{{ __('common.blog') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.blog_page') }}</h3>
                    <a href="{{ route('blog.create') }}" id="addBlog" class="add-btn"><i class="fa fa-plus"></i>{{ __('common.add_blog') }}</span></a>
                </div>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('common.sl') }}</th>
                            <th>{{ __('common.user_name') }}</th>
                            <th>{{ __('common.title') }}</th>
                            <th>{{ __('common.description') }}</th>
                            <th>{{ __('common.images') }}</th>
                            <th>{{ __('common.status') }}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $key => $blog)
                            @php $images = json_decode($blog->image) @endphp
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $blog->user->name }}</td>
                                <td>{{ \Illuminate\Support\Str::words($blog->title, 5, ' . . .') }}</td>
                                <td>{{ \Illuminate\Support\Str::words($blog->description, 5, ' . . .') }}</td>
                                @if(!empty($images))
                                    <td>
                                        @foreach(array_slice($images, 0, 3) as $img) 
                                            <img src="{{ asset('upload/blog/' . $img) }}" alt="image" style="height:60px; margin-right:5px;">
                                        @endforeach
                                    </td>
                                @endif
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" class="status_toggle_switch" data-id="{{ $blog->id }}" {{ $blog->status ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <div>
                                        <a href="{{ route('blog.show', $blog->id) }}" id="showBlog" class="btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        <a href="{{ route('blog.edit', $blog->id) }}" id="editBlog" class="btn btn-sm btn-primary">{{ __('common.edit') }}</a>
                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" class="deleteBtn" style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">{{ __('common.delete') }}</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!--=====|| END:- MAIN CONTENT ||=====-->
            
        </div>   
    </div>
@endsection



@section('script')
    <script>
        //=====|| TOGGLE PROJECT STATUS ||=====
        document.querySelectorAll('.status_toggle_switch').forEach(switchBtn => {
            switchBtn.addEventListener('change', function () {
                let projectId = this.dataset.id;
                let status = this.checked ? 1 : 0;

                fetch("{{ route('blog.toggleStatus') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        id: projectId,
                        status: status
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status !== 'success') {
                        alert('Status update failed!');
                        this.checked = !this.checked;
                    }
                })
                .catch(() => {
                    alert('Something went wrong!');
                    this.checked = !this.checked;
                });
            });
        });



        //=====|| DOCUMENT READY FUNCTION ||=====
        $(document).ready(function() {
            let dialog;


            //=====|| OPEN ADD BLOG MODAL ||=====
            $(document).on('click', '#addBlog', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.create_blog') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large',
                            buttons: {}
                        });
                        $('.modalContent').html(res);
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Failed to load modal!', 'Error');
                    }
                });
            });



            //=====|| AJAX FORM SUBMISSION: CREATE BLOG ||=====
            $(document).on('submit', '#createBlogForm', function (e) {
                e.preventDefault();

                let formData = new FormData(this);
                let actionUrl = $(this).attr('action');

                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function (res) {
                        $('.errors').addClass('d-none').text('');

                        if (res.status === 400) {
                            if (res.errors.user_id) {
                                $('.userNameError').removeClass('d-none').text(res.errors.user_id[0]);
                            }
                            if (res.errors.title) {
                                $('.titleError').removeClass('d-none').text(res.errors.title[0]);
                            }
                            if (res.errors.description) {
                                $('.descriptionError').removeClass('d-none').text(res.errors.description[0]);
                            }
                            Object.keys(res.errors).forEach(function (key) {
                                if (key.startsWith('image')) {
                                    $('.imageError') .removeClass('d-none') .text(res.errors[key][0]);
                                }
                            });
                        } else if (res.status === 200) {
                            toastr.success(res.message, 'Success', {
                                timeOut: 3000,
                                closeButton: true
                            });

                            $('#createBlogForm')[0].reset();
                            $('#imagePreviewContainer').html('');
                            dialog.modal('hide');
                            $("#myTable").load(location.href + ' #myTable');
                        }
                    },

                    error: function () {
                        toastr.error('Something went wrong!', 'Error');
                    }
                });
            });



            //=====|| SHOW BLOG DETAILS MODAL ||=====
            $(document).on('click', '#showBlog', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.view_blog') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large',
                            buttons: {}
                        });
                        $('.modalContent').html(res);
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Failed to load form!', 'Error');
                    }
                });
            });



            //=====|| OPEN EDIT BLOG MODAL ||=====
            $(document).on('click', '#editBlog', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.update_blog') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large',
                            buttons: {}
                        });
                        $('.modalContent').html(res);
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Failed to load form!', 'Error');
                    }
                })
            })



            //=====|| AJAX FORM SUBMISSION: UPDATE BLOG ||=====
            $(document).on('submit', '#updateBlogForm', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let actionUrl = $(this).attr('action');

                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(res) {
                        if(res.status === 400) {
                            $('.errors').removeClass('d-none');
                            $('.userNameError').text(res.errors.user_id ? res.errors.user_id[0] : '');
                            $('.titleError').text(res.errors.title ? res.errors.title[0] : '');
                            $('.descriptionError').text(res.errors.description ? res.errors.description[0] : '');
                            Object.keys(res.errors).forEach(function (key) {
                                if (key.startsWith('image')) {
                                    $('.imageError') .removeClass('d-none') .text(res.errors[key][0]);
                                }
                            });
                           
                        } else if(res.status === 200) {
                            $('.errors').addClass('d-none');
                            toastr.success(res.message, 'Success', {timeOut: 3000, closeButton: true});
                            dialog.modal('hide');
                            $("#myTable").load(location.href + ' #myTable');
                        }
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Something went wrong!', 'Error');
                    }
                })
            })



            //=====|| DELETE BLOG ||=====
            $(document).on('submit', '.deleteBtn', function (e) {
                e.preventDefault();

                let form = $(this);
                let deleteUrl = form.attr('action');
                let row = form.closest('tr');

                bootbox.confirm({
                    title: '{{ __('common.confirm_delete') }}',
                    message: '{{ __('common.delete_message') }}',
                    buttons: {
                        confirm: {
                            label: '{{ __('common.yes') }}',
                            className: 'btn-danger'
                        },
                        cancel: {
                            label: '{{ __('common.no') }}',
                            className: 'btn-secondary'
                        }
                    },
                    callback: function (result) {
                        if (result) {
                            $.ajax({
                                type: "POST",
                                url: deleteUrl,
                                data: form.serialize(),
                                success: function (res) {
                                    if (res.status === 200) {
                                        toastr.success(res.message, 'Success', {
                                            timeOut: 3000,
                                            closeButton: true
                                        });

                                        row.fadeOut(300, function () {
                                            $(this).remove();
                                        });
                                    }
                                },
                                error: function () {
                                    toastr.error('Delete failed!', 'Error');
                                }
                            });
                        }
                    }
                });
            });


        });
    </script>
@endsection