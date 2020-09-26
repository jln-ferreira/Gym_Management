<template>
  <div>
        <!-- [HEADER] -->
        <div class="pt-4 pb-2">
            <h1 class="header-pages font-weight-bold"><i class="fa fa-coins" aria-hidden="true"></i> Costs</h1>
        </div>

        <allCosts />

    </div>
</template>

<script>
// import components
import allCosts from './components/allCosts.vue'

export default {
    components: {
        allCosts
    },
}
</script>

<style>

</style>
