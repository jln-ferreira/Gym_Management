<template>
  <section class="container">
      <div class="bg-white shadow-sm">
         <table id="table_student" class="table table-striped">
            <thead>
                <tr>
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
                    <td>{{ student.name }}</td>
                    <td>{{ student.email }}</td>
                    <td>{{ student.phoneNumber }}</td>
                    <td>{{ student.belt.name }}</td>
                    <td>{{ student.attendance_graduation }}</td>
                    <td>
                        <a href=""><i class="fas fa-wrench fa-lg text-success" title="Edit"></i></a>
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
