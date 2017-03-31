Adback/Analytics
================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dekalee/adback-analytics/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dekalee/adback-analytics/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/dekalee/adback-analytics/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/dekalee/adback-analytics/?branch=master)
[![Build Status](https://travis-ci.org/dekalee/adback-analytics.svg?branch=master)](https://travis-ci.org/dekalee/adback-analytics)
[![Latest Stable Version](https://poser.pugx.org/dekalee/adback-analytics/v/stable)](https://packagist.org/packages/dekalee/adback-analytics)
[![Total Downloads](https://poser.pugx.org/dekalee/adback-analytics/downloads)](https://packagist.org/packages/dekalee/adback-analytics)
[![License](https://poser.pugx.org/dekalee/adback-analytics/license)](https://packagist.org/packages/dekalee/adback-analytics)

This php library will call the AdBack api and will generate the javascript tag
that should be placed on all the pages.

See [the AdBack website](http://adback.co) for more informations.

See [the AdBack documentation](http://docs.adback.co/en/latest/) for an installation guide.

Usage
-----

Both the `Query` and `Generators` will need a driver which implements
the `ScriptCacheInterface` to work.

A driver for redis is already available.
