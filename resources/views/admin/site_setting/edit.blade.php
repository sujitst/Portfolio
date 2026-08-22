<form id="updateSiteSettingForm" action="{{ route('site-setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.title') }}</label>
                    <input type="text" name="title" id="title" value="{{ $setting->title }}" placeholder="{{ __('common.enter_title') }}">
                    <div class="titleError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.sub_title') }}</label>
                    <input type="text" name="sub_title" id="sub_title" value="{{ $setting->sub_title }}" placeholder="{{ __('common.enter_sub_title') }}">
                    <div class="sub_titleError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.copyright_names') }}</label>
                    <input type="text" name="copyright_name" id="copyright_name" value="{{ $setting->copyright_name }}"  placeholder="{{ __('common.copyright_place') }}">
                    <div class="copyRightError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.copyright_url') }}</label>
                    <input type="text" name="link" id="link" value="{{ $setting->link }}"  placeholder="{{ __('common.copyright_url_place') }}">
                    <div class="linkError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.copyright_year') }}</label>
                    <input type="text" name="year" id="year" value="{{ $setting->year }}"  placeholder="{{ __('common.copyright_year_place') }}">
                    <div class="yearError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.favicon') }}</label>
                    <input type="file" name="fave_icon" id="fave_icon" placeholder="{{ __('common.file_input') }}">
                    <img src="{{ asset('upload/site-setting/' . $setting->fave_icon) }}" id="favePreview" alt="logo">
                    <div class="faveError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.logo') }}</label>
                    <input type="file" name="logo" id="logo" placeholder="{{ __('common.file_input') }}">
                    <img src="{{ asset('upload/site-setting/' . $setting->logo) }}" id="logoPreview" alt="logo">
                    <div class="logoError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addWork">{{ __('common.update') }}</button>
    </div>
</form>