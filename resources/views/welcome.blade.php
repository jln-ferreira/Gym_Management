<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gym Management</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <link href="css/welcomePage.css" rel="stylesheet">

    </head>
    <body>
        <div class="container-fluid">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    {{--@if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif --}}
                @endauth
            @endif
        </div>

        <div id="root">
            <h1>LARAVEL</h1>

        </div>

        <!-- ----------VUE---------- -->
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>

            new Vue({
                el: '#root',
                data:{

                },
                methods: {

                }
            })

        </script>
    </body>
</html>
