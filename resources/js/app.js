require('./bootstrap');

import Vue from "vue";


// ------GOES TO BLADE.PHP------
Vue.component('welcome', require('./components/welcome_Page/welcome.vue').default);


const app = new Vue({
    el: '#app',
    components:{
    },
});
