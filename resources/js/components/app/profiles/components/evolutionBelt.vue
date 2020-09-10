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
                    <form method="post">
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
                            <button type="save" class="btn btn-success"><i class="fa fa-plus"></i> Save</button>
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
                        <div class="card-graduation card col-lg-3 col-4" v-for="graduation in this.graduations" v-bind:key="graduation.id">
                            <img class="card-img-top" src="image/responsable_ded.png" alt="Card image" v-if="graduation.belt_id == 'Father'">
                            <img class="card-img-top" src="image/responsable_mother.png" alt="Card image" v-if="graduation.belt_id == 'Mother'">
                            <img class="card-img-top" src="image/responsable_ded.png" alt="Card image" v-if="graduation.belt_id == 'Relatives'">
                            <div>
                                <p class="text-center mb-0"><b>{{ beltList[graduation.belt_id].name }}</b></p>
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

            // [POST] - New Graduation
            FormGraduation:{
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
