<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version1398367749 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $table = $schema->createTable('partyrole');
        $table->addColumn('id', 'integer', array(
            'unsigned'      => true,
            'autoincrement' => true
        ));
        $table->setPrimaryKey(array('id'));
        $table->addUniqueIndex(array('id'));
        $table->addColumn('role_name', 'string');
        $table->addColumn('role_data', 'string');
    }

    public function down(Schema $schema)
    {
        $schema->dropTable( 'partyrole' );
    }
}