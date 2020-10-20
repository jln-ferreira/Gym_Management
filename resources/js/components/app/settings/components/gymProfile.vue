<template>
    <section class="bg-white shadow-sm rounded p-2 mb-4 row">
        <form method="post" class="col-sm-12">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" v-model="myGym.name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="address" v-model="myGym.address" placeholder="1234 Main St">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="coutry">Country</label>
                    <input type="text" class="form-control" id="country" v-model="myGym.country" placeholder="Brazil">
                </div>
                <div class="form-group col-md-3">
                    <label for="postcode">Post-Code</label>
                    <input type="text" class="form-control" id="postcode" v-model="myGym.postcode">
                </div>
            </div>
            <div class="form-group">
                <label for="comments">Comments</label>
                <textarea class="form-control" id="comments" v-model="myGym.comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Save</button>
        </form>
    </section>
</template>

<script>
export default {
    data(){
        return{
            myGym: Object,
        }
    },
    created(){
        // Fetch exatly my gym
        axios.get('/gym') //WEB ROUTE
        .then(response => this.myGym = response.data)
        .catch(error => console.log(error))
    }
}
</script>

<style>

</style>
