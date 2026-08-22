<section>
    <div class="profile_widget">

        <!--=====|| LOGO OR TARGET PROJECT ||=====-->
        <div class="logo"> 
            @if(!empty($siteseting->logo))
                <a href="{{ route('home') }}"><img src="{{ asset('upload/site-setting/'. $siteseting->logo) }}" alt="logo image"></a>
            @else
                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/jpg/no-photo.jpg') }}" alt="logo image"></a>
            @endif
            <ul class="logo_text">
                <li>
                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    <p class="logoar">{{ __('common.open_take_on') }} <span>{{ $totalProject }} {{ __('common.projects') }}</span></p>
                </li>
            </ul>
        </div>

        <!--=====|| PROFILE OR DESCRIPTION ||=====-->
        <div class="profile">
            <img src="{{ asset('upload/information/'. $info->picture) }}" alt="logo image">
            <h2 id="textTarget">{{ $info->name }}</h2>
            <p id="single-skill"></p>
        </div>

        <!--=====|| PROFILE SOCIAL MEDIA ||=====-->
        <div class="social_media">
            <ul>
                @foreach(array_slice($medias->toArray(), 0, 3) as $media)
                    <li><a href="{{ $media['link'] ?? '#' }}"><img src="{{ asset('upload/media/'.$media['image']) }}" alt="Facebook"></a></li>
                @endforeach
            </ul>
        </div>
    </div>


    <!--=====|| SCRIPTS ||=====-->
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            /* =====|| CV DOWNLOAD ||===== */
            const downloadBtn = document.getElementById('downloadCv');
            if (downloadBtn) {
                downloadBtn.addEventListener('click', () => {
                    window.location.href = "{{ asset('upload/cv/'.$info->cv) }}";
                });
            }

            /* =====|| SKILLS FROM DB ||===== */
            const words = @json(json_decode($info->skills ?? '[]'));
            const dynamicText = document.getElementById("profile-dynamic");

            if (dynamicText && words.length) {
                let wordIndex = 0;
                let letterIndex = 0;
                let isDeleting = false;
                function typeEffect() {
                    const currentWord = words[wordIndex];

                    if (!isDeleting) {
                        dynamicText.textContent = currentWord.substring(0, ++letterIndex);
                        if (letterIndex === currentWord.length) {
                            isDeleting = true;
                            setTimeout(typeEffect, 1500);
                            return;
                        }
                    } else {
                        dynamicText.textContent = currentWord.substring(0, --letterIndex);
                        if (letterIndex === 0) {
                            isDeleting = false;
                            wordIndex = (wordIndex + 1) % words.length;
                        }
                    }
                    setTimeout(typeEffect, isDeleting ? 60 : 120);
                }

                typeEffect();
            }

            /* =====|| ONLY ONE SKILL FOR ||===== */
            const singleSkill = document.getElementById('single-skill');

            if (singleSkill && words.length > 0) {
                singleSkill.textContent = words[0];
            }
        });
    </script>
</section>