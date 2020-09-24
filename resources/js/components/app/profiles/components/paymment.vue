<template>
    <div>
        <!-- [button toggle] -->
        <div class="card-header text-white text-left" @click="togglePaymment()">
            <i class="fa fa-credit-card" aria-hidden="true"></i> Payment <i :class="[faChanging(), 'float-right']" aria-hidden="true"></i>
        </div>
        <!-- [end button] -->

        <div class="bg-white shadow-sm rounded p-2 mb-4" v-show="this.visiblePaymment">
         <table class="table compact table-hover text-center">
            <thead class="thead-belt shadow-sm">
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Un Value</th>
                    <th>Final Value</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <td colspan="5" v-if="this.paymments == ''">There is no Paymment</td>
                <tr v-for='paymment in paymments' v-bind:key="paymment.id">
                    <td>{{ itens[paymment.item_id - 1].name }}</td>
                    <td>{{ paymment.quantity }}</td>
                    <td>{{ itens[paymment.item_id - 1].value }}</td>
                    <td>{{ paymment.final_value }}</td>
                    <td>{{ paymment.date_paymment }}</td>
                </tr>
            </tbody>
        </table>
      </div>

    </div>
</template>

<script>
export default {
    props:{
        student: "", //Student selected
        itens  : "",
    },
    data(){
        return{
            paymments: Array,

            visiblePaymment: true,
        }
    },
    methods:{
        togglePaymment(){
            return this.visiblePaymment = !this.visiblePaymment
        },
        faChanging(){
            return (this.visiblePaymment == true) ? "fa fa-minus" : "fa fa-plus"
        }
    },
    created(){
        // Fetch all finance of especial student
        axios.get('/api/student/' + this.$route.params.id + '/paymment')
        .then(response => this.paymments = response.data)
        .catch(error => alert(error))
    },
}
</script>

<style scoped>
/* header of loggles */
.card-header{
    background: rgb(110,0,107);
    background: linear-gradient(90deg, rgba(110,0,107,1) 0%, rgba(110,0,107,1) 67%, rgba(0,0,0,1) 69%, rgba(0,0,0,1) 88%, rgba(110,0,107,1) 91%);
}

/* thead of table */
.thead-belt{
    background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
}

</style>
