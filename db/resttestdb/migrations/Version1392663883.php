<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version1392663883 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $table = $schema->createTable('user');
        $table->addColumn('id', 'integer', array(
            'unsigned'      => true,
            'autoincrement' => true
        ));
        $table->setPrimaryKey(array('id'));
        $table->addUniqueIndex(array('id'));
        $table->addColumn('name', 'string');
        $table->addColumn('surname', 'string');
        $table->addColumn('password', 'string');
        $table->addColumn('salt', 'string');
    }

    public function down(Schema $schema)
    {
        $schema->dropTable( 'user' );
    }
}