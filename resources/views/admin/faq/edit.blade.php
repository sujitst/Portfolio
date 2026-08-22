<form id="updateFaqForm" action="{{ route('faq.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.question') }}</label>
                    <input type="text" name="question" id="question" value="{{ $faq->question }}" placeholder="{{ __('common.enter_question') }}">
                    <div class="questionError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.answer') }}</label>
                    <input type="text" name="answer" id="answer" value="{{ $faq->answer }}" placeholder="{{ __('common.enter_answer') }}">
                    <div class="answerError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addAbout">{{ __('common.update') }}</button>
    </div>
</form>