@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('image.index') }}">{{ __('common.images') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.image_page') }}</h3>
                    <a href="{{ route('image.create') }}" id="addImage" class="add-btn"><i class="fa fa-plus"></i> {{ __('common.add_image') }}</a>
                </div>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('common.sl') }}</th>
                            <th>{{ __('common.category_name') }}</th>
                            <th>{{ __('common.images') }}</th>
                            <th>{{ __('common.video') }}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($images as $key => $image)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $image->category->name }}</td>
                                <td>
                                    @if($image->image)
                                        <img src="{{ asset('upload/gallery/images/' . $image->image) }}" alt="Image" style="height: 80px;">
                                    @else
                                        N/A 
                                    @endif
                                </td>
                                <td>
                                    @if($image->video)
                                        <video height="80">
                                            <source src="{{ asset('upload/gallery/videos/' . $image->video) }}" type="video/mp4">
                                        </video>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <a href="{{ route('image.show', $image->id) }}" class="showImage btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        <a href="{{ route('image.edit', $image->id) }}" id="editModalImage" class="btn btn-sm btn-primary">{{ __('common.edit') }}</a>
                                        <form action="{{ route('image.destroy', $image->id) }}" method="POST" class="deleteBtn" style="display:inline-block">
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
        $(document).ready(function() {
            let dialog; 


            // =====|| OPEN ADD IMAGE MODAL ||=====
            $(document).on('click', '#addImage', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.create_image') }}',
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

            //=====|| VIDEO PREVIEW ||=====
            $(document).on('change', '#video', function () {
                let file = this.files[0];

                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $('#videoPreview')
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



            //=====|| AJAX FORM SUBMISSION: CREATE IMAGE ||=====
            $(document).on('submit', '#createImageForm', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let url = $(this).attr('action');


                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if(res.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');
                            $('.categoryNameError').text(res.errors.category_id);
                            $('.imageError').text(res.errors.image);
                            $('.videoError').text(res.errors.video);
                        } else {
                            $('.errors').html('');
                            $('.errors').addClass('d-none');
                            dialog.modal('hide');
                            toastr.success(res.message, 'Success', {timeOut: 3000, closeButton: true});
                            $("#myTable").load(location.href + ' #myTable');
                        }
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Failed to add image!', 'Error');
                    }
                });
            });



            //=====|| SHOW IMAGE DETAILS MODAL ||=====
            $(document).on('click', '.showImage', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.view_image') }}',
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



            //=====|| IMAGE EDIT MODAL ||=====
            $(document).on('click', '#editModalImage', function(e) {
                e.preventDefault();
                let url = $(this).attr('href'); 

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.update_image') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large',
                            buttons: {}
                        });
                        $('.modalContent').html(res);
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Failed to load edit modal!', 'Error');
                    }
                });
            });



            //=====|| AJAX FORM SUBMISSION UPDATE IMAGE ||=====
            $(document).on('submit', '#updateImageForm', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let url = $(this).attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if(res.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');
                            $('.categoryNameError').text(res.errors.category_id);
                            $('.imageError').text(res.errors.image);
                            $('.videoError').text(res.errors.image);
                        } else {
                            $('.errors').html('');
                            $('.errors').addClass('d-none');
                            dialog.modal('hide');
                            toastr.success(res.message, 'Success', {timeOut: 3000, closeButton: true});
                            $("#myTable").load(location.href + ' #myTable');
                        }
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Failed to update image!', 'Error');
                    }
                });
            });



            //=====|| AJAX DELETE SYSTEM WITH CONFIRMATION ||=====
            $(document).on('submit', '.deleteBtn', function (e) {
                e.preventDefault();

                let form = $(this);
                let deleteUrl = form.attr('action');
                let csrf = form.find('input[name="_token"]').val();

                bootbox.confirm({
                    title: '{{ __('common.confirm_delete') }}',
                    message: '{{ __('common.delete_message') }}',
                    buttons: {
                        confirm: {
                            label: '{{ __('common.yes') }}',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: '{{ __('common.no') }}',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        if (result) {
                            $.ajax({
                                type: "POST",
                                url: deleteUrl,
                                data: {
                                    _token: csrf,
                                    _method: 'DELETE'
                                },
                                success: function (res) {
                                    if (res.status === 200) {
                                        toastr.success(res.message, 'Success', {
                                            timeOut: 3000,
                                            closeButton: true
                                        });

                                        form.closest('tr').fadeOut();
                                    }
                                },
                                error: function () {
                                    toastr.error('Something went wrong!', 'Error');
                                }
                            });
                        }
                    }
                });
            });

        });
    </script>
@endsection