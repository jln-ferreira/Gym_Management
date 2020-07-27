<template>
    <div>
        <!-- [HEADER] -->
        <div class="pt-4 pb-2">
            <h1 class="header-pages font-weight-bold">Students</h1>
        </div>
        <!-- end HEADER -->
        <newStudent></newStudent>
    </div>
</template>

<script>
// import components
import newStudent from './components/newStudent.vue'

export default {
    components: {
        newStudent
    },
}
</script>

<style>


</style>
