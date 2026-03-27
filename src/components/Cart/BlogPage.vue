<!-----=====|| {( START:- BLOG-PAGE )} ||=====----->
<template>
    <div class="blog">
        <a href="#">
            <img :src="images" alt="img">
            <h4>{{ heading }}</h4>
        </a>
        <P>{{ text }}</P>
        <button>{{ btn }} <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
        <p class="blog-time"><strong>{{ time }}</strong></p>
    </div>
</template>
<!-----=====|| {( END:- BLOG-PAGE )} ||=====----->

<!-----=====|| {( START:- BLOG-PAGE JAVASCRIPT )} ||=====----->
<script>
    export default {
        name: 'BlogPage',
        props: {
            images: {
                type: String,
                default: 'default_image_url.jpg' // |{ ADD THE DEFAULT IMAGES }|
            },
            heading: {
                type: String,
                default: 'Default Heading' // |{ ADD THE DEFAULT HEADING }|
            },
            text: {
                type: String,
                default: 'Default Heading' // |{ ADD THE DEFAULT HEADING }|
            },
            btn: {
                type: String,
                default: 'Read More' // |{ ADD THE DEFAULT BUTTON TEXT }|
            },
            time: {
                type: String,
                default: '30 AUGUST 2024' // |{ ADD THE DEFAULT TIME }|
            }
        }
    }
</script>
<!-----=====|| {( END:- BLOG-PAGE JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- BLOG-PAGE STYLE )} ||=====----->
<style scoped>
    .blog { position: relative; background-color: #161616; padding: 15px 70px 15px 15px; margin-top: 50px; }
    .blog a { text-decoration: none; }
    .blog a img { width: 100%; }
    .blog a h4 { font-size: 18px; color: #fff; margin-top: 15px; margin-bottom: 0px; }
    .blog p { color: #868686; margin-top: 15px; line-height: 1.4; font-size: 14px; margin-bottom: 0px; text-align: justify; }
    .blog button { font-size: 14px; color: #fff; border: none; background-color: #161616; text-transform: uppercase; padding: 0px; margin-top: 15px; transition: all 900ms; }
    .blog button i { margin-left: 15px; }
    .blog button:hover { color: #55e6a5; }
    .blog-time { position: absolute; top: 100px; right: -20px; font-size: 16px; color: #868686; text-transform: uppercase; transform: rotate(90deg); }
    .blog::before { position: absolute; content: " "; top: 0px; right: 35px; width: 1px; height: 60px; background-color: #868686; transform: rotate(0deg); }
</style>
<!-----=====|| {( END:- BLOG-PAGE STYLE )} ||=====----->
