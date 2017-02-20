<?php

namespace App\Controllers;

use App\Controller;
use App\Entities\User;
use DDesrosiers\SilexAnnotations\Annotations as SLX;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @SLX\Controller(prefix="/")
 */
class SignUp extends Controller
{

    /**
     * @SLX\Route(
     *      @SLX\Request(method="POST", uri="signup")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function postIndex(Request $request)
    {
        $entityManager = $this->getEntityManager();

        $repository = $entityManager->getRepository(User::class);

        $findUser = $repository->findBy(['email' => $request->get('email')]);

        if (count($findUser) != 0) {
            return new JsonResponse([
                'error' => false,
                'message' => 'User already exists',
            ], 409);
        }

        $user = new User();
        $user->setEmail($request->get('email'));
        $user->setPassword($request->get('password'));

        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse([
            'id' => $user->getId(),
            'error' => false,
            'message' => 'User has been created successfully',
        ]);
    }
}
