<?php 

namespace App\Tests\Acept;

use \TestCase;

class SignUpCept extends TestCase {

    public function apiIsUpAndRunning(\AcceptanceTester $I)
    {
        $I->wantTo('I want register a new account to use');
        $I->sendPOST('/signup', [
            'name' => 'user one',
            'email' => 'one@one.com.br',
            'password' => '123456'
        ]);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->canSeeResponseContains('User has been created successfully');
    }
}
