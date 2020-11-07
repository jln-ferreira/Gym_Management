<template>
  <div id="app">
    <!------------ NAVBAR ----------->
    <nav id="navbar" class="navbar navbar-expand-sm navbar-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="image/logo.png" alt="logo" width="120"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Upcoming Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <body style="padding-top: 70px;">
    <!------------ END NAVBAR --------->
    <!------------ carousel  ---------->
    <carousel/>
    <!------------ END carousel  ------>
    <!------------ upcomingEvents  ---->
    <upcomingEvents/>
    <!------------ END upcomingEvents -->
    <!------------ CONTACT  ---------->
    <contact id="contact"/>
    <!------------ END CONTACT  ------>
    <!------------ FOOTER  ---------->
    <ankle/>
    <!------------ END FOOTER  ------>
    </body>



  </div>
</template>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
import carousel from './components/carousel.vue'
import upcomingEvents from './components/upcomingEvents.vue'
import contact from './components/contact.vue'
import ankle from './components/ankle.vue'

export default {
  name: 'App',
  components: {
    carousel,
    upcomingEvents,
    contact,
    ankle
  },
  mounted(){

  }
}

</script>

<style scoped>
  #navbar{
    /* background: rgb(0,117,218);
    background: linear-gradient(90deg, rgba(0,117,218,1) 0%, rgba(0,96,180,1) 32%, rgba(0,69,129,1) 75%, rgba(0,31,57,1) 99%); */
    background: rgb(255,200,200);
    background: linear-gradient(90deg, rgba(255,200,200,1) 0%, rgba(255,73,73,1) 26%, rgba(129,0,0,1) 69%, rgba(57,0,0,1) 99%);
  }

  .navbar-toggler {
    border: none;
    background: transparent !important;
  }

  .navbar-toggler:focus {
    outline: none;
    background: transparent !important;
  }

  .navbar-toggler .icon-bar {
    background-color: #fff;
    transform: rotate(0deg) translate(0px, 0px);
    transition: ease all .2s;
  }

  .navbar-toggler .icon-bar {
    display: block;
    width: 22px;
    height: 2px;
    border-radius: 1px;
  }

  .navbar-toggler .icon-bar+.icon-bar {
    margin-top: 4px;
  }

  .icon-bar:nth-child(2) {
    width: 16px;
    transition: ease all .2s;
  }

  .navbar-toggler:hover>.icon-bar:nth-child(2) {
    width: 22px;
    transition: ease all .2s;
  }

  .navbar-toggler:active>.icon-bar:nth-child(2) {
    width: 22px;
    transition: ease all .2s;
  }

  .navbar-toggler:not(.collapsed) .icon-bar:nth-child(1) {
    transform: rotate(45deg) translate(5px, 4px);
    transition: ease all .2s;
  }

  .navbar-toggler:not(.collapsed) .icon-bar:nth-child(2) {
    opacity: 0;
    transition: ease all .2s;
  }

  .navbar-toggler:not(.collapsed) .icon-bar:nth-child(3) {
    transform: rotate(-45deg) translate(4px, -4px);
    transition: ease all .2s;
  }



</style>
