<?php

use Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

require __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();

// todo validation attributes
$data = $request->all();
$validator = new \Validation\Validator($data, [
    'test' => [new \Validation\Rules\NumericRule(), new \Validation\Rules\BooleanRule()]
]);

$passes = $validator->passes();

$response = new JsonResponse();

if (!$passes) {
    $messages = $validator->getErrorMessages();

    $response->setStatusCode(422);
    $response->setData(['messages' => $messages]);
} else {
    $response->setStatusCode(200);
    $response->setData(['result' => true]);
}

$response->prepare($request);
$response->send();
