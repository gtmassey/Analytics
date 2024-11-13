<?php

namespace Gtmassey\LaravelAnalytics;

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AnalyticsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('analytics')
            ->hasConfigFile('analytics');

        $this->app->bind(BetaAnalyticsDataClient::class, function () {
            $credentials = resolve(Credentials::class)->parse();

            return new BetaAnalyticsDataClient(['credentials' => $credentials]);
        });
    }
}
