<?php

namespace App\Respoitories;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class StreetNameRepository
{
    protected $baseUrl;

    public static function nearestRoadForPlace(float $latitude, float $longitude): String
    {
        $baseUrl = 'https://roads.googleapis.com/v1/nearestRoads';

        $options = [
            'points' => $latitude . ',' . $longitude,
            'key'    => config('maps.key')
        ];

        $json = WebRequest::getJson($baseUrl, $options);

        if (property_exists($json, 'snappedPoints')) {
            return $json->snappedPoints[0]->placeId;
        } else {
            return 'ChocolatePudding';
        }

    }

    public static function streetNameForPlaceId(string $placeId)
    {
        if ($placeId === 'ChocolatePudding') {
            return [
                'streetname' => 'ChocolatePudding',
                'city'       => 'Sugarworld'
            ];
        }

        $baseUrl = 'https://maps.googleapis.com/maps/api/place/details/json';

        $options = [
            'placeid' => $placeId,
            'key'     => config('maps.key')
        ];

        $json = WebRequest::getJson($baseUrl, $options);

        $components = collect($json->result->address_components);

        $streetComponent = $components->filter(function ($component) {
            return collect($component->types)->contains('route');
        });

        $cityComponent = $components->filter(function ($component) {
            return
                collect($component->types)->contains('locality')
                || collect($component->types)->contains('postal_town');
        });

        return [
            'streetname' => $streetComponent->first()->long_name,
            'city'       => $cityComponent->first()->long_name
        ];
    }

    public static function streetName(float $latitude, float $longitude)
    {
        $placeId = self::nearestRoadForPlace($latitude, $longitude);
        return self::streetNameForPlaceId($placeId);
    }
}