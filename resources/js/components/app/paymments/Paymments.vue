<template>
  <div>
        <!-- [HEADER] -->
        <div class="pt-4 pb-2">
            <h1 class="header-pages font-weight-bold">Paymments</h1>
        </div>

        <newPaymment/>
        <allPaymments/>


    </div>
</template>

<script>
// import components
import newPaymment from './components/newPaymment.vue'
import allPaymments from './components/allPaymments.vue'

export default {
    components: {
        newPaymment,
        allPaymments
    },
}
</script>

<style>

</style>
