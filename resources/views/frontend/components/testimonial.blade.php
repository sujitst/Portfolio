<div class="row">
    <div class="col-12 col-md-12 col-lg-12 col-xl-4">
        <div class="testmional_card">
            <div class="review_image" id="review_image"></div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-12 col-xl-8">
        <div class="reviewer_info">
            <h3 id="reviewer_name"></h3>
            <p id="reviewer_position"></p>
            <div class="review_star" id="review_rating"></div>
            <p id="unique-review-text"></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
        <div class="testimonial_btn">
            <button class="reviewer_prev_btn" id="reviewer_prev_btn"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></button>
            <button class="reviewer_next_btn" id="reviewer_next_btn"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
        </div>
    </div>
</div>



<script src="{{ asset('assets/js/gsap.min.js') }}"></script>
<script>
    const uniqueReviews = [
        @foreach($testimonials as $testimonial) {
            text: {!! json_encode($testimonial['comment']) !!},
            name: {!! json_encode($testimonial['name']) !!},
            role: {!! json_encode($testimonial['position']) !!},
            rating: {!! json_encode($testimonial['rating']) !!},
            src: {!! json_encode(asset('upload/testimonial/'.$testimonial['image'])) !!},
        }@if(!$loop->last),@endif
        @endforeach
    ];

    let uniqueCurrentIndex = 0;
    const uniqueImageWrapper = document.getElementById('review_image');
    const uniqueNameEl = document.getElementById('reviewer_name');
    const uniqueRoleEl = document.getElementById('reviewer_position');
    const uniqueTextEl = document.getElementById('unique-review-text');
    const uniqueRatingEl = document.getElementById('review_rating');
    const uniquePrevBtn = document.getElementById('reviewer_prev_btn');
    const uniqueNextBtn = document.getElementById('reviewer_next_btn');

    function uniqueCalculateGap(width) {
        const minWidth = 1024;
        const maxWidth = 1456;
        const minGap = 60;
        const maxGap = 86;

        if (width <= minWidth) return minGap;
        if (width >= maxWidth) return Math.max(minGap, maxGap + 0.06018 * (width - maxWidth));

        return minGap + (maxGap - minGap) * ((width - minWidth) / (maxWidth - minWidth));
    }

    function updateRating(rating) {
        uniqueRatingEl.innerHTML = '';
        for (let i = 1; i <= 5; i++) {
            const star = document.createElement('span');
            star.innerHTML = '&#9733;'; // Unicode star
            if (i <= rating) star.classList.add('active');
            uniqueRatingEl.appendChild(star);
        }
    }

    function uniqueUpdateReview(direction = 0) {
        uniqueCurrentIndex = (uniqueCurrentIndex + direction + uniqueReviews.length) % uniqueReviews.length;

        const wrapperWidth = uniqueImageWrapper.offsetWidth;
        const gap = uniqueCalculateGap(wrapperWidth);
        const maxOffset = gap * 0.8;

        uniqueReviews.forEach((review, idx) => {
            let img = uniqueImageWrapper.querySelector(`[data-idx="${idx}"]`);
            if (!img) {
                img = document.createElement('img');
                img.src = review.src;
                img.alt = review.name;
                img.classList.add('animate_review_img');
                img.dataset.idx = idx;
                uniqueImageWrapper.appendChild(img);
            }

            const offset = (idx - uniqueCurrentIndex + uniqueReviews.length) % uniqueReviews.length;
            const zIndex = uniqueReviews.length - Math.abs(offset);
            const opacity = idx === uniqueCurrentIndex ? 1 : 0.5;
            const scale = idx === uniqueCurrentIndex ? 1 : 0.85;

            let x, y, rotate;
            if (offset === 0) {
                x = '0%';
                y = '0%';
                rotate = 0;
            } else if (offset === 1 || offset === -uniqueReviews.length + 1) {
                x = '20%';
                y = `-${maxOffset / img.offsetHeight * 100}%`;
                rotate = -15;
            } else {
                x = '-20%';
                y = `-${maxOffset / img.offsetHeight * 100}%`;
                rotate = 15;
            }

            gsap.to(img, {
                zIndex: zIndex,
                opacity: opacity,
                scale: scale,
                x: x,
                y: y,
                rotateY: rotate,
                duration: 0.8,
                ease: "power3.out"
            });
        });

        // Update Name & Role
        gsap.to([uniqueNameEl, uniqueRoleEl], {
            opacity: 0,
            y: -20,
            duration: 0.3,
            ease: "power2.in",
            onComplete: () => {
                uniqueNameEl.textContent = uniqueReviews[uniqueCurrentIndex].name;
                uniqueRoleEl.textContent = uniqueReviews[uniqueCurrentIndex].role;
                gsap.to([uniqueNameEl, uniqueRoleEl], { opacity: 1, y: 0, duration: 0.3, ease: "power2.out" });
            }
        });

        // Update Rating
        updateRating(uniqueReviews[uniqueCurrentIndex].rating);

        // Update Text
        gsap.to(uniqueTextEl, {
            opacity: 0,
            y: -20,
            duration: 0.3,
            ease: "power2.in",
            onComplete: () => {
                uniqueTextEl.innerHTML = uniqueReviews[uniqueCurrentIndex].text.split(' ').map(word => `<span class="unique-word">${word}</span>`).join(' ');
                gsap.to(uniqueTextEl, { opacity: 1, y: 0, duration: 0.3, ease: "power2.out" });
                uniqueAnimateWords();
            }
        });
    }

    function uniqueAnimateWords() {
        gsap.from('.unique-word', { opacity: 0, y: 10, stagger: 0.02, duration: 0.2, ease: "power2.out" });
    }

    uniquePrevBtn.addEventListener('click', () => uniqueUpdateReview(-1));
    uniqueNextBtn.addEventListener('click', () => uniqueUpdateReview(1));

    // Initial display
    uniqueUpdateReview(0);

    // Autoplay
    let uniqueAutoPlay = setInterval(() => uniqueUpdateReview(1), 5000);
    [uniquePrevBtn, uniqueNextBtn].forEach(btn => btn.addEventListener('click', () => clearInterval(uniqueAutoPlay)));

    window.addEventListener('resize', () => uniqueUpdateReview(0));
</script>