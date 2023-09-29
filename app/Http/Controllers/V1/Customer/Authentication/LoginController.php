<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Authentication\LoginRequest;
use Domain\Customer\Actions\Authentication\LoginAction;
use Symfony\Component\HttpFoundation\JsonResponse;

final class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        // Execute the login action and return the resource
        return LoginAction::execute(
            data: $request->validated()
        );
    }
}
