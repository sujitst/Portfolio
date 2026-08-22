@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('faq.index') }}">{{ __('common.faqs') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.faq_page') }}</h3>
                    <a href="{{ route('faq.create') }}" id="addFaq" class="add-btn"><i class="fa fa-plus"></i>{{ __('common.add_faq') }}</span></a>
                </div>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('common.sl') }}</th>
                            <th>{{ __('common.question') }}</th>
                            <th>{{ __('common.answer') }}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $key => $faq)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->answer }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('faq.show', $faq->id) }}" id="showFaq" class="btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        <a href="{{ route('faq.edit', $faq->id) }}" id="editFaq" class="btn btn-sm btn-primary">{{ __('common.edit') }}</a>
                                        <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="deleteBtn" style="display:inline-block">
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


            //=====|| OPEN ADD FAQ MODAL ||=====
            $(document).on('click', '#addFaq', function (e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');


                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.create_faq') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large',
                        });
                        $('.modalContent').html(res)
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Failed to load form!', 'Error');
                    },
                });
            })


            
            //=====|| AJAX FORM SUBMISSION: CREATE FAQ ||=====
            $(document).on('submit', '#createFaqForm', function (e) {
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
                            $('.questionError').text(res.errors.question ?? '');
                            $('.answerError').text(res.errors.answer ?? '');

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


            
            //=====|| SHOW FAQ DETAILS MODAL ||=====
            $(document).on('click', '#showFaq', function(e) {
                e.preventDefault();
                let urlModal = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: urlModal,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.show_faq') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large',
                        });
                        $('.modalContent').html(res);
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Failed to load form!', 'Error');
                    }
                })
            })


            
            //=====|| SHOW FAQ DETAILS MODAL/EDIT ||=====
            $(document).on('click', '#editFaq', function(e) {
                e.preventDefault();
                let urlModal = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: urlModal,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.update_faq') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large',
                        });
                        $('.modalContent').html(res);
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Failed to load form!', 'Error');
                    }
                })
            })



            //=====|| AJAX FORM SUBMISSION UPDATE FAQ  ||=====
            $(document).on('submit', '#updateFaqForm', function (e) {
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
                            $('.questionError').text(res.errors.question ?? '');
                            $('.answerError').text(res.errors.answer ?? '');

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
                                    } else {
                                        toastr.error('Delete failed!', 'Error');
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

            

        })
    </script>
@endsection