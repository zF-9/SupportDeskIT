<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SupportDeskIT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/index.css') }}">
</head>
<body>
    <div id="loading">
        <div id="spinner"></div>
    </div>
    <div id="magnify">
        <h1 onclick="closemagnify()"><i class="fas fa-times"></i></h1>
        <div id="img_here"></div>
    </div>
    <header id="header" class="animated slideInDown" style="animation-delay:1.8s;">
        <table>
            <tr>
                <td id="logo">SupportDeskIT</td>
                <td id="navigation">
                    @if(isset(Auth::user()->name))
                        <a href="/home">{{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                    <a href="#bio">about</a>
                    <a href="#contact">contact</a>
                </td>
            </tr>
        </table>
    </header>
    <table id="top_part">
        <tr>
            <td id="about" class="animated slideInLeft" style="animation-delay:2s;">
                <h1>Where Effortless Hardware & Software Ticketing Support Start With.</h1>
                <a class="btn_one" href = "{{ route('home') }}">Take Me</a>
                <table>
                    <tr>
                        <td class="animated zoomIn" style="animation-delay:2.2s;"><a class="social"><i class="fab fa-facebook"></i></a></td>
                        <td class="animated zoomIn" style="animation-delay:2.4s;"><a class="social"><i class="fab fa-youtube-square"></i></a></td>
                        <td class="animated zoomIn" style="animation-delay:2.6s;"><a class="social"><i class="fab fa-git-square"></i></a></td>
                        <td class="animated zoomIn" style="animation-delay:2.8s;"><a class="social"><i class="fas fa-at"></i></a></td>
                        <td class="animated zoomIn" style="animation-delay:3.0s;"><a class="social"><i class="fa fa-microchip"></i></a></td>
                    </tr>
                </table>
            </td>
            <td id="rightImage" class="animated jackInTheBox" style="animation-delay:2.2s;"></td>
        </tr>
    </table>
    
    <!-- About Me -->
    <div id="bio">
        <h1>about</h1>
        <p>
            SupportDeskIT is a simple ticket system that allows staff to create new tickets and monitor delivery progress. Developed using web framework, SupportDeskIT is open source and really easy to use.
        </p>
        <p>FEATURES: 
        <ul>
            <li> Simple clean Design </li>
            <li> Open source code </li>
            <li> On prem messaging </li>
            <li> Department & User management </li>
            <li> User friendly ticketing with picture logs</li>
        </p>
    </div>

    <!-- Contact Us -->
    <div id="contact">
        <h1>contact</h1>
            <table>
                <tr>
                    <td>
                        <div id="inner_div">
                            <table id="inner_table">
                                <tr>
                                    <td><i class="fas fa-phone"></i> &nbsp; 088 368600 / 368601</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-at"></i> &nbsp; digitalgovernment.sabah@gmail.com</td>
                                </tr>
                                <!--<tr>
                                    <td><i class="fas fa-fax"></i> &nbsp; +918293111380</td>
                                </tr>-->
                                <tr>
                                    <td><i class="fas fa-map-marker-alt"></i>
                                    <div id="address">
                                        BAHAGIAN KERAJAAN DIGITAL<br>
                                        Jabatan Perkhidmatan Awam Negeri Sabah<br>
                                        Tingkat 13, Blok A, Menara Kinabalu,<br>
                                        Jalan Sulaman, Teluk Likas, 88400<br>
                                        Kota Kinabalu, Sabah.
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="social"><i class="fab fa-facebook"></i></a>
                                        <a class="social"><i class="fab fa-youtube-square"></i></a>
                                        <a class="social"><i class="fab fa-git-square"></i></a>
                                        <a class="social"><i class="fas fa-at"></i></a>
                                        <a class="social"><i class="fa fa-microchip"></i></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>
                        <form action="{{ route('short_message') }}" method="POST">
                        {!! csrf_field() !!}
                            <input type="text" name="name" placeholder="name" required>
                            <input type="email" name="email" placeholder="email" required><br>
                            <textarea name="message" placeholder="your message" required rows="5"></textarea><br>
                            <button class="btn_one">send</button>
                        </form> 
                    </td>
                </tr>
            </table>
    </div>
    <div id="footer">
        made on earth by a human <br>
    </div>
    <script src="{{ URL::asset('js/index.js') }}" type="text/javascript"></script>
</body>
</html>
