<!-----=====|| {( START:- CHOOSE A PLAN )} ||=====----->
<template>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="plan">
                <p>{{ name }}</p>
                <h3>{{ mainText }}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div
            class="col-12 col-md-6 col-lg-3 col-xl-3"
            v-for="coloum in 4" 
            :key="coloum"
            >
            <div class="planCard">
                <img :src="images" alt="img">
                <h5>Standard</h5>
                <p>{{ subscriptionDetails.price }}<br/><span v-for="(service, index) in subscriptionDetails.services" :key="index">{{ service }}<br/></span></p>
                <button>Get Standard</button>
            </div>
        </div>
    </div>
</template>
<!-----=====|| {( END:- CHOOSE A PLAN )} ||=====----->

<!-----=====|| {( START:- CHOOSE A PLAN JAVASCRIPT )} ||=====----->
<script>
export default {
    name: "Plan",
    data() {
        return {
            name: 'Get started with my services',
            mainText: 'Choose a Plan',
            images: require("@/assets/png/creative.png"),
            subscriptionDetails: {
            price: '$19/month',
            services: [
                'Mobile App Design',
                'Responsive Design',
                'Database Development',
                'Web Design',
                '24/7 Support'
                ]
            }
        };
    }
};
</script>
<!-----=====|| {( END:- CHOOSE A PLAN JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- CHOOSE A PLAN STYLE )} ||=====----->
<style>
    .plan { margin-top: 120px; }

    .plan p { color: #868686; margin-bottom: 0px; }

    .plan h3 { color: #fff; font-size: 36px; font-weight: 700; text-transform: uppercase; line-height: 1.2; word-break: normal; margin-top: 15px; margin-bottom: 15px; }

    .planCard { background-color: #161616; padding: 30px; margin-top: 30px; text-align: center; transition: all 900ms; }

    .planCard:hover { transform: translateY(-15px); }

    .planCard img { width: 50px; display: table; margin: auto; }

    .planCard h5 { font-size: 18px; color: #fff; margin-top: 15px; margin-bottom: 0px; }

    .planCard p { color: #868686; font-size: 16px; margin-bottom: 0px; margin-top: 10px; line-height: 1.8; }

    .planCard button { padding: 7px 20px; margin-top: 15px; background-color: #55e6a5; color: #fff; border: 1px solid #55e6a5; border-radius: 5px; cursor: pointer; transition: all 900ms; }

    .planCard button:hover { color: #000; background-color: #fff; border: 1px solid #55e6a5; }
</style>
<!-----=====|| {( END:- CHOOSE A PLAN STYLE )} ||=====----->