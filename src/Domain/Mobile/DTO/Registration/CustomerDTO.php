<?php

declare(strict_types=1);

namespace Domain\Mobile\DTO\Registration;

use Domain\Mobile\Models\Customer;

final class CustomerDTO
{
    public static function toArray(
        Customer $customer,
    ): array {
        return [
            // Resource type and id
            'type' => 'Customer',
            'id' => data_get(
                target: $customer,
                key: 'id'
            ),

            // Resource exposed attributes
            'attributes' => [
                'resource_id' => data_get(
                    target: $customer,
                    key: 'resource_id'
                ),
                'first_name' => data_get(
                    target: $customer,
                    key: 'first_name'
                ),
                'last_name' => data_get(
                    target: $customer,
                    key: 'last_name'
                ),
                'phone_number' => data_get(
                    target: $customer,
                    key: 'phone_number'
                ),
                'email' => data_get(
                    target: $customer,
                    key: 'email'
                ),
                'status' => data_get(
                    target: $customer,
                    key: 'status'
                ),
            ],
        ];
    }
}