<?php 

namespace App\Tests\Acceptance;

use AppTestCase;

class SignUpTest extends AppTestCase {

    public function testShouldSignUp()
    {
         $client = $this->createClient();
         $client->request('POST', '/signup',  [
            'token' => '244',
            'name' => 'user one',
            'email' => 'one@one.com.br',
            'password' => '123456'
        ]);

        $this->assertEquals(200, $client->getResponse()->getContent());
    }
}
