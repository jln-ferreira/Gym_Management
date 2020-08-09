<template>
    <div>
        <div class="bg-white shadow-sm rounded p-2">
         <table class="table compact table-hover">
            <thead>
                <tr>
                    <th>Belt</th>
                    <th>'Photo'</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Belt</td>
                    <td>'Photo'</td>
                    <td>Date</td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
</template>

<script>
export default {
    data(){
        return{

        }
    },
    created(){
        // Fetch all graduation of especial student
        axios.get('/api/student/' + this.$route.params.id + '/graduation')
        .then(response => console.log(response.data))
        .catch(error => console.log(error))
    }
}
</script>

<style>

</style>
