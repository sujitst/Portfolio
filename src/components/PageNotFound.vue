<!-----=====|| {( START:- PAGE NOT FOUND )} ||=====----->
<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 p-0">
                <div class="flex-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="text-center">
                                    <h1>
                                        <span class="fade-in" id="digit1">4</span>
                                        <span class="fade-in" id="digit2">0</span>
                                        <span class="fade-in" id="digit3">4</span>
                                    </h1>
                                    <h3 class="fadeIn">{{ found }}</h3>
                                    <button type="button" name="button" @click="returnHome">{{ returnbtn }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<!-----=====|| {( END:- PAGE NOT FOUND )} ||=====----->

<!-----=====|| {( START:- PAGE NOT FOUND JAVASCRIPT )} ||=====----->
<script>
    export default {
        data(){
            return{
                found: 'PAGE NOT FOUND',
                returnbtn: 'Return To Home'
            }
        },
        methods: {
            returnHome(){
                this.$router.push('/')
            }
        }
    }
</script>
<!-----=====|| {( END:- PAGE NOT FOUND JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- PAGE NOT FOUND STYLE )} ||=====----->
<style scoped>
    .flex-container { display: flex; justify-content: center; align-items: center; height: 100vh; color: white; animation: colorSlide 15s cubic-bezier(0.075, 0.82, 0.165, 1) infinite; }
    .flex-container .text-center { text-align: center; }
    .flex-container .text-center h1, .flex-container .text-center h3 { margin: 10px; cursor: default; }
    .flex-container .text-center h1 .fade-in { animation: fadeIn 2s ease infinite; }
    .flex-container .text-center h1 { font-size: 8em; transition: font-size 200ms ease-in-out; border-bottom: 1px dashed white; }
    .flex-container .text-center h1 span#digit1 { animation-delay: 200ms; }
    .flex-container .text-center h1 span#digit2 { animation-delay: 300ms; }
    .flex-container .text-center h1 span#digit3 { animation-delay: 400ms; }
    .flex-container .text-center button { border: 1px solid white; background: transparent; outline: none; transition: all 900ms; padding: 10px 20px; font-size: 1.1rem; font-weight: bold; color: white; text-transform: uppercase; transition: background-color 200ms ease-in; margin: 20px 0; }
    .flex-container .text-center button:hover { background-color: white; color: #555; cursor: pointer; }

    @keyframes colorSlide { 0% { background-color: #152a68; } 25% { background-color: #000; } 50% { background-color: #2E8B57; } 75% { background-color: #FF6347; } 100% { background-color: #152a68; } }

    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
</style>
<!-----=====|| {( START:- PAGE NOT FOUND STYLE )} ||=====----->