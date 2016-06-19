
@section('content')

@endsection

@section('auth-steam')
    <div class="game-login">
        @if(Auth::check())
            <img src="{{ Auth::user()->avatar }}">
            <p>{{ Auth::user()->username }}</p>
            <p>{{ Auth::user()->steamid }}</p>
            <p><a href="logout">LOGOUT</a></p>
        @else
            <p><a href="steamlogin">Login into Steam</a></p>
        @endif
    </div>
@endsection

@section('margin-left')
    <li id="magic-line" style="left: 100px;"><div class="triangle"></div></li>
@endsection

@section('cs')
    class="current_page_item"
@endsection

@section('dota')
class=""
@endsection

@section('lol')
    class=""
@endsection

@section('heartstone')
    class=""
@endsection

@section('in_process')

@endsection

<!DOCTYPE html>
    <html lang="en" class="">
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="/i/favicon.png">

        <title>The Game Club</title>

        <link rel="stylesheet" type="text/css" media="screen, print, projection" href="/css/csgo.css">
        <link rel="stylesheet" type="text/css" href="/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="/css/cs-select.css" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    </head>
    <body>

    <div id="page-homepage">
        {{--@yield('auth-steam');--}}
        {{--<div class="game-login">--}}
            {{--@if(Auth::check())--}}
                {{--<img src="{{ Auth::user()->avatar }}">--}}
                {{--<p>{{ Auth::user()->username }}</p>--}}
                {{--<p>{{ Auth::user()->steamid }}</p>--}}
                {{--<p><a href="logout">LOGOUT</a></p>--}}
            {{--@else--}}
                {{--<p><a href="steamlogin">Login into Steam</a></p>--}}
            {{--@endif--}}
        {{--</div>--}}

        <section class="game-select">
            <select class="cs-select cs-skin-elastic">
                <option value="" disabled selected>Выберите игру</option>
                <option value="france" data-class="flag-france">CS:GO</option>
                <option value="brazil" data-class="flag-brazil">Dota 2</option>
                <option value="argentina" data-class="flag-argentina">LoL</option>
                <option value="south-africa" data-class="flag-safrica">Hearthstone</option>
            </select>
        </section>
        <script src="/js/classie.js"></script>
        <script src="/js/selectFx.js"></script>
        <script>
            (function() {
                [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
                    new SelectFx(el);
                } );
            })();
        </script>

        <div class="navbar-wrapper">

            <div class="navbar-collapse collapse">

                <div class="logo-wrapper">
                    <img src="/i/logo.png" id="v7-logo" class="vertical">
                </div>

                <ul id="main-nav">
                    <li @yield('home')>
                        <a href="@yield('play');" class="mobile-vertical">Играть</a>
                    </li>

                    <li @yield('cs')>
                        <a href="@yield('tournaments');" class="mobile-vertical">Турниры</a>
                    </li>

                    <li @yield('dota')>
                        <a href="@yield('complaints');" class="mobile-vertical">Жалобы</a>
                    </li>

                    <li @yield('lol')>
                        <a href="@yield('faq');" class="mobile-vertical">FAQ</a>
                    </li>

                </ul>

            </div>

        </div>



        <main>

            <div class="first">

                {{--<img src="/i/logo.png" alt="Site Logo" class="vertical">--}}

            </div>

            <div class="wrapper">
                <div class="current-game">CS:GO</div>
                @yield('in_process')
            </div>

            <div id="particles" style="display: block;"><canvas class="pg-canvas" width="260" height="643"></canvas></div>

        </main>

        <table class="test" width="100%">
            <tbody>

            </tbody>
        </table>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

    <script type="text/javascript" src="/js/jquery.particleground.js"></script>
    <script type="text/javascript" src="/js/magicline.js"></script>

    <script>
        $(document).ready(function() {
            $('#particles').particleground({
                dotColor: '#ff6969',
                lineColor: 'rgba(255,255,255,0.05)',
                particleRadius: 3,
                parallax: false,
                onInit: function() {
                    $( "#particles" ).delay(1000).fadeIn( "slow");
                }
            });
        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-24588139-1', 'auto');
        ga('require', 'displayfeatures');
        ga('send', 'pageview');
    </script>
    Start of Async HubSpot Analytics Code
    <script type="text/javascript">
        (function(d,s,i,r) {
            if (d.getElementById(i)){return;}
            var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
            n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/503322.js';
            e.parentNode.insertBefore(n, e);
        })(document,"script","hs-analytics",300000);
    </script>

    </body>
    </html>