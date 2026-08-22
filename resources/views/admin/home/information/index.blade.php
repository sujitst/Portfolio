@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('info.index') }}">{{ __('common.information') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.my_information_page') }}</h3>
                    <a href="{{ route('info.create') }}" id="addModalInformation" class="add-btn"><i class="fa fa-plus"></i>{{ __('common.add_information') }}</span></a>
                </div>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('common.sl') }}</th>
                            <th>{{ __('common.name') }}</th>
                            <th>{{ __('common.occupation') }}</th>
                            <th>{{ __('common.title') }}</th>
                            <th>{{ __('common.description') }}</th>
                            <th>{{ __('common.cv') }}</th>
                            <th>{{ __('common.picture') }}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($infos as $key => $info)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $info->name }}</td>
                                <td>
                                    @php
                                        $skills = $info->skills;
                                        if (is_string($skills)) {
                                            $skills = json_decode($skills, true);
                                        }
                                    @endphp

                                    @if(!empty($skills) && is_array($skills))
                                        <ul style="padding-left: 18px; margin: 0;">
                                            @foreach($skills as $skill)
                                                <li>{{ $skill }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $info->title }}</td>
                                <td>{{ Str::limit($info->description, 50) }}</td>
                                <td>
                                    @if($info->cv)
                                        <a href="{{ asset('upload/cv/' . $info->cv) }}" target="_blank">{{ __('common.view_cv') }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if($info->picture)
                                        <img src="{{ asset('upload/information/' . $info->picture) }}" alt="Picture" width="50">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <a href="{{ route('info.show', $info->id) }}" id="showInformation" class="btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        <a href="{{ route('info.edit', $info->id) }}" id="editInformation" class="btn btn-sm btn-primary">{{ __('common.edit') }}</a>
                                        <form action="{{ route('info.destroy', $info->id) }}" method="POST" class="deleteBtn" style="display:inline-block">
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



            //=====|| OPEN ADD MY INFORMATION MODAL ||=====
            $(document).on('click', '#addModalInformation', function (e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function (res) {
                            dialog = bootbox.dialog({
                            title: '{{ __('common.my_info_create') }}',
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


            
            //=====|| AJAX FORM SUBMISSION: CREATE MY INFORMATION ||=====
            $(document).on('submit', '#createInformationForm', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('info.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(res) {
                        $('.errors').html('');
                        $('.errors').addClass('d-none');
                        if(res.status == 400) {
                            if(res.errors.name) $('.nameError').text(res.errors.name[0]).removeClass('d-none');
                            Object.keys(res.errors).forEach(function (key) {
                                if (key.startsWith('skills')) {
                                    $('.skillsError').text(res.errors[key][0]).removeClass('d-none');
                                }
                            });
                            if(res.errors.title) $('.titleError').text(res.errors.title[0]).removeClass('d-none');
                            if(res.errors.description) $('.descriptionError').text(res.errors.description[0]).removeClass('d-none');
                            if(res.errors.cv) $('.cvError').text(res.errors.cv[0]).removeClass('d-none');
                            if(res.errors.picture) $('.pictureError').text(res.errors.picture[0]).removeClass('d-none');
                        } else {
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




            //=====|| SHOW INFORMATION DETAILS MODAL ||=====
            $(document).on('click', '#showInformation', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function (res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.my_info_details') }}',
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



            //=====|| SHOW INFORMATION MODAL/EDIT ||=====
            $(document).on('click', '#editInformation', function (e) { 
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function (res) {
                            dialog = bootbox.dialog({
                            title: '{{ __('common.my_info_update') }}',
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



            //=====|| AJAX FORM SUBMISSION UPDATE INFORMATION ||=====
            $(document).on('submit', '#updateInformationForm', function (e) {
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
                    success: function(res) {
                        $('.errors').html('');
                        $('.errors').addClass('d-none');
                        if(res.status == 400) {
                            if(res.errors.name) $('.nameError').text(res.errors.name[0]).removeClass('d-none');
                            Object.keys(res.errors).forEach(function (key) {
                                if (key.startsWith('skills')) {
                                    $('.skillsError').text(res.errors[key][0]).removeClass('d-none');
                                }
                            });
                            if(res.errors.title) $('.titleError').text(res.errors.title[0]).removeClass('d-none');
                            if(res.errors.description) $('.descriptionError').text(res.errors.description[0]).removeClass('d-none');
                            if(res.errors.cv) $('.cvError').text(res.errors.cv[0]).removeClass('d-none');
                            if(res.errors.picture) $('.pictureError').text(res.errors.picture[0]).removeClass('d-none');
                        } else {
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