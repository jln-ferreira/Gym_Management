<template>
    <section class="container">

        <!-- [HEADER] -->
        <div class="pt-4 pb-2">
            <h1 class="header-pages font-weight-bold"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Profile</h1>
        </div>
        <!-- end HEADER -->
        <hr/>

        <personal :student='student' :beltList='beltList'/>

        <responsable />

        <evolutionBelt :beltList='beltList'/>

        <paymment :student='student' :itens='itens'/>

        <!-- footer for profile (Back | Delete) -->
        <hr/>
        <div class="text-right">
            <a @click="gobackStudent()" class="btn-lg btn-warning" style="cursor:pointer"><i class="fas fa-arrow-left"></i> <b>Back</b></a>
            <a @click="deleteStudent()" class="btn-lg btn-danger text-white" style="cursor:pointer"><i class="far fa-trash-alt"></i> Delete</a>
        </div>

    </section>
</template>

<script>
// imports
import personal from './components/personal.vue'
import responsable from './components/responsable.vue'
import evolutionBelt from './components/evolutionBelt.vue'
import paymment from './components/paymment.vue'

export default {
    // auth User
    props: ['app'],

    components: {
        personal,
        responsable,
        evolutionBelt,
        paymment,
    },
    data(){
        return{
            user_id: this.$userId,

            student: Object, //Student selected
            beltList: Array, //all belts
            itens: Array, //all belts
        }
    },
    methods:{
        gobackStudent(){
            this.$router.push('/students')
        },
        deleteStudent(student){//-----[DELETE]------
            axios.post('/api/student/' + this.$route.params.id, {
                _method: 'DELETE'
            })
            .then(response => {
                this.$router.push('/students')
                alert(response.data)
            })
            .catch(error => console.log(error.response.data))
        },
    },
    created(){
        // Fetch [student] to show his profile from DB
        axios.get('/api/student/' + this.$route.params.id)
        .then(response => this.student = response.data)
        .catch(error => console.log(error))

        // Fetch all [Belts] from DB of a gym
        axios.get('/belt') //WEB ROUTER
        .then(response => this.beltList = response.data)
        .catch(error => console.log(error))

        // Fetch [paymment] for especific student
        axios.get('/api/item')
        .then(response => this.itens = response.data)
        .catch(error => console.log(error))

    }
}
</script>

<style>

</style>
