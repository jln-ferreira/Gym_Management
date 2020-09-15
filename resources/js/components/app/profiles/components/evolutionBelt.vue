<template>
    <section>
        <!-- [button toggle] -->
        <div class="btn btn-primary" @click="toggleGraduation()">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i> Student Graduation <i :class="faChanging()" aria-hidden="true"></i>
        </div>

        <div class="bg-white shadow-sm rounded p-2 mb-4 row" v-show="this.visibleGraduation">
            <div class="col-md-5">
                <!-- ----------[ADD GRADUATION]------------ -->
                <div class="rounded-lg shadow-sm p-4">
                    <form method="post" @submit.prevent="graduation_saveEdit">
                        <div class="form-group">
                            <label for="belt_graduation">Belt</label>
                            <select id="belt_graduation" class="form-control" v-model="FormGraduation.belt_id" required>
                                <option v-for='belt in beltList' v-text='belt.name' v-bind:key="belt.id" :value="belt.id"></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="graduation_date">Graduation Date</label>
                            <input type="date" class="form-control" id="graduation_date" v-model="FormGraduation.graduation_date" required>
                        </div>
                        <div class="form-group">
                            <button type="save" v-show="this.graduationSave == true" class="btn btn-success"><i class="fa fa-plus"></i> Save</button>
                            <button v-show="this.graduationSave == false" type="edit" class="btn btn-primary"><i class="far fa-edit"></i> Edit</button>
                            <a v-show="this.graduationSave == false" @click="deleteGraduation(FormGraduation.id)" type="delete" class="btn btn-danger text-white"><i class="far fa-trash-alt"></i> Delete</a>
                            <a v-show="this.graduationSave == false" @click="cancelGraduation()" type="cancel" class="btn btn-warning text-white"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
             <!-- [EDIT AND ADD BELT] -->

            <!-- [ALL GRADUATION OF THIS STUDENT] -->
            <div class="col-md-7">
                <div class="rounded-lg shadow-sm p-4">
                    <h3 class="font-weight-bolder text-center">Graduations:</h3>
                    <hr/>
                    <div class="row">
                        <small class="mx-auto" v-if="this.graduations == ''">There is no Graduation</small>
                        <div class="card-graduation card col-lg-3 col-4" v-for="(graduation, index) in this.graduations" v-bind:key="graduation.id" @click="modifyPost(index)">
                            <img class="card-img-top" :src="'image/belts/' + beltList[graduation.belt_id -1].name + '.png'" alt="Card image">
                            <div>
                                <p class="text-center mb-0"><b>{{ beltList[graduation.belt_id -1].name }}</b></p>
                                <p class="text-center mb-0">{{ graduation.created_at.slice(0,10) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end [All Graduations] -->
        </div>
    </section>
</template>

<script>
export default {
    props:{
        beltList: "", //all belts
    },
    data(){
        return{
            graduations: "", //all graduation of expecific student (AXIOS)
            visibleGraduation: true,
            graduationSave: true, //change buttons save to cancel/edit/ delete

            // [POST] - New Graduation
            FormGraduation:{
                id: "",
                student_id: this.$route.params.id,
                belt_id: 0,
                graduation_date: ""
            },
        }
    },
    methods:{
        toggleGraduation(){
            return this.visibleGraduation = !this.visibleGraduation
        },
        faChanging(){
            return (this.visiblePersonal == true) ? "fa fa-minus" : "fa fa-plus"
        },
        showNewGraduation(){ //create a new profile to show new graduation (vue)
            var MirrorGraduation = {
                'student_id': this.$route.params.id,
                'belt_id': this.FormGraduation.belt_id,
                'created_at': this.FormGraduation.graduation_date
            }
            this.graduations.push(MirrorGraduation)
        },
        deleteGraduationVue(obj){ //delete clicked Grduation
            var count = 0
            this.graduations.forEach(element => {
                (element.id == obj) ? this.graduations.splice(count,1) : count =+1
            });
        },
        resetForm(){ //reset all inputs
            this.FormGraduation.id = ""
            this.FormGraduation.belt_id = ""
            this.FormGraduation.graduation_date = ""
        },
        modifyPost(index){ //modify Save to edit
            this.graduationSave = false
            this.FormGraduation.id              = this.graduations[index].id
            this.FormGraduation.belt_id         = this.graduations[index].belt_id
            this.FormGraduation.graduation_date = this.graduations[index].created_at.slice(0,10)
        },
        //[ADD NEW GRADUATION]
        graduation_saveEdit(){
             //--------------------[POST]--------------
            if(this.graduationSave){
                axios.post('/api/graduation', this.FormGraduation)
                .then(response => {
                    alert(response.data)
                    this.showNewGraduation()
                    this.resetForm()
                })
                .catch(error => this.errors = error.response.data.errors)
            }else{//----------[PUT PATCH - EDIT]----------
                axios.post('/api/graduation/' + this.FormGraduation.id, {
                modifyGraduation: this.FormGraduation,
                _method: 'patch'
                })
                .then(response => {
                    alert(response.data.message)
                    this.deleteGraduationVue(response.data.Graduation)
                    this.showNewGraduation()
                    this.resetForm()
                    this.graduationSave = true
                })
                .catch(error => alert(error.response.data))
            }
        },
        deleteGraduation(graduation){//-----[DELETE]------
            axios.post('/api/graduation/' + graduation, {
                _method: 'DELETE'
            })
            .then(response => {
                alert(response.data.message)
                this.deleteGraduationVue(response.data.graduation_id)
                this.resetForm()
                this.graduationSave = true
            })
            .catch(error => console.log(error.response.data))
        },
        cancelGraduation(){ //------[CANCEL]-------
            this.graduationSave = true
            this.resetForm()
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

/* [card for each  graduation] */
.card-graduation{
    cursor: pointer;
}
.card-graduation :hover{
  opacity: 0.5;
  transition:all 0.5s ease;
}

</style>
