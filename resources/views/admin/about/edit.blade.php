<form id="editAboutForm" action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="hidden" name="info_id" value="{{ $info->id }}">
    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.age') }}</label>
                    <input type="text" name="age" value="{{ $about->age }}" id="age" placeholder="{{ __('common.enter_age') }}">
                    <div class="ageError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.nationality') }}</label>
                    <input type="text" name="nationality" value="{{ $about->nationality }}" id="nationality" placeholder="{{ __('common.enter_nationality') }}">
                    <div class="nationalityError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.gender') }}</label>
                    <input type="text" name="gender" value="{{ $about->gender }}" id="gender" placeholder="{{ __('common.enter_gender') }}">
                    <div class="genderError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.phone_number') }}</label>
                    <input type="text" name="number" value="{{ $about->number }}" id="number" placeholder="{{ __('common.enter_number') }}">
                    <div class="numberError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.marital_status') }}</label>
                    <input type="text" name="marital_status" value="{{ $about->marital_status }}" id="marital_status" placeholder="{{ __('common.enter_marital_status') }}">
                    <div class="marital_statusError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.date_of_birth') }}</label>
                    <input type="date" name="dob" value="{{ $about->dob }}" id="dob" placeholder="{{ __('common.enter_date_of_birth') }}">
                    <div class="dobError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.description') }}</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="{{ __('common.description_here') }}">{{ $about->description }}</textarea>
                    <div class="descriptionError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addAbout">{{ __('common.update') }}</button>
    </div>
</form>