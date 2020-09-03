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
                        <input type="text" class="form-control" id="name" v-model="FormStudent.name" required>
                        <small class="text-danger"  v-for="error in this.errors.name" v-bind:key="error">{{ error }}</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" v-model="FormStudent.email" required>
                        <small class="text-danger" v-for="error in this.errors.email" v-bind:key="error">{{ error }}</small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" v-model="FormStudent.phoneNumber" required>
                        <small class="text-danger"  v-for="error in this.errors.phoneNumber" v-bind:key="error">{{ error }}</small>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="databirth">Birthdate</label>
                        <input type="date" class="form-control" id="databirth" v-model="FormStudent.databirth" required>
                        <small class="text-danger" v-for="error in this.errors.databirth" v-bind:key="error">{{ error }}</small>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" v-model="FormStudent.address" placeholder="1234 Main St" required>
                    <small class="text-danger" v-for="error in this.errors.address" v-bind:key="error">{{ error }}</small>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="belt">Belt</label>
                        <select id="belt" class="form-control" v-model="FormStudent.belt_id" required>
                             <option v-for='belt in beltList' v-text='belt.name' v-bind:key="belt.id" :value="belt.id"></option>
                        </select>
                        <small class="text-danger" v-for="error in this.errors.belt_id" v-bind:key="error">{{ error }}</small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="status">Status</label>
                        <select id="status" class="form-control" v-model="FormStudent.status" required>
                            <option v-for='status in statusList' v-text='status' v-bind:key="status.id" :value="status"></option>
                        </select>
                        <small class="text-danger" v-for="error in this.errors.status" v-bind:key="error">{{ error }}</small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" id="comments" v-model="FormStudent.comment" rows="3"></textarea>
                    <small class="text-danger" v-for="error in this.errors.comment" v-bind:key="error">{{ error }}</small>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add Student</button>
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
            errors: {},

            // ---[POST]---
            FormStudent: {
                name: "",
                email: "",
                phoneNumber: "",
                address: "",
                belt_id: "",
                status: "",
                databirth: "",
                comment: ""
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
            axios.post('/api/student', this.FormStudent)
            .then(response => {
                alert(response.data.message)
                this.$router.push('/students/' + response.data.id);
            })
            .catch(error => this.errors = error.response.data.errors)
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
