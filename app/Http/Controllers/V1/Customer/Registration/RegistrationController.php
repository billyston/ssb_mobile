<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Registration;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Registration\RegistrationRequest;
use Domain\Customer\Actions\Registration\RegistrationAction;
use Domain\Customer\DTO\Registration\CustomerDTO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request): JsonResponse
    {
        // Create the customer
        $customer_created = RegistrationAction::execute(
            request: $request->validated(),
        );

        // Dispatch customerCreatedEvent
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Registration in progress. You will be notified shortly.',
            data: CustomerDTO::toArray(customer: $customer_created)
        );
    }
}
