<div class="custom_modal_body">
    <div class="row mb-3">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.name') }}</label>
                <input type="text" value="{{ $about->information?->name }}" readonly>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.age') }}</label>
                <input type="text" value="{{ $about->age }}" readonly>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.phone_number') }}</label>
                <input type="text" value="{{ $about->number }}" readonly>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.nationality') }}</label>
                <input type="text" value="{{ $about->nationality }}" readonly>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.gender') }}</label>
                <input type="text" value="{{ $about->gender }}" readonly>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.marital_status') }}</label>
                <input type="text" value="{{ $about->marital_status }}" readonly>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.date_of_birth') }}</label>
                <input type="text" value="{{ $about->dob }}" readonly>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.description') }}</label>
                <textarea cols="30" rows="10" readonly>{{ $about->description }}</textarea>
            </div>
        </div>
    </div>
</div>

<div class="custom_modal_footer">
    <button type="button" class="bootbox-close-button">{{ __('common.close') }}</button>
</div>