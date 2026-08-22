@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('works.index') }}">{{ __('common.works') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.my_works_page') }}</h3>
                    <a href="{{ route('works.create') }}" id="addWork" class="add-btn"><i class="fa fa-plus"></i>{{ __('common.add_works') }}</span></a>
                </div>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('common.sl') }}</th>
                            <th>{{ __('common.name') }}</th>
                            <th>{{ __('common.Number') }}</th>
                            <th>{{ __('common.picture') }}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($works as $key => $work)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $work->name }}</td>
                                <td>{{ $work->number }}</td>
                                <td>
                                    @if($work->picture)
                                        <img src="{{ asset('upload/works/' . $work->picture) }}" alt="Picture" width="50">
                                    @else
                                        <img src="{{ asset('assets/images/jpg/no-photo.jpg') }}" alt="Picture" width="50">
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <a href="{{ route('works.show', $work->id) }}" id="showWork" class="btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        <a href="{{ route('works.edit', $work->id) }}" id="editWork" class="btn btn-sm btn-primary">{{ __('common.edit') }}</a>
                                        <form action="{{ route('works.destroy', $work->id) }}" method="POST" class="deleteBtn" style="display:inline-block">
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


            //=====|| OPEN ADD WORK MODAL ||=====
            $(document).on('click', '#addWork', function (e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function (res) {
                            dialog = bootbox.dialog({
                            title: '{{ __('common.my_work_create') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large'
                        });

                        $('.modalContent').html(res);
                    },
                    error: function() {
                        toastr.error('Something went wrong!', 'Error');
                    }
                });
            });

            //=====|| PICTURE PREVIEW ||=====
            $(document).on('change', '#picture', function () {
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


            
            //=====|| AJAX FORM SUBMISSION: CREATE WORK ||=====
            $(document).on('submit', '#createWorksForm', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('works.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(res) {
                        if(res.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');

                            $('.nameError').text(res.errors.name);
                            $('.numberError').text(res.errors.number);
                            $('.pictureError').text(res.errors.picture);
                        } else {
                            $('.errors').html('');
                            $('.errors').addClass('d-none');
                            dialog.modal('hide');
                            toastr.success(res.message, 'Success', {timeOut: 3000, closeButton: true});
                            $("#myTable").load(location.href + ' #myTable');
                        }
                    },
                    error: function() {
                        toastr.error('Something went wrong!', 'Error');
                    }
                });
            });



            //=====|| SHOW WORK DETAILS MODAL ||=====
            $(document).on('click', '#showWork', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function (res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.my_work_details') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large'
                        });
                        $('.modalContent').html(res);
                    },
                    error: function() {
                        toastr.error('Something went wrong!', 'Error');
                    }
                });
            });



            //=====|| SHOW WORK DETAILS MODAL/EDIT ||=====
            $(document).on('click', '#editWork', function (e) { 
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function (res) {
                            dialog = bootbox.dialog({
                            title: '{{ __('common.my_work_update') }}',
                            message: "<div class='modalContent'></div>",
                            size: 'large'
                        });

                        $('.modalContent').html(res);
                    },
                    error: function() {
                        toastr.error('Something went wrong!', 'Error');
                    }
                });
            });



            //=====|| AJAX FORM SUBMISSION UPDATE WORK ||=====
            $(document).on('submit', '#editWorkForm', function (e) {
                e.preventDefault();

                let form = this;
                let formData = new FormData(form);
                let url = $(form).attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function (res) {
                        if (res.status == 400) {
                            $('.errors').html('').removeClass('d-none');

                            $('.nameError').text(res.errors.name);
                            $('.numberError').text(res.errors.number);
                            $('.pictureError').text(res.errors.picture);
                        } else {
                            $('.errors').html('');
                            $('.errors').addClass('d-none');
                            dialog.modal('hide');
                            toastr.success(res.message, 'Success', {timeOut: 3000, closeButton: true});
                            $("#myTable").load(location.href + ' #myTable');
                        }
                    },
                    error: function () {
                        toastr.error('Something went wrong!', 'Error');
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