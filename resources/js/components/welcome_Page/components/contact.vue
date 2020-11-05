<template>
    <section>
        <div class="container bg-white shadow rounded p-2 mb-4 mt-4">
            <div class="row">
                <div class="col-sm-12 mb-3 text-center">
                    <h2>Contact Us</h2>
                </div>
                <div class="col-md-7 col-xs-12">
                    <form method="post" @submit.prevent="submitContact" class="col-sm-12">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" v-model="contact.name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="your-email@example.com" v-model="contact.email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comments">Comments</label>
                            <textarea class="form-control" id="comments" name="comments" rows="3" v-model="contact.comments" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-danger"><i class="far fa-paper-plane"></i> Send</button>
                    </form>
                </div>
                <div class="col-md-5 imgContact">
                    <img src="image/contact/contact1.jpg" class="img-fluid rounded-lg">
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data(){
        return{
            // ---[POST]---
            contact: {
                name: "",
                email: "",
                comments: ""
            }
        }
    },
    methods: {
        submitContact(){ //-----[POST]------

        console.log("before axios");
            axios.post('/mail_contact.php', this.contact) //API ROUTE
            .then(response => alert(response.data))
            .catch(error => alert(error.response.data))
        }
    },
        mounted(){
            axios.get("https://jsonplaceholder.typicode.com/todos/")
            .then(response => console.log(response))
        }
}
</script>

<style>

@media screen and (max-width: 768px) {
  .imgContact {
    display: none;
  }
}

</style>
