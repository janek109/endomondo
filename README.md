
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
- Create file .env by copy example
    ```
    cp .env.example .env
    ```
    open that file and put data from endomondo and strava
- run 
    ```
    php ./bin/console check
    ```
- To import data to strava you need to create api app see instruction bellow

- Then go to https://oauth.jszewczak.com/strava.php to create code

- run
    ```shell script
    php bin/console strava:getToken --code=[secretcode]
    ```
    to get token

- Then you can use token in `php bin/console endomondo:migrate`

### How to set password when you have account in endomondo connected with fb/google
- Go to and reset password: https://www.endomondo.com/forgotpassword
- Then you can add you endomondo password to .env file
- Then you can use this tool

### How to set up api application on Strava

1. Go to https://www.strava.com/settings/api

2. Add an icon.

    You can use one from this repo: [here](public_html/icons/data-transfer.png)

2. Fill a form with this data: 

    * Application Name: Move Endomondo workouts
    * Category: Data Importer
    * Website: https://oauth.jszewczak.com/
    * Authorization Callback Domain: oauth.jszewczak.com

### With this software you can:

Migrate workouts form date to date form Endomondo to Strava

You should use that options because Strava api have limits:

#### 100 requests every 15 minutes, 1000 daily

```
php bin/console endomondo:migrate --code=[secretcode] --startMigrate='YYYY-MM-DD H:m:s' --endMigrate='YYYY-MM-DD H:m:s'
php bin/console endomondo:migrate --token=[token] --startMigrate='YYYY-MM-DD H:m:s' --endMigrate='YYYY-MM-DD H:m:s'
php bin/console endomondo:migrate --code=code --startMigrate='2016-11-01 00:00:01' --endMigrate='2017-01-01 00:00:00'
php bin/console endomondo:migrate --token=token --startMigrate='2016-11-01 00:00:01' --endMigrate='2017-01-01 00:00:00'
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

Use tput bel to get notification wen your migration will be over

```
php bin/console endomondo:migrate --code= ; tput bel;
```

### How to deal with errors and output instruction

* see below

    ```
    Create endomondo file: 879597128
    Response from strava upload: 879597128.gpx duplicate of activity 4299975135
    ```
* Migrator still update Activity in Strava - just ignore it
   
    ```
    In RequestException.php line 113:

    Server error: `GET https://www.endomondo.com/rest/v1/users/5566373/workouts/history?expand=workout%2Cpoints&limit=1000&after=2017-02-01T00%3A00%3A02%2B00%3A00&before=2017-03-01T00%3A00%3A02%2B00%3A00` resulted in a `500
    Internal Server Error` response:
    Uncaught REST API exception:
    URL: http://www.endomondo.com/rest/v1/users/5566373/workouts/history
    Method: GET
    Parameters (truncated...)

    endomondo:migrate [-c|--code CODE] [-t|--token TOKEN] [-s|--startMigrate startMigrate] [-e|--endMigrate endMigrate]
    ```
* Start last period(startMigrate, endMigrate) again some temporary problem with endomondo api 
    ```
    In EndomondoApi.php line 61:

    Client error: `GET https://www.endomondo.com/rest/v1/users/5566373/workouts/history?expand=workout%2Cpoints&limit=1000&after=2016-11-01T00%3A00%3A11%2B00%3A00&before=2016-12-01T00%3A00%3A11%2B00%3A00` resulted in a `401
    Unauthorized` response:
    {"errors":[{"message":"Not Signed in: userId null","code":3,"type":5}]}
    ```
* Start last period(startMigrate, endMigrate) again because endomondo api terminated you session 
    ```
    Create endomondo file: 739247438
    string(132) "The file is empty, <a href="https://strava.zendesk.com/entries/21823834-Uploading-Empty-Files" target="_blank">More Information</a>."
    ```
* You need to upload this activity manually to Strava see https://www.strava.com/upload/select
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
* You need to upload this activity manually to Strava see https://www.strava.com/upload/select
    ```
    [429] Client error: `POST https://www.strava.com/api/v3/uploads` resulted in a `429 Too Many Requests` response:
    {"message":"Rate Limit Exceeded","errors":[{"resource":"Application","field":"rate limit","code":"exceeded"}]}
     for workoutId: 999497603 Start: 2017-09-10 10:36:25 End: 2017-09-10 10:41:13
    ```
* Check limits on https://www.strava.com/settings/api 
    if exceeded 15min - Requests every 15 minutes you can try in next 15min
    if exceeded 1000 request limit Daily requests you can try in next day

    ```
    Create endomondo file: 934431839
    Check upload latter UploadId: 4596865482
    ```
* TODO describe this ^

### Endomondo Workouts folder
see [workouts/README.md](workouts/README.md)

### TODO

1. Migrate by endomondo ids like 
    ```
    php bin/console endomondo:migrateById --code|--token --ids=1,2,3,4,5,6,7
    ```
3. add option to not map trening type
4. check upload later to update activity on strava
    ```
    php bin/console strava:checkUpload --code|--token --endomondoWorkoutId=[id] --stravaUploadId=[id]
    ```
5. add configuration for workouts types mapping form endo to strava types
