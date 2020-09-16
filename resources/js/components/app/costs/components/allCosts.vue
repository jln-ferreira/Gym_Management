<template>
    <section class="container">
    <hr>
        <!-- [button toggle] -->
        <div class="btn btn-primary" @click="toggleNewCost()">
            <i class="fa fa-coins" aria-hidden="true"></i> New Cost <i :class="faChanging()" aria-hidden="true"></i>
        </div>
        <!-- [end button] -->

        <!-- [card new student] -->
        <div class="mt-1 shadow-sm p-4 mb-4 bg-white" v-show="visibleNewCost">
            <form method="post" @submit.prevent="cost_saveEdit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="item">Item</label>
                        <select id="item" class="form-control" v-model="FormCost.item" @change="onChangeItem($event)" required>
                             <option v-for='item in allItems' v-text='item.name' v-bind:key="item.id" :value="item.id"></option>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" v-model="FormCost.quantity" min="1" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="value">Value</label>
                        <input type="number" class="form-control" id="value" v-model="FormCost.value" min="1" required>
                        <div class="text-center" v-show="this.value_exp_show">
                            <small><b>Expected value: </b></small><small class="badge badge-primary" @click="use_value_exp(value_exp)">{{ value_exp }}</small>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="databirth">Date</label>
                        <input type="date" class="form-control" id="date_paymment" v-model="FormCost.date_paymment" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" id="comments" rows="3" v-model="FormCost.comment"></textarea>
                </div>
                <button type="submit" class="btn btn-success" v-show="this.postVsEditButton"><i class="fa fa-plus"></i> Add Payment</button>
                <button type="submit" class="btn btn-info text-white" v-show="!this.postVsEditButton"><i class="fa fa-edit"></i> Edit Payment</button>
                <a class="btn btn-warning" v-show="!this.postVsEditButton"  @click="BacktoSave()"><i class="fa fa-times"></i> Cancel</a>
                <a class="btn btn-danger text-white" v-show="!this.postVsEditButton" @click="deleteCost(FormCost.id)"><i class="far fa-trash-alt"></i> Delete</a>
            </form>
        </div>
        <!-- end CAND NEW STUDENT -->

        <!-- [TABLE ALL STUDENTS] -->
         <div class="bg-white shadow-sm rounded p-2">
            <table id="table_cost" class="table table-striped compact">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Value</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(cost, index) in this.costList" v-bind:key="cost.id">
                        <td>{{ cost.id }}</td>
                        <td>{{ cost.item.name }}</td>
                        <td>{{ cost.quantity }}</td>
                        <td>{{ cost.final_value }}</td>
                        <td>{{ cost.date_paymment }}</td>
                        <td>
                            <a @click="editCost(index)" style="cursor:pointer"><i class="fas fa-wrench fa-lg text-success" title="Edit"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- end table all students -->
    </section>
</template>

<script>
export default {
    data(){
        return{
            costList: Array, //all costs
            allItems: [], //Item DB

            Item_value: "", //value of the item selected

            //toggle
            visibleNewCost: false, //toggle new cost
            postVsEditButton: true, //button change if is a new item or i want to edit an item
            value_exp_show: false, //toggle value_expected (small red)

            // ---[POST]---
            FormCost: {
                id: 1,
                date_paymment: "",
                item: "",
                quantity: "",
                value: 0,
                comment: ""
            },
        }
    },
    methods:{
        // ------[NEW COST]------
        toggleNewCost(){
            return this.visibleNewCost = !this.visibleNewCost
        },
        faChanging(){
            return (this.visibleNewCost == true) ? "fa fa-minus" : "fa fa-plus"
        },
        onChangeItem(event){  //if item change, it save the value at ITEM_VALUE (change computed)
            this.Item_value = this.allItems[event.target.value - 1].value
            this.value_exp_show = true
        },
        use_value_exp(value){ //use value expected as a VALUE
            this.FormCost.value = value
            this.value_exp_show = false
        },
        resetForm(){ //reset all inputs
            this.FormCost.id            = ""
            this.FormCost.date_paymment = ""
            this.FormCost.item          = ""
            this.FormCost.quantity      = ""
            this.FormCost.value         = 0
            this.FormCost.comment       = ""
        },
        BacktoSave(){ //cancel button (yellow one)
            this.visibleNewCost = false //open cost edit
            this.postVsEditButton = true //change buttons
            this.resetForm()
        },
        deleteCostVue(obj){ //delete clicked cost
            var count = 0
            this.costList.forEach(element => {
                (element.id == obj) ? this.costList.splice(count,1) : count =+1
            });
        },
        cost_saveEdit(){ //----------[POST]---------
            if(this.postVsEditButton){ //[POST]
                axios.post('/api/cost', this.FormCost)
                .then(response => {
                    alert(response.data)
                    this.resetForm()
                    this.BacktoSave()
                })
            }else{ //[EDIT]
                //----------[PUT PATCH - EDIT]----------
                axios.post('/api/cost/' + this.FormCost.id, {
                modifyCost: this.FormCost,
                _method: 'patch'
                })
                .then(response => {
                    alert(response.data)
                    this.resetForm()
                    this.BacktoSave()
                })
                .catch(error => alert(error.response.data))
            }
        },
        deleteCost(cost_id){ //------[DELETE]-------
            axios.post('/api/cost/' + cost_id, {
                _method: 'DELETE'
            })
            .then(response => {
                alert(response.data.message)
                this.resetForm()
                this.BacktoSave()
                this.deleteCostVue(response.data.cost_id)
            })
            .catch(error => console.log(error.response.data))
        },
        //---------------------------

        // ------[ALL COST]------
        editCost(index){
            this.visibleNewCost = true //open cost edit
            this.postVsEditButton = false //change buttons

            //use the index if cost clicked and find where is inside the thia.costList
            this.FormCost.id            = this.costList[index].id
            this.FormCost.date_paymment = this.costList[index].date_paymment
            this.FormCost.item          = this.costList[index].item.id
            this.FormCost.quantity      = this.costList[index].quantity
            this.FormCost.value         = this.costList[index].final_value
            this.FormCost.comment       = this.costList[index].comment
        },
        //--------------------------

    },
    computed:{
        // value expected - (Value item X quantity)
        value_exp(){
            this.value_exp_show = true
            return this.Item_value * this.FormCost.quantity
        }
    },
    created(){
        // Fetch all [Cost] from DB
        axios.get('/api/cost')
        .then(response => {
            this.costList = response.data
            setTimeout(() => $('#table_cost').DataTable(), 1000);
        })
        .catch(error => console.log(error))

        // Fetch [Item] to show his profile from DB
        axios.get('/api/item')
        .then(response => {
            response.data.forEach(element => { //push all itens are for selling (income)
                if (element.identifier == 'c') this.allItems.push(element)
            })
        })
        .catch(error => console.log(error))
    }
}
</script>

<style>

</style>
