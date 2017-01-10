Adback/Analytics
================

This php library will call the AdBack api and will generate the javascript tag
that should be placed on all the pages.

See [the AdBack website](http://adback.co) for more informations.

Usage
-----

Both the `Query` and `Generators` will need a driver which implements
the `ScriptCacheInterface` to work.

A driver for redis is already available.
