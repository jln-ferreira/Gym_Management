<template>
    <div>
        <!-- [button toggle] -->
        <div class="card-header text-white text-left" @click="togglePersonal()">
            <i class="fa fa-user" aria-hidden="true"></i> Personal Information <i :class="[faChanging(), 'float-right']" aria-hidden="true"></i>
        </div>
        <!-- [end button] -->

          <!-- [card new student] -->
        <div class="mt-1 shadow-sm p-4 mb-4 bg-white" v-show="this.visiblePersonal">
            <form method="post" @submit.prevent="updatePost">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="student.name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" v-model="student.email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" v-model="student.phoneNumber" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="databirth">Birthdate</label>
                        <input type="date" class="form-control" id="databirth" v-model="student.databirth" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" v-model="student.address" placeholder="1234 Main St" required>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="belt">Belt</label>
                        <select id="belt" class="form-control" v-model="student.belt_id" required>
                             <option v-for='belt in beltList' v-text='belt.name' v-bind:key="belt.id" :value="belt.id"></option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="status">Status</label>
                        <select id="status" class="form-control" v-model="student.status" required>
                            <option v-for='status in statusList' v-text='status' v-bind:key="status.id" :value="status"></option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="status">Attendance</label>
                        <input type="number" class="form-control" id="total_attendance" v-model="student.total_attendance" min="0" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="status">Next Graduation</label>
                        <input type="number" class="form-control" id="attendance_graduation" v-model="student.attendance_graduation" min="0" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" id="comments" v-model="student.comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-info text-white"><i class="far fa-edit"></i> Update</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        student: "", //Student selected
        beltList: "", //all belts
    },
    data(){
        return{
            visiblePersonal: true,
            statusList: ["Student", "Trial", "Professor"]
        }
    },
    methods:{
        togglePersonal(){
            return this.visiblePersonal = !this.visiblePersonal
        },
        faChanging(){
            return (this.visiblePersonal == true) ? "fa fa-minus" : "fa fa-plus"
        },
        updatePost(){ //-----[PATCH - EDIT]------
            axios.post('/api/student/' + this.student.id, {
                modifyStudent: this.student,
                _method: 'patch'
            })
            .then(response => alert(response.data))
            .catch(error => alert(error.response.data))
        }
    },
}
</script>

<style scoped>
/* header of loggles */
.card-header{
    background: rgb(22,20,17);
    background: linear-gradient(90deg, rgba(22,20,17,1) 0%, rgba(122,36,36,1) 48%, rgba(142,11,11,1) 67%, rgba(0,0,0,1) 71%, rgba(0,0,0,1) 86%, rgba(142,11,11,1) 91%);
}


</style>
