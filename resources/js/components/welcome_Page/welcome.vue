<template>
    <div>
        <middleComponent />
        <footerComponent />
    </div>

</template>

<script>
// import components
import middleComponent from './component_welcome/MiddleComponent.vue'
import footerComponent from './component_welcome/FooterComponent.vue'

export default {

  components: {
    middleComponent,
    footerComponent,
  },
}
</script>

<style>

</style>
