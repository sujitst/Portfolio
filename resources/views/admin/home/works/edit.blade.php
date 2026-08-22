<form id="editWorkForm" action="{{ route('works.update', $work->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.name') }}</label>
                    <input type="text" name="name" value="{{ $work->name }}" id="name" placeholder="{{ __('common.enter_name') }}">
                    <div class="nameError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.number') }}</label>
                    <input type="text" name="number" value="{{ $work->number }}" id="number" placeholder="{{ __('common.enter_number') }}">
                    <div class="numberError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.picture') }}</label>
                    <input type="file" name="picture" id="picture" placeholder="File input">
                    <img src="{{ asset('upload/works/'.$work->picture) }}" id="imagePreview" alt="picture">
                    <div class="pictureError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addWork">{{ __('common.update') }}</button>
    </div>
</form>