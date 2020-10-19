<template>
    <section class="container">
    <hr>
        <!-- [button toggle] -->
        <div class="btn btn-primary" @click="toggleNewPaymment()">
            <i class="fa fa-credit-card" aria-hidden="true"></i> New Payment <i :class="faChanging()" aria-hidden="true"></i>
        </div>
        <!-- [end button] -->

        <!-- [card new student] -->
        <div class="mt-1 shadow-sm p-4 mb-4 bg-white" v-show="visibleNewPaymment">
            <form method="post" @submit.prevent="payment_saveEdit">
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
                        <select id="item" class="form-control" v-model="FormPaymment.item" @change="onChangeItem($event)" required>
                             <option v-for='item in allItems' v-text='item.name' v-bind:key="item.id" :value="item.id"></option>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" v-model="FormPaymment.quantity" min="1" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="value">Value</label>
                        <input type="number" class="form-control" id="value"  v-model="FormPaymment.value" required>
                        <div class="text-center" v-show="this.value_exp_show">
                            <small><b>Expected value: </b></small><small class="badge badge-primary" @click="use_value_exp(value_exp)">{{ value_exp }}</small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" id="comments" rows="3" v-model="FormPaymment.comment"></textarea>
                </div>
                <button type="submit" class="btn btn-success" v-show="this.postVsEditButton"><i class="fa fa-plus"></i> Add Payment</button>
                <button type="submit" class="btn btn-info text-white" v-show="!this.postVsEditButton"><i class="fa fa-edit"></i> Edit Payment</button>
                <a class="btn btn-warning" v-show="!this.postVsEditButton" @click="BacktoSave()"><i class="fa fa-times"></i> Cancel</a>
                <a class="btn btn-danger text-white" v-show="!this.postVsEditButton" @click="deletePayment(FormPaymment.id)"><i class="far fa-trash-alt"></i> Delete</a>
            </form>
        </div>
        <!-- end CAND NEW STUDENT -->

        <!-- [TABLE ALL STUDENTS] -->
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
                    <tr v-for="(paymment, index) in this.paymmentList" v-bind:key="paymment.id">
                        <td>{{ paymment.id }}</td>
                        <td>{{ paymment.student.name }}</td>
                        <td>{{ paymment.item.name }}</td>
                        <td>{{ paymment.quantity }}</td>
                        <td>{{ paymment.final_value }}</td>
                        <td>{{ paymment.date_paymment }}</td>
                        <td>
                            <a @click="editPaymment(index)" style="cursor:pointer"><i class="fas fa-wrench fa-lg text-success" title="Edit"></i></a>
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
            paymmentList: Array, //all payments
            allStudents: Array, //Student DB
            allItems: [], //Item DB

            Item_value: "", //value of the item selected

            //toggle
            visibleNewPaymment: false, //toggle new paymment
            postVsEditButton: true, //button change if is a new item or i want to edit an item
            value_exp_show: false, //toggle value_expected (small red)

            // ---[POST]---
            FormPaymment: {
                id: "",
                student: "",
                date_paymment: "",
                item: "",
                quantity: "",
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
        onChangeItem(event){  //if item change, it save the value at ITEM_VALUE (change computed)
            if(event.target.value != ""){
                this.Item_value = this.allItems.find(x => x.id == event.target.value).value;
                this.value_exp_show = true
            }
        },
        use_value_exp(value){ //use value expected as a VALUE
            this.FormPaymment.value = value
            this.value_exp_show = false
        },
        resetForm(){
            this.FormPaymment.id            = ""
            this.FormPaymment.student       = ""
            this.FormPaymment.date_paymment = ""
            this.FormPaymment.item          = ""
            this.FormPaymment.quantity      = ""
            this.FormPaymment.value         = 0
            this.FormPaymment.comment       = ""
        },
        BacktoSave(){ //calcel button (yellow one)
            this.visibleNewPaymment = false //open paymment edit
            this.postVsEditButton = true //change buttons
            this.resetForm()
        },
        deletePaymmentVue(obj){ //delete clicked paymment
            var count = 0
            this.paymmentList.forEach(element => {
                (element.id == obj) ? this.paymmentList.splice(count,1) : count =+1
            });
        },
        payment_saveEdit(){ //----------[POST]---------
            if(this.postVsEditButton){ //[POST]
                axios.post('/api/paymment', this.FormPaymment)
                .then(response => {
                    alert(response.data)
                    this.resetForm()
                    this.BacktoSave()
                })
            }else{ //[EDIT]
                //----------[PUT PATCH - EDIT]----------
                axios.post('/api/paymment/' + this.FormPaymment.id, {
                modifyPaymment: this.FormPaymment,
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
        deletePayment(paymment_id){ //------[DELETE]-------
            axios.post('/api/paymment/' + paymment_id, {
                _method: 'DELETE'
            })
            .then(response => {
                alert(response.data.message)
                this.resetForm()
                this.BacktoSave()
                this.deletePaymmentVue(response.data.paymment_id)
            })
            .catch(error => console.log(error.response.data))
        },
        //---------------------------

        // ------[ALL PAYMMENT]------
        editPaymment(index){
            this.visibleNewPaymment = true //open paymment edit
            this.postVsEditButton = false //change buttons

            //use the index if paymment clicked and find where is inside the thia.paymmentList
            this.FormPaymment.id            = this.paymmentList[index].id
            this.FormPaymment.student       = this.paymmentList[index].student.id
            this.FormPaymment.date_paymment = this.paymmentList[index].date_paymment
            this.FormPaymment.item          = this.paymmentList[index].item.id
            this.FormPaymment.quantity      = this.paymmentList[index].quantity
            this.FormPaymment.value         = this.paymmentList[index].final_value
            this.FormPaymment.comment       = this.paymmentList[index].comment


        },
        //--------------------------
    },
    computed:{
        // value expected - (Value item X quantity)
        value_exp(){
            this.value_exp_show = true
            return this.Item_value * this.FormPaymment.quantity
        }
    },
    created(){
        // Fetch all [paymments] from DB
        axios.get('/paymment') //web ROUTER
        .then(response => {
            this.paymmentList = response.data
            setTimeout(() => $('#table_paymment').DataTable(), 1000);
        })
        .catch(error => console.log(error))

        // Fetch [student] to show his profile from DB
        axios.get('/student') //web ROUTER
        .then(response => this.allStudents = response.data)
        .catch(error => console.log(error))

        // Fetch [Item] to show his profile from DB
        axios.get('/item') //web ROUTER
        .then(response => {
            response.data.forEach(element => { //push all itens are for selling (income)
                if (element.identifier == 'p' || element.identifier == 'cp') this.allItems.push(element)
            })
        })
        .catch(error => console.log(error))
    }
}
</script>

<style>

</style>
