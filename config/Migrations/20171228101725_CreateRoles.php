<?php

use Migrations\AbstractMigration;

class CreateRoles extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('roles');
        $table->addColumn('title', 'string', [
            'limit' => 100
        ]);
        $table->addColumn('description', 'string');
        $table->addColumn('created', 'timestamp',[
            'default' => 'CURRENT_TIMESTAMP'
        ]);
        $table->addColumn('modified', 'timestamp',[
            'null' => true,
            'default' => null
        ]);
        $table->create();
    }
}
