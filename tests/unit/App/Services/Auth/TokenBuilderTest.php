<?php

use App\Services\Auth\TokenBuilder;

class TokenBuilderTest extends \Codeception\Test\Unit
{
    public function testShouldReturnJwtTokenAsString()
    {
        $builder = new TokenBuilder();

        $this->assertTrue(is_string($builder->toString()));
    }
}
