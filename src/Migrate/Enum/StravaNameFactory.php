<?php

declare(strict_types=1);

namespace EndomondoMv\Migrate\Enum;

use EndomondoMv\Exception\EndomondoMapException;
use Fabulator\Endomondo\WorkoutType;

class StravaNameFactory
{
    private static $mapIdToName = [
        WorkoutType::RUNNING  => StravaActivityType::RUN,
        WorkoutType::CYCLING_TRANSPORT  => StravaActivityType::RIDE,
        WorkoutType::CYCLING_SPORT  => StravaActivityType::RIDE,
        WorkoutType::MOUNTAIN_BIKINGS  => StravaActivityType::RIDE,
        WorkoutType::SKATING  => StravaActivityType::ROLLER_SKI,
        WorkoutType::ROLLER_SKIING  => StravaActivityType::ROLLER_SKI,
        WorkoutType::SKIING_CROSS_COUNTRY  => StravaActivityType::NORDIC_SKI,
        WorkoutType::SKIING_DOWNHILL  => StravaActivityType::ALPINE_SKI,
        WorkoutType::SNOWBOARDING  => StravaActivityType::SNOWBOARD,
        WorkoutType::KAYAKING  => StravaActivityType::KAYAKING,
        WorkoutType::KITE_SURFING => StravaActivityType::KIETSURF,
        WorkoutType::ROWING => StravaActivityType::ROWING,
        WorkoutType::SAILING => StravaActivityType::SAIL,
        WorkoutType::WINDSURFING => StravaActivityType::WINDSURF,
        WorkoutType::FINTESS_WALKING => StravaActivityType::WALK,
        WorkoutType::GOLFING => StravaActivityType::GOLF,
        WorkoutType::HIKING => StravaActivityType::HIKE,
        WorkoutType::ORIENTEERING => StravaActivityType::WORKOUT,
        WorkoutType::WALKING => StravaActivityType::WALK,
        WorkoutType::RIDING => StravaActivityType::WORKOUT,
        WorkoutType::SWIMMING => StravaActivityType::SWIM,
        WorkoutType::CYCLING_INDOOR => StravaActivityType::RIDE,
        WorkoutType::OTHER => StravaActivityType::WORKOUT,
        WorkoutType::AEROBICS => StravaActivityType::WORKOUT,
        WorkoutType::BADMINTON => StravaActivityType::WORKOUT,
        WorkoutType::BASEBALL => StravaActivityType::WORKOUT,
        WorkoutType::BASKETBALL => StravaActivityType::WORKOUT,
        WorkoutType::BOXING => StravaActivityType::WORKOUT,
        WorkoutType::CLIMBING_STAIRS => StravaActivityType::STAIR_STEPPER,
        WorkoutType::CRICKET => StravaActivityType::WORKOUT,
        WorkoutType::ELLIPTICAL_TRAINING => StravaActivityType::ELLIPTICAL,
        WorkoutType::DANCING => StravaActivityType::WORKOUT,
        WorkoutType::FENCING => StravaActivityType::WORKOUT,
        WorkoutType::FOOTBALL_AMERICAN => StravaActivityType::SOCCER,
        WorkoutType::FOOTBALL_RUGBY => StravaActivityType::SOCCER,
        WorkoutType::FOOTBALL_SOCCER => StravaActivityType::SOCCER,
        WorkoutType::HANDBALL => StravaActivityType::WORKOUT,
        WorkoutType::HOCKEY => StravaActivityType::WORKOUT,
        WorkoutType::PILATES => StravaActivityType::WORKOUT,
        WorkoutType::POLO => StravaActivityType::WORKOUT,
        WorkoutType::SCUBA_DIVING => StravaActivityType::WORKOUT,
        WorkoutType::SQUASH => StravaActivityType::WORKOUT,
        WorkoutType::TABLE_TENIS => StravaActivityType::WORKOUT,
        WorkoutType::TENNIS => StravaActivityType::WORKOUT,
        WorkoutType::VOLEYBALL_BEACH => StravaActivityType::WORKOUT,
        WorkoutType::VOLEYBALL_INDOOR => StravaActivityType::WORKOUT,
        WorkoutType::WEIGHT_TRAINING => StravaActivityType::WEIGHT_TRAINING,
        WorkoutType::YOGA => StravaActivityType::YOGA,
        WorkoutType::MARTINAL_ARTS => StravaActivityType::WORKOUT,
        WorkoutType::GYMNASTICS => StravaActivityType::WORKOUT,
        WorkoutType::STEP_COUNTER => StravaActivityType::WALK,
        WorkoutType::CIRKUIT_TRAINING => StravaActivityType::WORKOUT,
        WorkoutType::SKATEBOARDING => StravaActivityType::SKATEBOARD,
        WorkoutType::CLIMBING => StravaActivityType::ROCK_CLIMBING,
        WorkoutType::KICK_SCOOTER => StravaActivityType::WORKOUT,
        WorkoutType::CANICROSS => StravaActivityType::WORKOUT,
        WorkoutType::FLOORBALL => StravaActivityType::WORKOUT,
        WorkoutType::ICE_SKATING => StravaActivityType::ICE_SKATE,
        WorkoutType::RUNNING_TREADMILL => StravaActivityType::RUN,
        WorkoutType::SURFING => StravaActivityType::SURFING,
        WorkoutType::SNOWSHOEING => StravaActivityType::SNOWSHOE,
        WorkoutType::WHEELCHAIR => StravaActivityType::WHEELCHAIR,
        WorkoutType::WALKING_TREADMILL => StravaActivityType::WALK,
        WorkoutType::STAND_UP_PADDLING => StravaActivityType::STAND_UP_PADDLING,
        WorkoutType::TRAIL_RUNNING => StravaActivityType::RUN,
        WorkoutType::ROWING_INDOORS => StravaActivityType::ROWING,
        WorkoutType::SKI_TOURING => StravaActivityType::BACKCOUNTRY_SKI,
        WorkoutType::ROPE_JUMPING => StravaActivityType::WORKOUT,
        WorkoutType::STRETCHING => StravaActivityType::WORKOUT,
        WorkoutType::PADDLE_TENNIS => StravaActivityType::WORKOUT,
        WorkoutType::PARAGLIDING => StravaActivityType::WORKOUT,
    ];

    public static function getForEndomondoWorkoutTypeId($typeId): string
    {
        if (!WorkoutType::exist($typeId)) {
            throw new EndomondoMapException('Wrong Type id ' . $typeId);
        }

        return self::$mapIdToName[$typeId];
    }
}
