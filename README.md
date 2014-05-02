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

 Start the PHP Development server from the project root directory with:
 ``` sh
$ php -S localhost:8888
```
For development mode: navigate to "http://localhost:8888/web/index_dev.php/" with your browser.

For production mode: navigate to "http://localhost:8888/web/index.php/" with your browser.

Testing
-------

For testing purposes, you can just run this command at your main directory:

``` sh
$ ./vendor/bin/phpunit -c app/
```

Code Coverage
-------------

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
php app/console generate:restbundle Party party_name:string party_type:string --sql
php app/console generate:restbundle Party party_name:string party_type:string --travis
php app/console generate:restbundle Party party_name:string party_type:string --migration

php app/console generate:restbundle Party party_name:string party_type:string --migration --sql
php app/console generate:restbundle PartyRole role_name:string role_data:string --migration --sql
php app/console generate:restbundle PartyRelationship relationship_name:string relationship_data:string party_id:string party_role_id:string --migration --sql
```

Console APP:

``` sh
php app/console generate:appbundle Party party_name:string party_type:string --sql
php app/console generate:appbundle Party party_name:string party_type:string --travis
php app/console generate:appbundle Party party_name:string party_type:string --migration

php app/console generate:appbundle Party party_name:string party_type:string --migration --sql
php app/console generate:appbundle PartyRole role_name:string role_data:string --migration --sql
php app/console generate:appbundle PartyRelationship relationship_name:string relationship_data:string party_id:string party_role_id:string --migration --sql

        /**
         * crud
         */
        $controller->get("/crud", function() use ($app)
        {
            $xcrud = $app['xcrud'];
            $xcrud->table('partyrelationship');
            $xcrud->relation('party_id','party','id','party_name');
            $xcrud->relation('party_role_id','partyrole','id','role_name');
            return $app['twig']->render('partyrelationship.twig', array(
                'xcrud' => $xcrud,
                'className' => $this->repository
            ));
        });
        
```