<template>
  <div>
        <!-- [HEADER] -->
        <div class="pt-4 pb-2">
            <h1 class="header-pages font-weight-bold">Paymments</h1>
        </div>

        <newPaymment :allStudents='allStudents' :allItems='allItems'/>
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
    data(){
        return{
            allStudents: Array, //Student All
            allPaymments: Array, //Paymment all
            allItems: Array, //Paymment all
        }
    },
    created(){
        // Fetch [student] to show his profile from DB
        axios.get('/api/student')
        .then(response => this.allStudents = response.data)
        .catch(error => console.log(error))

        // Fetch [paymment] to show his profile from DB
        axios.get('/api/paymment')
        .then(response => this.allPaymments = response.data)
        .catch(error => console.log(error))

        // Fetch [Item] to show his profile from DB
        axios.get('/api/item')
        .then(response => this.allItems = response.data)
        .catch(error => console.log(error))
    }

}
</script>

<style>

</style>
