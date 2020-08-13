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
                            <label for="status">Status</label>
                            <select id="kinship" class="form-control" required>
                                <option>Father</option>
                                <option>Mother</option>
                                <option>Relatives</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="save" class="btn btn-success">Save</button>
                            <button type="edit" class="btn btn-primary">Edit</button>
                            <button type="cancel" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- all responsable -->
             <!-- Add Responsable -->
            <div class="col-md-7">
                <div class="rounded-lg shadow-sm p-4">
                    <h3 class="font-weight-bolder text-center">Responsables:</h3>
                    <hr/>
                    <div class="row">
                        <div class="card col-sm-3" v-for="responsable in this.responsables" v-bind:key="responsable.id">
                            <img class="card-img-top" src="image/responsable_ded.png" alt="Card image" v-if="responsable.kinship == 'Father'">
                            <img class="card-img-top" src="image/responsable_mother.png" alt="Card image" v-if="responsable.kinship == 'Mother'">
                            <img class="card-img-top" src="image/responsable_ded.png" alt="Card image" v-if="responsable.kinship == 'Relatives'">
                            <div>
                                <p class="text-center mb-0"><b>{{ responsable.name }}</b></p>
                                <p class="text-center mb-0">{{ responsable.phoneNumber }}</p>
                            </div>
                        </div>
                    </div>
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
