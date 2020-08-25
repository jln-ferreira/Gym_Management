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
            <form method="post" @submit.prevent="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Student</label>
                        <select id="student" class="form-control" v-model="FormPaymment.student" required>
                             <option v-for='student in allStudents' v-text='student.name' v-bind:key="student.id" :value="student.id"></option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="databirth">Date</label>
                        <input type="date" class="form-control" id="date_paymment" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Item</label>
                        <select id="item" class="form-control" v-model="FormPaymment.item" required>
                             <option v-for='item in allItems' v-text='item.name' v-bind:key="item.id" :value="item.id"></option>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="databirth">Quantity</label>
                        <input type="number" class="form-control" id="quantity" min="1" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="databirth">Fixed Value</label>
                        <input type="number" class="form-control" id="fixed_value" readonly required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="databirth">Other Value</label>
                        <input type="number" class="form-control" id="value"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" id="comments" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add Paymment</button>
            </form>
        </div>
    </section>
</template>

<script>
export default {
    props:{
        allStudents: "", //Student DB
        allItems: "", //Item DB
    },
    data(){
        return{
            visibleNewPaymment: false,
            errors: {},

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
        toggleNewPaymment(){
            return this.visibleNewPaymment = !this.visibleNewPaymment
        },
        faChanging(){
            return (this.visibleNewPaymment == true) ? "fa fa-minus" : "fa fa-plus"
        },

    },

}
</script>

<style>

</style>
