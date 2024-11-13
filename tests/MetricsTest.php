<?php

namespace Gtmassey\LaravelAnalytics\Tests;

use Closure;
use Generator;
use Google\Analytics\Data\V1beta\Metric;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Illuminate\Support\Collection;

class MetricsTest extends TestCase
{
    public static function metricProvider(): Generator
    {
        yield 'active1DayUsers' => [
            'method' => fn (Metrics $metrics) => $metrics->active1DayUsers(),
            'metric' => 'active1DayUsers',
        ];

        yield 'active28DayUsers' => [
            'method' => fn (Metrics $metrics) => $metrics->active28DayUsers(),
            'metric' => 'active28DayUsers',
        ];

        yield 'active7DayUsers' => [
            'method' => fn (Metrics $metrics) => $metrics->active7DayUsers(),
            'metric' => 'active7DayUsers',
        ];

        yield 'activeUsers' => [
            'method' => fn (Metrics $metrics) => $metrics->activeUsers(),
            'metric' => 'activeUsers',
        ];

        yield 'adUnitExposure' => [
            'method' => fn (Metrics $metrics) => $metrics->adUnitExposure(),
            'metric' => 'adUnitExposure',
        ];

        yield 'addToCarts' => [
            'method' => fn (Metrics $metrics) => $metrics->addToCarts(),
            'metric' => 'addToCarts',
        ];

        yield 'advertiserAdClicks' => [
            'method' => fn (Metrics $metrics) => $metrics->advertiserAdClicks(),
            'metric' => 'advertiserAdClicks',
        ];

        yield 'advertiserAdCost' => [
            'method' => fn (Metrics $metrics) => $metrics->advertiserAdCost(),
            'metric' => 'advertiserAdCost',
        ];

        yield 'advertiserAdCostPerClick' => [
            'method' => fn (Metrics $metrics) => $metrics->advertiserAdCostPerClick(),
            'metric' => 'advertiserAdCostPerClick',
        ];

        yield 'advertiserAdCostPerConversion' => [
            'method' => fn (Metrics $metrics) => $metrics->advertiserAdCostPerConversion(),
            'metric' => 'advertiserAdCostPerConversion',
        ];

        yield 'advertiserAdImpressions' => [
            'method' => fn (Metrics $metrics) => $metrics->advertiserAdImpressions(),
            'metric' => 'advertiserAdImpressions',
        ];

        yield 'averagePurchaseRevenue' => [
            'method' => fn (Metrics $metrics) => $metrics->averagePurchaseRevenue(),
            'metric' => 'averagePurchaseRevenue',
        ];

        yield 'averagePurchaseRevenuePerPayingUser' => [
            'method' => fn (Metrics $metrics) => $metrics->averagePurchaseRevenuePerPayingUser(),
            'metric' => 'averagePurchaseRevenuePerPayingUser',
        ];

        yield 'averagePurchaseRevenuePerUser' => [
            'method' => fn (Metrics $metrics) => $metrics->averagePurchaseRevenuePerUser(),
            'metric' => 'averagePurchaseRevenuePerUser',
        ];

        yield 'averageRevenuePerUser' => [
            'method' => fn (Metrics $metrics) => $metrics->averageRevenuePerUser(),
            'metric' => 'averageRevenuePerUser',
        ];

        yield 'averageSessionDuration' => [
            'method' => fn (Metrics $metrics) => $metrics->averageSessionDuration(),
            'metric' => 'averageSessionDuration',
        ];

        yield 'bounceRate' => [
            'method' => fn (Metrics $metrics) => $metrics->bounceRate(),
            'metric' => 'bounceRate',
        ];

        yield 'cartToViewRate' => [
            'method' => fn (Metrics $metrics) => $metrics->cartToViewRate(),
            'metric' => 'cartToViewRate',
        ];

        yield 'checkouts' => [
            'method' => fn (Metrics $metrics) => $metrics->checkouts(),
            'metric' => 'checkouts',
        ];

        yield 'cohortActiveUsers' => [
            'method' => fn (Metrics $metrics) => $metrics->cohortActiveUsers(),
            'metric' => 'cohortActiveUsers',
        ];

        yield 'cohortTotalUsers' => [
            'method' => fn (Metrics $metrics) => $metrics->cohortTotalUsers(),
            'metric' => 'cohortTotalUsers',
        ];

        yield 'conversions' => [
            'method' => fn (Metrics $metrics) => $metrics->conversions(),
            'metric' => 'conversions',
        ];

        yield 'crashAffectedUsers' => [
            'method' => fn (Metrics $metrics) => $metrics->crashAffectedUsers(),
            'metric' => 'crashAffectedUsers',
        ];

        yield 'crashFreeUsersRate' => [
            'method' => fn (Metrics $metrics) => $metrics->crashFreeUsersRate(),
            'metric' => 'crashFreeUsersRate',
        ];

        yield 'dauPerMau' => [
            'method' => fn (Metrics $metrics) => $metrics->dauPerMau(),
            'metric' => 'dauPerMau',
        ];

        yield 'dauPerWau' => [
            'method' => fn (Metrics $metrics) => $metrics->dauPerWau(),
            'metric' => 'dauPerWau',
        ];

        yield 'ecommercePurchases' => [
            'method' => fn (Metrics $metrics) => $metrics->ecommercePurchases(),
            'metric' => 'ecommercePurchases',
        ];

        yield 'engagedSessions' => [
            'method' => fn (Metrics $metrics) => $metrics->engagedSessions(),
            'metric' => 'engagedSessions',
        ];

        yield 'engagementRate' => [
            'method' => fn (Metrics $metrics) => $metrics->engagementRate(),
            'metric' => 'engagementRate',
        ];

        yield 'eventCount' => [
            'method' => fn (Metrics $metrics) => $metrics->eventCount(),
            'metric' => 'eventCount',
        ];

        yield 'eventCountPerUser' => [
            'method' => fn (Metrics $metrics) => $metrics->eventCountPerUser(),
            'metric' => 'eventCountPerUser',
        ];

        yield 'eventValue' => [
            'method' => fn (Metrics $metrics) => $metrics->eventValue(),
            'metric' => 'eventValue',
        ];

        yield 'eventsPerSession' => [
            'method' => fn (Metrics $metrics) => $metrics->eventsPerSession(),
            'metric' => 'eventsPerSession',
        ];

        yield 'firstTimePurchaserConversionRate' => [
            'method' => fn (Metrics $metrics) => $metrics->firstTimePurchaserConversionRate(),
            'metric' => 'firstTimePurchaserConversionRate',
        ];

        yield 'firstTimePurchasers' => [
            'method' => fn (Metrics $metrics) => $metrics->firstTimePurchasers(),
            'metric' => 'firstTimePurchasers',
        ];

        yield 'firstTimePurchasersPerNewUser' => [
            'method' => fn (Metrics $metrics) => $metrics->firstTimePurchasersPerNewUser(),
            'metric' => 'firstTimePurchasersPerNewUser',
        ];

        yield 'itemListClickEvents' => [
            'method' => fn (Metrics $metrics) => $metrics->itemListClickEvents(),
            'metric' => 'itemListClickEvents',
        ];

        yield 'itemListClickThroughRate' => [
            'method' => fn (Metrics $metrics) => $metrics->itemListClickThroughRate(),
            'metric' => 'itemListClickThroughRate',
        ];

        yield 'itemListViewEvents' => [
            'method' => fn (Metrics $metrics) => $metrics->itemListViewEvents(),
            'metric' => 'itemListViewEvents',
        ];

        yield 'itemPromotionClickThroughRate' => [
            'method' => fn (Metrics $metrics) => $metrics->itemPromotionClickThroughRate(),
            'metric' => 'itemPromotionClickThroughRate',
        ];

        yield 'itemRevenue' => [
            'method' => fn (Metrics $metrics) => $metrics->itemRevenue(),
            'metric' => 'itemRevenue',
        ];

        yield 'itemViewEvents' => [
            'method' => fn (Metrics $metrics) => $metrics->itemViewEvents(),
            'metric' => 'itemViewEvents',
        ];

        yield 'itemsAddedToCart' => [
            'method' => fn (Metrics $metrics) => $metrics->itemsAddedToCart(),
            'metric' => 'itemsAddedToCart',
        ];

        yield 'itemsCheckedOut' => [
            'method' => fn (Metrics $metrics) => $metrics->itemsCheckedOut(),
            'metric' => 'itemsCheckedOut',
        ];

        yield 'itemsClickedInList' => [
            'method' => fn (Metrics $metrics) => $metrics->itemsClickedInList(),
            'metric' => 'itemsClickedInList',
        ];

        yield 'itemsClickedInPromotion' => [
            'method' => fn (Metrics $metrics) => $metrics->itemsClickedInPromotion(),
            'metric' => 'itemsClickedInPromotion',
        ];

        yield 'itemsPurchased' => [
            'method' => fn (Metrics $metrics) => $metrics->itemsPurchased(),
            'metric' => 'itemsPurchased',
        ];

        yield 'itemsViewed' => [
            'method' => fn (Metrics $metrics) => $metrics->itemsViewed(),
            'metric' => 'itemsViewed',
        ];

        yield 'itemsViewedInList' => [
            'method' => fn (Metrics $metrics) => $metrics->itemsViewedInList(),
            'metric' => 'itemsViewedInList',
        ];

        yield 'itemsViewedInPromotion' => [
            'method' => fn (Metrics $metrics) => $metrics->itemsViewedInPromotion(),
            'metric' => 'itemsViewedInPromotion',
        ];

        yield 'newUsers' => [
            'method' => fn (Metrics $metrics) => $metrics->newUsers(),
            'metric' => 'newUsers',
        ];

        yield 'organicGoogleSearchAveragePosition' => [
            'method' => fn (Metrics $metrics) => $metrics->organicGoogleSearchAveragePosition(),
            'metric' => 'organicGoogleSearchAveragePosition',
        ];

        yield 'organicGoogleSearchClickThroughRate' => [
            'method' => fn (Metrics $metrics) => $metrics->organicGoogleSearchClickThroughRate(),
            'metric' => 'organicGoogleSearchClickThroughRate',
        ];

        yield 'organicGoogleSearchClicks' => [
            'method' => fn (Metrics $metrics) => $metrics->organicGoogleSearchClicks(),
            'metric' => 'organicGoogleSearchClicks',
        ];

        yield 'organicGoogleSearchImpressions' => [
            'method' => fn (Metrics $metrics) => $metrics->organicGoogleSearchImpressions(),
            'metric' => 'organicGoogleSearchImpressions',
        ];

        yield 'promotionClicks' => [
            'method' => fn (Metrics $metrics) => $metrics->promotionClicks(),
            'metric' => 'promotionClicks',
        ];

        yield 'promotionViews' => [
            'method' => fn (Metrics $metrics) => $metrics->promotionViews(),
            'metric' => 'promotionViews',
        ];

        yield 'publisherAdClicks' => [
            'method' => fn (Metrics $metrics) => $metrics->publisherAdClicks(),
            'metric' => 'publisherAdClicks',
        ];

        yield 'publisherAdImpressions' => [
            'method' => fn (Metrics $metrics) => $metrics->publisherAdImpressions(),
            'metric' => 'publisherAdImpressions',
        ];

        yield 'purchaseRevenue' => [
            'method' => fn (Metrics $metrics) => $metrics->purchaseRevenue(),
            'metric' => 'purchaseRevenue',
        ];

        yield 'purchaseToViewRate' => [
            'method' => fn (Metrics $metrics) => $metrics->purchaseToViewRate(),
            'metric' => 'purchaseToViewRate',
        ];

        yield 'purchaserConversionRate' => [
            'method' => fn (Metrics $metrics) => $metrics->purchaserConversionRate(),
            'metric' => 'purchaserConversionRate',
        ];

        yield 'returnOnAdSpend' => [
            'method' => fn (Metrics $metrics) => $metrics->returnOnAdSpend(),
            'metric' => 'returnOnAdSpend',
        ];

        yield 'screenPageViews' => [
            'method' => fn (Metrics $metrics) => $metrics->screenPageViews(),
            'metric' => 'screenPageViews',
        ];

        yield 'screenPageViewsPerSession' => [
            'method' => fn (Metrics $metrics) => $metrics->screenPageViewsPerSession(),
            'metric' => 'screenPageViewsPerSession',
        ];

        yield 'sessionConversionRate' => [
            'method' => fn (Metrics $metrics) => $metrics->sessionConversionRate(),
            'metric' => 'sessionConversionRate',
        ];

        yield 'sessions' => [
            'method' => fn (Metrics $metrics) => $metrics->sessions(),
            'metric' => 'sessions',
        ];

        yield 'sessionsPerUser' => [
            'method' => fn (Metrics $metrics) => $metrics->sessionsPerUser(),
            'metric' => 'sessionsPerUser',
        ];

        yield 'shippingAmount' => [
            'method' => fn (Metrics $metrics) => $metrics->shippingAmount(),
            'metric' => 'shippingAmount',
        ];

        yield 'taxAmount' => [
            'method' => fn (Metrics $metrics) => $metrics->taxAmount(),
            'metric' => 'taxAmount',
        ];

        yield 'totalAdRevenue' => [
            'method' => fn (Metrics $metrics) => $metrics->totalAdRevenue(),
            'metric' => 'totalAdRevenue',
        ];

        yield 'totalPurchasers' => [
            'method' => fn (Metrics $metrics) => $metrics->totalPurchasers(),
            'metric' => 'totalPurchasers',
        ];

        yield 'totalRevenue' => [
            'method' => fn (Metrics $metrics) => $metrics->totalRevenue(),
            'metric' => 'totalRevenue',
        ];

        yield 'totalUsers' => [
            'method' => fn (Metrics $metrics) => $metrics->totalUsers(),
            'metric' => 'totalUsers',
        ];

        yield 'transactions' => [
            'method' => fn (Metrics $metrics) => $metrics->transactions(),
            'metric' => 'transactions',
        ];

        yield 'transactionsPerPurchaser' => [
            'method' => fn (Metrics $metrics) => $metrics->transactionsPerPurchaser(),
            'metric' => 'transactionsPerPurchaser',
        ];

        yield 'userConversionRate' => [
            'method' => fn (Metrics $metrics) => $metrics->userConversionRate(),
            'metric' => 'userConversionRate',
        ];

        yield 'userEngagementDuration' => [
            'method' => fn (Metrics $metrics) => $metrics->userEngagementDuration(),
            'metric' => 'userEngagementDuration',
        ];

        yield 'wauPerMau' => [
            'method' => fn (Metrics $metrics) => $metrics->wauPerMau(),
            'metric' => 'wauPerMau',
        ];
    }

    /**
     * @param  Closure(Metrics): Metrics  $method
     *
     * @dataProvider metricProvider
     */
    public function test_predefined_metrics(Closure $method, string $metric): void
    {
        $metrics = new Metrics;
        $metrics = $method($metrics);

        $this->assertEquals(1, $metrics->count());
        $this->assertInstanceOf(Collection::class, $metrics->getMetrics());
        $this->assertInstanceOf(Metric::class, $metrics->getMetrics()->first());
        $this->assertEquals($metric, $metrics->getMetrics()->first()->getName());
    }
}
