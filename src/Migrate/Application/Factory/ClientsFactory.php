<?php

declare(strict_types=1);

namespace EndomondoMv\Migrate\Application\Factory;

use Fabulator\Endomondo\EndomondoApi;
use Iamstuartwilson\StravaApi;
use RuntimeException;
use Swagger\Client\Strava\Configuration;

class ClientsFactory
{
    public static function createApiClients($code = null, $token = null): array
    {
        [$endomondoApi, $account] = self::createEndomondoApiClient();

        if ($token !== null && $code !== null) {
            throw new RuntimeException('Chose code or token to use this tool - https://oauth.jszewczak.com/strava.php');
        }

        $stravaApi = new StravaApi(
            getenv('STRAVA_CLIENT_ID'),
            getenv('STRAVA_CLIENT_SECRET')
        );

        if ($token === null && $code !== null) {
            $token = self::stravaTokenExchange($stravaApi, $code);
        }

        $stravaApi->setAccessToken($token);
        $config = Configuration::getDefaultConfiguration()->setAccessToken($token);
        return [$endomondoApi, $stravaApi, $config, $account];
    }

    public static function createEndomondoApiClient(): array
    {
        $endomondoApi = new EndomondoApi();

        $account = $endomondoApi->login(getenv('ENDOMONDO_LOGIN'), getenv('ENDOMONDO_PASSWORD'));

        return [$endomondoApi, $account];
    }

    /**
     * @param StravaApi $stravaApi
     * @param $code
     * @return mixed
     */
    private static function stravaTokenExchange(StravaApi $stravaApi, $code)
    {
        $token = $stravaApi->tokenExchange($code);

        var_dump(
            [
                'access_token' => $token->access_token,
                'refresh_token' => $token->refresh_token,
                'expires_at' => $token->expires_at
            ]
        ); // TODO better show that or return

        return $token->access_token;
    }
}
