<template>
    <div>
        <!-- [button toggle] -->
        <div class="btn btn-primary" @click="toggleResponsable()">
            <i class="fa fa-child" aria-hidden="true"></i> Responsable <i :class="faChanging()" aria-hidden="true"></i>
        </div>
        <!-- [end button] -->

        <div class="bg-white shadow-sm rounded p-2 mb-4 row" v-show="this.visiblePersonal">

            <div class="col-md-5">
                <div class="rounded-lg shadow-sm p-4">
                    <!-- ----------[ADD RESPNSABLE]------------ -->
                    <form method="post" @submit.prevent="responsable_saveEdit">
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
                            <button type="save" v-show="this.responsableSave == true" class="btn btn-success"><i class="fa fa-plus"></i> Save</button>
                            <button v-show="this.responsableSave == false" type="edit" class="btn btn-primary"><i class="far fa-edit"></i> Edit</button>
                            <a  v-show="this.responsableSave == false" @click="deleteResponsable(FormResponsable.id)" type="delete" class="btn btn-danger text-white"><i class="far fa-trash-alt"></i> Delete</a>
                            <a v-show="this.responsableSave == false" @click="cancelResponsable()" type="cancel" class="btn btn-warning text-white"><i class="fa fa-times"></i> Cancel</a>
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
                        <small class="mx-auto" v-if="this.responsables == ''">There is no Responsable</small>
                        <div class="card-responsable card col-lg-3 col-4" v-for="(responsable, index) in this.responsables" v-bind:key="responsable.id" @click="modifyPost(index)">
                            <img class="card-img-top" src="image/responsables/responsable_ded.png" alt="Card image" v-if="responsable.kinship == 'Father'">
                            <img class="card-img-top" src="image/responsables/responsable_mother.png" alt="Card image" v-if="responsable.kinship == 'Mother'">
                            <img class="card-img-top" src="image/responsables/responsable_ded.png" alt="Card image" v-if="responsable.kinship == 'Relatives'">
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
            responsables: Array, //all resposable for especific student
            visiblePersonal: true,
            responsableSave: true, //change buttons save to cancel/edit/ delete

            errors: {},

            // ---[POST]---
            FormResponsable: {
                id: "",
                student_id: this.$route.params.id,
                name: "",
                email: "",
                phoneNumber: "",
                kinship: "",
            }
        }
    },
    methods:{
        toggleResponsable(){
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
        deleteResponsableVue(obj){ //delete clicked resposable
            var count = 0
            this.responsables.forEach(element => {
                (element.id == obj) ? this.responsables.splice(count,1) : count =+1
            });
        },
        resetForm(){ //reset all inputs
            this.FormResponsable.id = ""
            this.FormResponsable.name = ""
            this.FormResponsable.email = ""
            this.FormResponsable.phoneNumber = ""
            this.FormResponsable.kinship = ""
        },
        modifyPost(index){ //modify Save to edit
            this.responsableSave = false
            this.FormResponsable.id          = this.responsables[index].id
            this.FormResponsable.name        = this.responsables[index].name
            this.FormResponsable.email       = this.responsables[index].email
            this.FormResponsable.phoneNumber = this.responsables[index].phoneNumber
            this.FormResponsable.kinship     = this.responsables[index].kinship
        },
        //[ADD NEW RESPONSABLE]
        responsable_saveEdit(){
             //--------------------[POST]--------------
            if(this.responsableSave){
                axios.post('/api/responsable', this.FormResponsable)
                .then(response => {
                    alert(response.data)
                    this.showNewResponsable()
                    this.resetForm()
                })
                .catch(error => this.errors = error.response.data.errors)
            }else{//----------[PUT PATCH - EDIT]----------
                axios.post('/api/responsable/' + this.FormResponsable.id, {
                modifyResponsable: this.FormResponsable,
                _method: 'patch'
                })
                .then(response => {
                    alert(response.data.message)
                    this.deleteResponsableVue(response.data.Responsable)
                    this.showNewResponsable()
                    this.resetForm()
                    this.responsableSave = true
                })
                .catch(error => alert(error.response.data))
            }
        },
        deleteResponsable(responsable){//-----[DELETE]------
            axios.post('/api/responsable/' + responsable, {
                _method: 'DELETE'
            })
            .then(response => {
                alert(response.data.message)
                this.deleteResponsableVue(response.data.responsable_id)
                this.resetForm()
                this.responsableSave = true
            })
            .catch(error => console.log(error.response.data))
        },
        cancelResponsable(){ //------[CANCEL]-------
            this.responsableSave = true
            this.resetForm()
        },

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
