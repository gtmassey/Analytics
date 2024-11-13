<?php

namespace Gtmassey\LaravelAnalytics\Request;

use Google\Analytics\Data\V1beta\Metric;
use Illuminate\Support\Collection;

class Metrics
{
    /** @var Collection<int, Metric> */
    protected Collection $metrics;

    public function __construct()
    {
        $this->metrics = new Collection;
    }

    public function count(): int
    {
        return $this->metrics->count();
    }

    public function first(): ?Metric
    {
        return $this->metrics->first();
    }

    /**
     * @return Collection<int, Metric>
     */
    public function getMetrics(): Collection
    {
        return $this->metrics;
    }

    public function active1DayUsers(): self
    {
        $this->metrics->push(new Metric(['name' => 'active1DayUsers']));

        return $this;
    }

    public function active28DayUsers(): self
    {
        $this->metrics->push(new Metric(['name' => 'active28DayUsers']));

        return $this;
    }

    public function active7DayUsers(): self
    {
        $this->metrics->push(new Metric(['name' => 'active7DayUsers']));

        return $this;
    }

    public function activeUsers(): self
    {
        $this->metrics->push(new Metric(['name' => 'activeUsers']));

        return $this;
    }

    public function adUnitExposure(): self
    {
        $this->metrics->push(new Metric(['name' => 'adUnitExposure']));

        return $this;
    }

    public function addToCarts(): self
    {
        $this->metrics->push(new Metric(['name' => 'addToCarts']));

        return $this;
    }

    public function advertiserAdClicks(): self
    {
        $this->metrics->push(new Metric(['name' => 'advertiserAdClicks']));

        return $this;
    }

    public function advertiserAdCost(): self
    {
        $this->metrics->push(new Metric(['name' => 'advertiserAdCost']));

        return $this;
    }

    public function advertiserAdCostPerClick(): self
    {
        $this->metrics->push(new Metric(['name' => 'advertiserAdCostPerClick']));

        return $this;
    }

    public function advertiserAdCostPerConversion(): self
    {
        $this->metrics->push(new Metric(['name' => 'advertiserAdCostPerConversion']));

        return $this;
    }

    public function advertiserAdImpressions(): self
    {
        $this->metrics->push(new Metric(['name' => 'advertiserAdImpressions']));

        return $this;
    }

    public function averagePurchaseRevenue(): self
    {
        $this->metrics->push(new Metric(['name' => 'averagePurchaseRevenue']));

        return $this;
    }

    public function averagePurchaseRevenuePerPayingUser(): self
    {
        $this->metrics->push(new Metric(['name' => 'averagePurchaseRevenuePerPayingUser']));

        return $this;
    }

    public function averagePurchaseRevenuePerUser(): self
    {
        $this->metrics->push(new Metric(['name' => 'averagePurchaseRevenuePerUser']));

        return $this;
    }

    public function averageRevenuePerUser(): self
    {
        $this->metrics->push(new Metric(['name' => 'averageRevenuePerUser']));

        return $this;
    }

    public function averageSessionDuration(): self
    {
        $this->metrics->push(new Metric(['name' => 'averageSessionDuration']));

        return $this;
    }

