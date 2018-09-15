<?php

namespace App\Respoitories;


use GuzzleHttp\Client;

class MapsRepository
{
    protected $baseUrl;

    public static function nearestRoadForPlace(float $latitude, float $longitude): String
    {
        $baseUrl = 'https://roads.googleapis.com/v1/nearestRoads';

        $options = [
            'points' => $latitude . ',' . $longitude
        ];

        $json = WebRequest::getJson($baseUrl, $options);

        return $json->snappedPoints[0]->placeId;
    }

    public static function streetNameForPlaceId(string $placeId)
    {
        $baseUrl = 'https://maps.googleapis.com/maps/api/place/details/json';

        $options = [
            'placeid' => $placeId
        ];

        $json = WebRequest::getJson($baseUrl, $options);

        return $json->result->name;
    }

    public static function streetName(float $latitude, float $longitude)
    {
        $placeId = self::nearestRoadForPlace($latitude, $longitude);
        return self::streetNameForPlaceId($placeId);
    }
}