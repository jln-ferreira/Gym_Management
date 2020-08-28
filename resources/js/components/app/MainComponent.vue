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
    }
}
</script>

<style>
/* import datatable  */
@import url('//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css');

    /* Fix Container - css */
    .container-fluid {
        padding-right: 0px !important;
        padding-left: 0px !important;
    }
    .col-sm-2{
        padding-right: 0px !important;
        padding-left: 0px !important;
    }
    .row{
        margin-right: 0px !important;
        margin-left: 0px !important;
    }

    /* header of all pages - DASHBOARD STUDENTS FINANCES COSTS */
    .header-pages{
        text-align: center;
    }

</style>
