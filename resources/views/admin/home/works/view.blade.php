
<div class="custom_modal_body">
    <div class="text-center mb-4">
        <label class="w-100 text-center">{{ __('common.picture') }}</label>
        <img src="{{ asset('upload/works/'.$work->picture) }}" alt="Work Picture" class="img_show_view">
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.name') }}</label>
                <input type="text" value="{{ $work->name }}" readonly>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.number') }}</label>
                <input type="text" value="{{ $work->number }}" readonly>
            </div>
        </div>
    </div>
</div>
<div class="custom_modal_footer">
    <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
</div>