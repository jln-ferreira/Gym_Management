<template>
    <div class="col-md-6 pl-0">
        <!-- [button toggle] -->
        <div class="btn btn-primary" @click="toggleGraduation()">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i> Student Graduation <i :class="faChanging()" aria-hidden="true"></i>
        </div>
        <!-- [end button] -->

        <div class="bg-white shadow-sm rounded p-2 mb-4" v-show="this.visiblePersonal">
         <table class="table compact table-hover text-center">
            <thead class="thead-belt shadow-sm">
                <tr>
                    <th>Belt</th>
                    <th>'Photo'</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for='graduation in graduations' v-bind:key="graduation.id">
                    <td>{{ beltList[graduation.belt_id].name }}</td>
                    <td>'Photo'</td>
                    <td>{{ graduation.created_at.slice(0,10) }}</td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
</template>

<script>
export default {
    props:{
        beltList: "", //all belts
    },
    data(){
        return{
            graduations: "", //all graduation of expecific student (AXIOS)

            visiblePersonal: true,
        }
    },
    methods:{
        toggleGraduation(){
            return this.visiblePersonal = !this.visiblePersonal
        },
        faChanging(){
            return (this.visiblePersonal == true) ? "fa fa-minus" : "fa fa-plus"
        },
    },
    created(){
        // Fetch all graduation of especial student
        axios.get('/api/student/' + this.$route.params.id + '/graduation')
        .then(response => this.graduations = response.data)
        .catch(error => alert(error))
    }
}
</script>

<style>
/* thead of table */
.thead-belt{
    background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
}

</style>