    public function bounceRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'bounceRate']));

        return $this;
    }

    public function cartToViewRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'cartToViewRate']));

        return $this;
    }

    public function checkouts(): self
    {
        $this->metrics->push(new Metric(['name' => 'checkouts']));

        return $this;
    }

    public function cohortActiveUsers(): self
    {
        $this->metrics->push(new Metric(['name' => 'cohortActiveUsers']));

        return $this;
    }

    public function cohortTotalUsers(): self
    {
        $this->metrics->push(new Metric(['name' => 'cohortTotalUsers']));

        return $this;
    }

    public function conversions(): self
    {
        $this->metrics->push(new Metric(['name' => 'conversions']));

        return $this;
    }

    public function crashAffectedUsers(): self
    {
        $this->metrics->push(new Metric(['name' => 'crashAffectedUsers']));

        return $this;
    }

    public function crashFreeUsersRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'crashFreeUsersRate']));

        return $this;
    }

    public function dauPerMau(): self
    {
        $this->metrics->push(new Metric(['name' => 'dauPerMau']));

        return $this;
    }

    public function dauPerWau(): self
    {
        $this->metrics->push(new Metric(['name' => 'dauPerWau']));

        return $this;
    }

    public function ecommercePurchases(): self
    {
        $this->metrics->push(new Metric(['name' => 'ecommercePurchases']));

        return $this;
    }

    public function engagedSessions(): self
    {
        $this->metrics->push(new Metric(['name' => 'engagedSessions']));

        return $this;
    }

    public function engagementRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'engagementRate']));

        return $this;
    }

    public function eventCount(): self
    {
        $this->metrics->push(new Metric(['name' => 'eventCount']));

        return $this;
    }

    public function eventCountPerUser(): self
    {
        $this->metrics->push(new Metric(['name' => 'eventCountPerUser']));

        return $this;
    }

    public function eventValue(): self
    {
        $this->metrics->push(new Metric(['name' => 'eventValue']));

        return $this;
    }

    public function eventsPerSession(): self
    {
        $this->metrics->push(new Metric(['name' => 'eventsPerSession']));

        return $this;
    }

    public function firstTimePurchaserConversionRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'firstTimePurchaserConversionRate']));

        return $this;
    }

    public function firstTimePurchasers(): self
    {
        $this->metrics->push(new Metric(['name' => 'firstTimePurchasers']));

        return $this;
    }

    public function firstTimePurchasersPerNewUser(): self
    {
        $this->metrics->push(new Metric(['name' => 'firstTimePurchasersPerNewUser']));

        return $this;
    }

    public function itemListClickEvents(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemListClickEvents']));

        return $this;
    }

    public function itemListClickThroughRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemListClickThroughRate']));

        return $this;
    }

    public function itemListViewEvents(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemListViewEvents']));

        return $this;
    }

    public function itemPromotionClickThroughRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemPromotionClickThroughRate']));

        return $this;
    }

    public function itemRevenue(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemRevenue']));

        return $this;
    }

    public function itemViewEvents(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemViewEvents']));

        return $this;
    }

    public function itemsAddedToCart(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemsAddedToCart']));

        return $this;
    }

    public function itemsCheckedOut(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemsCheckedOut']));

        return $this;
    }

    public function itemsClickedInList(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemsClickedInList']));

        return $this;
    }

    public function itemsClickedInPromotion(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemsClickedInPromotion']));

        return $this;
    }

    public function itemsPurchased(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemsPurchased']));

        return $this;
    }

    public function itemsViewed(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemsViewed']));

        return $this;
    }

    public function itemsViewedInList(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemsViewedInList']));

        return $this;
    }

    public function itemsViewedInPromotion(): self
    {
        $this->metrics->push(new Metric(['name' => 'itemsViewedInPromotion']));

        return $this;
    }

    public function newUsers(): self
    {
        $this->metrics->push(new Metric(['name' => 'newUsers']));

        return $this;
    }

    public function organicGoogleSearchAveragePosition(): self
    {
        $this->metrics->push(new Metric(['name' => 'organicGoogleSearchAveragePosition']));

        return $this;
    }

    public function organicGoogleSearchClickThroughRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'organicGoogleSearchClickThroughRate']));

        return $this;
    }

    public function organicGoogleSearchClicks(): self
    {
        $this->metrics->push(new Metric(['name' => 'organicGoogleSearchClicks']));

        return $this;
    }

    public function organicGoogleSearchImpressions(): self
    {
        $this->metrics->push(new Metric(['name' => 'organicGoogleSearchImpressions']));

        return $this;
    }

    public function promotionClicks(): self
    {
        $this->metrics->push(new Metric(['name' => 'promotionClicks']));

        return $this;
    }

    public function promotionViews(): self
    {
        $this->metrics->push(new Metric(['name' => 'promotionViews']));

        return $this;
    }

    public function publisherAdClicks(): self
    {
        $this->metrics->push(new Metric(['name' => 'publisherAdClicks']));

        return $this;
    }

    public function publisherAdImpressions(): self
    {
        $this->metrics->push(new Metric(['name' => 'publisherAdImpressions']));

        return $this;
    }

    public function purchaseRevenue(): self
    {
        $this->metrics->push(new Metric(['name' => 'purchaseRevenue']));

        return $this;
    }

    public function purchaseToViewRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'purchaseToViewRate']));

        return $this;
    }

    public function purchaserConversionRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'purchaserConversionRate']));

        return $this;
    }

    public function returnOnAdSpend(): self
    {
        $this->metrics->push(new Metric(['name' => 'returnOnAdSpend']));

        return $this;
    }

    public function screenPageViews(): self
    {
        $this->metrics->push(new Metric(['name' => 'screenPageViews']));

        return $this;
    }

    public function screenPageViewsPerSession(): self
    {
        $this->metrics->push(new Metric(['name' => 'screenPageViewsPerSession']));

        return $this;
    }

    public function sessionConversionRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'sessionConversionRate']));

        return $this;
    }

    public function sessions(): self
    {
        $this->metrics->push(new Metric(['name' => 'sessions']));

        return $this;
    }

    public function sessionsPerUser(): self
    {
        $this->metrics->push(new Metric(['name' => 'sessionsPerUser']));

        return $this;
    }

    public function shippingAmount(): self
    {
        $this->metrics->push(new Metric(['name' => 'shippingAmount']));

        return $this;
    }

    public function taxAmount(): self
    {
        $this->metrics->push(new Metric(['name' => 'taxAmount']));

        return $this;
    }

    public function totalAdRevenue(): self
    {
        $this->metrics->push(new Metric(['name' => 'totalAdRevenue']));

        return $this;
    }

    public function totalPurchasers(): self
    {
        $this->metrics->push(new Metric(['name' => 'totalPurchasers']));

        return $this;
    }

    public function totalRevenue(): self
    {
        $this->metrics->push(new Metric(['name' => 'totalRevenue']));

        return $this;
    }

    public function totalUsers(): self
    {
        $this->metrics->push(new Metric(['name' => 'totalUsers']));

        return $this;
    }

    public function transactions(): self
    {
        $this->metrics->push(new Metric(['name' => 'transactions']));

        return $this;
    }

    public function transactionsPerPurchaser(): self
    {
        $this->metrics->push(new Metric(['name' => 'transactionsPerPurchaser']));

        return $this;
    }

    public function userConversionRate(): self
    {
        $this->metrics->push(new Metric(['name' => 'userConversionRate']));

        return $this;
    }

    public function userEngagementDuration(): self
    {
        $this->metrics->push(new Metric(['name' => 'userEngagementDuration']));

        return $this;
    }

    public function wauPerMau(): self
    {
        $this->metrics->push(new Metric(['name' => 'wauPerMau']));

        return $this;
    }
}
