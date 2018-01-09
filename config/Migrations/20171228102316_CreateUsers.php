<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table = $this->table('auth_users');
        $table->addColumn('username', 'string', [
            'limit' => 50
        ]);
        $table->addColumn('password', 'string', [
            'limit' => 100
        ]);
        $table->addColumn('name', 'string');
        $table->addColumn('email', 'string');
        $table->addColumn('phone', 'string', [
            'null' => true
        ]);
        $table->addColumn('locale_id', 'integer');
        $table->addColumn('role_id', 'integer');
        $table->addColumn('active', 'boolean');
        $table->addColumn('created', 'timestamp',[
            'default' => 'CURRENT_TIMESTAMP'
        ]);
        $table->addColumn('modified', 'timestamp',[
            'null' => true,
            'default' => null
        ]);
        $table->addForeignKey('locale_id', 'auth_locales', 'id');
        $table->addForeignKey('role_id', 'auth_roles', 'id');
        $table->create();
    }
}
