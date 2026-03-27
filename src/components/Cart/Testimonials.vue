<!-----=====|| {( START:- TESTIMONIALS )} ||=====----->
<template>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="testimonials">
                <p>{{ TestimonialsTitle }}</p>
                <h1>{{ subTitle }}</h1>
            </div>
        </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="testmonialCard">
                            <div class="row">
                                <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                                    <div class="testmonialImg">
                                        <img :src="testimonialImg" alt="images">
                                    </div>
                                </div>
                                <div class="col-8 col-md-8 col-lg-8 col-xl-8">
                                    <div class="testimonialsDescription">
                                        <h3>{{ name }}</h3>
                                        <p>{{ nameSub }}</p>
                                        <p>{{ text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="testmonialCard">
                            <div class="row">
                                <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                                    <div class="testmonialImg">
                                        <img :src="testimonialImg" alt="images">
                                    </div>
                                </div>
                                <div class="col-8 col-md-8 col-lg-8 col-xl-8">
                                    <div class="testimonialsDescription">
                                        <h3>{{ name }}</h3>
                                        <p>{{ nameSub }}</p>
                                        <p>{{ text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="testmonialCard">
                            <div class="row">
                                <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                                    <div class="testmonialImg">
                                        <img :src="testimonialImg" alt="images">
                                    </div>
                                </div>
                                <div class="col-8 col-md-8 col-lg-8 col-xl-8">
                                    <div class="testimonialsDescription">
                                        <h3>{{ name }}</h3>
                                        <p>{{ nameSub }}</p>
                                        <p>{{ text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="testmonialCard">
                            <div class="row">
                                <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                                    <div class="testmonialImg">
                                        <img :src="testimonialImg" alt="images">
                                    </div>
                                </div>
                                <div class="col-8 col-md-8 col-lg-8 col-xl-8">
                                    <div class="testimonialsDescription">
                                        <h3>{{ name }}</h3>
                                        <p>{{ nameSub }}</p>
                                        <p>{{ text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="testmonialCard">
                            <div class="row">
                                <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                                    <div class="testmonialImg">
                                        <img :src="testimonialImg" alt="images">
                                    </div>
                                </div>
                                <div class="col-8 col-md-8 col-lg-8 col-xl-8">
                                    <div class="testimonialsDescription">
                                        <h3>{{ name }}</h3>
                                        <p>{{ nameSub }}</p>
                                        <p>{{ text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="testmonialCard">
                            <div class="row">
                                <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                                    <div class="testmonialImg">
                                        <img :src="testimonialImg" alt="images">
                                    </div>
                                </div>
                                <div class="col-8 col-md-8 col-lg-8 col-xl-8">
                                    <div class="testimonialsDescription">
                                        <h3>{{ name }}</h3>
                                        <p>{{ nameSub }}</p>
                                        <p>{{ text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> 
</template>
<!-----=====|| {( END:- TESTIMONIALS )} ||=====----->

<!-----=====|| {( START:- TESTIMONIALS JAVASCRIPT )} ||=====----->
<script>
    export default {
        name: 'Testimonials',
        data (){
            return{
                TestimonialsTitle: 'What my clients think about me',
                subTitle: 'Testimonials',
                testimonialImg: 'https://www.shutterstock.com/image-photo/casually-handsome-confident-young-man-260nw-439433326.jpg',
                name: 'Jone Done',
                nameSub: 'Web-Developer',
                text: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.'
            }
        },
    }
</script>
<!-----=====|| {( START:- TESTIMONIALS JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- TESTIMONIALS STYLE )} ||=====----->
<style>
    .testimonials { margin-top: 120px; }
    
    .testimonials p { color: #868686; margin-bottom: 0px; }

    .testimonials h1 { color: #fff; font-size: 36px; font-weight: 700; text-transform: uppercase; line-height: 1.2; word-break: normal; margin-top: 15px; margin-bottom: 15px; }

    .testmonialCard { width: 100%; margin-top: 30px; padding: 30px; background-color: #161616; transition: all 700ms; }

    .testmonialImg { width: 100%; overflow: hidden; border: 1px solid #55e6a5; background-color: #fff; }

    .testmonialImg img { width: 100%; height: 200px; transition: all 900ms; }

    .testmonialImg img:hover { transform: scale(1.2); transform: rotate(-15deg); }

    .testimonialsDescription h3 { color: #fff; font-size: 18px; margin-top: 40px; margin-bottom: 0px; }

    .testimonialsDescription p { color: #868686; font-size: 14px; margin-top: 10px; margin-bottom: 0px; text-align: justify; } 

    .carousel-control-prev { width: 30px; border-radius: 30px; height: 30px; top: 315px; left: 1200px; }

    .carousel-control-next { width: 30px; border-radius: 30px; height: 30px; right: 0px; top: 315px; }

    .carousel-control-prev-icon { width: 20px; }

    .carousel-control-next-icon { width: 20px; }
</style>
<!-----=====|| {( END:- TESTIMONIALS STYLE )} ||=====----->