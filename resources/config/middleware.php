<?php

use Symfony\Component\HttpFoundation\Request;

$exception = [
    '/login',
    '/signup',
];

$app->before(function (Request $request) use ($exception) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }

    if (! $request->get('token') && !in_array($request->getRequestUri(), $exception)) {
        throw new \Exception('Could not find the token');
    }
});
