<template>
    <section class="p-5">
        <div class="container bg-white shadow rounded p-2 mb-4 mt-4">
            <div class="row">
                <div class="col-md-7 col-xs-12">
                    <div class="col-sm-12 mb-3 text-center">
                        <h2>Contact Us</h2>
                    </div>
                    <form method="post" @submit.prevent="submitContact" class="col-sm-12">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" :class="['form-control', isNameValid()]" id="name" name="name" v-model="contact.name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" :class="['form-control', isEmailValid()]" id="email" name="email" placeholder="your-email@example.com" v-model="contact.email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comments">Comments</label>
                            <textarea class="form-control" id="comments" name="comments" rows="3" v-model="contact.comments" required></textarea>
                        </div>
                        <button type="submit" name="submit" :class="['btn', 'btn-danger', AllowSend()]"><i class="far fa-paper-plane"></i> Send</button>
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
            },
            //REGEX
            regex_Email: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
            regex_name: /^([A-Za-zéàë]{2,40} ?)+$/

        }
    },
    methods: {
        // VALIDATE FORM
        isEmailValid() {
            return (this.contact.email == "")? "" : (this.regex_Email.test(this.contact.email)) ? 'has-success' : 'has-error';
        },
        isNameValid() {
            return (this.contact.name == "")? "" : (this.regex_name.test(this.contact.name)) ? 'has-success' : 'has-error';
        },
        AllowSend() {
            return (this.isEmailValid() == 'has-success' && this.isNameValid() == 'has-success') ? "" : 'block-send';
        },
        // END VALIDATE FORM

        cleanContact(){
            contact.name = "";
            contact.email = "";
            contact.comments = "";
        },
        submitContact(){ //-----[POST]------
        console.log("before axios");
            axios.post('/api/mail_contact', this.contact) //API ROUTE
            .then(response =>{
                alert(response.data)
                cleanContact();
            })
            .catch(error => alert(error.response.data))
        }
    },
}
</script>

<style>
/* [VALIDATION FORM REGEX] */
.block-send{
    opacity: 0.6;
    cursor: not-allowed;
    pointer-events: none;

}
.has-error{
    border: none;
    background-color: #fcdcdc;
    font-weight: bolder;
}
.has-success{
    border-color: green;
    font-weight: bolder;
}
/* ======----======= */

@media screen and (max-width: 768px) {
  .imgContact {
    display: none;
  }
}


</style>
