<?php
use Migrations\AbstractSeed;

/**
 * Locales seed.
 */
class LocalesSeed extends AbstractSeed
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
                'title' => 'pt_BR',
                'description' => 'Portuguese (Brazilian)'
            ],
            [
                'title' => 'en_US',
                'description' => 'English'
            ],
            [
                'title' => 'es',
                'description' => 'Spanish'
            ],
        ];

        $table = $this->table('auth_locales');
        $table->insert($data)->save();
    }
}
