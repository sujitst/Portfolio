@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('category.index') }}">{{ __('common.category') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.category_page') }}</h3>
                    <a href="{{ route('category.create') }}" id="addCategory" class="add-btn"><i class="fa fa-plus"></i> {{ __('common.add_category') }}</a>
                </div>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('common.sl') }}</th>
                            <th>{{ __('common.category_name') }}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('category.show', $category->id) }}" class="showCategory btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        <a href="{{ route('category.edit', $category->id) }}" class="editCategory btn btn-sm btn-primary">{{ __('common.edit') }}</a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="deleteBtn" style="display:inline-block">
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


            // =====|| OPEN ADD CATEGORY MODAL ||=====
            $(document).on('click', '#addCategory', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.create_category') }}',
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



            // =====|| AJAX FORM SUBMISSION: CREATE CATEGORY ||=====
            $(document).on('submit', '#createCategoryForm', function(e) {
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



            // =====|| SHOW CATEGORY DETAILS MODAL ||=====
            $(document).on('click', '.showCategory', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.view_category') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large',
                            buttons: {}
                        });
                        $('.modalContent').html(res);
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Something went wrong!', 'Error');
                    }
                });
            });



            // =====|| OPEN EDIT CATEGORY MODAL ||=====
            $(document).on('click', '.editCategory', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.update_category') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large',
                            buttons: {}
                        });
                        $('.modalContent').html(res);
                    },
                    error: function(err) {
                        console.error(err);
                        toastr.error('Something went wrong!', 'Error');
                    }
                });
            });



            // =====|| AJAX FORM SUBMISSION: UPDATE CATEGORY ||=====
            $(document).on('submit', '#editCategoryForm', function(e) {
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
        });



        //=====|| DELETE CATEGORY ||=====
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
    </script>
@endsection
