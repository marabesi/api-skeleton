<?php

namespace App\Tests\Acept;

use \TestCase;

class ApiStructureCept extends TestCase {

    public function apiIsUpAndRunning(\AcceptanceTester $I)
    {
        $token = '123456';

        $I->wantTo('make sure the api structure is up and running');
        $I->sendGET('/?token=' . $token);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":false,"message":"Welcome to your API!"}');
    }

    public function deleteAresource(\AcceptanceTester $I)
    {
        $token = '123456';

        $I->wantTo('make a DELETE request');
        $I->sendDELETE('/?token=' . $token);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":false,"message":"YAY I can delete it!"}');
    }

    public function updateAresource(\AcceptanceTester $I)
    {
        $token = '123456';

        $I->wantTo('make a PUT request');
        $I->sendPUT('/?token=' . $token);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":false,"message":"Updating you data!"}');
    }

    public function postAresource(\AcceptanceTester $I)
    {
        $token = '123456';

        $I->wantTo('make a POST request');
        $I->sendPOST('/?token=' . $token, ['data' => 'value1']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":false,"message":"Posting you data!","data":"value1"}');
    }
}
