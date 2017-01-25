<?php 
$I = new ApiTester($scenario);
$I->wantTo('I want to login and get a JWT token');
$I->sendPOST('/login', ['email' => '', 'password' => '']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseContains('{}');
