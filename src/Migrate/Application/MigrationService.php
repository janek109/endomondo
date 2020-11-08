<?php

declare(strict_types=1);

namespace EndomondoMv\Migrate\Application;

use EndomondoMv\Migrate\Enum\StravaNameFactory;
use Exception;
use Fabulator\Endomondo\Privacy;
use Fabulator\Endomondo\Workout;
use Iamstuartwilson\StravaApi;
use Swagger\Client\Strava\Api\UploadsApi;
use Swagger\Client\Strava\Model\Upload;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

class MigrationService
{
    private const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * @var UploadsApi
     */
    private $uploadsApi;

    /**
     * @var StravaApi
     */
    private $stravaApi;
    /**
     * @var OutputInterface
     */
    private $output;

    public function __construct(OutputInterface $output, UploadsApi $uploadsApi, StravaApi $stravaApi)
    {
        $this->output = $output;
        $this->uploadsApi = $uploadsApi;
        $this->stravaApi = $stravaApi;
    }

    /**
     * @param Workout $endomondoWorkout
     * @return int
     */
    public function migrateWorkout($endomondoWorkout): int
    {
        $pathToWorkoutFile = $this->createEndomondoWorkoutFileFromId($endomondoWorkout);

        $description = $this->buildDescriptionFromEndomondoWorkout($endomondoWorkout);
        $partsOfADay = $this->convertHoursToPartsOfADay((int)$endomondoWorkout->getStart()->format('H'));

        try {
            /** @var Upload $upload */
            $upload = $this->uploadsApi->createUpload(
                $pathToWorkoutFile,
                $partsOfADay . ' ' . $endomondoWorkout->getTypeName(),
                $description,
                null,
                null,
                'gpx',
                $endomondoWorkout->getId()
            ); // TODO request do strava

            sleep(7); // 7s to strava process file

            $upload = $this->uploadsApi->getUploadById($upload->getId());
            // TODO request do strava

            if (isset($upload['error'])) {
                $this->output->writeln('Response from strava upload: ' . $upload['error']);

                if (!strpos($upload['error'], 'duplicate of activity')) {
                    // to not end the whole process
                    return Command::SUCCESS;
                }
            }

            $this->stravaApi->put(
                '/activities/' . $upload->getActivityId(),
                [
                    'type' => StravaNameFactory::getForEndomondoWorkoutTypeId($endomondoWorkout->getTypeId())
                ]
            );
            // TODO request do strava

            sleep(20); //25 - ok to not hit 15min api limit on strava

            if (!empty($upload->getActivityId())) {
                $this->output->writeln('ActivityId: ' . $upload->getActivityId());
            }

            if (empty($upload->getActivityId()) && !empty($upload->getId()) && !strpos($upload['error'], 'duplicate of activity')) {
                $this->output->writeln('Check upload latter UploadId: ' . $upload->getId());
            }

        } catch (Exception $e) {
            $this->output->writeln(
                $e->getMessage() . ' for workoutId: ' . $endomondoWorkout->getId(
                ) . ' Start: ' . $endomondoWorkout->getStart()->format(
                    self::DATE_FORMAT
                ) . ' End: ' . $endomondoWorkout->getEnd()->format(self::DATE_FORMAT)
            );

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }

    /**
     * @param Workout $endomondoWorkout
     * @return string
     */
    private function createEndomondoWorkoutFileFromId(Workout $endomondoWorkout): string
    {
        echo 'Create endomondo file: ' . $endomondoWorkout->getId() . PHP_EOL;

        $pathToWorkoutFile = __DIR__ . "/../../../workouts/" . $endomondoWorkout->getId() . ".gpx";

        if (file_exists($pathToWorkoutFile)) {
            return $pathToWorkoutFile;
        }

        $workoutFile = fopen($pathToWorkoutFile, 'wb');
        fwrite($workoutFile, $endomondoWorkout->getGPX());
        fclose($workoutFile);

        return $pathToWorkoutFile;
    }

    // TODO mv to another service
    private function buildDescriptionFromEndomondoWorkout(Workout $workout): string
    {
        [$hours, $minutes, $seconds] = $this->convertSecondsToHIS($workout->getDuration());

        $workoutPrivacy = $workout->getWorkoutPrivacy() === Privacy::ME ? 'ME' : $workout->getWorkoutPrivacy(
        ) === Privacy::FRIENDS ? 'FRIENDS' : 'EVERYONE';

        return 'Endomondo id: ' . $workout->getId() . ';' . PHP_EOL .
            'TypeName: ' . $workout->getTypeName() . ';' . PHP_EOL .
            'Message: ' . $workout->getMessage() . ';' . PHP_EOL .
            'Title: ' . $workout->getTitle() . ';' . PHP_EOL .
            'Calories: ' . $workout->getCalories() . 'kcal' . ';' . PHP_EOL .
            'Duration: ' . $hours . 'h:' . $minutes . 'm:' . $seconds . 's' . ';' . PHP_EOL .
            'Started at: ' . $workout->getStart()->format('Y-m-d H:i:s e') . ';' . PHP_EOL .
            'End at: ' . $workout->getEnd()->format('Y-m-d H:i:s e') . ';' . PHP_EOL .
            'Distance: ' . $workout->getDistance() . 'km' . ';' . PHP_EOL .
            'AvgHeartRate: ' . $workout->getAvgHeartRate() . 'bpm' . ';' . PHP_EOL .
            'MaxHeartRate: ' . $workout->getMaxHeartRate() . 'bpm' . ';' . PHP_EOL .
            'Ascent: ' . $workout->getAscent() . 'm' . ';' . PHP_EOL .
            'Descent: ' . $workout->getDescent() . 'm' . ';' . PHP_EOL .
            'Cadence: ' . $workout->getCadece() . 'rpm' . ';' . PHP_EOL .
            'WorkoutPrivacy: ' . $workoutPrivacy . PHP_EOL;
    }

    private function convertSecondsToHIS($time): array
    {
        $seconds = $time % 60;
        $time = ($time - $seconds) / 60;
        $minutes = $time % 60;
        $hours = ($time - $minutes) / 60;

        return [$hours, $minutes, $seconds];
    }

    // TODO mv to another service
    private function convertHoursToPartsOfADay(int $hour): string
    {
        $partOdDay = '';

        if ($hour === 24) {
            $partOdDay = 'Midnight';
        }

        if (0 < $hour && $hour < 6) {
            $partOdDay = 'Morning';
        }

        if ($hour === 6) {
            $partOdDay = 'Sunrise';
        }

        if (6 < $hour && $hour < 12) {
            $partOdDay = 'Morning';
        }

        if ($hour === 12) {
            $partOdDay = 'Midday';
        }

        if (12 < $hour && $hour < 18) {
            $partOdDay = 'Afternon';
        }

        if ($hour === 18) {
            $partOdDay = 'Sunset';
        }

        if (18 < $hour && $hour < 24) {
            $partOdDay = 'Evening';
        }

        return $partOdDay;
    }
}
