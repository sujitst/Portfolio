<!-----=====|| {( START:- RESUME )} ||=====----->
<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 p-0">
                <div class="resume-background">
                    <!-----=====|| {( START:- SCROLLBAR )} ||=====----->
                    <Scroll />
                    <!-----=====|| {( END:- SCROLLBAR )} ||=====----->
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="about-heading">
                                    <p>{{ subtitle }}</p>
                                    <h1>{{ title }}</h1>
                                    <div class="statusBar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="education">
                                    <h1>Education</h1>
                                    <div class="border-msg">
                                        <div class="message">
                                            <h6>Computer Science</h6>
                                            <p v-html="msg"></p>
                                            <img :src="images" alt="images">
                                        </div>
                                        <div class="message">
                                            <h6>Bachelor Degree</h6>
                                            <p v-html="msg"></p>
                                            <img :src="images" alt="images">
                                        </div>
                                        <div class="message">
                                            <h6>Master Degree</h6>
                                            <p v-html="msg"></p>
                                            <img :src="images" alt="images">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="education">
                                    <h1>Experience</h1>
                                    <div class="border-msg">
                                        <div class="message">
                                            <h6>Software Engineer</h6>
                                            <p v-html="msg"></p>
                                            <img :src="images" alt="images">
                                        </div>
                                        <div class="message">
                                            <h6>Back-End Developer</h6>
                                            <p v-html="msg"></p>
                                            <img :src="images" alt="images">
                                        </div>
                                        <div class="message">
                                            <h6>UI/UX Designer</h6>
                                            <p v-html="msg"></p>
                                            <img :src="images" alt="images">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-----=====|| {( START:- MY-SKILL )} ||=====----->
                        
                        <Skill />
                            
                        <!-----=====|| {( END:- MY-SKILL )} ||=====----->
                        <!-----=====|| {( START:- MY-SKILL )} ||=====----->
                        
                        <Office />
                            
                        <!-----=====|| {( END:- MY-SKILL )} ||=====----->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<!-----=====|| {( END:- RESUME )} ||=====----->

<!-----=====|| {( START:- RESUME JAVASCRIPT )} ||=====----->
<script>
    import Skill from './Cart/Skill.vue'
    import Office from './Cart/Office.vue'
    import Scroll from './Cart/ScrollBar.vue'

    export default {
        name: 'Resume',
        data(){
            return{
                subtitle: 'Check out my Resume',
                title: 'Resume',
                msg: 'Cambridge University / 2004 - 2007 <br><span class="highlighted-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quo repudiandae</span>',
                images: require('@/assets/png/arrow-right.png')
            }
        },
        computed: {
            formattedMsg() {
            return this.msg;
            }
        },
        components: {
            Skill,
            Office,
            Scroll
        }
    }
</script>
<!-----=====|| {( END:- RESUME JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- RESUME STYLE )} ||=====----->
<style>
    .resume-background { width: 100%; height: 1650px; background-color: #000; }

    .education { margin-top: 70px; }

    .education h1 { font-size: 26px; color: #fff; margin-bottom: 30px; }

    .border-msg { border-left:2px solid #55e6a5; }
    
    .message { position: relative; background-color: #161616; padding: 30px 30px 30px 70px; transition: all 900ms; border-bottom: 1px solid #868686; }

    .message:last-child { border-bottom: none }

    .message h6 { font-size: 18px; color: #fff; margin-bottom: 0px; }

    .message p { font-size: 16px; color: #868686; margin-bottom: 0px; margin-top: 15px; }

    .message img { position: absolute; width: 30px; top: 25px; left: 0px; }

</style>
<!-----=====|| {( END:- RESUME STYLE )} ||=====----->