<?php

use App\Services\Auth\TokenGenerator;
use App\Services\Auth\TokenBuilder;
use Lcobucci\JWT\Parser;

class TokenGeneratorTest extends \Codeception\Test\Unit
{
    protected $tokenGenerator;

    protected function _before()
    {
        $this->tokenGenerator = new TokenGenerator(new TokenBuilder());
    }

    protected function _after()
    {
        $this->tokenGenerator = null;
    }

    public function testShouldCreateAvalidTokenToBeUsed()
    {
        $this->tokenGenerator->setUserId(1);
        $this->tokenGenerator->setContext(['role' => 'admin']);

        $new = $this->tokenGenerator->getToken();

        $token = (new Parser())->parse((string) $new);

        $this->assertEquals(1, $token->getClaim('jti'));
    }
}
