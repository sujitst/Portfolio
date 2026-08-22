<form id="createInformationForm" action="{{ route('info.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.name') }}</label>
                    <input type="text" name="name" id="name" placeholder="{{ __('common.enter_name') }}">
                    <div class="nameError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.skills') }}</label>
                    <div id="skillsWrapper">
                        <div class="skill-item" style="display:flex; align-items:center; margin-bottom:5px;">
                            <input type="text" name="skills[]" placeholder="{{ __('common.enter_skills') }}" style="flex:1; margin-right:5px;">
                            <button type="button" class="addSkillBtn" title="Add skill"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="skillsError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.title') }}</label>
                    <input type="text" name="title" id="title" placeholder="{{ __('common.enter_title') }}">
                    <div class="titleError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.description') }}</label>
                    <textarea name="description" cols="30" rows="5" placeholder="{{ __('common.description_here') }}"></textarea>
                    <div class="descriptionError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.cv') }}</label>
                    <input type="file" name="cv" id="cv">
                    <div class="cvError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.picture') }}</label>
                    <input type="file" name="picture" id="picture" accept="image/*">
                    <img src="" id="imagePreview" alt="picture" style="display: none; max-width: 150px; margin-top: 10px;">
                    <div class="pictureError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addWork">{{ __('common.save') }}</button>
    </div>
</form>



<script>
    const skillsWrapper = document.getElementById('skillsWrapper');

    document.addEventListener('click', function(e){
        if(e.target.closest('.addSkillBtn')){
            const skillDiv = document.createElement('div');
            skillDiv.classList.add('skill-item');
            skillDiv.style.display = 'flex';
            skillDiv.style.alignItems = 'center';
            skillDiv.style.marginBottom = '5px';
            skillDiv.innerHTML = `
                <input type="text" name="skills[]" placeholder="Enter a skill" style="flex:1; margin-right:5px;">
                <button type="button" class="removeSkillBtn" title="Remove skill"><i class="fa fa-minus"></i></button>
            `;
            skillsWrapper.appendChild(skillDiv);
        }

        if(e.target.closest('.removeSkillBtn')){
            const skillItem = e.target.closest('.skill-item');
            skillItem.remove();
        }
    });
</script>