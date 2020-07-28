<template>
    <section class="container">
        <hr>
        <!-- [button toggle] -->
        <div class="btn btn-primary">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i> New Student <i class="fa fa-minus" aria-hidden="true"></i>
        </div>
        <!-- [end button] -->

        <!-- [card new student] -->
        <div class="mt-1 shadow-sm p-4 mb-4 bg-white">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="belt">Belt</label>
                        <select id="belt" class="form-control" required>
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="status">Status</label>
                        <select id="status" class="form-control" required>
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add Student</button>
            </form>
        </div>
    </section>

</template>

<script>
export default {
    created(){
        axios.get('/api/student')
        .then(response => console.log(response.data))
        .catch(error => console.log(error));
    }
}
</script>

<style>

</style>
