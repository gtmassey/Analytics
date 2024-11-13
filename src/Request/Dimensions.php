<?php

namespace Gtmassey\LaravelAnalytics\Request;

use Google\Analytics\Data\V1beta\Dimension;
use Illuminate\Support\Collection;

class Dimensions
{
    /** @var Collection<int, Dimension> */
    protected Collection $dimensions;

    public function __construct()
    {
        $this->dimensions = new Collection;
    }

    public function count(): int
    {
        return $this->dimensions->count();
    }

    public function first(): ?Dimension
    {
        return $this->dimensions->first();
    }

    /**
     * @return Collection<int, Dimension>
     */
    public function getDimensions(): Collection
    {
        return $this->dimensions;
    }

    public function achievementId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'achievementId']));

        return $this;
    }

    public function adFormat(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'adFormat']));

        return $this;
    }

    public function adSourceName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'adSourceName']));

        return $this;
    }

    public function adUnitName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'adUnitName']));

        return $this;
    }

    public function appVersion(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'appVersion']));

        return $this;
    }

    public function audienceId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'audienceId']));

        return $this;
    }

    public function audienceName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'audienceName']));

        return $this;
    }

    public function brandingInterest(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'brandingInterest']));

        return $this;
    }

    public function browser(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'browser']));

        return $this;
    }

    public function campaignId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'campaignId']));

        return $this;
    }

    public function campaignName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'campaignName']));

        return $this;
    }

    public function character(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'character']));

        return $this;
    }

    public function city(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'city']));

        return $this;
    }

    public function cityId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'cityId']));

        return $this;
    }

    public function cohort(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'cohort']));

        return $this;
    }

    public function cohortNthDay(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'cohortNthDay']));

        return $this;
    }

    public function cohortNthMonth(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'cohortNthMonth']));

        return $this;
    }

    public function cohortNthWeek(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'cohortNthWeek']));

        return $this;
    }

    public function contentGroup(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'contentGroup']));

        return $this;
    }

    public function contentId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'contentId']));

        return $this;
    }

    public function contentType(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'contentType']));

        return $this;
    }

    public function country(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'country']));

        return $this;
    }

    public function countryId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'countryId']));

        return $this;
    }

    public function date(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'date']));

        return $this;
    }

    public function dateHour(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'dateHour']));

        return $this;
    }

    public function dateHourMinute(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'dateHourMinute']));

        return $this;
    }

    public function day(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'day']));

        return $this;
    }

    public function dayOfWeek(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'dayOfWeek']));

        return $this;
    }

    public function defaultChannelGroup(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'defaultChannelGroup']));

        return $this;
    }

    public function deviceCategory(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'deviceCategory']));

        return $this;
    }

    public function deviceModel(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'deviceModel']));

        return $this;
    }

    public function eventName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'eventName']));

        return $this;
    }

    public function fileExtension(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'fileExtension']));

        return $this;
    }

    public function fileName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'fileName']));

        return $this;
    }

    public function firstSessionDate(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstSessionDate']));

        return $this;
    }

    public function firstUserCampaignId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserCampaignId']));

        return $this;
    }

    public function firstUserCampaignName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserCampaignName']));

        return $this;
    }

    public function firstUserDefaultChannelGroup(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserDefaultChannelGroup']));

        return $this;
    }

    public function firstUserGoogleAdsAccountName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserGoogleAdsAccountName']));

        return $this;
    }

    public function firstUserGoogleAdsAdGroupId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserGoogleAdsAdGroupId']));

        return $this;
    }

    public function firstUserGoogleAdsAdGroupName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserGoogleAdsAdGroupName']));

        return $this;
    }

    public function firstUserGoogleAdsAdNetworkType(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserGoogleAdsAdNetworkType']));

        return $this;
    }

    public function firstUserGoogleAdsCampaignId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserGoogleAdsCampaignId']));

        return $this;
    }

    public function firstUserGoogleAdsCampaignName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserGoogleAdsCampaignName']));

        return $this;
    }

    public function firstUserGoogleAdsCampaignType(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserGoogleAdsCampaignType']));

        return $this;
    }

    public function firstUserGoogleAdsCreativeId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserGoogleAdsCreativeId']));

        return $this;
    }

    public function firstUserGoogleAdsCustomerId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserGoogleAdsCustomerId']));

        return $this;
    }

    public function firstUserGoogleAdsKeyword(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserGoogleAdsKeyword']));

        return $this;
    }

    public function firstUserGoogleAdsQuery(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserGoogleAdsQuery']));

        return $this;
    }

    public function firstUserManualAdContent(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserManualAdContent']));

        return $this;
    }

    public function firstUserManualTerm(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserManualTerm']));

        return $this;
    }

    public function firstUserMedium(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserMedium']));

        return $this;
    }

    public function firstUserSource(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserSource']));

        return $this;
    }

    public function firstUserSourceMedium(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserSourceMedium']));

        return $this;
    }

    public function firstUserSourcePlatform(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'firstUserSourcePlatform']));

        return $this;
    }

    public function fullPageUrl(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'fullPageUrl']));

        return $this;
    }

    public function googleAdsAccountName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'googleAdsAccountName']));

        return $this;
    }

    public function googleAdsAdGroupId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'googleAdsAdGroupId']));

        return $this;
    }

    public function googleAdsAdGroupName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'googleAdsAdGroupName']));

        return $this;
    }

    public function googleAdsAdNetworkType(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'googleAdsAdNetworkType']));

        return $this;
    }

    public function googleAdsCampaignId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'googleAdsCampaignId']));

        return $this;
    }

    public function googleAdsCampaignName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'googleAdsCampaignName']));

        return $this;
    }

    public function googleAdsCampaignType(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'googleAdsCampaignType']));

        return $this;
    }

    public function googleAdsCreativeId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'googleAdsCreativeId']));

        return $this;
    }

    public function googleAdsCustomerId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'googleAdsCustomerId']));

        return $this;
    }

    public function googleAdsKeyword(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'googleAdsKeyword']));

        return $this;
    }

    public function googleAdsQuery(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'googleAdsQuery']));

        return $this;
    }

    public function groupId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'groupId']));

        return $this;
    }

    public function hostName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'hostName']));

        return $this;
    }

    public function hour(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'hour']));

        return $this;
    }

    public function isConversionEvent(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'isConversionEvent']));

        return $this;
    }

    public function itemAffiliation(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemAffiliation']));

        return $this;
    }

    public function itemBrand(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemBrand']));

        return $this;
    }

    public function itemCategory(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemCategory']));

        return $this;
    }

    public function itemCategory2(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemCategory2']));

        return $this;
    }

    public function itemCategory3(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemCategory3']));

        return $this;
    }

    public function itemCategory4(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemCategory4']));

        return $this;
    }

    public function itemCategory5(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemCategory5']));

        return $this;
    }

    public function itemId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemId']));

        return $this;
    }

    public function itemListId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemListId']));

        return $this;
    }

    public function itemListName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemListName']));

        return $this;
    }

    public function itemName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemName']));

        return $this;
    }

    public function itemPromotionCreativeName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemPromotionCreativeName']));

        return $this;
    }

    public function itemPromotionId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemPromotionId']));

        return $this;
    }

    public function itemPromotionName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemPromotionName']));

        return $this;
    }

    public function itemVariant(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'itemVariant']));

        return $this;
    }

    public function landingPage(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'landingPage']));

        return $this;
    }

    public function language(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'language']));

        return $this;
    }

    public function languageCode(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'languageCode']));

        return $this;
    }

    public function level(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'level']));

        return $this;
    }

    public function linkClasses(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'linkClasses']));

        return $this;
    }

    public function linkDomain(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'linkDomain']));

        return $this;
    }

    public function linkId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'linkId']));

        return $this;
    }

    public function linkText(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'linkText']));

        return $this;
    }

    public function linkUrl(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'linkUrl']));

        return $this;
    }

    public function manualAdContent(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'manualAdContent']));

        return $this;
    }

    public function manualTerm(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'manualTerm']));

        return $this;
    }

    public function medium(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'medium']));

        return $this;
    }

    public function method(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'method']));

        return $this;
    }

    public function minute(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'minute']));

        return $this;
    }

    public function mobileDeviceBranding(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'mobileDeviceBranding']));

        return $this;
    }

    public function mobileDeviceMarketingName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'mobileDeviceMarketingName']));

        return $this;
    }

    public function mobileDeviceModel(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'mobileDeviceModel']));

        return $this;
    }

    public function month(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'month']));

        return $this;
    }

    public function newVsReturning(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'newVsReturning']));

        return $this;
    }

    public function nthDay(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'nthDay']));

        return $this;
    }

    public function nthHour(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'nthHour']));

        return $this;
    }

    public function nthMinute(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'nthMinute']));

        return $this;
    }

    public function nthMonth(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'nthMonth']));

        return $this;
    }

    public function nthWeek(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'nthWeek']));

        return $this;
    }

    public function nthYear(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'nthYear']));

        return $this;
    }

    public function operatingSystem(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'operatingSystem']));

        return $this;
    }

    public function operatingSystemVersion(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'operatingSystemVersion']));

        return $this;
    }

    public function operatingSystemWithVersion(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'operatingSystemWithVersion']));

        return $this;
    }

    public function orderCoupon(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'orderCoupon']));

        return $this;
    }

    public function outbound(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'outbound']));

        return $this;
    }

    public function pageLocation(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'pageLocation']));

        return $this;
    }

    public function pagePath(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'pagePath']));

        return $this;
    }

    public function pagePathPlusQueryString(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'pagePathPlusQueryString']));

        return $this;
    }

    public function pageReferrer(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'pageReferrer']));

        return $this;
    }

    public function pageTitle(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'pageTitle']));

        return $this;
    }

    public function percentScrolled(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'percentScrolled']));

        return $this;
    }

    public function platform(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'platform']));

        return $this;
    }

    public function platformDeviceCategory(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'platformDeviceCategory']));

        return $this;
    }

    public function region(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'region']));

        return $this;
    }

    public function screenResolution(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'screenResolution']));

        return $this;
    }

    public function searchTerm(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'searchTerm']));

        return $this;
    }

    public function sessionCampaignId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionCampaignId']));

        return $this;
    }

    public function sessionCampaignName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionCampaignName']));

        return $this;
    }

    public function sessionDefaultChannelGroup(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionDefaultChannelGroup']));

        return $this;
    }

    public function sessionGoogleAdsAccountName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionGoogleAdsAccountName']));

        return $this;
    }

    public function sessionGoogleAdsAdGroupId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionGoogleAdsAdGroupId']));

        return $this;
    }

    public function sessionGoogleAdsAdGroupName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionGoogleAdsAdGroupName']));

        return $this;
    }

    public function sessionGoogleAdsAdNetworkType(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionGoogleAdsAdNetworkType']));

        return $this;
    }

    public function sessionGoogleAdsCampaignId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionGoogleAdsCampaignId']));

        return $this;
    }

    public function sessionGoogleAdsCampaignName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionGoogleAdsCampaignName']));

        return $this;
    }

    public function sessionGoogleAdsCampaignType(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionGoogleAdsCampaignType']));

        return $this;
    }

    public function sessionGoogleAdsCreativeId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionGoogleAdsCreativeId']));

        return $this;
    }

    public function sessionGoogleAdsCustomerId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionGoogleAdsCustomerId']));

        return $this;
    }

    public function sessionGoogleAdsKeyword(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionGoogleAdsKeyword']));

        return $this;
    }

    public function sessionGoogleAdsQuery(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionGoogleAdsQuery']));

        return $this;
    }

    public function sessionManualAdContent(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionManualAdContent']));

        return $this;
    }

    public function sessionManualTerm(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionManualTerm']));

        return $this;
    }

    public function sessionMedium(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionMedium']));

        return $this;
    }

    public function sessionSa360AdGroupName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSa360AdGroupName']));

        return $this;
    }

    public function sessionSa360CampaignId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSa360CampaignId']));

        return $this;
    }

    public function sessionSa360CampaignName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSa360CampaignName']));

        return $this;
    }

    public function sessionSa360CreativeFormat(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSa360CreativeFormat']));

        return $this;
    }

    public function sessionSa360EngineAccountId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSa360EngineAccountId']));

        return $this;
    }

    public function sessionSa360EngineAccountName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSa360EngineAccountName']));

        return $this;
    }

    public function sessionSa360EngineAccountType(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSa360EngineAccountType']));

        return $this;
    }

    public function sessionSa360Keyword(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSa360Keyword']));

        return $this;
    }

    public function sessionSa360Medium(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSa360Medium']));

        return $this;
    }

    public function sessionSa360Query(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSa360Query']));

        return $this;
    }

    public function sessionSa360Source(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSa360Source']));

        return $this;
    }

    public function sessionSource(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSource']));

        return $this;
    }

    public function sessionSourceMedium(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSourceMedium']));

        return $this;
    }

    public function sessionSourcePlatform(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sessionSourcePlatform']));

        return $this;
    }

    public function shippingTier(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'shippingTier']));

        return $this;
    }

    public function signedInWithUserId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'signedInWithUserId']));

        return $this;
    }

    public function source(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'source']));

        return $this;
    }

    public function sourceMedium(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sourceMedium']));

        return $this;
    }

    public function sourcePlatform(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'sourcePlatform']));

        return $this;
    }

    public function streamId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'streamId']));

        return $this;
    }

    public function streamName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'streamName']));

        return $this;
    }

    public function testDataFilterName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'testDataFilterName']));

        return $this;
    }

    public function transactionId(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'transactionId']));

        return $this;
    }

    public function unifiedPagePathScreen(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'unifiedPagePathScreen']));

        return $this;
    }

    public function unifiedPageScreen(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'unifiedPageScreen']));

        return $this;
    }

    public function unifiedScreenClass(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'unifiedScreenClass']));

        return $this;
    }

    public function unifiedScreenName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'unifiedScreenName']));

        return $this;
    }

    public function userAgeBracket(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'userAgeBracket']));

        return $this;
    }

    public function userGender(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'userGender']));

        return $this;
    }

    public function videoProvider(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'videoProvider']));

        return $this;
    }

    public function videoTitle(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'videoTitle']));

        return $this;
    }

    public function videoUrl(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'videoUrl']));

        return $this;
    }

    public function virtualCurrencyName(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'virtualCurrencyName']));

        return $this;
    }

    public function visible(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'visible']));

        return $this;
    }

    public function week(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'week']));

        return $this;
    }

    public function year(): self
    {
        $this->dimensions->push(new Dimension(['name' => 'year']));

        return $this;
    }
}
