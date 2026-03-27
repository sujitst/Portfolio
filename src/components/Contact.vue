<!-----=====|| {( START:- CONTACT )} ||=====----->
<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 p-0">
                <div class="contact-background">
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
                                <div class="mess">
                                    <h1>{{ msg }}</h1>
                                </div>
                                <form action="">
                                    <div class="row">
                                        <div class="col-6 col-md-6 col-lg-6 col-xl-6">
                                            <div class="contact-name">
                                                <p>Name: {{ inputName }}</p>
                                                <input type="text" v-model="inputName" placeholder="Enter your name" required autofocus>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6 col-lg-6 col-xl-6">
                                            <div class="contact-name">
                                                <p>Phone: {{ inputPhone }}</p>
                                                <input type="number" v-model="inputPhone" placeholder=" " required>
                                            </div>
                                        </div>
                                        <div class="contact-name">
                                                <p>E-mail: {{ inputEmail }}</p>
                                                <input type="text" v-model="inputEmail" placeholder="Enter your email" required>
                                            </div>
                                        <div class="contact-name">
                                            <p>Subject: {{ inputSubject }}</p>
                                            <input type="text" v-model="inputSubject" placeholder="Enter your subject" required>
                                        </div>
                                        <div class="contact-message">
                                            <p>Message:</p>
                                            <textarea placeholder=" " required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="contaact-message-btn">
                                                <button @click="sendMessage">
                                                    <span v-show="!showPleaseWait">Send message</span>
                                                    <span v-show="showPleaseWait" class="please-wait-message">Please wait. . .</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="mess">
                                    <h1>{{ contact }}</h1>
                                    <p v-html="contactText"></p>
                                </div>
                                <div class="row">
                                    <div class="col-2 col-md-2 col-lg-2 col-xl-1">
                                        <div class="contact-icon">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <i class="fa fa-street-view" aria-hidden="true"></i>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-10 col-md-10 col-lg-10 col-xl-11">
                                        <div class="mydescription">
                                            <h6>{{ contactNameheading }}</h6>
                                            <p>{{ contactName }}</p>
                                        </div>
                                        <div class="mydescription">
                                            <h6>{{ location }}</h6>
                                            <p>{{ locationdescription }}</p>
                                        </div>
                                        <div class="mydescription">
                                            <h6>{{call}}</h6>
                                            <a href="#"><p>{{ callnum }}</p></a>
                                        </div>
                                        <div class="mydescription">
                                            <h6>{{ contactemail }}</h6>
                                            <a href="#"><p>{{ emailName }}</p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<!-----=====|| {( END:- CONTACT )} ||=====----->

<!-----=====|| {( START:- CONTACT JAVASCRIPT )} ||=====----->
<script>
export default {
    name: 'Contact',
    data(){
        return {
            subtitle: 'Feel free to contact me anytimes',
            title: 'Get in Touch',
            msg: 'Message Me',
            contact: 'Contact Info',
            inputName: ' ',
            inputEmail: ' ',
            inputSubject: ' ',
            inputPhone: ' ',
            showPleaseWait: false,
            contactText: "I'm open to engaging in freelance opportunities for the right projects. Please don't hesitate to reach out if you have something in mind!",
            contactName: 'Sujit das',
            contactNameheading: 'Name',
            location: 'My Location',
            locationdescription: '4155 jeshore Road, Phultala, Khulna, Bangladesh.',
            call : 'Call Now',
            callnum: '+88 013255-65983',
            contactemail: 'E-mail',
            emailName: 'example@gamil.com'
        }
    },
    methods: {
        sendMessage() {
        this.showPleaseWait = true;

        setTimeout(() => {
            this.showPleaseWait = false;
                console.log('Sent message');
            }, 1000);
        }
    }
}
</script>
<!-----=====|| {( END:- CONTACT JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- CONTACT STYLE )} ||=====----->
<style scoped>
    .contact-background { width: 100%; height: 100vh; background-color: #000; }
    .mess { margin-top: 50px; }
    .mess h1 { font-size: 26px; color: #fff; margin-bottom: 0px; }
    .contact-name { margin-top: 15px; }
    .contact-name p { font-size: 16px; margin-bottom: 0px; color: #868686; }
    .contact-name input { width: 100%; height: 35px; color: #868686; margin-top: 10px; padding-left: 7px; background-color: #161616; border: 1px solid #161616; }
    .contact-name input:focus { outline: none; }
    .contact-message { margin-top: 15px; }
    .contact-message p { font-size: 16px; margin-bottom: 0px; color: #868686; }
    .contact-message textarea { width: 100%; height: 150px; color: #868686; margin-top: 10px; text-align: justify; padding-left: 7px; background-color: #161616; border: 1px solid #161616; }
    .contact-message textarea:focus { outline: none; }
    .contaact-message-btn { margin-top: 30px; }
    .contaact-message-btn button { padding: 6px 25px; border: 1px solid #55e6a5; background-color: #55e6a5; border-radius: 7px; }
    .please-wait-message { margin-left: 4px; font-style: italic; color: #999; }
    .mess p { margin-top: 15px; color: #868686; text-align: justify; margin-bottom: 30px; }
    .contact-icon { border-right: 1px solid #868686; }
    .contact-icon i { width: 100%; font-size: 18px; color: #55e6a5; margin-top: 89px; }
    .contact-icon i:first-child { margin-top: 0px; }
    .mydescription:first-child { margin-top: 0px; }
    .mydescription { margin-top: 48px; }
    .mydescription h6 { font-size: 16px; color: #fff; margin-bottom: 0px; }
    .mydescription p { color: #868686; margin-top: 10px; }
    .mydescription a { text-decoration: none; }
</style>
<!-----=====|| {( END:- CONTACT STYLE )} ||=====----->