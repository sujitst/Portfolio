<!-----=====|| {( START:- OFFICE )} ||=====----->
<template>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
            <div class="office">
                <h2>{{ heading }}</h2>
                <p v-html="text"></p>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
            <div class="metting">
                <img :src="img1" alt="">
            </div>
        </div>
    </div>
</template>
<!-----=====|| {( END:- OFFICE )} ||=====----->

<!-----=====|| {( START:- OFFICE JAVASCRIPT )} ||=====----->
<script>
    export default{
        name: 'Office',
        data(){
            return{
                heading: 'Take a tour of my office',
                text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium qui distinctio nemo! Odio velit,<br><br> nemo dolorem voluptas Lorem ipsum dolor sit amet Quia cum quasi assumenda culpa praesentium consectetur voluptatibus expedita. Voluptatem tempore, aspernatur rem facilis, distinctio nemo! Odio velit, nemo dolorem voluptas!<br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium qui aspernatur unde mollitia, in laborum.',
                img1: 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            }
        },
    }
</script>
<!-----=====|| {( END:- OFFICE JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- OFFICE STYLE )} ||=====----->
<style>
    .office { margin-top: 50px; } 

    .office h2 { font-size: 22px; color: #fff; margin-bottom: 0px; }

    .office p { font-size: 16px; color: #868686; margin-top: 30px; text-align: justify; margin-bottom: 0px; }

    .metting { position: relative; margin-top: 50px; }

    .metting img { width: 100%; height: 270px; }
</style>
<!-----=====|| {( END:- OFFICE STYLE )} ||=====----->