<template>
  <section class="container">
      <div class="bg-white">
         <table id="table_student" class="table table-hover">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
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
