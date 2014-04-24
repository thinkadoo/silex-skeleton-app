<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version1398367741 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $table = $schema->createTable('party');
        $table->addColumn('id', 'integer', array(
            'unsigned'      => true,
            'autoincrement' => true
        ));
        $table->setPrimaryKey(array('id'));
        $table->addUniqueIndex(array('id'));
        $table->addColumn('party_name', 'string');
        $table->addColumn('party_type', 'string');
    }

    public function down(Schema $schema)
    {
        $schema->dropTable( 'party' );
    }
}