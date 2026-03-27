<!-----=====|| {( START:- SCROLLBAR )} ||=====----->
<template>
    <div class="container-fluid" id="top">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <button @click="scrollToTop" :style="buttonStyle" v-show="scrollButtonVisible">
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
</template>
<!-----=====|| {( END:- SCROLLBAR )} ||=====----->

<!-----=====|| {( START:- SCROLLBAR JAVASCRIPT )} ||=====----->
  <script>
  export default {
    data() {
      return {
        scrollButtonVisible: false
      };
    },
    mounted() {
      window.addEventListener('scroll', this.handleScroll);
    },
    computed: {
      buttonStyle() {
        return {
          position: 'fixed',
          bottom: '20px',
          right: '20px',
          fontSize: '26px',
          width: '50px',
          height: '50px',
          color: '#fff',
          backgroundColor: '#000',
          cursor: 'pointer',
          outline: 'none',
          zIndex: '99',
          border: '3px solid #55e6a5',
          borderRadius: '30px',
          transition: 'all 900ms ease-in-out'
        };
      }
    },
    methods: {
      handleScroll() {
        this.scrollButtonVisible = window.pageYOffset > 500;
      },
      scrollToTop() {
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      }
    },
    beforeUnmount() {
      window.removeEventListener('scroll', this.handleScroll);
    }
  };
  </script>
  <!-----=====|| {( END:- SCROLLBAR JAVASCRIPT )} ||=====----->
  
  <!-----=====|| {( START:- SCROLLBAR STYLE )} ||=====----->
  <style scoped>
  .buttonStyle:hover {
    color: #fff;
    background-color: #000;
    border: 3px solid #55e6a5;
  }
  </style>
  <!-----=====|| {( END:- SCROLLBAR STYLE )} ||=====----->