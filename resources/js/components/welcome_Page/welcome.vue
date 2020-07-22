<template>
    <div>
        <middleComponent />
        <footerComponent />
    </div>

</template>

<script>
// import components
import middleComponent from './component_welcome/middleComponent.vue'
import footerComponent from './component_welcome/footerComponent.vue'

export default {

  components: {
    middleComponent,
    footerComponent,
  },
}
</script>

<style>

</style>
