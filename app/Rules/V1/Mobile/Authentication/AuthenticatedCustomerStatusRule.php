<?php

declare(strict_types=1);

namespace App\Rules\V1\Mobile\Authentication;

use Closure;
use Domain\Mobile\Enums\CustomerStatus;
use Domain\Mobile\Models\Customer;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

final class AuthenticatedCustomerStatusRule implements ValidationRule
{
    public function validate(
        string $attribute,
        mixed $value,
        Closure $fail,
    ): void {
        // Fetch the customer status
        $status = Customer::query()
            ->where([['email', '=', Auth::user()['email']]])
            ->first(columns: 'status');

        // Validation conditions
        if (data_get(target: $status, key: 'status') !== CustomerStatus::Active->value) {
            $fail('This account is '.$status['status'].'.');
        }
    }
}