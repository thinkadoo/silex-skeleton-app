<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version1398367757 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $table = $schema->createTable('partyrelationship');
        $table->addColumn('id', 'integer', array(
            'unsigned'      => true,
            'autoincrement' => true
        ));
        $table->setPrimaryKey(array('id'));
        $table->addUniqueIndex(array('id'));
        $table->addColumn('relationship_name', 'string');
        $table->addColumn('relationship_data', 'string');
        $table->addColumn('party_id', 'string');
        $table->addColumn('party_role_id', 'string');
    }

    public function down(Schema $schema)
    {
        $schema->dropTable( 'partyrelationship' );
    }
}