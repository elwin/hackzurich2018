<?php

namespace App\Respoitories;

use App\Enums\ScoreType;
use App\Trip;
use App\User;

class ScoreRepository
{
    public static function completeTrip(Trip $trip)
    {
        $trip->score = $trip->points->map(function ($item) {
            return $item->speed > $item->avgSpeed ?
                ScoreType::PUNISHMENT : ScoreType::REWARD;
        })->sum();

        $user = $trip->user;
        $user->increment('score', $trip->score);

        return $trip;
    }

    public static function calculateUserScore(User $user)
    {

    }
}