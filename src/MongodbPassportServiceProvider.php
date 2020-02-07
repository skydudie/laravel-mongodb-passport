<?php

namespace DesignMyNight\Mongodb;

use Illuminate\Support\ServiceProvider;
use DesignMyNight\Mongodb\Passport\AuthCode;
use DesignMyNight\Mongodb\Passport\Client;
use DesignMyNight\Mongodb\Passport\PersonalAccessClient;
use DesignMyNight\Mongodb\Passport\Token;
use DesignMyNight\Mongodb\Passport\Bridge\RefreshTokenRepository;
use DesignMyNight\Mongodb\Passport\Bridge\RefreshToken;

class MongodbPassportServiceProvider extends ServiceProvider
{
    public function register()
    {
        /*
         * Passport client extends Eloquent model by default, so we alias them.
         */
        if (class_exists('Illuminate\Foundation\AliasLoader')) {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Laravel\Passport\AuthCode', AuthCode::class);
            $loader->alias('Laravel\Passport\Client', Client::class);
            $loader->alias('Laravel\Passport\Bridge\RefreshTokenRepository', RefreshTokenRepository::class);
            $loader->alias('Laravel\Passport\Bridge\RefreshToken', RefreshToken::class);
            $loader->alias('Laravel\Passport\PersonalAccessClient', PersonalAccessClient::class);
            $loader->alias('Laravel\Passport\Token', Token::class);
        } else {
            class_alias('Laravel\Passport\AuthCode', AuthCode::class);
            class_alias('Laravel\Passport\Client', Client::class);
            class_alias('Laravel\Passport\Bridge\RefreshTokenRepository', RefreshTokenRepository::class);
            class_alias('Laravel\Passport\Bridge\RefreshToken', RefreshToken::class);
            class_alias('Laravel\Passport\PersonalAccessClient', PersonalAccessClient::class);
            class_alias('Laravel\Passport\Token', Token::class);
        }
    }
}
