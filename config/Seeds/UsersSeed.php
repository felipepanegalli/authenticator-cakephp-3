<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => (new DefaultPasswordHasher)->hash('admin'),
                'email' => 'admin@admin.com',
                'phone' => '12112341234',
                'locale_id' => '1',
                'role_id' => '1',
                'active' => true
            ],
            [
                'username' => 'user',
                'password' => (new DefaultPasswordHasher)->hash('user'),
                'email' => 'user@user.com',
                'phone' => '12112341234',
                'locale_id' => '1',
                'role_id' => '2',
                'active' => true
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
