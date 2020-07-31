<template>
    <section class="container">
        <hr>
        <!-- [button toggle] -->
        <div class="btn btn-primary" @click="toggleNewStudent()">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i> New Student <i :class="faChanging()" aria-hidden="true"></i>
        </div>
        <!-- [end button] -->

        <!-- [card new student] -->
        <div class="mt-1 shadow-sm p-4 mb-4 bg-white" v-show="visibleNewStudent">
            <form method="post" @submit.prevent="addNewPost">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="FormStudent.nameStudent" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" v-model="FormStudent.emailStudent" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" v-model="FormStudent.addressStudent" placeholder="1234 Main St" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="belt">Belt</label>
                        <select id="belt" class="form-control" v-model="FormStudent.beltStudent" required>
                             <option v-for='belt in beltList' v-text='belt.name' v-bind:key="belt.id" :value="belt.id"></option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="status">Status</label>
                        <select id="status" class="form-control" v-model="FormStudent.statusStudent" required>
                            <option v-for='status in statusList' v-text='status' v-bind:key="status.id" :value="status"></option>
                        </select>
                    </div>
                    <div class="form-group offset-md-2 col-md-3">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" v-model="FormStudent.birthDateStudent" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" id="comments" v-model="FormStudent.commentStudent" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add Student</button>
            </form>
        </div>
    </section>

</template>

<script>
export default {
    data(){
        return{
            visibleNewStudent: false,
            beltList: Array,
            statusList: ["Student", "Trial", "Professor"],

            // ---[POST]---
            FormStudent: {
                nameStudent: '',
                emailStudent: "",
                addressStudent: "",
                beltStudent: "",
                statusStudent: "",
                birthDateStudent: "",
                commentStudent: ""
            }
        }
    },
    methods:{
        toggleNewStudent(){
            return this.visibleNewStudent = !this.visibleNewStudent
        },
        faChanging(){
            return (this.visibleNewStudent == true) ? "fa fa-minus" : "fa fa-plus"
        },
        addNewPost(){ //-----[POST]------

                axios.post('/api/student', {
                    nameStudent: this.FormStudent.nameStudent,
                    emailStudent: this.FormStudent.emailStudent,
                    addressStudent: this.FormStudent.addressStudent,
                    beltStudent: this.FormStudent.beltStudent,
                    statusStudent: this.FormStudent.statusStudent,
                    birthDateStudent: this.FormStudent.birthDateStudent,
                    commentStudent: this.FormStudent.commentStudent
                })
                .then(response => console.log(response.data))
                .catch(error => console.log(error))
            }
    },
    created(){
        // Fetch all [Belts] from DB
        axios.get('/api/belt')
        .then(response => this.beltList = response.data)
        .catch(error => console.log(error))
    }
}
</script>

<style>

</style>
