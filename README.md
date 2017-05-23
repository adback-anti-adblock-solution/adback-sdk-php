Adback/Analytics
================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dekalee/adback-analytics/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dekalee/adback-analytics/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/dekalee/adback-analytics/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/dekalee/adback-analytics/?branch=master)
[![Build Status](https://travis-ci.org/dekalee/adback-analytics.svg?branch=master)](https://travis-ci.org/dekalee/adback-analytics)
[![Latest Stable Version](https://poser.pugx.org/dekalee/adback-analytics/v/stable)](https://packagist.org/packages/dekalee/adback-analytics)
[![Total Downloads](https://poser.pugx.org/dekalee/adback-analytics/downloads)](https://packagist.org/packages/dekalee/adback-analytics)
[![License](https://poser.pugx.org/dekalee/adback-analytics/license)](https://packagist.org/packages/dekalee/adback-analytics)

This PHP library will call the AdBack API and will generate the JavaScript tag
that should be placed on all the pages.

See [the AdBack website](http://adback.co) for more informations.

See [the AdBack documentation](http://docs.adback.co/en/latest/) for an installation guide.

Usage
-----

Both the `Query` and `Generators` will need a driver which implements
the `ScriptCacheInterface` to work.

A driver for Redis is already available.

Usage Exemple
-------------

In this exemple, we would assume that you have access to a Redis data store.

### Installation

Use composer to install the lib :

```php
    composer require dekalee/adback-analytics
```

### Query the api

First you need to query the api to warmup the cache in a Redis data store :

```php
    use Dekalee\AdbackAnalytics\Client\Client;
    use Dekalee\AdbackAnalytics\Driver\RedisScriptCache;
    use Dekalee\AdbackAnalytics\Query\ScriptUrlQuery;

    function createApiCache()
    {
        $client = new Client();
        $redis = new \Redis();
        $redis->connect('127.0.0.1');
        $redisCache = new RedisScriptCache($redis);

        $query = new ScriptUrlQuery($client, $redisCache, 'your-token');
        $query->execute();
    }

    createApiCache();
```

### Generate the scripts

In your page, preferably in the `<head>`, use the generator to create the script :

```php
    use Dekalee\AdbackAnalytics\Driver\RedisScriptCache;
    use Dekalee\AdbackAnalytics\Generator\AnalyticsScriptGenerator;

    function generateAnalyticsScript()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1');
        $redisCache = new RedisScriptCache($redis);
        $generator = new AnalyticsScriptGenerator($redisCache);

        return $generator->generate();
    }

    echo generateAnalyticsScript();
```

You could do the same to create the other scripts by using the appropriate generators.
