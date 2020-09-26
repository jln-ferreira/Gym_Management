<template>
  <div>
        <!-- [HEADER] -->
        <div class="pt-4 pb-2">
            <h1 class="header-pages font-weight-bold"><i class="fas fa-cog"></i> Settings</h1>
        </div>

        <!-- menu settings -->
        <section class="container">
        <hr>
            <div class="row">
                <!-- SIDE BAR -->
                <div class="col-md-3 col-sm-4">

                    <div class="card-header text-left">
                        <i class="far fa-id-badge"></i> Gym Profile <i class="float-right" aria-hidden="true"></i>
                    </div>
                    <div class="card-header text-left">
                        <i class="fas fa-gift"></i> Itens <i class="float-right" aria-hidden="true"></i>
                    </div>
                    <div class="card-header text-left">
                        <i class="fas fa-medal"></i> Belts <i class="float-right" aria-hidden="true"></i>
                    </div>
                    <div class="card-header text-left">
                        <i class="fa fa-user" aria-hidden="true"></i> Students Status <i class="float-right" aria-hidden="true"></i>
                    </div>
                    <div class="card-header text-left">
                        <i class="fas fa-user-shield"></i> Resposables Status <i class="float-right" aria-hidden="true"></i>
                    </div>

                </div>
            </div>
        </section>

    </div>
</template>

<script>
export default {
    data(){
        return{

        }
    },
    methods:{

    },
}
</script>

<style scoped>
    /* [sidebar] */
    .card-header{
        background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
    }
    .card-header:hover{
        background-color: #050506;
        background-image: linear-gradient(62deg, #050506 0%, #5d5d60 100%);
        color: white;
    }
    /* end sidebar */




</style>
