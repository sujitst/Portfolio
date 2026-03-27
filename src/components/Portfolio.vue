<!-----=====|| {( START:- PORTFOLIO )} ||=====----->
<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 p-0">
                <div class="portfolio-background">
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
                            <div class="col-12 col-md-12 col-lg-4 col-xl-4" v-for="(item, index) in items" :key="index">
                                <div class="item">
                                    <img :src="item.images" :alt="'Image ' + index">
                                    <div class="overlay-text">
                                        <h1>Label Tag Mockup {{ index + 1 }}</h1>
                                        <button @click="openModal(index)">More Info</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="showModal" class="simulation">
            <img :src="images" alt="images">
            <button @click="closeModal"><i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
    </div>
</template>
<!-----=====|| {( END:- PORTFOLIO )} ||=====----->

<!-----=====|| {( START:- PORTFOLIO JAVASCRIPT )} ||=====----->
<script>
    export default {
        name: 'Portfolio',
        data(){
            return{
                subtitle: 'Showcasing some of my best work',
                title: 'Portfolio',
                images: require('@/assets/img/item-1.jpg'),
                showModal: false,
                popupText: '',
                items: [
                    { images: require('@/assets/img/item-1.jpg') },
                    { images: require('@/assets/img/item-2.jpg') },
                    { images: require('@/assets/img/item-3.jpg') },
                    { images: require('@/assets/img/item-4.jpg') },
                    { images: require('@/assets/img/item-5.jpg') },
                    { images: require('@/assets/img/item-6.jpg') }
                ]
            }
        },
        methods: {
            openModal() {
                this.showModal = true; 
            },
            closeModal() {
                this.showModal = false; 
            }
        }
    }
</script>
<!-----=====|| {( END:- PORTFOLIO JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- PORTFOLIO STYLE )} ||=====----->
<style>
    .portfolio-background { width: 100%; height: 1150px; background-color: #000; }

    .item { position: relative; }

    .item:first-child { margin-top: 30px; }

    .item img { width: 100%; height: 400px; }

    .item::before { position: absolute; content: " "; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0); transition: all 900ms; }

    .item:hover::before { background-color: rgba(0, 0, 0, 0.9); }

    .overlay-text { position: absolute; top: 50%; left: 50%; color: #fff; transform: translate(-50%, -50%); opacity: 0; transition: all 900ms; z-index: 1; }

    .overlay-text h1 { font-size: 16px; color: #55e6a5; margin-bottom: 15px; }

    .overlay-text button { display: table; margin: auto; color: #000; border: none; background-color: #fff; padding: 5px 20px; border-radius: 5px; transition: all 900ms; }

    .overlay-text button:hover { background-color: #55e6a5; }
    
    .item:hover .overlay-text { opacity: 2; }

    .simulation { position: absolute; width: 100%; height: 1150px; top: 0px; left: 0px; background-color: #000; z-index: 9; }

    .simulation img { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 500px; }

    .simulation button { position: absolute; right: 15px; top: 15px; color: #fff; font-size: 18px; background-color: #000; border: none; }
</style>
<!-----=====|| {( END:- PORTFOLIO STYLE )} ||=====----->