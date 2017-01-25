<?php

namespace App\Services\Auth;

use Dotenv\Dotenv;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class TokenGenerator
{
    private $configuration;
    private $userId;
    private $context;

    public function __construct(TokenBuilder $config)
    {
        $this->configuration = $config;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setContext($context)
    {
        $this->context = $context;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function getToken()
    {
        $signer = new Sha256();

        return $this->configuration->setIssuer(getenv('APP_URL'))
                    ->setAudience(getenv('APP_URL'))
                    ->setId($this->getUserId(), true)
                    ->setIssuedAt(time())
                    ->set('context', $this->getContext())
                    ->sign($signer, 'testing')
                    ->toString();
    }
}
