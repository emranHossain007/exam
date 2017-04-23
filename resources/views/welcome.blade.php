<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Property Sells</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000000;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">{{Auth::user()->name}}</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <br>
                <form  method="POST" action="search">
                    {{csrf_field()}}
                    <input type="text" name="search">
                    <button>Search</button>
                </form>
                <div class="title m-b-md">


                    Property Sells
                    <br>
                </div>
                    @foreach($postings as $posting)
                        <div class="panel">
                            <div class="panel-body">
                                <a href="posting/{{$posting->id}}"><h1>{{$posting->title}}</h1></a>
                                <p>{{$posting->description}}</p>
                                <img src="{{$posting->image}}" width="100px" height ="50px">
                                <p>Tk. {{$posting->price}}</p>

                            </div>
                        </div>

                    @endforeach


                <div class="links">

                    {{--<a href="https://laravel.com/docs">Documentation</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                </div>
            </div>
        </div>


    </body>
    <!-- Footer / About Section -->
    <footer class="w3-black w3-padding-64 w3-center text-center" id="about">
        <h1>About</h1>
        <img src="http://localhost/public/image.jpg" class="w3-image w3-padding-32" width="300" height="300">
        <form style="margin:auto;width:60%" action="send" target="_blank">
            <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
            <p class="w3-large w3-text-pink">Do not hesitate to contact me!</p>
            <div class="w3-section">
                <label><b>Name</b></label>
                <input class="w3-input w3-border" type="text" required name="Name">
            </div>
            <div class="w3-section">
                <label><b>Email</b></label>
                <input class="w3-input w3-border" type="text" required name="Email">
            </div>
            <div class="w3-section">
                <label><b>Message</b></label>
                <input class="Black bold" required name="Message">
            </div>
            <button type="submit" class="w3-button w3-block w3-dark-grey">Send</button>
        </form>
        <br>

        <h1>Contact Us</h1>
        <p>Address: Mirpur, Dhaka Bangladesh</p>

        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14606.93030142689!2d90.360714!3d23.756914000000002!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1492960562364" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </footer>
</html>
