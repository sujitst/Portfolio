@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('site-setting.index') }}">{{ __('common.site_setting') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.site_setting') }}</h3>
                    @if($settings->count() < 1)
                    <a href="{{ route('site-setting.create') }}" id="addSiteSetting" class="add-btn"><i class="fa fa-plus"></i>{{ __('common.add_site_setting') }}</span></a>
                    @endif
                </div>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('common.sl') }}</th>
                            <th>{{ __('common.title') }}</th>
                            <th>{{ __('common.copyright_t') }}</th>
                            <th>{{ __('common.copyright_year') }}</th>
                            <th>{{ __('common.favicon') }}</th>
                            <th>{{ __('common.logo') }}</th>
                            <th style="width: 150px !important">{{ __('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($settings as $key => $setting)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $setting->title }}</td>
                                <td>{{ $setting->copyright_name }}</td>
                                <td>{{ $setting->year }}</td>
                                <td><img src="{{ asset('upload/site-setting/' . $setting->fave_icon) }}" alt="fave_icon" style="height: 60px;"></td>
                                <td><img src="{{ asset('upload/site-setting/' . $setting->logo) }}" alt="logo" style="height: 60px;"></td>
                                <td>
                                    <div>
                                        <a href="{{ route('site-setting.show', $setting->id) }}" id="showSiteSetting" class="btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        <a href="{{ route('site-setting.edit', $setting->id) }}" id="editSiteSetting" class="btn btn-sm btn-primary">{{ __('common.edit') }}</a>
                                        <form action="{{ route('site-setting.destroy', $setting->id) }}" method="POST" class="deleteBtn" style="display:inline-block">
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


            //=====|| OPEN ADD SITE SETTING MODAL ||=====
            $(document).on('click', '#addSiteSetting', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.site_setting_create') }}',
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
            $(document).on('change', '#logo', function () {
                let file = this.files[0];

                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $('#logoPreview')
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

            //=====|| FAVE ICON PREVIEW ||=====
            $(document).on('change', '#fave_icon', function () {
                let file = this.files[0];

                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $('#favePreview')
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



            //=====|| AJAX FORM SUBMISSION: CREATE SITE SETTING ||=====
            $(document).on('submit', '#createSiteSettingForm', function (e) {
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
                            $('.titleError').text(res.errors.title ?? '');
                            $('.sub_titleError').text(res.errors.sub_title ?? '');
                            $('.copyRightError').text(res.errors.copyright_name ?? '');
                            $('.linkError').text(res.errors.link ?? '');
                            $('.yearError').text(res.errors.year ?? '');
                            $('.faveError').text(res.errors.fave_icon ?? '');
                            $('.logoError').text(res.errors.logo ?? '');

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



            //=====|| SHOW SITE SETTING DETAILS MODAL ||=====
            $(document).on('click', '#showSiteSetting', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.site_setting_view') }}',
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



            //=====|| OPEN EDIT SITE SETTING MODAL ||=====
            $(document).on('click', '#editSiteSetting', function(e) {
                e.preventDefault();
                let modalUrl = $(this).attr('href');

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function(res) {
                        dialog = bootbox.dialog({
                            title: '{{ __('common.site_setting_update') }}',
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



            //=====|| AJAX FORM SUBMISSION: UPDATE SITE SETTING ||=====
            $(document).on('submit', '#updateSiteSettingForm', function(e) {
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
                            $('.titleError').text(res.errors.title ?? '');
                            $('.copyRightError').text(res.errors.copyright_name ?? '');
                            $('.linkError').text(res.errors.link ?? '');
                            $('.yearError').text(res.errors.year ?? '');
                            $('.sub_titleError').text(res.errors.sub_title ?? '');
                            $('.faveError').text(res.errors.fave_icon ?? '');
                            $('.logoError').text(res.errors.logo ?? '');
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



            //=====|| DELETE SITE SETTING ||=====
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