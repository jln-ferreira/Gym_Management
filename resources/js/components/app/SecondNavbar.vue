<template>
    <nav class="second-nav row navbar-collapse" id="sidebar">
        <div class="shadow-sm col-sm-2">
            <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-home" aria-hidden="true"></i> Main Page</a>
        </div>
        <div class="shadow-sm col-sm-2">
            <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-graduation-cap" aria-hidden="true"></i> My Student</a>
        </div>
        <div class="shadow-sm col-sm-2">
            <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-cash" aria-hidden="true"></i> Finance</a>
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
    .col-xl-12,
    .col-xl-11,
    .col-xl-10,
    .col-xl-9,
    .col-xl-8,
    .col-xl-7,
    .col-xl-6,
    .col-xl-5,
    .col-xl-4,
    .col-xl-3,
    .col-xl-2,
    .col-xl-1,
    .col-lg-12,
    .col-lg-11,
    .col-lg-10,
    .col-lg-9,
    .col-lg-8,
    .col-lg-7,
    .col-lg-6,
    .col-lg-5,
    .col-lg-4,
    .col-lg-3,
    .col-lg-2,
    .col-lg-1,
    .col-md-12,
    .col-md-11,
    .col-md-10,
    .col-md-9,
    .col-md-8,
    .col-md-7,
    .col-md-6,
    .col-md-5,
    .col-md-4,
    .col-md-3,
    .col-md-2,
    .col-md-1,
    .col-sm-12,
    .col-sm-11,
    .col-sm-10,
    .col-sm-9,
    .col-sm-8,
    .col-sm-7,
    .col-sm-6,
    .col-sm-5,
    .col-sm-4,
    .col-sm-3,
    .col-sm-2,
    .col-sm-1,
    .col-12,
    .col-11,
    .col-10,
    .col-9,
    .col-8,
    .col-7,
    .col-6,
    .col-5,
    .col-4,
    .col-3,
    .col-2,
    .col-1 {
        padding-right: 0px !important;
        padding-left: 0px !important;
    }

/* [SECOND NAVBAR] */
    .second-nav{
        place-content: center;
    }
    @media only screen and (max-width: 767px) {
        .second-nav{
            display:none;
        }
    }
    @media only screen and (min-width: 767px) {
        .second-nav{
            display:flex;
        }
    }

</style>
