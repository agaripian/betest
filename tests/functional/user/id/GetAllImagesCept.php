<?php

/* @var \Codeception\Scenario $scenario */

// get all images of a user
$guy = new TestGuy($scenario);
$guy->wantTo('Get All Images for a user');
$guy->sendGET('/public/user/1/getallimages');
$guy->seeResponseCodeIs(200);
$guy->seeResponseIsJson();
$guy->seeResponseContainsJson([
    [
      'url' => 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/a3a2cf47122431.587108a34d3f8.jpg',
      'name' => 'sun',
      'description' => 'Bright Sun',
      'userid' => 1,
    ],

    [
      'url' => 'https://mir-s3-cdn-cf.behance.net/project_modules/1400/6f963e52031945.590201b690882.jpg',
      'name' => 'Phone',
      'description' => 'Phone Flame Burner',
      'userid' => 1,
    ]
]);
