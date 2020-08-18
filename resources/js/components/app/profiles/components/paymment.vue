<template>
    <div>
        <!-- [button toggle] -->
        <div class="btn btn-secondary" @click="togglePaymment()">
            <i class="fa fa-user" aria-hidden="true"></i> Personal Information <i :class="faChanging()" aria-hidden="true"></i>
        </div>
        <!-- [end button] -->

    </div>
</template>

<script>
export default {
    data(){
        return{
            paymment: Array,

            visiblePaymment: true,
        }
    },
    methods:{
        togglePaymment(){
            return this.visiblePaymment = !this.visiblePaymment
        },
        faChanging(){
            return (this.visiblePaymment == true) ? "fa fa-minus" : "fa fa-plus"
        }
    },
    created(){
        // Fetch all finance of especial student
        axios.get('/api/student/' + this.$route.params.id + '/paymment')
        .then(response => this.finances = response.data)
        .catch(error => alert(error))
    },
}
</script>

<style>

</style>
