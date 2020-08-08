<template>
    <section class="container">

        <personal :student='student' :beltList='beltList'/>
        <evolutionBelt/>


    </section>
</template>

<script>
// imports
import personal from './components/personal.vue'
import evolutionBelt from './components/evolutionBelt.vue'

export default {
    components: {
        personal,
        evolutionBelt,
    },
    data(){
        return{
            student: Object, //Student selected
            beltList: Array, //all belts
        }
    },
    created(){
        // Fetch student to show his profile from DB
        axios.get('/api/student/' + this.$route.params.id)
        .then(response => this.student = response.data)
        .catch(error => console.log(error))

        // Fetch all [Belts] from DB
        axios.get('/api/belt')
        .then(response => this.beltList = response.data)
        .catch(error => console.log(error))
    }
}
</script>

<style>

</style>
