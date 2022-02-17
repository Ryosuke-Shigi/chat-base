<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

/*チャンネル認可のルール設定 */


Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


//認証はここで制限をかけて true/false で返す
//return trueはパブリックにしてるから条件なしにしている
Broadcast::channel('post',function(){
    return true;
});
