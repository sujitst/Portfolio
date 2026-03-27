<!-----=====|| {( START:- NAVEBAR )} ||=====----->
<template>
    <div class="container">
        <div class="all-navs">
            <div class="row">
                <div class="col-6 col-md-6 col-lg-2 col-xl-2">
                    <div class="logo">
                      <img src="@/assets/logo.png" alt="Logo">
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-10 col-xl-10">
                    <div class="menubar">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><router-link class="nav-link active" aria-current="page" to="/">{{ home }}</router-link></li>
                                    <li class="nav-item"><router-link class="nav-link" to="/About">{{ about }}</router-link></li>
                                    <li class="nav-item"><router-link class="nav-link" to="/Resume">{{ resume }}</router-link></li>
                                    <li class="nav-item"><router-link class="nav-link" to="/Portfolio">{{ portfolio }}</router-link></li>
                                    <li class="nav-item"><router-link class="nav-link" to="/Blog">{{ blog }}</router-link></li>
                                    <li class="nav-item"><router-link class="nav-link" to="/Contact">{{ contact }}</router-link></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <router-view></router-view>    
</template>
<!-----=====|| {( END:- NAVEBAR )} ||=====----->

<!-----=====|| {( START:- NAVEBAR JAVASCRIPT )} ||=====----->
<script>
  export default {
      name: 'Home',
      data() {
          return {
              home: "Home",
              about: "About",
              resume: "Resume",
              portfolio: "Portfolio",
              blog: "Blog",
              contact: "Contact"
          }
      },
      methods: {
          isLinkActive(route) {
              return this.$route.path === route;
            }
        }
    }
</script>
<!-----=====|| {( END:- NAVEBAR JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- NAVEBAR STYLE )} ||=====----->
<style>
    .all-navs {
      position: absolute;
    }
    .logo img {
      width: 40px;
      height: 30px;
      margin-top: 15px;
    }
    .menubar {
      margin-left: 630px;
    }
    .nav-link {
      margin-left: 15px;
    }
    .active {
      color: #55e6a5;
    }
    .navbar-light .navbar-nav .nav-link {
      color: #fff !important;
    }
    .navbar-light .navbar-nav .nav-link:hover {
      color: #55e6a5 !important;
    }
    .navbar-light .navbar-nav .nav-link {
      color: #fff;
    }
</style>
<!-----=====|| {( END:- NAVEBAR STYLE )} ||=====----->
