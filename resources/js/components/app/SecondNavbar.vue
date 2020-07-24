<template>
    <nav class="second-nav row navbar-collapse collapse" id="sidebar">
        <div class="shadow-sm col-sm-2">
            <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-home" aria-hidden="true"></i> Main Page</a>
        </div>
        <div class="shadow-sm col-sm-2">
            <router-link to="/students" class="list-group-item list-group-item-action"><i class="fa fa-graduation-cap" aria-hidden="true"></i> My Student</router-link>
        </div>
        <div class="shadow-sm col-sm-2">
            <router-link to="/finances" class="list-group-item list-group-item-action"><i class="fa fa-cash" aria-hidden="true"></i> Finance</router-link>
        </div>
        <div class="shadow-sm col-sm-2">
            <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-coins" aria-hidden="true"></i> Costs</a>
        </div>
    </nav>
</template>

<script>
export default {

}
</script>

<style>

/* FIX app.css */

    .col-sm-2{
        padding-right: 0px !important;
        padding-left: 0px !important;
    }

/* [SECOND NAVBAR] */
    .second-nav{
        place-content: center;
    }
    @media only screen and (max-width: 767px) {
        .collapse:not(.show) {
            display: none;
        }
    }
    @media only screen and (min-width: 767px) {
        .collapse:not(.show) {
            display: flex;
        }
    }

</style>
