<template>
    <nav class="second-nav row navbar-collapse collapse" id="sidebar">
        <div class="shadow-sm col-sm-2">
            <router-link to="/" class="list-group-item list-group-item-action"><i class="fa fa-home" aria-hidden="true"></i> Main Page</router-link>
        </div>
        <div class="shadow-sm col-sm-2">
            <router-link to="/students" class="list-group-item list-group-item-action"><i class="fa fa-graduation-cap" aria-hidden="true"></i> My Students</router-link>
        </div>
        <div class="shadow-sm col-sm-2">
            <router-link to="/paymments" class="list-group-item list-group-item-action"><i class="fa fa-credit-card" aria-hidden="true"></i> Paymments</router-link>
        </div>
        <div class="shadow-sm col-sm-2">
            <router-link to="/costs" class="list-group-item list-group-item-action"><i class="fa fa-coins" aria-hidden="true"></i> Costs</router-link>
        </div>
        <div class="shadow-sm col-sm-2">
            <router-link to="/settings" class="list-group-item list-group-item-action"><i class="fas fa-cog"></i> Settings</router-link>
        </div>
    </nav>
</template>

<script>
export default {

}
</script>

<style>

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
