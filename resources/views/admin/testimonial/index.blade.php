@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('testimonial.index') }}">{{ __('common.testimonials') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.testimonial_page') }}</h3>
                    <a href="{{ route('testimonial.create') }}" id="addTestimonial" class="add-btn"><i class="fa fa-plus"></i>{{ __('common.add_testimonial') }}</span></a>
                </div>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('common.sl') }}</th>
                            <th>{{ __('common.name') }}</th>
                            <th>{{ __('common.position') }}</th>
                            <th>{{ __('common.rating') }}</th>
                            <th>{{ __('common.comment') }}</th>
                            <th>{{ __('common.images') }}</th>
                            <th>{{ __('common.status') }}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $key => $testimonial)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $testimonial->name }}</td>
                                <td>{{ $testimonial->position }}</td>
                                <td>
                                    @php
                                        $rating = $testimonial->rating;
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
                                <td>{{ \Illuminate\Support\Str::words($testimonial->comment, 5, ' . . .') }}</td>
                                <td><img src="{{ asset('upload/testimonial/' . $testimonial->image) }}" alt="image" style="height: 60px;"></td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" class="status_toggle_switch" data-id="{{ $testimonial->id }}" {{ $testimonial->status ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <div>
                                        <a href="{{ route('testimonial.show', $testimonial->id) }}" id="showModalTestimonial" class="btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        <a href="{{ route('testimonial.edit', $testimonial->id) }}" id="editTestimonial" class="btn btn-sm btn-primary">{{ __('common.edit') }}</a>
                                        <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST" class="deleteBtn" style="display:inline-block">
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
        //=====|| TOGGLE TESTIMONIAL STATUS ||=====
        document.querySelectorAll('.status_toggle_switch').forEach(switchBtn => {
            switchBtn.addEventListener('change', function () {
                let projectId = this.dataset.id;
                let status = this.checked ? 1 : 0;

                fetch("{{ route('testimonial.toggleStatus') }}", {
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


            //=====|| OPEN ADD TESTIMONIAL MODAL ||=====
            $(document).on('click', '#addTestimonial', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.testimonial_create') }}',
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


            //=====|| AJAX FORM SUBMISSION: CREATE TESTIMONIAL ||=====
            $(document).on('submit', '#createTestimonialForm', function (e) {
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
                            $('.positionError').text(res.errors.position ?? '');
                            $('.ratingError').text(res.errors.rating ?? '');
                            $('.commentError').text(res.errors.comment ?? '');
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



            //=====|| SHOW TESTIMONIAL DETAILS MODAL ||=====
            $(document).on('click', '#showModalTestimonial', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.testimonial_view') }}',
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



            //=====|| OPEN EDIT TESTIMONIAL MODAL ||=====
            $(document).on('click', '#editTestimonial', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.testimonial_update') }}',
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



            //=====|| AJAX FORM SUBMISSION: UPDATE TESTIMONIAL ||=====
            $(document).on('submit', '#updateTestimonialForm', function(e) {
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
                            $('.positionError').text(res.errors.position ? res.errors.position[0] : '');
                            $('.ratingError').text(res.errors.rating ? res.errors.rating[0] : '');
                            $('.commentError').text(res.errors.comment ? res.errors.comment[0] : '');
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



            //=====|| DELETE TESTIMONIAL ||=====
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