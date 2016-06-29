@section('calss-button')

@endsection

@section('content')

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
        <link rel="stylesheet" type="text/css" media="screen, print, projection" href="/css/createroom.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script type="text/javascript" src="/js/jquery-3.0.0.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    </head>
    <body onload="init()">
    <div id="page-homepage">
        <div class="navbar-wrapper">
            <div class="navbar-collapse collapse">
                <div class="nav-bar-bg">
                    <ul id="main-nav">
                        <li @yield('home')>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <main>
            <div class="first">
            </div>
            <div class="wrapper">
            </div>
            <div class="main-container">
                <div class="sec-container">
                    <div class="article">
                        <h3>Комната: <span class="green-text">{{ $name }}</span></h3>
                        <p class="right-align-element"><a class=" btn btn-default" href="/csgo" role="button">Выйти из комнаты</a></p>
                    </div>
                    <div class="sec-container-text">
                        <p>Номер комнаты:<span class="green-text">{{$id}}</span></p>
                        <p>Пароль:<span class="green-text">{{$password}}</span></p>
                        <p>Всего мест:<span class="green-text">{{$players}}</span></p>
                        <p>Раундов:<span class="green-text">{{$rounds}}</span></p>
                        <p>Карта:<span class="green-text">{{$map}}</span></p>
                        <p>Ставка:<span class="green-text">{{$rate}}</span></p>
                    </div>
                </div>
                <div class="sec-container">
                        <div class="article">
                                <form method="POST" action="/csgo/claim/{{$id}}">
                                    <h3>Меню комнаты:</h3>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <p class="right-align-element">
                                        @if(Server::isThisRoom(Auth::user()->id,$id))
                                            <input type="hidden" name="val" value="cancel">
                                            <button id="invite" type="submit" class="btn btn-warning">Отменить заявку</button>
                                        @else
                                            <input type="hidden" name="val" value="send">
                                            <button id="invite" type="submit" class="btn btn-success">Подать заявку</button>
                                        @endif

                                    </p>
                            </form>
                        </div>
                    <form action="" method="POST">
                        <div class="sec-container-text">
                            <div class="row">
                                <div id="firstcolum" class="col-xs-6"></div>
                                <div id="secondcolum" class="col-xs-6"></div>


                            </div>
                        </div>
                    </form>
                    <div class="sec-container-text">
                        <div class="row">
                            <div id="firstcolum" class="col-xs-6"></div>
                            <div id="secondcolum" class="col-xs-6"></div>
                            <div id="chat" class="col-xs-12 col-md-8">


                                <form id="ChatInputFild" class="form-inline">
                                    <div class="form-group has-success">
                                        <input type="text" class="form-control">
                                        <button type="submit" class="btn btn-default">Отправить</button>
                                    </div>
                                </form>
                            </div>
                            <div id="listplayers" class="col-xs-4 col-md-3">
                                <p class="green-text margin-bottom-zero">Список заявок:</p>
                                {!! Server::printListPlayers($id) !!}
                            </div>



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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

    <script type="text/javascript" src="/js/jquery.particleground.js"></script>
    <script type="text/javascript" src="/js/magicline.js"></script>

    <script type="text/javascript">
        var a = '{{$players}}';
        var rows = a / 2;

        function init()
        {
            var temp = 1;
            var str='';
            while (temp <= rows){
                str = str + '<div class="form-group">' +
                        '<label for="leftcol'+temp+'" class="blue-text">Player '+temp+'</label>' +
                        '<select onchange="change()" id="leftcol'+temp+'" class="form-control">' +
                        '<option>Player</option>' +
                        '</select>' +
                        '</div>';
                temp++;
            }
            document.getElementById('firstcolum').innerHTML = str;

            var temp = 1;
            var str='';
            while (temp <= rows){
                str = str + '<div class="form-group">' +
                        '<label for="rightcol'+temp+'" class="red-text">Player '+temp+'</label>' +
                        '<select id="rightcol'+temp+'" class="form-control">' +
                        '<option>Player</option>' +
                        '</select>' +
                        '</div>';
                temp++;
            }
            document.getElementById('secondcolum').innerHTML = str;

        }



    </script>
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