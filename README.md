
### Pre requirements:

- terminal
- install git - https://git-scm.com/
- install php 7.3 on your computer
- install composer on your computer https://getcomposer.org/
- clone this repo from github
    ```
    git clone https://github.com/janek109/endomondo.git endomondo
    ```
- go to location were you clone repo
    ```
    cd endomondo
    ```
- run 
    ```
    composer install
    ```
- run 
    ```
    php ./bin/console check
    ```
- create file .env by copy example
    ```
    cp .env.example .env
    ```
open that file and put data from endomondo and strava

### With this software you can:

Migrate workouts form date to date form Endomondo to Strava

You should use that options because Strava api have limits:

#### 100 requests every 15 minutes, 1000 daily

```
php bin/console endomondo:migrate --code=[secretcode] --startImport='YYYY-MM-DD H:m:s' --endImport='YYYY-MM-DD H:m:s'
php bin/console endomondo:migrate --token=[token] --startImport='YYYY-MM-DD H:m:s' --endImport='YYYY-MM-DD H:m:s'
php bin/console endomondo:migrate --code=code --startImport='2016-11-01 00:00:01' --endImport='2017-01-01 00:00:00'
php bin/console endomondo:migrate --token=token --startImport='2016-11-01 00:00:01' --endImport='2017-01-01 00:00:00'
```

Migrate all data form Endomondo to Strava

```
php bin/console endomondo:migrate --code=[secretcode]
php bin/console endomondo:migrate --token=[token]
```

Count number of workouts in endomondo

```
php bin/console endomondo:countWorkouts
```

Get access token form code

```
php bin/console strava:getToken --code=[secretcode]
```

To get code go to:

https://oauth.jszewczak.com/strava.php

Then login to strava and Authorize app to import.

On next page you will have response like:

```
Callback Response Data From Strava
Array
(
    [state] => 
    [code] => somescretcode13de413e4aa051fcewcvwbhvrbv
    [scope] => activity:write,activity:read_all,activity:read,read,read_all,profile:read_all,profile:write
)
```

Code can be use once. One it use migrator will show sth like:
```
array(3) {
  ["access_token"]=>
  string(40) "secretoken"
  ["refresh_token"]=>
  string(40) "refreshtoken"
  ["expires_at"]=>
  int(1604282386)
}
```

Then you can use --token param in migrator in case some error will occur 

### Tips

Use tput bel;

```
php bin/console endomondo:migrate --code= ;tput bel;
```

### TODO

1. how to deal with errors and output instruction
    ```
    Create endomondo file: 879597128
    879597128.gpx duplicate of activity 4299975135
    ```
    ```
    In RequestException.php line 113:

    Server error: `GET https://www.endomondo.com/rest/v1/users/5566373/workouts/history?expand=workout%2Cpoints&limit=1000&after=2017-02-01T00%3A00%3A02%2B00%3A00&before=2017-03-01T00%3A00%3A02%2B00%3A00` resulted in a `500
    Internal Server Error` response:
    Uncaught REST API exception:
    URL: http://www.endomondo.com/rest/v1/users/5566373/workouts/history
    Method: GET
    Parameters (truncated...)

    endomondo:migrate [-c|--code CODE] [-t|--token TOKEN] [-s|--startImport STARTIMPORT] [-e|--endImport ENDIMPORT]
    ```
    ```
    In EndomondoApi.php line 61:

    Client error: `GET https://www.endomondo.com/rest/v1/users/5566373/workouts/history?expand=workout%2Cpoints&limit=1000&after=2016-11-01T00%3A00%3A11%2B00%3A00&before=2016-12-01T00%3A00%3A11%2B00%3A00` resulted in a `401
    Unauthorized` response:
    {"errors":[{"message":"Not Signed in: userId null","code":3,"type":5}]}
    ```
    ```
    Create endomondo file: 739247438
    string(132) "The file is empty, <a href="https://strava.zendesk.com/entries/21823834-Uploading-Empty-Files" target="_blank">More Information</a>."
    ```
    ```
    Create endomondo file: 486739785
    PHP Fatal error:  Uncaught Error: __clone method called on non-object in ...vendor/fabulator/endomondo-workouts/lib/Fabulator/Endomondo/Point.php:80
    Stack trace:
    #0 ...vendor/fabulator/endomondo-workouts/lib/Fabulator/Endomondo/Workout.php(248): Fabulator\Endomondo\Point->getTime()
    #1 ...src/Migrate/Application/MigrationService.php(127): Fabulator\Endomondo\Workout->getEnd()
    #2 .../src/Migrate/Application/MigrationService.php(43): EndomondoMv\Migrate\Application\MigrationService->buildDescriptionFromEndomondoWorkout(Object(Fabulator\Endomondo\Workout))
    #3 .../src/Commands/EndomondoMigrateCommand.php(66): EndomondoMv\Migrate\Application\MigrationService->migrateOneWorkout(Object(Fabulator\Endomondo\Workout))
    #4 ...vendor/symfony/console/Command/Command.php(258): EndomondoMv\Commands\Endom in ...vendor/fabulator/endomondo-workouts/lib/Fabulator/Endomondo/Point.php on line 80

    ```
    ```
    Create endomondo file: 934431839
    Check upload latter UploadId: 4596865482
    ```
2. Migrate by endomondo ids like 
    ```
    php bin/console endomondo:migrateById --code|--token --ids=1,2,3,4,5,6,7
    ```
3. describe how to set password when you have account in endomondo connected with fb/gogole
    - go to and reset password: https://www.endomondo.com/forgotpassword
    - then you can use this tool
4. how this work workouts folder
5. how to setup app on https://www.strava.com/settings/api
6. add option to not map trening type
7. check upload later to update activity on strava
    ```
    php bin/console strava:checkUpload --code|--token --endomondoWorkoutId=[id] --stravaUploadId=[id]
    ```
8. add configuration for workouts types mapping form endo to strava types
