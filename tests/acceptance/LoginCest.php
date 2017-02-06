<?php

namespace App\Tests\Acceptance;

class LoginCest {

    public function shouldGetJWTToken(\AcceptanceTester $I)
    {
        $I->wantTo('I want to login and get a JWT token');
        $I->sendPOST('/login', ['email' => '', 'password' => '']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{}');
    }
}
