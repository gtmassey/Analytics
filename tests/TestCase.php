<?php

namespace GarrettMassey\Analytics\Tests;

use Exception;
use GarrettMassey\Analytics\AnalyticsServiceProvider;
use Illuminate\Support\Facades\Storage;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            AnalyticsServiceProvider::class,
        ];
    }

    /**
     * @throws Exception
     */
    public function getEnvironmentSetUp($app)
    {
        $disk = Storage::fake('testing-storage');

        $encodedCredentials = json_encode($this->credentials());

        if (! $encodedCredentials) {
            throw new Exception('Failed to encode credentials');
        }

        $disk->put('test-credentials.json', $encodedCredentials);
        $credentialsFile = storage_path('/framework/testing/disks/testing-storage/test-credentials.json');

        config()->set('analytics.property_id', 'test123');
        config()->set('analytics.credentials.file', $credentialsFile);
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
