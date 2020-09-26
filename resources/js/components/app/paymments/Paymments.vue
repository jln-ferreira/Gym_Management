<template>
  <div>
        <!-- [HEADER] -->
        <div class="pt-4 pb-2">
            <h1 class="header-pages font-weight-bold"><i class="fa fa-credit-card" aria-hidden="true"></i> Paymments</h1>
        </div>

        <allPaymments />

    </div>
</template>

<script>
// import components
import allPaymments from './components/allPaymments.vue'

export default {
    components: {
        allPaymments
    },
}
</script>

<style>

</style>
