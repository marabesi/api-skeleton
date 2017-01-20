<?php
$I = new ApiTester($scenario);
$I->wantTo('make sure the api structure is up and running');
$I->sendGET('/');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseContains('{"error":false,"message":"Welcome to your API!"}');

$I = new ApiTester($scenario);
$I->wantTo('make a DELETE request');
$I->sendDELETE('/');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseContains('{"error":false,"message":"YAY I can delete it!"}');

$I = new ApiTester($scenario);
$I->wantTo('make a PUT request');
$I->sendPUT('/');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseContains('{"error":false,"message":"Updating you data!"}');

$I = new ApiTester($scenario);
$I->wantTo('make a POST request');
$I->sendPOST('/', ['data' => 'value1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseContains('{"error":false,"message":"Posting you data!","data":"value1"}');

