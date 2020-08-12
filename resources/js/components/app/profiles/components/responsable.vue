<template>
    <div>
        <!-- [button toggle] -->
        <div class="btn btn-primary" @click="toggleBuy()">
            <i class="fa fa-child" aria-hidden="true"></i> Responsable <i :class="faChanging()" aria-hidden="true"></i>
        </div>
        <!-- [end button] -->

        <div class="bg-white shadow-sm rounded p-2 mb-4 row" v-show="this.visiblePersonal">

            <!-- Add Responsable -->
            <div class="col-md-5">
                <div class="rounded-lg shadow-sm p-4">
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="text" class="form-control" id="phoneNumber" required>
                        </div>
                        <div class="form-group">
                            <button type="save" class="btn btn-success">Save</button>
                            <button type="edit" class="btn btn-primary">Edit</button>
                            <button type="delete" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
      </div>
    </div>
</template>

<script>
export default {
    props:{

    },
    data(){
        return{
            responsables: "", //all resposable for especific student
            visiblePersonal: true,
        }
    },
    methods:{
        toggleBuy(){
            return this.visiblePersonal = !this.visiblePersonal
        },
        faChanging(){
            return (this.visiblePersonal == true) ? "fa fa-minus" : "fa fa-plus"
        },
    },
    created(){
        // Fetch all purchise of especial student
        axios.get('/api/student/' + this.$route.params.id + '/responsable')
        .then(response => this.responsables = response.data)
        .catch(error => alert(error))
    }
}
</script>

<style>

</style>
