silex-skeleton-app
==================

A skeleton with a generator

Installation
------------

You can do the conventional way which is clone this repository, or the easiest way, you can just directly download composer.

You need to put the content of /db/db.sql into the sql command of your MySQL database. It will create 2 databases. Why do we need to have 2 same database? It's not compulsory. The idea is just to differentiate between our development and our test database environment.

Change the configurations to suit your environment. Don't worry, it's **simple**.

 * app/config/dev.php
 * app/config/prod.php
 * app/config/test.php
 * Copy app/phpunit.xml.dist into app/phpunit.xml, and take a look at the <php> environment at the bottom of the file
 * Your server configuration must be pointing to: web/index.php (prod) and web/index_dev.php (dev)

For testing purposes, you can just run this command at your main directory:

``` sh
$ ./vendor/bin/phpunit -c app/
```

Finally for code standards:

``` sh
$ ./vendor/bin/phpcs ./src/ --standard=PSR2
$ ./vendor/bin/phpcs ./tests/ --standard=PSR2
```

Console API:

``` sh
php app/console generate:restbundle User name:string surname:string --sql
php app/console generate:restbundle User name:string surname:string --travis
php app/console generate:restbundle User name:string surname:string --migration
```

Console APP:

``` sh
php app/console generate:appbundle User name:string surname:string --sql
php app/console generate:appbundle User name:string surname:string --travis
php app/console generate:appbundle User name:string surname:string --migration
```