<template>
  <section class="container">
      <div class="bg-white shadow-sm rounded p-2">
         <table id="table_student" class="table table-striped compact">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Belt</th>
                    <th>Next</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in this.studentList" v-bind:key="student.id">
                    <td>{{ student.id }}</td>
                    <td>{{ student.name }}</td>
                    <td>{{ student.email }}</td>
                    <td>{{ student.phoneNumber }}</td>
                    <td>{{ student.belt.name }}</td>
                    <td>{{ student.attendance_graduation }}</td>
                    <td>
                        <a @click="gotoProfile(student.id)" style="cursor:pointer"><i class="fas fa-wrench fa-lg text-success" title="Edit"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
  </section>
</template>

<script>
export default {
    // auth User
    props: ['app'],

    data(){
        return{
            user_id: this.$userId, //Auth comming from LARAVEL
            studentList: Array, //all students from DB
        }
    },
    methods:{
        gotoProfile(id){
            this.$router.push('/students/' + id);
        }
    },
    created(){
        // Fetch all [Students with Belts] from DB
        axios.get('/api/student')
        .then(response => {
            console.log(this.$userId);
            this.studentList = response.data
            setTimeout(() => $('#table_student').DataTable(), 1000);
        })
        .catch(error => console.log(error))
    }
}
</script>

<style></style>
