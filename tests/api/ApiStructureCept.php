<?php

$token = '123456';

$I = new ApiTester($scenario);
$I->wantTo('make sure the api structure is up and running');
$I->sendGET('/?token=' . $token);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseContains('{"error":false,"message":"Welcome to your API!"}');

$I = new ApiTester($scenario);
$I->wantTo('make a DELETE request');
$I->sendDELETE('/?token=' . $token);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseContains('{"error":false,"message":"YAY I can delete it!"}');

$I = new ApiTester($scenario);
$I->wantTo('make a PUT request');
$I->sendPUT('/?token=' . $token);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseContains('{"error":false,"message":"Updating you data!"}');

$I = new ApiTester($scenario);
$I->wantTo('make a POST request');
$I->sendPOST('/?token=' . $token, ['data' => 'value1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseContains('{"error":false,"message":"Posting you data!","data":"value1"}');
