<?php

namespace Gtmassey\LaravelAnalytics\Tests;

use Exception;
use Gtmassey\LaravelAnalytics\AnalyticsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\LaravelData\LaravelDataServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            AnalyticsServiceProvider::class,
            LaravelDataServiceProvider::class,
        ];
    }

    /**
     * @throws Exception
     */
    public function getEnvironmentSetUp($app): void
    {
        config()->set('analytics.property_id', 'test123');
        config()->set('analytics.credentials.array', $this->credentials());
    }

    protected function credentials(): array
    {
        return [
            'type' => 'service_account',
            'project_id' => 'bogus-project',
            'private_key_id' => 'bogus-id',
            'private_key' => 'bogus-key',
            'client_email' => 'bogus-user@bogus-app.iam.gserviceaccount.com',
            'client_id' => 'bogus-id',
            'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',
            'token_uri' => 'https://accounts.google.com/o/oauth2/token',
            'auth_provider_x509_cert_url' => 'https://www.googleapis.com/oauth2/v1/certs',
            'client_x509_cert_url' => 'https://www.googleapis.com/robot/v1/metadata/x509/bogus-ser%40bogus-app.iam.gserviceaccount.com',
        ];
    }
}
