<?php
use Migrations\AbstractSeed;

/**
 * Menu seed.
 */
class MenuSeed extends AbstractSeed
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
                'id' => '1',
                'menu_name' => 'Wacdonald',
                'created' => '2019-08-30',
                'modified' => '2019-08-30',
                'menu_description' => 'Wacdonald\'s official menu.',
                'other_details' => NULL,
            ],
        ];

        $table = $this->table('menus');
        $table->insert($data)->save();
    }
}
