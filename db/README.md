## Format:

php ./db/restdb/doctrine-migrations.phar migrations:status

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