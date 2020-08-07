<template>
    <section class="container">
        <!-- [HEADER] -->
        <div class="pt-4 pb-2">
            <h1 class="header-pages font-weight-bold">Pofile</h1>
        </div>
        <!-- end HEADER -->
        <hr>

        <!-- [card new student] -->
        <div class="mt-1 shadow-sm p-4 mb-4 bg-white">
            <form method="post" @submit.prevent="updatePost">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="student.name" required>
                        <small class="text-danger"  v-for="error in this.errors.name" v-bind:key="error">{{ error }}</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" v-model="student.email" required>
                        <small class="text-danger" v-for="error in this.errors.email" v-bind:key="error">{{ error }}</small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" v-model="student.phoneNumber" required>
                        <small class="text-danger"  v-for="error in this.errors.phoneNumber" v-bind:key="error">{{ error }}</small>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="databirth">Birthdate</label>
                        <input type="date" class="form-control" id="databirth" v-model="student.databirth" required>
                        <small class="text-danger" v-for="error in this.errors.databirth" v-bind:key="error">{{ error }}</small>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" v-model="student.address" placeholder="1234 Main St" required>
                    <small class="text-danger" v-for="error in this.errors.address" v-bind:key="error">{{ error }}</small>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="belt">Belt</label>
                        <select id="belt" class="form-control" v-model="student.belt_id" required>
                             <option v-for='belt in beltList' v-text='belt.name' v-bind:key="belt.id" :value="belt.id"></option>
                        </select>
                        <small class="text-danger" v-for="error in this.errors.belt_id" v-bind:key="error">{{ error }}</small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="status">Status</label>
                        <select id="status" class="form-control" v-model="student.status" required>
                            <option v-for='status in statusList' v-text='status' v-bind:key="status.id" :value="status"></option>
                        </select>
                        <small class="text-danger" v-for="error in this.errors.status" v-bind:key="error">{{ error }}</small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="status">Attendance</label>
                        <input type="number" class="form-control" id="total_attendance" v-model="student.total_attendance" min="0" required>
                        <small class="text-danger" v-for="error in this.errors.total_attendance" v-bind:key="error">{{ error }}</small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="status">Next Graduation</label>
                        <input type="number" class="form-control" id="attendance_graduation" v-model="student.attendance_graduation" min="0" required>
                        <small class="text-danger" v-for="error in this.errors.attendance_graduation" v-bind:key="error">{{ error }}</small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" id="comments" v-model="student.comment" rows="3"></textarea>
                    <small class="text-danger" v-for="error in this.errors.comment" v-bind:key="error">{{ error }}</small>
                </div>
                <button type="submit" class="btn btn-info text-white">Update</button>
            </form>
        </div>

    </section>
</template>

<script>
export default {
    data(){
        return{
            student: "", //Student selected

            beltList: Array,
            statusList: ["Student", "Trial", "Professor"],
            errors: {},
        }
    },
    methods:{
        updatePost(){ //-----[POST]------
            axios.post('/api/student/' + this.student.id, {
                modifyStudent: this.student,
                _method: 'patch'
            })
            .then(response => console.log(response.data))
            .catch(error => this.errors = error.response.data.errors)
        }

    },
    created(){
        // Fetch student to show his profile from DB
        axios.get('/api/student/' + this.$route.params.id)
        .then(response => this.student = response.data)
        .catch(error => console.log(error))

        // Fetch all [Belts] from DB
        axios.get('/api/belt')
        .then(response => this.beltList = response.data)
        .catch(error => console.log(error))
    }
}
</script>

<style>

</style>
