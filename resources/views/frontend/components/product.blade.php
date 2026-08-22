<div class="owl-carousel owl-theme" id="projectCarousel">
    @foreach ($projects as $project)
        <div class="item">
            <div class="project_card">
                <img src="{{ asset('upload/project/'. $project->image) }}" alt="{{ $project->name }}">
                <div class="project_des">
                    <h4>{{ $project->name }}</h4>
                    <ul>
                        @php
                            $rating = $project->rating;
                            $fullStars = floor($rating);
                            $decimal = $rating - $fullStars;

                            if ($decimal >= 0.75) {
                                $fullStars += 1;
                                $halfStar = false;
                            } elseif ($decimal >= 0.25) {
                                $halfStar = true;
                            } else {
                                $halfStar = false;
                            }

                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                        @endphp

                        <!-- Full Stars -->
                        @for ($i = 0; $i < $fullStars; $i++)
                            <i class="fa fa-star text-warning"></i>
                        @endfor

                        <!-- Half Star -->
                        @if ($halfStar)
                            <i class="fa fa-star-half-o text-warning"></i>
                        @endif

                        <!-- Empty Stars -->
                        @for ($i = 0; $i < $emptyStars; $i++)
                            <i class="fa fa-star-o text-warning"></i>
                        @endfor

                        <span class="ms-1 text-muted">({{ $rating }})</span>
                    </ul>
                </div>
                <div class="project_btn">
                    <p>${{ $project->price }}</p>
                    <a href="{{ $project->link }}">{{ __('common.more_details') }} <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    @endforeach
</div>