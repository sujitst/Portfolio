<form id="createSiteSettingForm" action="{{ route('site-setting.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.title') }}</label>
                    <input type="text" name="title" id="title" placeholder="{{ __('common.enter_title') }}">
                    <div class="titleError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.sub_title') }}</label>
                    <input type="text" name="sub_title" id="sub_title" placeholder="{{ __('common.enter_sub_title') }}">
                    <div class="sub_titleError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.copyright_names') }}</label>
                    <input type="text" name="copyright_name" id="copyright_name" placeholder="{{ __('common.copyright_place') }}">
                    <div class="copyRightError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.copyright_url') }}</label>
                    <input type="text" name="link" id="link" placeholder="{{ __('common.copyright_url_place') }}">
                    <div class="linkError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.copyright_year') }}</label>
                    <input type="text" name="year" id="year" placeholder="{{ __('common.copyright_year_place') }}">
                    <div class="yearError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.favicon') }}</label>
                    <input type="file" name="fave_icon" id="fave_icon" placeholder="{{ __('common.file_input') }}">
                    <img src="" id="favePreview" alt="logo" style="display: none">
                    <div class="faveError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.logo') }}</label>
                    <input type="file" name="logo" id="logo" placeholder="{{ __('common.file_input') }}">
                    <img src="" id="logoPreview" alt="logo" style="display: none">
                    <div class="logoError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addWork">{{ __('common.save') }}</button>
    </div>
</form>