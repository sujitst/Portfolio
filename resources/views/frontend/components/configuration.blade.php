<!--=====|| SETTING ICON ||=====-->
<div class="color_settings_btn" id="settingsBtn"><i class="fa fa-cog"></i></div>


<!--=====|| COLOR POPUP PANEL ||=====-->
<div class="color_config_popup {{ session('text_dir', 'ltr') }}" id="colorPopup">

    <!--=====|| TOGALE CONFIGURATION BUTTON ||=====-->
    <div class="color_popup_header">
        <h3>{{ __('common.configuration') }}</h3>
        <button id="popupClose"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>

    <!--=====|| BACKGROUND, TEXT COLOR, LANGUAGE ||=====-->
    <div class="class_setting">
        <h3>{{ __('common.color_settings') }}</h3>
        <div class="bg_color_panel">
            <div class="bg_color_heading">
                <h4>{{ __('common.text_color') }}</h4>
                <button type="button" class="reset-text">{{ __('common.restore_default') }}</button>
            </div>
            <div class="color_dot_wrapper" id="textColors">
                <span class="color_dot_item" data-color="#000000" style="background:#000000"></span>
                <span class="color_dot_item" data-color="#ff0000" style="background:#ff0000"></span>
                <span class="color_dot_item" data-color="#00ff00" style="background:#00ff00"></span>
                <span class="color_dot_item" data-color="#0000ff" style="background:#0000ff"></span>
                <span class="color_dot_item" data-color="#ff9800" style="background:#ff9800"></span>
            </div>
        </div>

        <div class="bg_color_panel">
            <div class="bg_color_heading">
                <h4>{{ __('common.background_color') }}</h4>
                <button type="button" class="reset-bg">{{ __('common.restore_default') }}</button>
            </div>
            <div class="color_dot_wrapper" id="bgColors">
                <span class="color_dot_item" data-color="#ffffff" style="background:#ffffff"></span>
                <span class="color_dot_item" data-color="#f28b82" style="background:#f28b82"></span>
                <span class="color_dot_item" data-color="#34a853" style="background:#34a853"></span>
                <span class="color_dot_item" data-color="#4285f4" style="background:#4285f4"></span>
                <span class="color_dot_item" data-color="#17c6aa" style="background:#17c6aa"></span>
                <span class="color_dot_item" data-color="#ff9800" style="background:#ff9800"></span>
                <span class="color_dot_item" data-color="#9c27b0" style="background:#9c27b0"></span>
            </div>
        </div>

        <div class="language_panel">
            <h4>{{ __('common.change_language') }}</h4>
            <div class="languge_field">
                <label for="language">{{ __('common.language') }}</label>
                <select name="language" class="language_select">
                    <option value="en" {{ session('lang_code') == 'en' ? 'selected' : '' }}>{{ __('common.en') }}</option>
                    <option value="bn" {{ session('lang_code') == 'bn' ? 'selected' : '' }}>{{ __('common.bn') }}</option>
                    <option value="hi" {{ session('lang_code') == 'hi' ? 'selected' : '' }}>{{ __('common.hi') }}</option>
                    <option value="sp" {{ session('lang_code') == 'sp' ? 'selected' : '' }}>{{ __('common.sp') }}</option>
                    <option value="fr" {{ session('lang_code') == 'fr' ? 'selected' : '' }}>{{ __('common.fr') }}</option>
                </select>
            </div>
        </div>
    </div>

    <!--=====|| FOOTER  ||=====-->
    <div class="menu_config_footer">© {{ date($siteseting->year) }}
        <a href="{{ $siteseting->link ?? '#' }}" target="_blank" rel="noopener noreferrer">{{ $siteseting->copyright_name ?? 'Your Company' }}</a>
    </div>

</div>