<template>
    <section class="container">
      <div class="bg-white shadow-sm rounded p-2">
         <table id="table_paymment" class="table table-striped compact">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Value</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="paymment in this.paymmentList" v-bind:key="paymment.id">
                    <td>{{ paymment.id }}</td>
                    <td>{{ paymment.student.name }}</td>
                    <td>{{ paymment.item.name }}</td>
                    <td>{{ paymment.quantity }}</td>
                    <td>{{ paymment.final_value }}</td>
                    <td>{{ paymment.date_paymment }}</td>
                    <td>
                        <a @click="gotoProfile(paymment.id)" style="cursor:pointer"><i class="fas fa-wrench fa-lg text-success" title="Edit"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
  </section>
</template>

<script>
export default {
    data(){
        return{
           paymmentList: Array,
        }
    },
    methods:{
        gotoProfile(id){
            // this.$router.push('/students/' + id);
        }
    },
    created(){
        // Fetch all [paymments] from DB
        axios.get('/api/paymment')
        .then(response => {
            this.paymmentList = response.data
            console.log(this.paymmentList)
            setTimeout(() => $('#table_paymment').DataTable(), 1000);
        })
        .catch(error => console.log(error))
    }
}
</script>

<style>

</style>
