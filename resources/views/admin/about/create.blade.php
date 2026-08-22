<form id="createAboutForm" action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="info_id" value="{{ $info->id }}">
    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.age') }}</label>
                    <input type="number" name="age" id="age" placeholder="{{ __('common.enter_age') }}">
                    <div class="ageError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.nationality') }}</label>
                    <input type="text" name="nationality" id="nationality" placeholder="{{ __('common.enter_nationality') }}">
                    <div class="nationalityError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.gender') }}</label>
                    <input type="text" name="gender" id="gender" placeholder="{{ __('common.enter_gender') }}">
                    <div class="genderError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.phone_number') }}</label>
                    <input type="text" name="number" id="number" placeholder="{{ __('common.enter_number') }}">
                    <div class="numberError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.marital_status') }}</label>
                    <input type="text" name="marital_status" id="marital_status" placeholder="{{ __('common.enter_marital_status') }}">
                    <div class="marital_statusError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.date_of_birth') }}</label>
                    <input type="date" name="dob" id="dob" placeholder="{{ __('common.enter_date_of_birth') }}">
                    <div class="dobError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.description') }}</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="{{ __('common.description_here') }}"></textarea>
                    <div class="descriptionError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addAbout">{{ __('common.save') }}</button>
    </div>
</form>