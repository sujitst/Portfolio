<form id="createExperienceForm" action="{{ route('experience.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.experience_name') }}</label>
                    <input type="text" name="exp_name" id="exp_name" placeholder="{{ __('common.enter_experience_name') }}">
                    <div class="expNameError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.experience') }}</label>
                    <input type="text" name="exp_date_time" id="exp_date_time" placeholder="{{ __('common.enter_experience_datetime') }}">
                    <div class="expDateTimeError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addAbout">{{ __('common.save') }}</button>
    </div>
</form>