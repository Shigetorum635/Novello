<?php

$requires = [

    $_SERVER['DOCUMENT_ROOT'] . '/autoloader.php',

];

foreach ($requires as $require) {

    require_once $require;
}
/**
 * Rules:
 * · Do not name two routes the same way.
 *  ex: /user/$id and /user/something, since all routes will end up on the $id one.
 *  alternative: /user/profile/$id and /user/something
 * 
 * I spent 2 hours and a half trying to figure out why the fucking curl was
 * not working on the post request then i realized i am a dumbass. - Carlos.
 */

Routes::get('/welcome', 'API/welcome.php');
Routes::get('/user/profile/$id', 'API/user.php');
Routes::post('/user/something', 'API/friend.php');
Routes::get('/', '/API/welcome.php');
echo "hi";
