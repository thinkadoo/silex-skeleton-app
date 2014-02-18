Silex Skeleton ReSTful
======================

[![Build Status](https://travis-ci.org/thinkadoo/silex-skeleton-rest.png?branch=master)](https://travis-ci.org/thinkadoo/silex-skeleton-rest)

Description
-----------
This skeleton (you can also call it boilerplate now) is built using [Silex][2] for general [ReSTful (API)][6] purposes.

Background
----------
The very reason that this code exists is because I was having a hard time finding a good EXAMPLE on utilizing Silex for real life usage.
I need a maintainable and testable code that made especially for API.

Of course there are many good slides and information out there, but most are just giving piece by piece explanation.

I'm not a good reader. I need an EXAMPLE!

FAQ
---
"Dude, you can design silex however you want. That's the beauty of it."
- "Yes, I know. But I want a nice, solid framework out of it."

"Why don't you just use Symfony2 then?"
- "Too much"
(Don't miss understand me. I like Symfony2, I use it for some of my projects. But let's be honest, it's just too bulky sometimes.)

"Is this code actually working?"
- "Yeap. I use it for some smaller projects of mine. In fact, I use this more than Symfony2 I can say."

"Enough chit-chat! Show me!"
- "Here!"

What you need to know
---------------------
 * [PHP][1]
 * [Silex][2]
 * [Doctrine][3]
 * [Composer][4]
 * [PHPUnit & DBUnit][5] (Optional)

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
php app/console generate:bundle User name:string surname:string --sql
php app/console generate:bundle User name:string surname:string --travis
php app/console generate:bundle User name:string surname:string --migration
```

Final
-----
Take your time and look around the code to understand more and do not hesitate to let me know if you have an idea how to improve this.

You're ready to go! Enjoy!

[1]: http://php.net/
[2]: http://silex.sensiolabs.org/
[3]: http://www.doctrine-project.org/
[4]: http://getcomposer.org/
[5]: http://www.phpunit.de/
[6]: http://pear.php.net/manual/en/package.php.php-codesniffer.intro.php
[7]: http://en.wikipedia.org/wiki/Representational_state_transfer
