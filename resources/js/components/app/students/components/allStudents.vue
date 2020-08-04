<template>
  <section class="container">
      <div class="bg-white">
         <table id="table_student" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Data Birth</th>
                    <th>Adress</th>
                    <th>Belt</th>
                    <th>Attendance</th>
                    <th>Next</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in this.studentList" v-bind:key="student.id">
                    <td>{{ student.name }}</td>
                    <td>{{ student.email }}</td>
                    <td>{{ student.databirth }}</td>
                    <td>{{ student.address }}</td>
                    <td>{{ student.belt_id }}</td>
                    <td>{{ student.total_attendance }}</td>
                    <td>{{ student.attendance_graduation }}</td>
                    <td></td>
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
           studentList: Array,
        }
    },
created(){
        // Fetch all [Belts] from DB
        axios.get('/api/student')
        .then(response => this.studentList = response.data)
        .catch(error => console.log(error))
    }
}
</script>

<style>

</style>
