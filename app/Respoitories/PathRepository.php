<?php

namespace App\Respoitories;

use App\Bundle;
use App\Segment;
use App\Street;
use App\Trip;
use App\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class PathRepository
{
    public static function parseCollection(string $source, string $destination, User $user, string $via = null)
    {
        $baseUrl = config('external.url') . 'get_best_path';
        $options = [
            'source' => $source,
            'destination' => $destination,
        ];

        if ($via) {
            $options['via'] = $via;
        }

        $paths = WebRequest::postJson($baseUrl, $options)->paths;

        $bundle = Bundle::make([
            'source' => $source,
            'destination' => $destination
        ]);

        $user->bundles()->save($bundle);

        foreach ($paths as $segments) {
            $parsedSegment = self::parseSegment($segments->segments);

            $trip = Trip::make([
                'source' => $source,
                'destination' => $destination,
                'preferred' => $segments->label === 'Recommended',
                'score' => $parsedSegment->sum('score'),
                'bundle_id' => $bundle->id
            ]);
            $user->trips()->save($trip);
            $trip->segments()->saveMany($parsedSegment);

            $trips[] = $trip;
        }

        return $trips;
    }

    public static function parseSegment($segments)
    {
        $faker = Faker::create();

        foreach ($segments as $segment) {

            $street = Street::firstOrCreate(
                ['name' => $segment->street_name],
                ['score' => $faker->numberBetween(-2, 10)]
            );

            $parsedSegments[] = Segment::make([
                'streetname' => $segment->street_name,
                'score' => $street->score,
                'polyline' => $segment->polyline,
                'street_id' => $street->id
            ]);
        }

        return collect($parsedSegments);
    }
}