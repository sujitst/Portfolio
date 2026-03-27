<!-----=====|| {( START:- CART )} ||=====----->
<template>
    <div class="cart">
        <img :src="images" alt="Image" />
        <h1>{{ name }}</h1>
        <p>{{ text }}</p>
    </div>
</template>
<!-----=====|| {( END:- CART )} ||=====----->

<!-----=====|| {( START:- CART )} ||=====----->
<script>
export default {
  name: "Cart",
  props: {
    name: String,
    images: String,
    text: String
  }
}
</script>
<!-----=====|| {( END:- CART )} ||=====----->

<!-----=====|| {( START:- CART )} ||=====----->
<style>
    .cart { width: 100%; margin-top: 30px; padding: 30px;  border-bottom: 2px solid #161616; background-color: #161616; transition: all 700ms; }

    .cart:hover { border-bottom: 2px solid #55e6a5; }

    .cart img { width: 50px; margin-bottom: 0px; }

    .cart h1 { color: #fff; font-size: 18px; margin-bottom: 0px; margin-top: 15px; }

    .cart p { color: #868686; font-size: 16px; text-align: justify; margin-top: 15px; margin-bottom: 0px; }
</style>
<!-----=====|| {( END:- CART )} ||=====----->