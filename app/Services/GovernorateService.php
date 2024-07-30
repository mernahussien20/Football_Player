<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
class GovernorateService
{
  

    protected $url = 'https://raw.githubusercontent.com/Tech-Labs/egypt-governorates-and-cities-db/master/governorates.json';

    public function getGovernorates()
    {
        $response = Http::get($this->url);

        if ($response->successful()) {
            $data = $response->json();
            
            // Extract only the data array
            $governoratesData = collect($data)->firstWhere('type', 'table')['data'];

            // Extract only the Arabic governorates
            $arabicGovernorates = array_map(function ($item) {
                return $item['governorate_name_ar'] ?? null;
            }, $governoratesData);

            // Filter out null values
            $arabicGovernorates = array_filter($arabicGovernorates);

            return $arabicGovernorates;
        }

        return [];
    }
}