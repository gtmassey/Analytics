<?php

namespace Gtmassey\LaravelAnalytics\Response;

use Gtmassey\LaravelAnalytics\Response\Quotas\ConcurrentRequests;
use Gtmassey\LaravelAnalytics\Response\Quotas\PotentiallyThresholdedRequestsPerHour;
use Gtmassey\LaravelAnalytics\Response\Quotas\ServerErrorsPerProjectPerHour;
use Gtmassey\LaravelAnalytics\Response\Quotas\TokensPerDay;
use Gtmassey\LaravelAnalytics\Response\Quotas\TokensPerHour;
use Gtmassey\LaravelAnalytics\Response\Quotas\TokensPerProjectPerHour;
use Spatie\LaravelData\Data;

class PropertyQuota extends Data
{
    public function __construct(
        public TokensPerDay $tokensPerDay,
        public TokensPerHour $tokensPerHour,
        public ConcurrentRequests $concurrentRequests,
        public ServerErrorsPerProjectPerHour $serverErrorsPerProjectPerHour,
        public PotentiallyThresholdedRequestsPerHour $potentiallyThresholdedRequestsPerHour,
        public TokensPerProjectPerHour $tokensPerProjectPerHour,
    ) {
    }
}
