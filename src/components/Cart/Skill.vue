<!-----=====|| {( START:- RESUME )} ||=====----->
<template>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="skill">
                <p>{{ name }}</p>
                <h3>{{ mainText }}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
            <div class="progres">
                <p>HTML/CSS <span>60 %</span></p>
                <div class="animated-progress progressColor"><span data-progress="60"></span></div>
            </div>
            <div class="progres">
                <p>Web Design <span>75 %</span></p>
                <div class="animated-progress progressColor"><span data-progress="75"></span></div>
            </div>
            <div class="progres">
                <p>JavaScript <span>85 %</span></p>
                <div class="animated-progress progressColor"><span data-progress="85"></span></div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
            <div class="progres">
                <p>Vue js <span>60 %</span></p>
                <div class="animated-progress progressColor"><span data-progress="60"></span></div>
            </div>
            <div class="progres">
                <p>PHP <span>75 %</span></p>
                <div class="animated-progress progressColor"><span data-progress="75"></span></div>
            </div>
            <div class="progres">
                <p>Laravel <span>85 %</span></p>
                <div class="animated-progress progressColor"><span data-progress="85"></span></div>
            </div>
        </div>
    </div>
</template>
<!-----=====|| {( END:- RESUME )} ||=====----->

<!-----=====|| {( START:- RESUME JAVASCRIPT )} ||=====----->
<script>
    export default {
    name: 'Skill',
    data(){
        return{
            name: 'My level of knowledge in some tools',
            mainText: 'My Skills'
        }
    },  
    mounted() {
        this.animateProgress();
    },
    methods: {
        animateProgress() {
            const animatedProgressBars = document.querySelectorAll('.animated-progress span');

            animatedProgressBars.forEach(bar => {
            const progressValue = bar.getAttribute('data-progress');
            const originalWidth = parseFloat(window.getComputedStyle(bar).width);
            const finalWidth = parseFloat(progressValue);
            let start = null;

            function step(timestamp) {
                if (!start) start = timestamp;
                const progress = timestamp - start;
                const duration = 1000; 
                const percentage = Math.min(progress / duration, 1); 
                const currentWidth = originalWidth + (finalWidth - originalWidth) * percentage;
                bar.style.width = `${currentWidth}%`;

                if (percentage < 1) {
                window.requestAnimationFrame(step);
                } else {
                bar.textContent = `${progressValue}%`;
                }
            }
            window.requestAnimationFrame(step);
            });
        },
    },
    };
</script>
<!-----=====|| {( END:- RESUME JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- RESUME STYLE )} ||=====----->
<style>
    .skill { margin-top: 120px; }

    .skill p { color: #868686; margin-bottom: 0px; }

    .skill h3 { color: #fff; font-size: 36px; font-weight: 700; text-transform: uppercase; line-height: 1.2; word-break: normal; margin-top: 15px; margin-bottom: 15px; }

    .animated-progress { position: relative; overflow: hidden; width: 100%; height: 12px; background-color: #868686; }

    .animated-progress span { height: 100%; display: block; font-size: 9px; width: 0; color: #000; position: absolute; text-align: end; padding-right: 5px; }

    .progressColor span { background-color: #55e6a5; }

    .progres { margin-top: 30px; }

    .progres p { color: #868686; font-size: 16px; margin-bottom: 10px; }

    .progres p span { float: right; }
</style>
<!-----=====|| {( END:- RESUME STYLE )} ||=====----->