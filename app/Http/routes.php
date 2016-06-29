<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//use DB;

Route::get('/', function () {
    return view('welcome');
});

//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);


Route::post('csgo/claim/{id}', 'RoomviewcreatorController@joincancel');

Route::get('/csgo', ['as' => 'csgo', 'uses' => 'CsgoController@index']);

Route::get('/getGames', function()
{

    if(Request::ajax()){
        $result = DB::select('select * from games where result < ?',[0]);
        $out = '';
        $out = $out."<thead>
                            <th>#</th>
                            <th>Игра</th>
                            <th>Время</th>
                            <th>Тип</th>
                            <th>Карта</th>
                            <th>Игроков</th>
                            <th>Ставка</th>
                            <th>Присоединиться</th>
                            </thead>";
        foreach ($result as $row){
            $type='';
            if ($row->type==1)
            {
                $type = "classic";
            }else
            {
                $type = "undefined";
            }
            $time = strtotime($row->date);
            $newformat = date('H:i:s',$time);

            $out = $out."<tr>";
            $out = $out."<td>".$row->id."</td>";
            $out = $out."<td><span class=\"green-text\">".$row->name."</span></td>";
            $out = $out."<td>".$newformat."</td>";
            $out = $out."<td>".$type."</td>";
            $out = $out."<td>".$row->map."</td>";
            $out = $out."<td>".$row->players."</td>";
            $out = $out."<td>".$row->rate." RUB</td>";
            $out = $out."<td><a class=\"btn btn-default\" href=\"csgo/roomview/".$row->id."\" role=\"button\">Присоединиться</a></td>";
            $out = $out."</tr>";
        }
        return $out;
    }
    return redirect('/csgo');
});

Route::get('/getGamesPlaying', function()
{

    if(Request::ajax()){
        $result = DB::select('select * from games where result = ? ',[0]);
        $out = '';
        $out = $out."<thead>
                            <th>#</th>
                            <th>Игра</th>
                            <th>Время</th>
                            <th>Тип</th>
                            <th>Карта</th>
                            <th>Игроков</th>
                            <th>Ставка</th>
                            <th>Смотреть</th>
                            </thead>";
        foreach ($result as $row){
            $type='';
            if ($row->type==1)
            {
                $type = "classic";
            }else
            {
                $type = "undefined";
            }
            $time = strtotime($row->date);
            $newformat = date('H:i:s',$time);

            $out = $out."<tr>";
            $out = $out."<td>".$row->id."</td>";
            $out = $out."<td><span class=\"green-text\">".$row->name."</span></td>";
            $out = $out."<td>".$newformat."</td>";
            $out = $out."<td>".$type."</td>";
            $out = $out."<td>".$row->map."</td>";
            $out = $out."<td>".$row->players."</td>";
            $out = $out."<td>".$row->rate." RUB</td>";
            $out = $out."<td><form method=\"POST\" action=\"csgo/\">
            <input type=\"hidden\" name = \"roomid\" value=\"".$row->id."\">
            <button type=\"submit\" class=\"btn btn-default btn-xs\">Смотреть</button>
            </form></td>";
            $out = $out."</tr>";
        }
        return $out;
    }
});

Route::get('/getGamesPlayed', function()
{

    if(Request::ajax()){
        $result = DB::select('select * from games where result > ?  order by id DESC limit 10 ',[0]);
        $out = '';
        $out = $out."<thead>
                            <th>#</th>
                            <th>Игра</th>
                            <th>Время</th>
                            <th>Тип</th>
                            <th>Карта</th>
                            <th>Игроков</th>
                            <th>Ставка</th>
                            <th>Победитель</th>
                            </thead>";
        foreach ($result as $row){
            $type='';
            if ($row->type==1)
            {
                $type = "classic";
            }else
            {
                $type = "undefined";
            }
            $time = strtotime($row->date);
            $newformat = date('H:i:s',$time);
            $winner ="";
            if ($row->result==2)
            {
                $winner = "<span class=\"red-text\">T</span>span>";
            }else if ($row->result==3)
            {
                $winner = "<span class=\"blue-text\">CT</span>span>";
            }else
            {
                $winner = "Ошибка";
            }


            $out = $out."<tr>";
            $out = $out."<td>".$row->id."</td>";
            $out = $out."<td><span class=\"green-text\">".$row->name."</span></td>";
            $out = $out."<td>".$newformat."</td>";
            $out = $out."<td>".$type."</td>";
            $out = $out."<td>".$row->map."</td>";
            $out = $out."<td>".$row->players."</td>";
            $out = $out."<td>".$row->rate." RUB</td>";
            $out = $out."<td>".$winner."</td>";
            $out = $out."</tr>";
        }
        return $out;
    }
});

Route::get('/dota', ['as' => 'dota', 'uses' => 'DotaController@index']);

Route::get('/lol', ['as' => 'lol', 'uses' => 'LolController@index']);

Route::get('/hearthstone', ['as' => 'hearthstone', 'uses' => 'HearthstoneController@index']);

Route::get('csgosteamlogin', 'AuthController@logincsgo');

Route::get('/csgo/createroom',  'CreateroomController@index');

Route::post('/csgo/createroom', 'CreateroomController@createroom');

Route::get('/csgo/faq',  ['as' => 'faq', 'uses' => 'FaqController@index']);

Route::get('/csgo/reports',  ['as' => 'reports', 'uses' => 'ReportsController@index']);

Route::get('/csgo/tournaments',  ['as' => 'tournaments', 'uses' => 'TournamentsController@index']);

Route::get('csgologout', 'AuthController@logoutcsgo');

Route::get('csgo/roomviewcreator/{id}', 'RoomviewcreatorController@index');

Route::get('csgo/roomview/{id}', 'RoomviewController@index');

Route::get('csgo/roomviewcreator/delete/{id}', 'RoomviewcreatorController@delete');

//Route::post('/csgo/roomredirect', 'RoomviewController@redirectroom');