## DBal Schema API
http://www.doctrine-project.org/api/dbal/2.0/class-Doctrine.DBAL.Schema.Schema.html
http://www.doctrine-project.org/api/dbal/2.0/class-Doctrine.DBAL.Schema.Table.html

## Format:

From the restdb or testrestdb folder - execute the following commands:
php ./doctrine-migrations.phar migrations:status
php ./doctrine-migrations.phar migrations:generate
php ./doctrine-migrations.phar migrations:migrate --dry-run
php ./doctrine-migrations.phar migrations:migrate

## Usage:
  [options] command [arguments]

## Options:
  --help           -h Display this help message.
  --quiet          -q Do not output any message.
  --verbose        -v Increase verbosity of messages.
  --version        -V Display this program version.
  --ansi           -a Force ANSI output.
  --no-interaction -n Do not ask any interactive question.

## Available commands:
  help       Displays help for a command (?)
  list       Lists commands
  
      migrations
      :diff      Generate a migration by comparing your current database to your mapping information.
      :execute   Execute a single migration version up or down manually.
      :generate  Generate a blank migration class.
      :migrate   Execute a migration to a specified version or the latest available version.
      :status    View the status of a set of migrations.
      :version   Manually add and delete migration versions from the version table.