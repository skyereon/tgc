
@section('content')

@endsection

@section('auth-steam')
    <div class="game-login">

        @if(Auth::check())
            <a href="csgo/profile"><img src="{{ Auth::user()->avatar }}"></a>
            <p>Вы вошли как:<br/>
                <a class="profile" href="csgo/profile"> {{ Auth::user()->username }} </a></p>
                <p><a class="profile" href="csgo/profile"> {{ Auth::user()->cash }} RUB</a></p>
            {{--<h4>{{ Auth::user()->username }}</h4>--}}
            {{--<h3>{{ Auth::user()->steamid }}</h3>--}}
            <p><a class="btn btn-default" href="csgologout" role="button">Выйти</a></p>
        @else
            <a href="csgosteamlogin"><img src="img/csgo/steam-signin-color.png" alt="Зайти через стим!"></a>
        @endif
    </div>
@endsection

@section('game-select')
    <div class="menu">
        <div class="wrap-drop" id="noble-gases">
            <span><img src="img/gamebar/cs-go.png">СS:GO</span>
            <ul class="drop">
                {{--<li class="selected"><a>CS:GO</a></li>--}}
                <li><a hrsef="/dota"><img src="img/gamebar/dota.png">Dota2</a></li>
                <li><a href="/lol"><img src="img/gamebar/lol.png">LoL</a></li>
                <li><a href="/hearthstone"><img src="img/gamebar/ico_hs_small.png">Hearthstone</a></li>
            </ul>
        </div>
    </div>
    <script type="text/javascript" src="/js/menu.js"></script>
@endsection

@section('margin-left')
    <li id="magic-line" style="left: 100px;"><div class="triangle"></div></li>
@endsection

@section('cs')
    class=""
@endsection

@section('home')
    class="current_page_item"
@endsection

@section('dota')
class=""
@endsection

@section('lol')
    class=""
@endsection

