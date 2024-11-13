<?php

namespace Gtmassey\LaravelAnalytics;

use Gtmassey\LaravelAnalytics\Exceptions\InvalidCredentialsArrayException;
use Gtmassey\LaravelAnalytics\Exceptions\InvalidCredentialsFileException;
use Gtmassey\LaravelAnalytics\Exceptions\InvalidCredentialsJsonStringException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;

class Credentials
{
    /**
     * @return array<string, string>|null
     *
     * @throws InvalidCredentialsJsonStringException
     * @throws InvalidCredentialsFileException
     * @throws InvalidCredentialsArrayException
     */
    public function parse(): ?array
    {
        if (config('analytics.credentials.use_env') && getenv('GOOGLE_APPLICATION_CREDENTIALS')) {
            return null;
        }

        if (($file = config('analytics.credentials.file')) !== null) {
            return $this->credentialsFile($file);
        }

        if (($json = config('analytics.credentials.json')) !== null) {
            return $this->credentialsJson($json);
        }

        return $this->credentialsArray();
    }

    /**
     * @return array<string, string>
     *
     * @throws InvalidCredentialsFileException
     */
    private function credentialsFile(mixed $file): array
    {
        if (! is_string($file) || empty($file)) {
            throw InvalidCredentialsFileException::invalidPath();
        }

        try {
            $fileContents = (new Filesystem)->get($file);
        } catch (FileNotFoundException $e) {
            throw InvalidCredentialsFileException::notFound(previous: $e);
        }

        $credentials = json_decode($fileContents, true);

        if (! is_array($credentials)) {
            throw InvalidCredentialsFileException::invalidJson();
        }

        return $credentials;
    }

    /**
     * @return array<string, string>
     *
     * @throws InvalidCredentialsJsonStringException
     */
    private function credentialsJson(mixed $json): array
    {
        if (! is_string($json) || empty($json)) {
            throw InvalidCredentialsJsonStringException::invalidString();
        }

        $credentials = json_decode($json, true);

        if (! is_array($credentials)) {
            throw InvalidCredentialsJsonStringException::invalidJson();
        }

        return $credentials;
    }

    /**
     * @return array<string, string>
     *
     * @throws InvalidCredentialsArrayException
     */
    private function credentialsArray(): array
    {
        $credentials = config('analytics.credentials.array');

        if (! is_array($credentials) || empty($credentials)) {
            throw InvalidCredentialsArrayException::invalidArray();
        }

        return $credentials;
    }
}
