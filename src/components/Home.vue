<!-----=====|| {( START:- HOME )} ||=====----->
<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 p-0">
                <div class="banner-img">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12 p-0">
                                <div class="typeing-skill">
                                    <h1>{{ name }} <span ref="autoType" class="typing-animation"></span></h1>
                                    <p>{{ description }}</p>
                                    <button type="submit">Download CV <i class="fa fa-download" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <a href="#"><img src="@/assets/social-media/twitter.png" alt="twitter"></a>
                        <a href="#"><img src="@/assets/social-media/instgram.png" alt="instgram"></a>
                        <a href="#"><img src="@/assets/social-media/facebook.png" alt="facebook"></a>
                        <a href="#"><img src="@/assets/social-media/linkedin.png" alt="linkedin"></a>
                        <a href="#"><img src="@/assets/social-media/github.png" alt="github"></a>
                    </div>
                    <div class="languge-btn">
                        <button type="submit">ENG</button>
                        <button type="submit">SA</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<!-----=====|| {( END:- HOME )} ||=====----->

<!-----=====|| {( START:- HOME JAVASCRIPT )} ||=====----->
<script>
  export default {
    data() {
    return {
        name: "HI, I'M Sujit! CREATIVE",
        description: "I'm a passionate UI/UX designer with a mission to create delightful and intuitive digital experiences. With a strong foundation in design principles and a keen eye for detail, I specialize in translating complex ideas into user-friendly interfaces that captivate and engage.",
        };
    },
    mounted() {
        this.textRotation();
    },
    methods: {
        textRotation() {
        const dataset = ["WEB DEVELOPER.", "PROGRAMMER.", "DESIGNER."];
        let datasetIndex = 0;
        let data = dataset[datasetIndex];
        let letterIndex = 0;
        const addTime = 100;
        const removeTime = 50;
        const autoType = this.$refs.autoType;

        const addLetter = () => {
            autoType.textContent += data.charAt(letterIndex);
            letterIndex += 1;

            if (letterIndex <= data.length) {
            setTimeout(addLetter, addTime);
            } else {
            setTimeout(removeLetter, 1000);
            }
        };

        const removeLetter = () => {
            let currentString = autoType.textContent;
            autoType.textContent = currentString.slice(0, -1);

            if (currentString.length > 0) {
            setTimeout(removeLetter, removeTime);
            } else {
            datasetIndex = (datasetIndex + 1) % dataset.length;
            data = dataset[datasetIndex];
            letterIndex = 0;
            setTimeout(addLetter, 1000);
            }
        };

        setTimeout(addLetter, addTime);
        },
    },
    };
</script>
<!-----=====|| {( END:- HOME JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- HOME STYLE )} ||=====----->
<style>
    .banner-img {
        width: 100%;
        height: 100vh;
        background-image: url('@/assets/img/home.jpg');
        background-size: cover;
        background-position: center;
    }
    .typing-animation {
        color: #fff;
    }
    .typeing-skill {
        margin-top: 310px;
    }
    .typeing-skill h1 {
        color: #fff;
        font-size: 28px;
        font-weight: 700;
        text-transform: uppercase;
        line-height: 1.2;
        word-break: normal;
        margin-bottom: 0px;
    }
    .typeing-skill h1 span {
        color: #55e6a5;
    }
    .typeing-skill p {
        width: 650px;
        font-size: 16px;
        color: #868686;
        margin-top: 15px;
        text-align: justify;
        margin-bottom: 0px;
    }
    .typeing-skill button {
        color: #000;
        margin-top: 15px;
        padding: 7px 20px;
        border: none;
        background-color: #55e6a5;
    }
    .typeing-skill button i {
        color: #000;
        margin-left: 10px;
    }
    .languge-btn {
        width: 100px;
        margin-top: 300px;
        margin-left: 30px;
        transform: rotate(90deg);
        display: flex;
    }
    .languge-btn button {
        color: #fff;
        border: none;
        margin-left: 15px;
        background-color: #101010;
    }
    .media {
        position: absolute;
        top: 820px;
        right: 30px;
    }
    .media a img {
        width: 30px;
        margin-left: 15px;
        border: 2px solid #fff;
        border-radius: 5px;
    }
</style>
<!-----=====|| {( E:- HOME STYLE )} ||=====----->