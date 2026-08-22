@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('project.index') }}">{{ __('common.projects') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.projects_page') }}</h3>
                    <a href="{{ route('project.create') }}" id="addProject" class="add-btn"><i class="fa fa-plus"></i>{{ __('common.add_project') }}</span></a>
                </div>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('common.sl') }}</th>
                            <th>{{ __('common.project_name') }}</th>
                            <th>{{ __('common.rating') }}</th>
                            <th>{{ __('common.price') }}</th>
                            <th>{{ __('common.images') }}</th>
                            <th>{{ __('common.status') }}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($projects as $key => $project)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $project->name }}</td>
                                <td>
                                    @php
                                        $rating = $project->rating;
                                        $fullStars = floor($rating);
                                        $decimal = $rating - $fullStars;

                                        if ($decimal >= 0.75) {
                                            $fullStars += 1;
                                            $halfStar = false;
                                        } elseif ($decimal >= 0.25) {
                                            $halfStar = true;
                                        } else {
                                            $halfStar = false;
                                        }

                                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                    @endphp

                                    {{-- Full Stars --}}
                                    @for ($i = 0; $i < $fullStars; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor

                                    {{-- Half Star --}}
                                    @if ($halfStar)
                                        <i class="fa fa-star-half-o text-warning"></i>
                                    @endif

                                    {{-- Empty Stars --}}
                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        <i class="fa fa-star-o text-warning"></i>
                                    @endfor

                                    <span class="ms-1 text-muted">({{ $rating }})</span>
                                </td>
                                <td>{{ $project->price }}</td>
                                <td><img src="{{ asset('upload/project/' . $project->image) }}" alt="image" style="height: 60px;"></td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" class="status_toggle_switch" data-id="{{ $project->id }}" {{ $project->status ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <div>
                                        <a href="{{ route('project.show', $project->id) }}" id="showModalProject" class="btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        <a href="{{ route('project.edit', $project->id) }}" id="editProject" class="btn btn-sm btn-primary">{{ __('common.edit') }}</a>
                                        <form action="{{ route('project.destroy', $project->id) }}" method="POST" class="deleteBtn" style="display:inline-block">
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

                fetch("{{ route('project.toggleStatus') }}", {
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


            //=====|| OPEN ADD PROJECT MODAL ||=====
            $(document).on('click', '#addProject', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.project_create') }}',
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
            
            //=====|| PICTURE PREVIEW ||=====
            $(document).on('change', '#image', function () {
                let file = this.files[0];

                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview')
                            .attr('src', e.target.result)
                            .css({
                                display: 'block',
                                height: '80px',
                                marginTop: '10px'
                            });
                    };
                    reader.readAsDataURL(file);
                }
            });


            //=====|| AJAX FORM SUBMISSION: CREATE PROJECT ||=====
            $(document).on('submit', '#createProjectForm', function (e) {
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
                            $('.nameError').text(res.errors.name ?? '');
                            $('.ratingError').text(res.errors.rating ?? '');
                            $('.priceError').text(res.errors.price ?? '');
                            $('.linkError').text(res.errors.link ?? '');
                            $('.imageError').text(res.errors.image ?? '');

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
                });
            });



            //=====|| SHOW PROJECT DETAILS MODAL ||=====
            $(document).on('click', '#showModalProject', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.project_view') }}',
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



            //=====|| OPEN EDIT PROJECT MODAL ||=====
            $(document).on('click', '#editProject', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.project_update') }}',
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



            //=====|| AJAX FORM SUBMISSION: UPDATE PROJECT ||=====
            $(document).on('submit', '#editProjectForm', function(e) {
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
                            $('.nameError').text(res.errors.name ? res.errors.name[0] : '');
                            $('.ratingError').text(res.errors.rating ? res.errors.rating[0] : '');
                            $('.priceError').text(res.errors.price ? res.errors.price[0] : '');
                            $('.linkError').text(res.errors.link ? res.errors.link[0] : '');
                            $('.imageError').text(res.errors.image ? res.errors.image[0] : '');
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



            //=====|| DELETE PROJECT ||=====
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