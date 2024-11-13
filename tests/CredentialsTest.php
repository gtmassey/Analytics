<?php

namespace Gtmassey\LaravelAnalytics\Tests;

use Gtmassey\LaravelAnalytics\Credentials;
use Gtmassey\LaravelAnalytics\Exceptions\InvalidCredentialsArrayException;
use Gtmassey\LaravelAnalytics\Exceptions\InvalidCredentialsFileException;
use Gtmassey\LaravelAnalytics\Exceptions\InvalidCredentialsJsonStringException;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class CredentialsTest extends TestCase
{
    private Filesystem $disk;

    public function setUp(): void
    {
        parent::setUp();

        $this->disk = Storage::fake('testing-storage');
    }

	/**
	 * @param array<string, string> $credentials
	 */
    private function setupCredentialsFile(array $credentials = [], string $fileName = 'test-credentials'): string
    {
        $encodedCredentials = json_encode($credentials + $this->credentials());

        if (! $encodedCredentials) {
            $this->fail('Failed to encode credentials');
        }

        $this->disk->put("$fileName.json", $encodedCredentials);

        return $this->disk->path("$fileName.json");
    }

    /**
	 * @return array<string, string>|null
     * @throws InvalidCredentialsJsonStringException
     * @throws InvalidCredentialsFileException
     * @throws InvalidCredentialsArrayException
     */
    private function getApplicationCredentials(): ?array
    {
        return resolve(Credentials::class)->parse();
    }

    /**
     * @throws InvalidCredentialsFileException
     * @throws InvalidCredentialsJsonStringException
     * @throws InvalidCredentialsArrayException
     */
    public function test_client_init_with_default_credentials_env(): void
    {
        $credentialsFile = $this->setupCredentialsFile();

        putenv('GOOGLE_APPLICATION_CREDENTIALS='.$credentialsFile);

        $this->assertNull($this->getApplicationCredentials());

        putenv('GOOGLE_APPLICATION_CREDENTIALS=');
    }

    /**
     * @throws InvalidCredentialsJsonStringException
     * @throws InvalidCredentialsFileException
     * @throws InvalidCredentialsArrayException
     */
    public function test_client_init_with_credentials_file(): void
    {
        $credentials = ['project_id' => 'testing-credentials-file'] + $this->credentials();
        $credentialsFile = $this->setupCredentialsFile(['project_id' => 'testing-credentials-file']);

        config()->set('analytics.credentials.file', $credentialsFile);

        $this->assertSame($credentials, $this->getApplicationCredentials());

        config()->offsetUnset('analytics.credentials.file');
    }

    /**
     * @throws InvalidCredentialsJsonStringException
     * @throws InvalidCredentialsFileException
     * @throws InvalidCredentialsArrayException
     */
    public function test_client_init_with_credentials_file_while_default_google_application_credentials_exist(): void
    {
        $defaultCredentialsFile = $this->setupCredentialsFile(['project_id' => 'do_not_use'], 'default-credentials');
        putenv('GOOGLE_APPLICATION_CREDENTIALS='.$defaultCredentialsFile);

        config()->set('analytics.credentials.use_env', false);

        $credentials = ['project_id' => 'testing-credentials-file-with-default'] + $this->credentials();
        $credentialsFile = $this->setupCredentialsFile(['project_id' => 'testing-credentials-file-with-default']);

        config()->set('analytics.credentials.file', $credentialsFile);

        $this->assertSame($credentials, $this->getApplicationCredentials());

        config()->offsetUnset('analytics.credentials.file');
        putenv('GOOGLE_APPLICATION_CREDENTIALS=');
    }

    /**
     * @throws InvalidCredentialsJsonStringException
     * @throws InvalidCredentialsFileException
     * @throws InvalidCredentialsArrayException
     */
    public function test_client_init_with_credentials_json_string(): void
    {
        $credentials = ['project_id' => 'testing-credentials-json'] + $this->credentials();

        config()->set('analytics.credentials.json', json_encode($credentials));

        $this->assertSame($credentials, $this->getApplicationCredentials());

        config()->offsetUnset('analytics.credentials.json');
    }

    /**
     * @throws InvalidCredentialsFileException
     * @throws InvalidCredentialsJsonStringException
     * @throws InvalidCredentialsArrayException
     */
    public function test_client_init_with_credentials_array(): void
    {
        $credentials = ['project_id' => 'testing-credentials-array'] + $this->credentials();

        config()->set('analytics.credentials.array', $credentials);

        $this->assertSame($credentials, $this->getApplicationCredentials());

        config()->offsetUnset('analytics.credentials.array');
    }

    /**
     * @throws InvalidCredentialsFileException
     * @throws InvalidCredentialsJsonStringException
     * @throws InvalidCredentialsArrayException
     */
    public function test_client_init_with_separate_credential_values(): void
    {
        config()->offsetUnset('analytics.credentials.array');

        $credentials = ['project_id' => 'testing-credentials-separate-values'] + $this->credentials();

        foreach ($credentials as $key => $value) {
            config()->set('analytics.credentials.array.'.$key, $value);
        }

        $this->assertSame($credentials, $this->getApplicationCredentials());

        config()->offsetUnset('analytics.credentials.array');
    }

    /**
     * @throws InvalidCredentialsJsonStringException
     * @throws InvalidCredentialsArrayException
     */
    public function test_invalid_credentials_file_path_exception(): void
    {
        config()->offsetUnset('analytics.credentials.array');
        config()->set('analytics.credentials.file', '');

        $this->expectException(InvalidCredentialsFileException::class);
        $this->expectExceptionMessage(InvalidCredentialsFileException::MESSAGE_INVALID_PATH);

        $this->getApplicationCredentials();

        config()->offsetUnset('analytics.credentials.file');
    }

    /**
     * @throws InvalidCredentialsJsonStringException
     * @throws InvalidCredentialsArrayException
     */
    public function test_credentials_file_does_not_exist_exception(): void
    {
        config()->offsetUnset('analytics.credentials.array');
        config()->set('analytics.credentials.file', 'invalid-file.json');

        $this->expectException(InvalidCredentialsFileException::class);
        $this->expectExceptionMessage(InvalidCredentialsFileException::MESSAGE_NOT_FOUND);

        $this->getApplicationCredentials();

        config()->offsetUnset('analytics.credentials.file');
    }

    /**
     * @throws InvalidCredentialsJsonStringException
     * @throws InvalidCredentialsArrayException
     */
    public function test_credentials_file_is_not_a_valid_json_exception(): void
    {
        config()->offsetUnset('analytics.credentials.array');

        $this->disk->put('invalid-json.json', 'invalid-json');
        $credentialsFile = $this->disk->path('invalid-json.json');

        config()->set('analytics.credentials.file', $credentialsFile);

        $this->expectException(InvalidCredentialsFileException::class);
        $this->expectExceptionMessage(InvalidCredentialsFileException::MESSAGE_INVALID_JSON);

        $this->getApplicationCredentials();

        config()->offsetUnset('analytics.credentials.file');
    }

    /**
     * @throws InvalidCredentialsFileException
     * @throws InvalidCredentialsArrayException
     */
    public function test_invalid_credentials_json_string_exception(): void
    {
        config()->offsetUnset('analytics.credentials.array');
        config()->set('analytics.credentials.json', '');

        $this->expectException(InvalidCredentialsJsonStringException::class);
        $this->expectExceptionMessage(InvalidCredentialsJsonStringException::MESSAGE_INVALID_STRING);

        $this->getApplicationCredentials();

        config()->offsetUnset('analytics.credentials.json');
    }

    /**
     * @throws InvalidCredentialsFileException
     * @throws InvalidCredentialsArrayException
     */
    public function test_credentials_json_string_is_not_a_valid_json_exception(): void
    {
        config()->offsetUnset('analytics.credentials.array');
        config()->set('analytics.credentials.json', 'invalid-json');

        $this->expectException(InvalidCredentialsJsonStringException::class);
        $this->expectExceptionMessage(InvalidCredentialsJsonStringException::MESSAGE_INVALID_JSON);

        $this->getApplicationCredentials();

        config()->offsetUnset('analytics.credentials.json');
    }

    /**
     * @throws InvalidCredentialsFileException
     * @throws InvalidCredentialsJsonStringException
     */
    public function test_invalid_credentials_array_exception(): void
    {
        config()->set('analytics.credentials.array', '');

        $this->expectException(InvalidCredentialsArrayException::class);
        $this->expectExceptionMessage(InvalidCredentialsArrayException::MESSAGE_INVALID_ARRAY);

        $this->getApplicationCredentials();

        config()->offsetUnset('analytics.credentials.array');
    }
}
