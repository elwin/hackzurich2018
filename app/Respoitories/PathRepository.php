<?php

namespace App\Respoitories;

use App\Segment;
use Illuminate\Http\Request;

class PathRepository
{
    public static function parse(string $source, string $destination)
    {
        $baseUrl = config('external.url') . 'get_best_path';
        $options = [
            'source' => $source,
            'destination' => $destination,
        ];

        $segments = WebRequest::postJson($baseUrl, $options);

        dd($segments);

        foreach ($segments->segments as $segment) {
            $parsedSegments[] = Segment::make([
                'streetname' => $segment->street_name,
                'score' => 5,
                'polyline' => $segment->polyline
            ]);
        }

        return $parsedSegments;
    }
}