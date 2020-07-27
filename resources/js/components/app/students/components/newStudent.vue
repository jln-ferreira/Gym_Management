<template>
    <section class="container">
        <hr>
        <div class="btn btn-primary">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i> New Student <i class="fa fa-minus" aria-hidden="true"></i>
        </div>
    </section>

</template>

<script>
export default {
    created(){
        axios.get('/api/student')
        .then(response => console.log(response.data))
        // .catch(error => console.log(error));
    }
}
</script>

<style>

</style>
