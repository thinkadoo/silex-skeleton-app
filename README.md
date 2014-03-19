silex-skeleton-app
==================

A skeleton with a generator

Dependencies
------------

For the UI Application to work, you need to purchase xCRUD http://xcrud.com/

Installation
------------

Create two empty dababases: restdb and resttestdb.
This separates the production/development and test database environment.

If you generate code the dbs above need to exist.
To run unit tests you need to include the --sql option and you need to put the content of /db/db.sql into the sql command of your MySQL database. It will create 2 databases.

Change the configurations to suit your environment.

 * app/config/dev.php
 * app/config/prod.php
 * app/config/test.php
 * Your server configuration must be pointing to: web/index.php (prod) and web/index_dev.php (dev)

 Copy the following folders from xCRUD distribution into your project root folder:
 * /xcrud
 * /editors
 * /uploads

 Edit the /xcrud/xcrud_config.php file to point to your restdb and resttestdb alternative databases with the same details as you used to set up dev.php and prod.php above.

Testing
-------

For testing purposes, you can just run this command at your main directory:

``` sh
$ ./vendor/bin/phpunit -c app/
```

Code Coverage
-------

For a code coverage report in html, you can just run this command at your main directory:

``` sh
$ ./vendor/bin/phpunit -c app/ --coverage-html coverage
```

Standards
---------

Finally for code standards:

``` sh
$ ./vendor/bin/phpcs ./src/ --standard=PSR2
$ ./vendor/bin/phpcs ./tests/ --standard=PSR2
```

Generation
----------

Console API:

``` sh
php app/console generate:restbundle User user_name:string user_surname:string --sql
php app/console generate:restbundle User user_name:string user_surname:string --travis
php app/console generate:restbundle User user_name:string user_surname:string --migration
php app/console generate:restbundle User user_name:string user_surname:string --migration --sql
```

Console APP:

``` sh
php app/console generate:appbundle User user_name:string user_surname:string --sql
php app/console generate:appbundle User user_name:string user_surname:string --travis
php app/console generate:appbundle User user_name:string user_surname:string --migration
php app/console generate:appbundle User user_name:string user_surname:string --migration --sql
```