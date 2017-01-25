<?php 
$I = new ApiTester($scenario);
$I->wantTo('I want register a new account to use');
$I->sendPOST('/signup', [
    'name' => 'user one',
    'email' => 'one@one.com.br',
    'password' => '123456'
]);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->canSeeResponseContains('User has been created successfully');
