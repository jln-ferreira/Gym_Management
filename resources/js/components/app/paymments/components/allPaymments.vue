<template>
    <section class="container">
                <hr>
        <!-- [button toggle] -->
        <div class="btn btn-primary" @click="toggleNewPaymment()">
            <i class="fa fa-credit-card" aria-hidden="true"></i> New Paymment <i :class="faChanging()" aria-hidden="true"></i>
        </div>
        <!-- [end button] -->

        <!-- [card new student] -->
        <div class="mt-1 shadow-sm p-4 mb-4 bg-white" v-show="visibleNewPaymment">
            <form method="post" @submit.prevent="addNewPost">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="student">Student</label>
                        <select id="student" class="form-control" v-model="FormPaymment.student" required>
                             <option v-for='student in allStudents' v-text='student.name' v-bind:key="student.id" :value="student.id"></option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="databirth">Date</label>
                        <input type="date" class="form-control" id="date_paymment" v-model="FormPaymment.date_paymment" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="item">Item</label>
                        <select id="item" class="form-control" v-model="FormPaymment.item" required>
                             <option v-for='item in allItems' v-text='item.name' v-bind:key="item.id" :value="item.id"></option>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" v-model="FormPaymment.quantity" min="1" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="fixed_value">Fixed Value</label>
                        <input type="number" class="form-control" id="fixed_value"  :value="FormPaymment.fixed_value" readonly required>
                    </div>
                    <div class="toggleValue form-group col-md-1 pt-2 mb-1">
                        <i :class="['fa-2x', faChangingValue()]" @click="toggleValue()"></i>
                    </div>
                    <div class="form-group col-md-2" v-show="visibleValue">
                        <label for="value">Other Value</label>
                        <input type="number" class="form-control" id="value" v-model="FormPaymment.value">
                    </div>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" id="comments" rows="3" v-model="FormPaymment.comment"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add Paymment</button>
            </form>
        </div>

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
            allStudents: Array, //Student DB
            allItems: Array, //Item DB


            visibleNewPaymment: false, //toggle new paymment
            visibleValue: false,

            // ---[POST]---
            FormPaymment: {
                student: "",
                date_paymment: "",
                item: "",
                quantity: "",
                fixed_value: "",
                value: "",
                comment: ""
            },
        }
    },
    methods:{
        // ------[NEW PAYMMENT]------
        toggleNewPaymment(){
            return this.visibleNewPaymment = !this.visibleNewPaymment
        },
        faChanging(){
            return (this.visibleNewPaymment == true) ? "fa fa-minus" : "fa fa-plus"
        },
        toggleValue(){
            this.FormPaymment.value = 0
            return this.visibleValue = !this.visibleValue
        },
        faChangingValue(){
            return (this.visibleValue == true) ? "fa fa-times text-danger" : "fa fa-edit text-info"
        },
        resetForm(){
            this.FormPaymment.student= ""
            this.FormPaymment.date_paymment= ""
            this.FormPaymment.item= ""
            this.FormPaymment.quantity= ""
            this.FormPaymment.fixed_value= ""
            this.FormPaymment.value= 0
            this.FormPaymment.comment= ""
        },
        addNewPost(){ //--[POST]--
            axios.post('/api/paymment', this.FormPaymment)
            .then(response => {
                alert(response.data)
                this.resetForm()
            })
        },
        //---------------------------

        // ------[ALL PAYMMENT]------
        gotoProfile(id){
            // this.$router.push('/paymments/' + id);
        }
        //--------------------------
    },
    computed:{
        fixedValue(){
            return this.FormPaymment.fixed_value = this.allItems[this.FormPaymment.item-1].value * this.FormPaymment.quantity
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

        // Fetch [student] to show his profile from DB
        axios.get('/api/student')
        .then(response => this.allStudents = response.data)
        .catch(error => console.log(error))

        // Fetch [Item] to show his profile from DB
        axios.get('/api/item')
        .then(response => this.allItems = response.data)
        .catch(error => console.log(error))
    }
}
</script>

<style>
/* button to toggle value fixed or new value */
    .toggleValue{
        align-self: center;
        text-align: center;
        cursor: pointer;
    }
    .toggleValue:hover{
        opacity: 0.7;
        transition:all 0.5s ease;
    }
</style>
