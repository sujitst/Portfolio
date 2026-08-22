@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('about.index') }}">{{ __('common.about') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.about_page') }}</h3>
                    @if($abouts->count() < 1)
                    <a href="{{ route('about.create') }}" id="addAbout" class="add-btn"><i class="fa fa-plus"></i>{{ __('common.add_about') }}</span></a>
                    @endif
                </div>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('common.sl') }}</th>
                            <th>{{ __('common.name') }}</th>
                            <th>{{ __('common.age') }}</th>
                            <th>{{ __('common.nationality') }}</th>
                            <th>{{ __('common.gender') }}</th>
                            <th>{{ __('common.marital_status') }}</th>
                            <th>{{ __('common.date_of_birth') }}</th>
                            <th>{{ __('common.description') }}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($abouts as $key => $about)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $about->information?->name }}</td>
                                <td>{{ $about->age }}</td>
                                <td>{{ $about->nationality }}</td>
                                <td>{{ $about->gender }}</td>
                                <td>{{ $about->marital_status }}</td>
                                <td>{{ $about->dob }}</td>
                                <td>{{ \Illuminate\Support\Str::words($about->description, 5, '...') }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('about.show', $about->id) }}" id="showAbout" class="btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        <a href="{{ route('about.edit', $about->id) }}" id="editAbout" class="btn btn-sm btn-primary">{{ __('common.edit') }}</a>
                                        <form action="{{ route('about.destroy', $about->id) }}" method="POST" class="deleteBtn" style="display:inline-block">
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
        $(document).ready(function () {
            let dialog;


            //=====|| OPEN ADD ABOUT MODAL ||=====
            $(document).on('click', '#addAbout', function (e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function (res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.create_about') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large',
                        });
                        $('.modalContent').html(res);
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Failed to load form!', 'Error');
                    }
                });
            });



            //=====|| AJAX FORM SUBMISSION: CREATE ABOUT ||=====
            $(document).on('submit', '#createAboutForm', function (e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(res) {
                        if(res.status === 400) {
                            $('.errors').removeClass('d-none');

                            $('.ageError').text(res.errors.age ?? '');
                            $('.nationalityError').text(res.errors.nationality ?? '');
                            $('.genderError').text(res.errors.gender ?? '');
                            $('.numberError').text(res.errors.number ?? '');
                            $('.marital_statusError').text(res.errors.marital_status ?? '');
                            $('.dobError').text(res.errors.dob ?? '');
                            $('.descriptionError').text(res.errors.description ?? '');
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

    
            
            //=====|| SHOW ABOUT DETAILS MODAL ||=====
            $(document).on('click', '#showAbout', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.show_about_details') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large'
                        });
                        $('.modalContent').html(res);
                    }
                })
            })


            
            //=====|| SHOW ABOUT DETAILS EDIT ||=====
            $(document).on('click', '#editAbout', function (e) {
                e.preventDefault();

                let urlModal = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: urlModal,
                    success: function (res) {
                        dialog = bootbox.dialog({ 
                            title: '{{ __('common.update_about') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large',
                        });
                        dialog.find('.modalContent').html(res);
                    },
                });
            });


            //=====|| AJAX FORM SUBMISSION UPDATE ABOUT ||=====
            $(document).on('submit', '#editAboutForm', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(res) {
                        if(res.status === 400) {
                            $('.errors').html('').removeClass('d-none');

                            $('.ageError').text(res.errors.age ?? '');
                            $('.nationalityError').text(res.errors.nationality ?? '');
                            $('.genderError').text(res.errors.gender ?? '');
                            $('.numberError').text(res.errors.number ?? '');
                            $('.marital_statusError').text(res.errors.marital_status ?? '');
                            $('.dobError').text(res.errors.dob ?? '');
                            $('.descriptionError').text(res.errors.description ?? '');
                        } else if(res.status === 200) {
                            toastr.success(res.message, 'Success', {
                                timeOut: 3000,
                                closeButton: true
                            });

                            dialog.modal('hide');
                            $("#myTable").load(location.href + ' #myTable');
                        }
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Something went wrong!', 'Error');
                    }
                }); 
            })



            //=====|| AJAX DELETE SYSTEM WITH CONFIRMATION ||=====
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
