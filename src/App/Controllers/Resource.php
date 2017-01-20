<?php

namespace App\Controllers;

use DDesrosiers\SilexAnnotations\Annotations as SLX;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @SLX\Controller(prefix="/")
 */
class Resource
{
    /**
     * @SLX\Route(
     *      @SLX\Request(method="GET", uri="")
     * )
     */
    public function index()
    {
        return new JsonResponse([
            'error' => false,
            'message' => 'Welcome to your API!',
        ]);
    }

    /**
     * @SLX\Route(
     *      @SLX\Request(method="DELETE", uri="")
     * )
     */
    public function delete()
    {
        return new JsonResponse([
            'error' => false,
            'message' => 'YAY I can delete it!',
        ]);
    }

    /**
     * @SLX\Route(
     *      @SLX\Request(method="POST", uri="")
     * )
     */
    public function post(Request $request)
    {
        return new JsonResponse([
            'error' => false,
            'message' => 'Posting you data!',
            'data' => $request->get('data'),
        ]);
    }

    /**
     * @SLX\Route(
     *      @SLX\Request(method="PUT", uri="")
     * )
     */
    public function put()
    {
        return new JsonResponse([
            'error' => false,
            'message' => 'Updating you data!',
        ]);
    }

}
