<template>
    <div>
        <!-- [HEADER] -->
        <div class="pt-4 pb-2">
            <h1 class="header-pages font-weight-bold"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Students</h1>
        </div>
        <!-- end HEADER -->
        <newStudent class="mb-2"></newStudent>
        <allStudents></allStudents>
    </div>
</template>

<script>
// import components
import newStudent from './components/newStudent.vue'
import allStudents from './components/allStudents.vue'

export default {
    components: {
        newStudent,
        allStudents
    },
}
</script>

<style>


</style>
