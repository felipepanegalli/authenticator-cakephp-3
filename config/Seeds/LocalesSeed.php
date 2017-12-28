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
                'description' => 'Português Brazilian Language'
            ],
            [
                'title' => 'en_US',
                'description' => 'English Language'
            ],
            [
                'title' => 'es',
                'description' => 'Spanish Language'
            ],
        ];

        $table = $this->table('locales');
        $table->insert($data)->save();
    }
}
