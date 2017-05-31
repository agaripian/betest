<?php

/* @var \Codeception\Scenario $scenario */

$sample_image = [
  'name'        => 'test name',
  'description' => 'sample description',
  'url'         => 'http://test.com',
];

// get all images of a user
$guy = new TestGuy($scenario);
$guy->wantTo('Upload an Image for a user');
$guy->haveHttpHeader('auth_token', '123');
$guy->sendPost('/protected/user/1/addimage', $sample_image);

$guy->seeResponseCodeIs(201);
$guy->seeResponseIsJson();
$guy->seeResponseContainsJson($sample_image);
