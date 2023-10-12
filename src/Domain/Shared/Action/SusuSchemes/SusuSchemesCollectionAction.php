<?php

declare(strict_types=1);

namespace Domain\Shared\Action\SusuSchemes;

use Illuminate\Support\Facades\Http;

final class SusuSchemesCollectionAction
{
    public static function execute(): array
    {
        // Get susu schemes from Cache or

        // Get Schemes from ssb_susu_service
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->get(
            url: env(key: 'SSB_SUSU').'schemes',
        )->json();
    }
}
