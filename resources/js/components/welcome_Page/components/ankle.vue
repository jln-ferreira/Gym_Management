<template>
  <!-- Footer -->
    <section class="footer">
        <div class="container">

            <!--------- [ LOGO ] -------->
            <div class="row justify-content-center">
                <a class="navbar-brand" href="#"><img src="image/logo.png" alt="logo" width="100"></a>
            </div>

            <hr/>

            <!-- ---- [ Social Media ] ---- -->
            <div class="row justify-content-center">
                <div class="social-buttons">
                    <a href="https://www.facebook.com/bcjjfe" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/bcjjf_/"><i class="fab fa-instagram" target="_blank"></i></a>
                    <a href="#"><i class="fab fa-youtube" target="_blank"></i></a>
                </div>
            </div>

        </div>
    </section>


  <!-- Footer -->
</template>

<script>
export default {

}
</script>

<style>
    .footer{
        /* background: rgb(0,117,218);
        background: linear-gradient(90deg, rgba(0,117,218,1) 0%, rgba(0,96,180,1) 32%, rgba(0,69,129,1) 75%, rgba(0,31,57,1) 99%); */
        background: rgb(255,200,200);
        background: linear-gradient(90deg, rgba(255,200,200,1) 0%, rgba(255,73,73,1) 26%, rgba(129,0,0,1) 69%, rgba(57,0,0,1) 99%);
    }

    hr{
        border-top: 1px solid gold;
    }

    /* ---------[Media Icons]-------*/
    .social-buttons a{
        display: inline-flex;
        text-decoration: none;
        font-size: 30px;
        width: 60px;
        height: 60px;
        color: #fff;
        justify-content: center;
        align-items: center;
        position: relative;
        margin: 0 5px;
    }

    .social-buttons a:hover .fa-facebook{
        color: #4267B2;
    }
    .social-buttons a:hover .fa-instagram{
        color: #E1306C;
    }
    .social-buttons a:hover .fa-youtube{
        color: #FF0000;
    }

</style>
