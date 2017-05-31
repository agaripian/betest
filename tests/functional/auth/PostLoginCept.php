<?php

/* @var \Codeception\Scenario $scenario */

$guy = new TestGuy($scenario);
$guy->wantTo('authenticate a user');
$guy->sendPOST('/auth/login', [
    'user_name' => 'bob@bob.com',
    'password' => 'bob',
]);
$guy->seeResponseCodeIs(200);
$guy->seeResponseIsJson();
$guy->seeResponseMatchesJsonType([
    'auth_token'   => 'string:regex(/.{16}/)',
    'user_id' =>  'integer',
]);
