<div class="custom_modal_body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label class="w-100 text-center">{{ __('common.picture') }}</label>
                <img src="{{ asset('upload/information/' . $info->picture) }}" alt="picture" class="img_show_view">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.cv') }}</label>
                @if(!empty($info->cv))
                    <p class="mt-2"> {{ __('common.view_cv') }} : <a href="{{ asset('upload/cv/' . $info->cv) }}" target="_blank">{{ $info->cv }}</a> </p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.name') }}</label>
                <input type="text" value="{{ $info->name }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.skills') }}</label>
                <div id="skillsWrapper">
                    @php $skills = json_decode($info->skills, true) ?? []; @endphp
                    @foreach($skills as $skill)
                        <div class="skill-item" style="display:flex; align-items:center; margin-bottom:5px;">
                            <input type="text" name="skills[]" value="{{ $skill }}" readonly style="flex:1; margin-right:5px;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.title') }}</label>
                <input type="text" value="{{ $info->title }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.description') }}</label>
                <textarea name="description" cols="30" rows="5" readonly>{{ $info->description }}</textarea>
            </div>
        </div>
    </div>
</div>

<div class="custom_modal_footer">
    <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
</div>