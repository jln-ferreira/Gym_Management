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
                    <form method="post" @submit.prevent="addNewPost">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" v-model="FormResponsable.name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" v-model="FormResponsable.email" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="text" class="form-control" id="phoneNumber" v-model="FormResponsable.phoneNumber" required>
                            <small class="text-danger"  v-for="error in this.errors.phoneNumber" v-bind:key="error">{{ error }}</small>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="kinship" class="form-control" v-model="FormResponsable.kinship" required>
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
                        <div class="card-responsable card col-lg-3 col-4" v-for="responsable in this.responsables" v-bind:key="responsable.id">
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
            errors: {},

            // ---[POST]---
            FormResponsable: {
                student_id: this.$route.params.id,
                name: "",
                email: "",
                phoneNumber: "",
                kinship: "",
            }
        }
    },
    methods:{
        toggleBuy(){
            return this.visiblePersonal = !this.visiblePersonal
        },
        faChanging(){
            return (this.visiblePersonal == true) ? "fa fa-minus" : "fa fa-plus"
        },
        showNewResponsable(){ //create a new profile to show new responsable
            var MirrorResponsable = {
                'name': this.FormResponsable.name,
                'email': this.FormResponsable.email,
                'phoneNumber': this.FormResponsable.phoneNumber,
                'kinship': this.FormResponsable.kinship
            }
            this.responsables.push(MirrorResponsable)
        },
        resetForm(){ //reset all inputs
            this.FormResponsable.name = ""
            this.FormResponsable.email = ""
            this.FormResponsable.phoneNumber = ""
        },
        //[ADD NEW RESPONSABLE]
        addNewPost(){ //-----[POST]------
            axios.post('/api/responsable', this.FormResponsable)
            .then(response => {
                alert(response.data)
                this.showNewResponsable()
                this.resetForm()
            })
            .catch(error => this.errors = error.response.data.errors)
        }
    },
    created(){
        // Fetch all purchise of especial student
        axios.get('/api/student/' + this.$route.params.id + '/responsable')
        .then(response => this.responsables = response.data)
        .catch(error => alert(error))
    },
}
</script>

<style>
/* [card for each  responsable] */
.card-responsable{
    cursor: pointer;
}
.card-responsable :hover{
  opacity: 0.5;
  transition:all 0.5s ease;
}

</style>
