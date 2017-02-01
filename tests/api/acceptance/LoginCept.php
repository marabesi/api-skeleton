<?php

namespace App\Tests\Acept;

use \TestCase;

class LoginCept extends TestCase {

    public function apiIsUpAndRunning(\AcceptanceTester $I)
    {
        $I->wantTo('I want to login and get a JWT token');
        $I->sendPOST('/login', ['email' => '', 'password' => '']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{}');
    }
}