@section('hearthstone')
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
        <link rel="stylesheet" type="text/css"  href="/bootstrap-3.3.6-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" media="screen, print, projection" href="/css/csgo.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script type="text/javascript" src="/js/jquery-3.0.0.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    </head>
    <body onload="init()">



    <div id="page-homepage">



        <div class="navbar-wrapper">

            @yield('game-select')

            <div class="navbar-collapse collapse">
                <div class="nav-bar-bg">
                <ul id="main-nav">
                    <li>
                        <a href="/" class="mobile-vertical">Intro</a>
                    </li>
                    <li @yield('home')>
                        <a href="#" class="mobile-vertical">Играть</a>
                    </li>

                    <li>
                        <a href="/csgo/tournaments" class="mobile-vertical">Турниры</a>
                    </li>

                    <li>
                        <a href="/csgo/reports" class="mobile-vertical">Жалобы</a>
                    </li>

                    <li>
                        <a href="/csgo/faq" class="mobile-vertical">FAQ</a>
                    </li>
                    <li>
                        <a href="/csgo/profile" class="mobile-vertical">Профиль</a>
                    </li>

                </ul>
                </div>

            </div>
            @yield('auth-steam');

        </div>

        <main>
            <div class="first">

            </div>

            <div class="wrapper">
                <div class="current-game">CS:GO</div>
                @yield('in_process')
            </div>
            <div class="main-container">
                <div class="sec-container">
                    <div class="article">
                        <h3>Cписок открытых игр:</h3>
                        <p class="right-align-element"><a class=" btn btn-default" href="/csgo/createroom" role="button">Создать комнату</a></p>
                    </div>
                    <div id="containerGames" class="sec-container-text">
                        <table id="listGames" class="table table-hover">
                            <thead>
                            <th>#</th>
                            <th>Игра</th>
                            <th>Время</th>
                            <th>Тип</th>
                            <th>Карта</th>
                            <th>Игроков</th>
                            <th>Ставка</th>
                            </thead>

                        </table>
                        <div class="right-align-element-div">
                            <button type="button" class=" btn btn-success" id="getGames">Обновить</button>
                        </div>
                    </div>
                </div>

                <div class="sec-container">
                    <div class="article">
                        <h3>Список идущих игр:</h3>
                        {{--<p class="right-align-element"><a class=" btn btn-default" href="/csgo/createroom" role="button">Создать комнату</a></p>--}}
                    </div>
                    <div id="containerGamesPlaying" class="sec-container-text">
                        <table id="listGamesPlaying" class="table table-hover">
                            <thead>
                            <th>#</th>
                            <th>Игра</th>
                            <th>Время</th>
                            <th>Тип</th>
                            <th>Карта</th>
                            <th>Игроков</th>
                            <th>Смотреть</th>
                            </thead>
                        </table>
                        <div class="right-align-element-div">
                            <button type="button" class=" btn btn-success" id="getGamesPlaying">Обновить</button>
                        </div>
                    </div>
                </div>

                <div class="sec-container">
                    <div class="article">
                        <h3>Список последних завершенных игр:</h3>
                        {{--<p class="right-align-element"><a class=" btn btn-default" href="/csgo/createroom" role="button">Создать комнату</a></p>--}}
                    </div>
                    <div id="containerGamesPlayed" class="sec-container-text">
                        <table id="listGamesPlayed" class="table table-hover">
                            <thead>
                            <th>#</th>
                            <th>Игра</th>
                            <th>Время</th>
                            <th>Тип</th>
                            <th>Карта</th>
                            <th>Игроков</th>
                            <th>Победитель</th>
                            </thead>

                        </table>
                        <div class="right-align-element-div">
                            <button type="button" class=" btn btn-success" id="getGamesPlayed">Обновить</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-footer">
                <label>Copyright © 2016 - The Game Club. All rights reserved.</label>
            </div>


            <div id="particles" style="display: block;">
                <canvas class="pg-canvas" width="260" height="643">

                </canvas>
            </div>

        </main>

        <table class="test" width="100%">
            <tbody>

            </tbody>
        </table>

    </div>

    <script type="text/javascript">
         function init() {
         $.get('getGames',function (data) {
             var table = document.getElementById('listGames');
             while(table.childNodes[0]){
                 table.removeChild(table.childNodes[0]);
             }
             $('#listGames').append(data);
         })

             $.get('getGamesPlaying',function (data) {
                 var table = document.getElementById('listGamesPlaying');
                 while(table.childNodes[0]){
                     table.removeChild(table.childNodes[0]);
                 }
                 $('#listGamesPlaying').append(data);
             })

             $.get('getGamesPlayed',function (data) {
                 var table = document.getElementById('listGamesPlayed');
                 while(table.childNodes[0]){
                     table.removeChild(table.childNodes[0]);
                 }
                 $('#listGamesPlayed').append(data);
             })
     }


     $(document).ready(function () {
         $('#getGames').click(function(){
             $.get('getGames',function (data) {
                 var table = document.getElementById('listGames');
                 while(table.childNodes[0]){
                     table.removeChild(table.childNodes[0]);
                 }
                 $('#listGames').append(data);
             })
         })
     })

         $(document).ready(function () {
             $('#getGamesPlaying').click(function(){
                 $.get('getGamesPlaying',function (data) {
                     var table = document.getElementById('listGamesPlaying');
                     while(table.childNodes[0]){
                         table.removeChild(table.childNodes[0]);
                     }
                     $('#listGamesPlaying').append(data);
                 })
             })
         })

         $(document).ready(function () {
             $('#getGamesPlayed').click(function(){
                 $.get('getGamesPlayed',function (data) {
                     var table = document.getElementById('listGamesPlayed');
                     while(table.childNodes[0]){
                         table.removeChild(table.childNodes[0]);
                     }
                     $('#listGamesPlayed').append(data);
                 })
             })
         })
    </script>

    {{--<script>--}}
        {{--// ЭТО ТО ЧТО МЫ ОБРАБАТЫВАЕМ Т.Е РЕЗУЛЬТАТ ОТВЕТА СЕРВЕРА СМОТРИМ Файл Result.PHP--}}
        {{--function showContent(link) {--}}
            {{--var cont = document.getElementById('contentBody');--}}
            {{--var loading = document.getElementById('loading');--}}
            {{--//cont.innerHTML = loading.innerHTML;--}}
            {{--var http = createRequestObject();				// создаем ajax-объект--}}
            {{--if( http ) {--}}
                {{--http.open('get', link);					// инициируем загрузку страницы--}}
                {{--http.onreadystatechange = function () {			// назначаем асинхронный обработчик события--}}
                    {{--if(http.readyState == 4) {--}}
                        {{--cont.innerHTML = http.responseText;	// присваиваем содержимое--}}
                    {{--}--}}
                {{--}--}}
                {{--http.send(null);--}}
            {{--} else {--}}
                {{--document.location = link;	// если ajax-объект не удается создать, просто перенаправляем на адрес--}}
            {{--}--}}
        {{--}--}}

        {{--// создание ajax объекта--}}
        {{--function createRequestObject() {--}}
            {{--try { return new XMLHttpRequest() }--}}
            {{--catch(e) {--}}
                {{--try { return new ActiveXObject('Msxml2.XMLHTTP') }--}}
                {{--catch(e) {--}}
                    {{--try { return new ActiveXObject('Microsoft.XMLHTTP') }--}}
                    {{--catch(e) { return null; }--}}
                {{--}--}}
            {{--}--}}
        {{--}--}}
    {{--</script>--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery.particleground.js"></script>
    <script type="text/javascript" src="/js/magicline.js"></script>

    <script>
        $(document).ready(function() {
            $('#particles').particleground({
                dotColor: '#2B99BB',
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