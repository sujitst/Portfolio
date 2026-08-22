@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('my-contact.index') }}">{{ __('common.my_contact') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.my_contact_page') }}</h3>
                    <a href="{{ route('my-contact.create') }}" id="addMyContact" class="add-btn"><i class="fa fa-plus"></i>{{ __('common.add_contact') }}</span></a>
                </div>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('common.sl') }}</th>
                            <th>{{ __('common.contact_name') }}</th>
                            <th>{{ __('common.contact_information') }}</th>
                            <th>{{ __('common.contact_icon') }}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $key => $media)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $media->name }}</td>
                                <td>{{ $media->info }}</td>
                                <td><i class="{{ $media->icon }}" aria-hidden="true"></i></td>
                                <td>
                                    <div>
                                        <a href="{{ route('my-contact.show', $media->id) }}" id="showMyContacts" class="btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        <a href="{{ route('my-contact.edit', $media->id) }}" id="editMyContacts" class="btn btn-sm btn-primary">{{ __('common.edit') }}</a>
                                        <form action="{{ route('my-contact.destroy', $media->id) }}" method="POST" class="deleteBtn" style="display:inline-block">
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
        //=====|| DOCUMENT READY FUNCTION ||=====
        $(document).ready(function() {
            let dialog;


            //=====|| OPEN ADD MY CONTACT MODAL ||=====
            $(document).on('click', '#addMyContact', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.my_contact_create') }}',
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



            //=====|| AJAX FORM SUBMISSION: CREATE SOCIAL MEDIA ||=====
            $(document).on('submit', '#createMyContactForm', function (e) {
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
                            $('.infoError').text(res.errors.info ?? '');
                            $('.iconError').text(res.errors.icon ?? '');

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



            //=====|| SHOW MY CONTACT DETAILS MODAL ||=====
            $(document).on('click', '#showMyContacts', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.my_contact_view') }}',
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



            //=====|| OPEN EDIT MY CONTACT MODAL ||=====
            $(document).on('click', '#editMyContacts', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.my_contact_update') }}',
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



            //=====|| AJAX FORM SUBMISSION: UPDATE MY CONTACT ||=====
            $(document).on('submit', '#updateMyContactForm', function(e) {
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
                            $('.infoError').text(res.errors.info ?? '');
                            $('.iconError').text(res.errors.icon ?? '');
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



            //=====|| DELETE MY CONTACT MEDIA ||=====
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