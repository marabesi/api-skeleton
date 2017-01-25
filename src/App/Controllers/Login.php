<?php

namespace App\Controllers;

use App\Controller;
use DDesrosiers\SilexAnnotations\Annotations as SLX;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @SLX\Controller(prefix="/")
 */
class Login extends Controller
{

    /**
     * @SLX\Route(
     *      @SLX\Request(method="POST", uri="login")
     * )
     */
    public function index(Request $request)
    {
        return new JsonResponse();
    }
}
