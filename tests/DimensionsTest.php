<?php

namespace Gtmassey\LaravelAnalytics\Tests;

use Closure;
use Generator;
use Google\Analytics\Data\V1beta\Dimension;
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Illuminate\Support\Collection;

class DimensionsTest extends TestCase
{
    public static function dimensionProvider(): Generator
    {
        yield 'achievementId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->achievementId(),
            'dimension' => 'achievementId',
        ];

        yield 'adFormat' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->adFormat(),
            'dimension' => 'adFormat',
        ];

        yield 'adSourceName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->adSourceName(),
            'dimension' => 'adSourceName',
        ];

        yield 'adUnitName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->adUnitName(),
            'dimension' => 'adUnitName',
        ];

        yield 'appVersion' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->appVersion(),
            'dimension' => 'appVersion',
        ];

        yield 'audienceId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->audienceId(),
            'dimension' => 'audienceId',
        ];

        yield 'audienceName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->audienceName(),
            'dimension' => 'audienceName',
        ];

        yield 'brandingInterest' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->brandingInterest(),
            'dimension' => 'brandingInterest',
        ];

        yield 'browser' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->browser(),
            'dimension' => 'browser',
        ];

        yield 'campaignId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->campaignId(),
            'dimension' => 'campaignId',
        ];

        yield 'campaignName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->campaignName(),
            'dimension' => 'campaignName',
        ];

        yield 'character' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->character(),
            'dimension' => 'character',
        ];

        yield 'city' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->city(),
            'dimension' => 'city',
        ];

        yield 'cityId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->cityId(),
            'dimension' => 'cityId',
        ];

        yield 'cohort' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->cohort(),
            'dimension' => 'cohort',
        ];

        yield 'cohortNthDay' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->cohortNthDay(),
            'dimension' => 'cohortNthDay',
        ];

        yield 'cohortNthMonth' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->cohortNthMonth(),
            'dimension' => 'cohortNthMonth',
        ];

        yield 'cohortNthWeek' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->cohortNthWeek(),
            'dimension' => 'cohortNthWeek',
        ];

        yield 'contentGroup' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->contentGroup(),
            'dimension' => 'contentGroup',
        ];

        yield 'contentId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->contentId(),
            'dimension' => 'contentId',
        ];

        yield 'contentType' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->contentType(),
            'dimension' => 'contentType',
        ];

        yield 'country' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->country(),
            'dimension' => 'country',
        ];

        yield 'countryId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->countryId(),
            'dimension' => 'countryId',
        ];

        yield 'date' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->date(),
            'dimension' => 'date',
        ];

        yield 'dateHour' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->dateHour(),
            'dimension' => 'dateHour',
        ];

        yield 'dateHourMinute' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->dateHourMinute(),
            'dimension' => 'dateHourMinute',
        ];

        yield 'day' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->day(),
            'dimension' => 'day',
        ];

        yield 'dayOfWeek' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->dayOfWeek(),
            'dimension' => 'dayOfWeek',
        ];

        yield 'defaultChannelGroup' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->defaultChannelGroup(),
            'dimension' => 'defaultChannelGroup',
        ];

        yield 'deviceCategory' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->deviceCategory(),
            'dimension' => 'deviceCategory',
        ];

        yield 'deviceModel' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->deviceModel(),
            'dimension' => 'deviceModel',
        ];

        yield 'eventName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->eventName(),
            'dimension' => 'eventName',
        ];

        yield 'fileExtension' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->fileExtension(),
            'dimension' => 'fileExtension',
        ];

        yield 'fileName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->fileName(),
            'dimension' => 'fileName',
        ];

        yield 'firstSessionDate' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstSessionDate(),
            'dimension' => 'firstSessionDate',
        ];

        yield 'firstUserCampaignId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserCampaignId(),
            'dimension' => 'firstUserCampaignId',
        ];

        yield 'firstUserCampaignName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserCampaignName(),
            'dimension' => 'firstUserCampaignName',
        ];

        yield 'firstUserDefaultChannelGroup' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserDefaultChannelGroup(),
            'dimension' => 'firstUserDefaultChannelGroup',
        ];

        yield 'firstUserGoogleAdsAccountName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserGoogleAdsAccountName(),
            'dimension' => 'firstUserGoogleAdsAccountName',
        ];

        yield 'firstUserGoogleAdsAdGroupId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserGoogleAdsAdGroupId(),
            'dimension' => 'firstUserGoogleAdsAdGroupId',
        ];

        yield 'firstUserGoogleAdsAdGroupName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserGoogleAdsAdGroupName(),
            'dimension' => 'firstUserGoogleAdsAdGroupName',
        ];

        yield 'firstUserGoogleAdsAdNetworkType' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserGoogleAdsAdNetworkType(),
            'dimension' => 'firstUserGoogleAdsAdNetworkType',
        ];

        yield 'firstUserGoogleAdsCampaignId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserGoogleAdsCampaignId(),
            'dimension' => 'firstUserGoogleAdsCampaignId',
        ];

        yield 'firstUserGoogleAdsCampaignName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserGoogleAdsCampaignName(),
            'dimension' => 'firstUserGoogleAdsCampaignName',
        ];

        yield 'firstUserGoogleAdsCampaignType' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserGoogleAdsCampaignType(),
            'dimension' => 'firstUserGoogleAdsCampaignType',
        ];

        yield 'firstUserGoogleAdsCreativeId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserGoogleAdsCreativeId(),
            'dimension' => 'firstUserGoogleAdsCreativeId',
        ];

        yield 'firstUserGoogleAdsCustomerId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserGoogleAdsCustomerId(),
            'dimension' => 'firstUserGoogleAdsCustomerId',
        ];

        yield 'firstUserGoogleAdsKeyword' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserGoogleAdsKeyword(),
            'dimension' => 'firstUserGoogleAdsKeyword',
        ];

        yield 'firstUserGoogleAdsQuery' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserGoogleAdsQuery(),
            'dimension' => 'firstUserGoogleAdsQuery',
        ];

        yield 'firstUserManualAdContent' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserManualAdContent(),
            'dimension' => 'firstUserManualAdContent',
        ];

        yield 'firstUserManualTerm' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserManualTerm(),
            'dimension' => 'firstUserManualTerm',
        ];

        yield 'firstUserMedium' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserMedium(),
            'dimension' => 'firstUserMedium',
        ];

        yield 'firstUserSource' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserSource(),
            'dimension' => 'firstUserSource',
        ];

        yield 'firstUserSourceMedium' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserSourceMedium(),
            'dimension' => 'firstUserSourceMedium',
        ];

        yield 'firstUserSourcePlatform' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->firstUserSourcePlatform(),
            'dimension' => 'firstUserSourcePlatform',
        ];

        yield 'fullPageUrl' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->fullPageUrl(),
            'dimension' => 'fullPageUrl',
        ];

        yield 'googleAdsAccountName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->googleAdsAccountName(),
            'dimension' => 'googleAdsAccountName',
        ];

        yield 'googleAdsAdGroupId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->googleAdsAdGroupId(),
            'dimension' => 'googleAdsAdGroupId',
        ];

        yield 'googleAdsAdGroupName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->googleAdsAdGroupName(),
            'dimension' => 'googleAdsAdGroupName',
        ];

        yield 'googleAdsAdNetworkType' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->googleAdsAdNetworkType(),
            'dimension' => 'googleAdsAdNetworkType',
        ];

        yield 'googleAdsCampaignId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->googleAdsCampaignId(),
            'dimension' => 'googleAdsCampaignId',
        ];

        yield 'googleAdsCampaignName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->googleAdsCampaignName(),
            'dimension' => 'googleAdsCampaignName',
        ];

        yield 'googleAdsCampaignType' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->googleAdsCampaignType(),
            'dimension' => 'googleAdsCampaignType',
        ];

        yield 'googleAdsCreativeId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->googleAdsCreativeId(),
            'dimension' => 'googleAdsCreativeId',
        ];

        yield 'googleAdsCustomerId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->googleAdsCustomerId(),
            'dimension' => 'googleAdsCustomerId',
        ];

        yield 'googleAdsKeyword' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->googleAdsKeyword(),
            'dimension' => 'googleAdsKeyword',
        ];

        yield 'googleAdsQuery' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->googleAdsQuery(),
            'dimension' => 'googleAdsQuery',
        ];

        yield 'groupId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->groupId(),
            'dimension' => 'groupId',
        ];

        yield 'hostName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->hostName(),
            'dimension' => 'hostName',
        ];

        yield 'hour' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->hour(),
            'dimension' => 'hour',
        ];

        yield 'isConversionEvent' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->isConversionEvent(),
            'dimension' => 'isConversionEvent',
        ];

        yield 'itemAffiliation' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemAffiliation(),
            'dimension' => 'itemAffiliation',
        ];

        yield 'itemBrand' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemBrand(),
            'dimension' => 'itemBrand',
        ];

        yield 'itemCategory' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemCategory(),
            'dimension' => 'itemCategory',
        ];

        yield 'itemCategory2' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemCategory2(),
            'dimension' => 'itemCategory2',
        ];

        yield 'itemCategory3' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemCategory3(),
            'dimension' => 'itemCategory3',
        ];

        yield 'itemCategory4' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemCategory4(),
            'dimension' => 'itemCategory4',
        ];

        yield 'itemCategory5' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemCategory5(),
            'dimension' => 'itemCategory5',
        ];

        yield 'itemId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemId(),
            'dimension' => 'itemId',
        ];

        yield 'itemListId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemListId(),
            'dimension' => 'itemListId',
        ];

        yield 'itemListName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemListName(),
            'dimension' => 'itemListName',
        ];

        yield 'itemName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemName(),
            'dimension' => 'itemName',
        ];

        yield 'itemPromotionCreativeName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemPromotionCreativeName(),
            'dimension' => 'itemPromotionCreativeName',
        ];

        yield 'itemPromotionId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemPromotionId(),
            'dimension' => 'itemPromotionId',
        ];

        yield 'itemPromotionName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemPromotionName(),
            'dimension' => 'itemPromotionName',
        ];

        yield 'itemVariant' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->itemVariant(),
            'dimension' => 'itemVariant',
        ];

        yield 'landingPage' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->landingPage(),
            'dimension' => 'landingPage',
        ];

        yield 'language' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->language(),
            'dimension' => 'language',
        ];

        yield 'languageCode' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->languageCode(),
            'dimension' => 'languageCode',
        ];

        yield 'level' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->level(),
            'dimension' => 'level',
        ];

        yield 'linkClasses' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->linkClasses(),
            'dimension' => 'linkClasses',
        ];

        yield 'linkDomain' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->linkDomain(),
            'dimension' => 'linkDomain',
        ];

        yield 'linkId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->linkId(),
            'dimension' => 'linkId',
        ];

        yield 'linkText' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->linkText(),
            'dimension' => 'linkText',
        ];

        yield 'linkUrl' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->linkUrl(),
            'dimension' => 'linkUrl',
        ];

        yield 'manualAdContent' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->manualAdContent(),
            'dimension' => 'manualAdContent',
        ];

        yield 'manualTerm' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->manualTerm(),
            'dimension' => 'manualTerm',
        ];

        yield 'medium' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->medium(),
            'dimension' => 'medium',
        ];

        yield 'method' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->method(),
            'dimension' => 'method',
        ];

        yield 'minute' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->minute(),
            'dimension' => 'minute',
        ];

        yield 'mobileDeviceBranding' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->mobileDeviceBranding(),
            'dimension' => 'mobileDeviceBranding',
        ];

        yield 'mobileDeviceMarketingName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->mobileDeviceMarketingName(),
            'dimension' => 'mobileDeviceMarketingName',
        ];

        yield 'mobileDeviceModel' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->mobileDeviceModel(),
            'dimension' => 'mobileDeviceModel',
        ];

        yield 'month' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->month(),
            'dimension' => 'month',
        ];

        yield 'newVsReturning' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->newVsReturning(),
            'dimension' => 'newVsReturning',
        ];

        yield 'nthDay' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->nthDay(),
            'dimension' => 'nthDay',
        ];

        yield 'nthHour' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->nthHour(),
            'dimension' => 'nthHour',
        ];

        yield 'nthMinute' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->nthMinute(),
            'dimension' => 'nthMinute',
        ];

        yield 'nthMonth' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->nthMonth(),
            'dimension' => 'nthMonth',
        ];

        yield 'nthWeek' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->nthWeek(),
            'dimension' => 'nthWeek',
        ];

        yield 'nthYear' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->nthYear(),
            'dimension' => 'nthYear',
        ];

        yield 'operatingSystem' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->operatingSystem(),
            'dimension' => 'operatingSystem',
        ];

        yield 'operatingSystemVersion' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->operatingSystemVersion(),
            'dimension' => 'operatingSystemVersion',
        ];

        yield 'operatingSystemWithVersion' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->operatingSystemWithVersion(),
            'dimension' => 'operatingSystemWithVersion',
        ];

        yield 'orderCoupon' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->orderCoupon(),
            'dimension' => 'orderCoupon',
        ];

        yield 'outbound' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->outbound(),
            'dimension' => 'outbound',
        ];

        yield 'pageLocation' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->pageLocation(),
            'dimension' => 'pageLocation',
        ];

        yield 'pagePath' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->pagePath(),
            'dimension' => 'pagePath',
        ];

        yield 'pagePathPlusQueryString' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->pagePathPlusQueryString(),
            'dimension' => 'pagePathPlusQueryString',
        ];

        yield 'pageReferrer' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->pageReferrer(),
            'dimension' => 'pageReferrer',
        ];

        yield 'pageTitle' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->pageTitle(),
            'dimension' => 'pageTitle',
        ];

        yield 'percentScrolled' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->percentScrolled(),
            'dimension' => 'percentScrolled',
        ];

        yield 'platform' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->platform(),
            'dimension' => 'platform',
        ];

        yield 'platformDeviceCategory' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->platformDeviceCategory(),
            'dimension' => 'platformDeviceCategory',
        ];

        yield 'region' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->region(),
            'dimension' => 'region',
        ];

        yield 'screenResolution' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->screenResolution(),
            'dimension' => 'screenResolution',
        ];

        yield 'searchTerm' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->searchTerm(),
            'dimension' => 'searchTerm',
        ];

        yield 'sessionCampaignId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionCampaignId(),
            'dimension' => 'sessionCampaignId',
        ];

        yield 'sessionCampaignName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionCampaignName(),
            'dimension' => 'sessionCampaignName',
        ];

        yield 'sessionDefaultChannelGroup' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionDefaultChannelGroup(),
            'dimension' => 'sessionDefaultChannelGroup',
        ];

        yield 'sessionGoogleAdsAccountName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionGoogleAdsAccountName(),
            'dimension' => 'sessionGoogleAdsAccountName',
        ];

        yield 'sessionGoogleAdsAdGroupId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionGoogleAdsAdGroupId(),
            'dimension' => 'sessionGoogleAdsAdGroupId',
        ];

        yield 'sessionGoogleAdsAdGroupName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionGoogleAdsAdGroupName(),
            'dimension' => 'sessionGoogleAdsAdGroupName',
        ];

        yield 'sessionGoogleAdsAdNetworkType' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionGoogleAdsAdNetworkType(),
            'dimension' => 'sessionGoogleAdsAdNetworkType',
        ];

        yield 'sessionGoogleAdsCampaignId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionGoogleAdsCampaignId(),
            'dimension' => 'sessionGoogleAdsCampaignId',
        ];

        yield 'sessionGoogleAdsCampaignName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionGoogleAdsCampaignName(),
            'dimension' => 'sessionGoogleAdsCampaignName',
        ];

        yield 'sessionGoogleAdsCampaignType' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionGoogleAdsCampaignType(),
            'dimension' => 'sessionGoogleAdsCampaignType',
        ];

        yield 'sessionGoogleAdsCreativeId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionGoogleAdsCreativeId(),
            'dimension' => 'sessionGoogleAdsCreativeId',
        ];

        yield 'sessionGoogleAdsCustomerId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionGoogleAdsCustomerId(),
            'dimension' => 'sessionGoogleAdsCustomerId',
        ];

        yield 'sessionGoogleAdsKeyword' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionGoogleAdsKeyword(),
            'dimension' => 'sessionGoogleAdsKeyword',
        ];

        yield 'sessionGoogleAdsQuery' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionGoogleAdsQuery(),
            'dimension' => 'sessionGoogleAdsQuery',
        ];

        yield 'sessionManualAdContent' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionManualAdContent(),
            'dimension' => 'sessionManualAdContent',
        ];

        yield 'sessionManualTerm' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionManualTerm(),
            'dimension' => 'sessionManualTerm',
        ];

        yield 'sessionMedium' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionMedium(),
            'dimension' => 'sessionMedium',
        ];

        yield 'sessionSa360AdGroupName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSa360AdGroupName(),
            'dimension' => 'sessionSa360AdGroupName',
        ];

        yield 'sessionSa360CampaignId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSa360CampaignId(),
            'dimension' => 'sessionSa360CampaignId',
        ];

        yield 'sessionSa360CampaignName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSa360CampaignName(),
            'dimension' => 'sessionSa360CampaignName',
        ];

        yield 'sessionSa360CreativeFormat' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSa360CreativeFormat(),
            'dimension' => 'sessionSa360CreativeFormat',
        ];

        yield 'sessionSa360EngineAccountId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSa360EngineAccountId(),
            'dimension' => 'sessionSa360EngineAccountId',
        ];

        yield 'sessionSa360EngineAccountName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSa360EngineAccountName(),
            'dimension' => 'sessionSa360EngineAccountName',
        ];

        yield 'sessionSa360EngineAccountType' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSa360EngineAccountType(),
            'dimension' => 'sessionSa360EngineAccountType',
        ];

        yield 'sessionSa360Keyword' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSa360Keyword(),
            'dimension' => 'sessionSa360Keyword',
        ];

        yield 'sessionSa360Medium' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSa360Medium(),
            'dimension' => 'sessionSa360Medium',
        ];

        yield 'sessionSa360Query' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSa360Query(),
            'dimension' => 'sessionSa360Query',
        ];

        yield 'sessionSa360Source' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSa360Source(),
            'dimension' => 'sessionSa360Source',
        ];

        yield 'sessionSource' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSource(),
            'dimension' => 'sessionSource',
        ];

        yield 'sessionSourceMedium' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSourceMedium(),
            'dimension' => 'sessionSourceMedium',
        ];

        yield 'sessionSourcePlatform' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sessionSourcePlatform(),
            'dimension' => 'sessionSourcePlatform',
        ];

        yield 'shippingTier' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->shippingTier(),
            'dimension' => 'shippingTier',
        ];

        yield 'signedInWithUserId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->signedInWithUserId(),
            'dimension' => 'signedInWithUserId',
        ];

        yield 'source' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->source(),
            'dimension' => 'source',
        ];

        yield 'sourceMedium' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sourceMedium(),
            'dimension' => 'sourceMedium',
        ];

        yield 'sourcePlatform' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->sourcePlatform(),
            'dimension' => 'sourcePlatform',
        ];

        yield 'streamId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->streamId(),
            'dimension' => 'streamId',
        ];

        yield 'streamName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->streamName(),
            'dimension' => 'streamName',
        ];

        yield 'testDataFilterName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->testDataFilterName(),
            'dimension' => 'testDataFilterName',
        ];

        yield 'transactionId' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->transactionId(),
            'dimension' => 'transactionId',
        ];

        yield 'unifiedPagePathScreen' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->unifiedPagePathScreen(),
            'dimension' => 'unifiedPagePathScreen',
        ];

        yield 'unifiedPageScreen' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->unifiedPageScreen(),
            'dimension' => 'unifiedPageScreen',
        ];

        yield 'unifiedScreenClass' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->unifiedScreenClass(),
            'dimension' => 'unifiedScreenClass',
        ];

        yield 'unifiedScreenName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->unifiedScreenName(),
            'dimension' => 'unifiedScreenName',
        ];

        yield 'userAgeBracket' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->userAgeBracket(),
            'dimension' => 'userAgeBracket',
        ];

        yield 'userGender' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->userGender(),
            'dimension' => 'userGender',
        ];

        yield 'videoProvider' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->videoProvider(),
            'dimension' => 'videoProvider',
        ];

        yield 'videoTitle' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->videoTitle(),
            'dimension' => 'videoTitle',
        ];

        yield 'videoUrl' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->videoUrl(),
            'dimension' => 'videoUrl',
        ];

        yield 'virtualCurrencyName' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->virtualCurrencyName(),
            'dimension' => 'virtualCurrencyName',
        ];

        yield 'visible' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->visible(),
            'dimension' => 'visible',
        ];

        yield 'week' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->week(),
            'dimension' => 'week',
        ];

        yield 'year' => [
            'method' => fn (Dimensions $dimensions) => $dimensions->year(),
            'dimension' => 'year',
        ];
    }

    /**
     * @param  Closure(Dimensions): Dimensions  $method
     *
     * @dataProvider dimensionProvider
     */
    public function test_predefined_dimensions(Closure $method, string $dimension): void
    {
        $dimensions = new Dimensions;
        $dimensions = $method($dimensions);

        $this->assertEquals(1, $dimensions->count());
        $this->assertInstanceOf(Collection::class, $dimensions->getDimensions());
        $this->assertInstanceOf(Dimension::class, $dimensions->getDimensions()->first());
        $this->assertEquals($dimension, $dimensions->getDimensions()->first()->getName());
    }
}
