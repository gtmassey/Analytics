# Analytics

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Tests][ico-tests]][link-tests]

Build Google Analytics Data API queries in Laravel with ease!

Methods currently return an instance of `Gtmassey\LaravelAnalytics\ResponseData`, containing the dimension and metric headers, and results in `rows`.

**Table of Contents:**

* [Installation](#instal)
* [Setup](#setup)
    * [As ENV file (default)](#env)
    * [Separate JSON File](#json)
    * [JSON String](#jsonString)
    * [Separate Values](#vals)
* [Usage](#usage)
    * [Query Builder](#querybuilder)
    * [Filtering](#filtering)
    * [Ordering](#ordering)
    * [Default Reports](#defaultreports)
* [Extensibility](#extensibility)
    * [Custom Metrics And Dimensions](#custommetrics)
    * [Reusable Filters](#reusablefilters)
* [Changelog](#changelog)
* [Testing](#testing)

## <a name="instal">Installation</a>

Via Composer

```SHELL
composer require gtmassey/laravel-analytics
```

## <a name="setup">Setup</a>

To use this package, you must have a Google Cloud Service Accounts Credential.

If you do not have a project set up on Google Cloud Platform, visit [console.cloud.google.com/projectcreate](https://console.cloud.google.com/projectcreate) to create a new project.

Once you have a project, make sure you have selected that project in the top left corner of the console.

![Screen Shot 2022-11-30 at 2 22 35 PM](https://user-images.githubusercontent.com/109831143/204912891-624b9403-12f4-484a-8d12-368d8b56a805.png)

Select APIs & Services from the quick access cards on the dashboard.

![Screen Shot 2022-11-30 at 2 22 54 PM](https://user-images.githubusercontent.com/109831143/204912927-8acb75be-f92e-451c-8e06-cae33430425a.png)

Make sure you have Google Analytics Data API enabled. NOTE: this is NOT the same API as Google Analytics API. The Data API is the required API for this package. If you do not have the Google Analytics Data API enabled, you can add it to your Cloud Console account by clicking "enable APIs and Services"

![Screen Shot 2022-11-30 at 2 23 25 PM](https://user-images.githubusercontent.com/109831143/204913094-e8967a6b-fed8-43c1-afbc-fafa3c6d0907.png)

You can search for the Google Analytics Data API and enable it through the Google API Library

![Screen Shot 2022-11-30 at 2 24 09 PM](https://user-images.githubusercontent.com/109831143/204913299-365425cb-b71e-41fe-aa55-fbefcb7c6b6f.png)

![Screen Shot 2022-11-30 at 2 24 21 PM](https://user-images.githubusercontent.com/109831143/204913340-17655e94-8233-404d-9c29-ed100273453c.png)

Once enabled, select the Google Analytics Data API from the list of APIs, and click the Credentials tab.

![Screen Shot 2022-11-30 at 2 24 48 PM](https://user-images.githubusercontent.com/109831143/204913379-d751a05f-5884-4f8e-a952-845312f1cad5.png)

If you already have a service account set up with this API, you can skip the next step.

Click the Create Credentials button, and select Service Account.

![Screen Shot 2022-11-30 at 2 26 24 PM](https://user-images.githubusercontent.com/109831143/204913480-2eaa83e4-f786-4815-9848-d533587d0a51.png)

Select the role you want to assign to the service account. For this package, the minimum role is the Viewer role.

Once your service account has been created, click on the account to go to the IAM & Admin section of Google Cloud Console.

In the Service Accounts section of the IAM & Admin page, select the appropriate service account, and create a new JSON key for the account:

![Screen Shot 2022-11-30 at 2 27 01 PM](https://user-images.githubusercontent.com/109831143/204913731-8907f7ec-17ad-453e-8721-7098d71e3ab9.png)

![Screen Shot 2022-11-30 at 2 27 14 PM](https://user-images.githubusercontent.com/109831143/204913810-41a9739b-fdb9-4500-8e81-aaf083bb873c.png)

Once the key is created, download the JSON file and save it somewhere safe. You will need this file to use this package. If you lose this file, you will have to create a new service account. Google does not let you re-issue keys.

You can use these credentials in several ways:

### <a name="env">As ENV value (default)</a>

This is ideal setup if you're using only one service account for your application.

Specify the path to the JSON file in your .env file:

```dotenv
GOOGLE_APPLICATION_CREDENTIALS=/path/to/credentials.json
```

### <a name="json">As a separate JSON file</a>

If you have multiple service accounts, you can instruct this package to use a specific one:

```dotenv
ANALYTICS_CREDENTIALS_USE_ENV=false
ANALYTICS_CREDENTIALS_FILE=/path/to/credentials.json
```

### <a name="jsonString">As a JSON string</a>

If you don't want to store the credentials in a file, you can specify the JSON string directly in your .env file:

```dotenv
ANALYTICS_CREDENTIALS_USE_ENV=false
ANALYTICS_CREDENTIALS_JSON="{type: service_account, project_id: ...}"
```

### <a name="vals">As separate values</a>

You can also specify the credentials as separate values in your .env file:

```dotenv
ANALYTICS_CREDENTIALS_USE_ENV=false
ANALYTICS_CREDENTIALS_TYPE=service_account
ANALYTICS_CREDENTIALS_PROJECT_ID=...
ANALYTICS_CREDENTIALS_PRIVATE_KEY_ID=...
ANALYTICS_CREDENTIALS_PRIVATE_KEY=...
ANALYTICS_CREDENTIALS_CLIENT_EMAIL=...
ANALYTICS_CREDENTIALS_CLIENT_ID=...
ANALYTICS_CREDENTIALS_AUTH_URI=...
ANALYTICS_CREDENTIALS_TOKEN_URI=...
ANALYTICS_CREDENTIALS_AUTH_PROVIDER_X509_CERT_URL=...
ANALYTICS_CREDENTIALS_CLIENT_X509_CERT_URL=...
```

> **Warning**
> Package will always prioritize `GOOGLE_APPLICATION_CREDENTIALS` env value over other options. If you want to use a separate service account, make sure to set `ANALYTICS_CREDENTIALS_USE_ENV=false`.

Finally, open Google Analytics, and copy the property ID for the property you want to query. You will need this ID to use this package.

![Screen Shot 2022-11-30 at 2 40 42 PM](https://user-images.githubusercontent.com/109831143/204914645-385e0b5c-f248-4dad-b99c-2064f5ca8be6.png)

Set the property ID in your `.env` file.

```dotenv
ANALYTICS_PROPERTY_ID="XXXXXXXXX"
```

Now you're ready to start!

## Usage

Once installation is complete, you can run Google Analytics Data API queries in your application.

All Google Analytics Data API queries require a date range to be run. Use the `Period` class to generate a period of time for the query.

### <a name="querybuilder">Query Builder:</a>

```php
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\Period\Period;
use Carbon\Carbon;

$report = Analytics::query()
    ->setMetrics(fn(Metrics $metrics) => $metrics
        ->active1DayUsers()
        ->active7DayUsers()
        ->active28DayUsers()
    )
    ->forPeriod(Period::defaultPeriod())
    ->run();

$report2 = Analytics::query()
    ->setMetrics(fn(Metrics $metrics) => $metrics->sessions())
    ->setDimensions(fn(Dimensions $dimensions) => $dimensions->pageTitle())
    ->forPeriod(Period::create(Carbon::now()->subDays(30), Carbon::now()))
    ->run();
```

### <a name="filtering">Filtering:</a>

Filtering closely follows [Google Analytics Data API documentation](https://developers.google.com/analytics/devguides/reporting/data/v1/rest/v1beta/FilterExpression), but is built with a bit of convenience and fluid interface in mind. You can filter your query by using `dimensionFilter()` and `metricFilter()` methods. These methods accept a callback that receives an instance of `Gtmassey\LaravelAnalytics\Request\Filters\FilterExpression` class. The class provides a set of methods to build your filter:

* `filter()` - generic filter method that accepts a dimension or metric name and a `filter callback`
* `filterDimension()` - filter method that accepts a dimension object via callback and a `filter callback`
* `filterMetric()` - filter method that accepts a metric object via callback and a `filter callback`
* `not()` - negates the filter
* `andGroup()` - creates a group of filters that are combined with AND operator
* `orGroup()` - creates a group of filters that are combined with OR operator

You can check `Gtmassey\LaravelAnalytics\Request\Filters\Filter` [class](https://github.com/gtmassey/laravel-analytics/tree/main/src/Request/Filters/Filter) for a list of available `filter callback` methods.

#### Examples:

##### `filter()` method:

```php
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Filters\Filter;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpression;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\Period\Period;

$report = Analytics::query()
    ->setMetrics(fn(Metrics $metrics) => $metrics->sessions())
    ->setDimensions(fn(Dimensions $dimensions) => $dimensions->pageTitle())
    ->forPeriod(Period::defaultPeriod())
    ->dimensionFilter(fn(FilterExpression $filterExpression) => $filterExpression
        ->filter('pageTitle', fn(Filter $filter) => $filter->exact('Home'))
    )
    ->run();
```

##### `filterDimension()` method:

Using this method you can utilize `Dimensions` class to fluently build your filter without having to know the exact dimension name that's used in the API.

```php
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Filters\Filter;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpression;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\Period\Period;

$report = Analytics::query()
    ->setMetrics(fn(Metrics $metrics) => $metrics->sessions())
    ->setDimensions(fn(Dimensions $dimensions) => $dimensions->pageTitle())
    ->forPeriod(Period::defaultPeriod())
    ->dimensionFilter(fn(FilterExpression $filterExpression) => $filterExpression
        ->filterDimension(
            dimensionsCallback: fn(Dimensions $dimensions) => $dimensions->pageTitle(),
            filter: fn(Filter $filter) => $filter->exact('Home')
        )
    )
    ->run();
```

##### `filterMetric()` method:

Similar to `filterDimension()` method, you can use this method and utilize `Metrics` class to fluently build your filter without having to know the exact metric name that's used in the API.

```php
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Filters\Filter;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpression;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\Period\Period;

$report = Analytics::query()
    ->setMetrics(fn(Metrics $metrics) => $metrics->sessions())
    ->setDimensions(fn(Dimensions $dimensions) => $dimensions->pageTitle())
    ->forPeriod(Period::defaultPeriod())
    ->metricFilter(fn(FilterExpression $filterExpression) => $filterExpression
        ->filterMetric(
            metricsCallback: fn(Metrics $metrics) => $metrics->sessions(),
            filter: fn(Filter $filter) => $filter->greaterThanInt(100)
        )
    )
    ->run();
```

##### `not()` method:

```php
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Filters\Filter;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpression;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\Period\Period;

$report = Analytics::query()
    ->setMetrics(fn(Metrics $metrics) => $metrics->sessions())
    ->setDimensions(fn(Dimensions $dimensions) => $dimensions->pageTitle())
    ->forPeriod(Period::defaultPeriod())
    ->dimensionFilter(fn(FilterExpression $filterExpression) => $filterExpression
        ->not(fn(FilterExpression $filterExpression) => $filterExpression
            ->filter('pageTitle', fn(Filter $filter) => $filter
                 ->exact('Home')
            )
        )
    )
    ->run();
```

##### `andGroup()` method:

```php
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Filters\Filter;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpression;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpressionList;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\Period\Period;

$report = Analytics::query()
    ->setMetrics(fn(Metrics $metrics) => $metrics->sessions())
    ->setDimensions(fn(Dimensions $dimensions) => $dimensions->deviceCategory()->browser())
    ->forPeriod(Period::defaultPeriod())
    ->dimensionFilter(fn(FilterExpression $filterExpression) => $filterExpression
        ->andGroup(fn(FilterExpressionList $filterExpressionList) => $filterExpressionList
            ->filter('deviceCategory', fn(Filter $filter) => $filter
                ->exact('Mobile')
			)
            ->filter('browser', fn(Filter $filter) => $filter
                ->exact('Chrome')
            )
        )
    )
    ->run();
```

##### `orGroup()` method:

```php
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Filters\Filter;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpression;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpressionList;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\Period\Period;

$report = Analytics::query()
    ->setMetrics(fn(Metrics $metrics) => $metrics->sessions())
    ->setDimensions(fn(Dimensions $dimensions) => $dimensions->browser())
    ->forPeriod(Period::defaultPeriod())
    ->dimensionFilter(fn(FilterExpression $filterExpression) => $filterExpression
        ->orGroup(fn(FilterExpressionList $filterExpressionList) => $filterExpressionList
            ->filter('browser', fn(Filter $filter) => $filter
                ->exact('Firefox')
            )
            ->filter('browser', fn(Filter $filter) => $filter
                ->exact('Chrome')
            )
        )
    )
    ->run();
```

##### Advanced example:

You can mix all of the above methods to build a complex filter expression.

```php
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Filters\Filter;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpression;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpressionList;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\Period\Period;

$report = Analytics::query()
    ->setMetrics(fn(Metrics $metrics) => $metrics->sessions()->screenPageViews())
    ->setDimensions(fn(Dimensions $dimensions) => $dimensions->browser()->deviceCategory())
    ->forPeriod(Period::defaultPeriod())
    ->dimensionFilter(fn(FilterExpression $filterExpression) => $filterExpression
        ->andGroup(fn(FilterExpressionList $filterExpressionList) => $filterExpressionList
            ->filter('browser', fn(Filter $filter) => $filter
                ->contains('safari')
            )
            ->not(fn(FilterExpression $filterExpression) => $filterExpression
                ->filterDimension(
                    dimensionsCallback: fn(Dimensions $dimensions) => $dimensions->deviceCategory(),
                    filter: fn(Filter $filter) => $filter->contains('mobile')
                )
            )
        )
    )
    ->metricFilter(fn(FilterExpression $filterExpression) => $filterExpression
        ->orGroup(fn(FilterExpressionList $filterExpressionList) => $filterExpressionList
            ->filter('sessions', fn(Filter $filter) => $filter
                ->greaterThanInt(200)
            )
            ->filterMetric(
                metricsCallback: fn(Metrics $metrics) => $metrics->sessions(),
                filter: fn(Filter $filter) => $filter->lessThanInt(100)
            )
        )
    )
    ->run();
```

### <a name="ordering">Ordering:</a>

You can order the results by a metric or dimension by using the `setOrderBys()` method. This method accepts a callback that receives an `OrderBy` instance. You can then use the `OrderBy` instance to order the results using these methods:

* `metricDesc()` - Order by a metric in descending order.
* `metricAsc()` - Order by a metric in ascending order.
* `alphanumericDimensionDesc()` - Order by a dimension in descending order (case-sensitive).
* `alphanumericDimensionAsc()` - Order by a dimension in ascending order (case-sensitive).
* `caseInsensitiveAlphanumericDimensionDesc()` - Order by a dimension in descending order (case-insensitive).
* `caseInsensitiveAlphanumericDimensionAsc()` - Order by a dimension in ascending order (case-insensitive).
* `numericDimensionDesc()` - Order by a dimension in descending order (numeric).
* `numericDimensionAsc()` - Order by a dimension in ascending order (numeric).

##### Example:
```php
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\Period\Period;

$report = Analytics::query()
    ->setMetrics(fn(Metrics $metrics) => $metrics->sessions())
    ->setDimensions(fn(Dimensions $dimensions) => $dimensions->browser())
    ->forPeriod(Period::defaultPeriod())
    ->setOrderBys(fn(OrderBy $orderBy) => $orderBy
    	// Order by sessions in descending order
        ->metricDesc(
            metricsCallback: fn(Metrics $metrics) => $metrics->sessions(),
        )

        // Order by sessions in ascending order
        ->metricAsc(
            metricsCallback: fn(Metrics $metrics) => $metrics->sessions(),
        )

        // Order by browser in descending order (case-sensitive)
        ->alphanumericDimensionDesc(
            dimensionsCallback: fn(Dimensions $dimensions) => $dimensions->pageTitle(),
        )

        // Order by browser in ascending order (case-sensitive)
        ->alphanumericDimensionAsc(
            dimensionsCallback: fn(Dimensions $dimensions) => $dimensions->pageTitle(),
        )

        // Order by browser in descending order (case-insensitive)
        ->caseInsensitiveAlphanumericDimensionDesc(
            dimensionsCallback: fn(Dimensions $dimensions) => $dimensions->pageTitle(),
        )

        // Order by browser in ascending order (case-insensitive)
        ->caseInsensitiveAlphanumericDimensionAsc(
            dimensionsCallback: fn(Dimensions $dimensions) => $dimensions->pageTitle(),
        )

        // Order by browser in descending order (numeric)
        ->numericDimensionDesc(
            dimensionsCallback: fn(Dimensions $dimensions) => $dimensions->pageTitle(),
        )

        // Order by browser in ascending order (numeric)
        ->numericDimensionAsc(
            dimensionsCallback: fn(Dimensions $dimensions) => $dimensions->pageTitle(),
        )
    )
    ->run();
```

### <a name="defaultreports">Default Reports:</a>

#### getTopEvents()

```php
$report = Analytics::getTopEvents();
```

This method returns the top events for the given period. It accepts a `Gtmassey\Period\Period` object as an optional parameter.

If a `Gtmassey\Period\Period` object is not passed, it will use the default period set in `Gtmassey\Period\Period::defaultPeriod()`.

The method will return an instance of `Gtmassey\LaravelAnalytics\Response\ResponseData`, which contains `DimensionHeaders`, `MetricHeaders`, `Rows`, and additional metadata.

example output:

```bash
Gtmassey\LaravelAnalytics\Response\ResponseData {
  +dimensionHeaders: Spatie\LaravelData\DataCollection {
    +items: array:1 [
      0 => Gtmassey\LaravelAnalytics\Response\DimensionHeader {
        +name: "eventName"
      }
    ]
  }
  +metricHeaders: Spatie\LaravelData\DataCollection {
    +items: array:1 [
      0 => Gtmassey\LaravelAnalytics\Response\MetricHeader {
        +name: "eventCount"
        +type: "TYPE_INTEGER"
      }
    ]
  }
  +rows: Spatie\LaravelData\DataCollection {
    +items: array:6 [
      0 => Gtmassey\LaravelAnalytics\Response\Row {
        +dimensionValues: Spatie\LaravelData\DataCollection {
          +items: array:1 [
            0 => Gtmassey\LaravelAnalytics\Response\DimensionValue {
              +value: "page_view"
            }
          ]
        }
        +metricValues: Spatie\LaravelData\DataCollection {
          +items: array:1 [
            0 => Gtmassey\LaravelAnalytics\Response\MetricValue {
              +value: "1510"
            }
          ]
        }
      }
      1 => Gtmassey\LaravelAnalytics\Response\Row {}
      2 => Gtmassey\LaravelAnalytics\Response\Row {}
      3 => Gtmassey\LaravelAnalytics\Response\Row {}
      4 => Gtmassey\LaravelAnalytics\Response\Row {}
      5 => Gtmassey\LaravelAnalytics\Response\Row {}
    ]
  }
  +totals: null
  +rowCount: 6
  +metadata: Gtmassey\LaravelAnalytics\Response\Metadata {}
  +propertyQuota: null
  +kind: "analyticsData#runReport"
}
```

#### getTopPages()

```php
$report = Analytics::getTopPages();
```

This method returns the top pages for the given period. It accepts a `Gtmassey\Period\Period` object as an optional parameter.

The pages along with the sessions for that page are listed in the `Rows` property of the response.

#### getUserAcquisitionOverview()

```php
$report = Analytics::getUserAcquisitionOverview();
```

This method returns the user acquisition overview for the given period. It accepts a `Gtmassey\Period\Period` object as an optional parameter.

The method will return a `ResponseData` object with the number of sessions by the session's primary acquisition source. Primary acquisition sources are either "direct", "Referral", "Organic Search", and "Organic Social".

#### getUserEngagement()

```php
$report = Analytics::getUserEngagement();
```

This method returns a `ResponseData` object without dimensions. The query only contains metrics. The `ResponseData` object will contain:

* average session duration, in seconds
* number of engaged sessions
* number of sessions per user
* total number of sessions

## <a name=extensibility>Extensibility:</a>

### <a name="custommetrics">Custom metrics and dimensions:</a>

You are not limited to the metrics and dimensions provided by this package. You can use any custom metrics and dimensions you have created in Google Analytics.

Create a new class that extends `Gtmassey\LaravelAnalytics\Request\CustomMetric` or `Gtmassey\LaravelAnalytics\Request\CustomDimension` and implement methods following this format:.

```php
namespace App\Analytics;

use Google\Analytics\Data\V1beta\Metric;
use Gtmassey\LaravelAnalytics\Request\Metrics;

class CustomMetrics extends Metrics
{
    public function customMetric(): self
    {
        $this->metrics->push(new Metric(['name' => 'customEvent:parameter_name']));

        return $this;
    }
}
```

Bind the class in your `AppServiceProvider`:

```php
use Gtmassey\LaravelAnalytics\Request\Metrics;
use App\Analytics\CustomMetrics;
//use Gtmassey\LaravelAnalytics\Request\Dimensions;
//use App\Analytics\CustomDimensions;

public function boot()
{
    $this->app->bind(Metrics::class, CustomMetrics::class);
    //$this->app->bind(Dimensions::class, CustomDimensions::class);
}
```

Now you can use the custom metric in your query:

```php
use App\Analytics\CustomMetrics;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\LaravelAnalytics\Period;

$report = Analytics::query()
     ->setMetrics(fn(CustomMetrics $metrics) => $metrics
         ->customMetric()
         ->sessions()
     )
     ->forPeriod(Period::defaultPeriod())
     ->run();
```

### <a name="reusablefilters">Reusable filters:</a>

You can create reusable filters to use in your queries. Create a new class that extends `Gtmassey\LaravelAnalytics\Analytics` and implement methods following this format:

```php
namespace App\Analytics;

use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\LaravelAnalytics\Request\Filters\Filter;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpression;
use Gtmassey\LaravelAnalytics\Request\Metrics;

class CustomAnalytics extends Analytics
{
    public function onlySessionsAbove(int $count): static
    {
        $this->metricFilter(fn(FilterExpression $filterExpression) => $filterExpression
            ->filterMetric(
                metricsCallback: fn(Metrics $metrics) => $metrics->sessions(),
                filter: fn(Filter $filter) => $filter->greaterThanInt($count),
            )
        );

        return $this;
    }
}
```

Bind the class in your `AppServiceProvider`:

```php
use Gtmassey\LaravelAnalytics\Analytics;
use App\Analytics\CustomAnalytics;

public function boot()
{
    $this->app->bind(Analytics::class, CustomAnalytics::class);
}
```

Now you can use the custom filter in your query:

```php
use App\Analytics\CustomAnalytics;
use Gtmassey\LaravelAnalytics\Period;
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Metrics;

$report = CustomAnalytics::query()
    ->setMetrics(fn(Metrics $metrics) => $metrics->sessions())
    ->setDimensions(fn(Dimensions $dimensions) => $dimensions->browser())
    ->forPeriod(Period::defaultPeriod())
    ->onlySessionsAbove(100)
    ->run();
```

## <a name="changelog">Change log</a>

Read [CHANGELOG.md](CHANGELOG.md)

## <a name="testing">Testing</a>

To run tests, run:

```bash
composer test
```

Note that this command also runs code coverage analysis.

## Contributing

Check out [the contributing guide](CONTRIBUTING.md)

## Security

If you discover any security related issues, please email contact@garrettmassey.net instead of using the issue tracker.

## Credits

- [Garrett Massey](https://www.garrettmassey.net/)
- [All Contributors][link-contributors]

Special thanks to [Plytas](https://github.com/Plytas) for their early and significant contributions to the project. Without their help setting things up and their willingness to teach me new tools and techniques, this project would be dead in its tracks.

And a huge thanks to the team over at [Spatie](https://github.com/spatie) for their continued contributions to the open source community! Some of their work is used in this project, and I have used their packages as a foundation for projects for years.

## License

MIT. Please see the [license file](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/gtmassey/laravel-analytics.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/gtmassey/laravel-analytics.svg?style=flat-square
[ico-tests]: https://github.com/gtmassey/Analytics/actions/workflows/run-tests.yml/badge.svg

[link-packagist]: https://packagist.org/packages/gtmassey/laravel-analytics
[link-downloads]: https://packagist.org/packages/gtmassey/laravel-analytics
[link-tests]: https://github.com/gtmassey/Analytics/actions/workflows/run-tests.yml
[link-author]: https://github.com/gtmassey
[link-contributors]: ../../contributors
