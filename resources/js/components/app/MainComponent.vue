<template>
    <div class="container-fluid">
        <SecondNavbar />

        <!-- ----- [routes of MAIN PAGE] ----- -->
        <router-view></router-view>
    </div>

</template>

<script>
// import components
import SecondNavbar from './SecondNavbar.vue'

export default {

    components: {
        SecondNavbar,
    },
    mounted() {
        console.log('Component mounted.')
    },
    created(){
        axios.get('/api/user')
        .then(response => console.log(response.data))
        // .catch(error => console.log(error));
    }
}
</script>

<style>
    /* Fix Container - css */
    .container-fluid {
        padding-right: 0px !important;
        padding-left: 0px !important;
    }


</style>
