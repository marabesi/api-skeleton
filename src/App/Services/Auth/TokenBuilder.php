<?php

namespace App\Services\Auth;

use Lcobucci\JWT\Builder;

class TokenBuilder extends Builder
{
    public function toString()
    {
        $token = parent::getToken();

        ob_start();

        echo $token;

        $stringToken = ob_get_contents();

        ob_end_flush();

        return $stringToken;
    }
}
