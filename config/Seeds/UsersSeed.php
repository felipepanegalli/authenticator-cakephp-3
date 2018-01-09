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
                'name' => 'Administrator',
                'email' => 'admin@yourdomain.com',
                'phone' => '1(123)567-8900',
                'locale_id' => '1',
                'role_id' => '1',
                'active' => true
            ],
            [
                'username' => 'user',
                'password' => (new DefaultPasswordHasher)->hash('user'),
                'name' => 'User',
                'email' => 'user@yourdomain.com',
                'phone' => '1(123)567-8900',
                'locale_id' => '1',
                'role_id' => '2',
                'active' => true
            ],
        ];

        $table = $this->table('auth_users');
        $table->insert($data)->save();
    }
}
