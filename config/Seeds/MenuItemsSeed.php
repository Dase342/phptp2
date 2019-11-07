<?php
use Migrations\AbstractSeed;

/**
 * MenuItems seed.
 */
class MenuItemsSeed extends AbstractSeed
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
                'menu_id' => '1',
                'menu_item_name' => 'Big wac',
                'menu_item_price' => '7.0',
                'menu_item_description' => 'Deux boulettes de viandes avec 3 pain combiné avec de la lettus, fromage et sauce spécial Big wac.',
                'other_details' => NULL,
                'created' => '2019-08-30',
                'modified' => '2019-08-30',
            ],
            [
                'id' => '2',
                'menu_id' => '1',
                'menu_item_name' => 'wac poulet',
                'menu_item_price' => '5.0',
                'menu_item_description' => 'Sandwich au poulet frit avec lettus et sauce spécial fait par un homme.',
                'other_details' => NULL,
                'created' => '2019-08-30',
                'modified' => '2019-08-30',
            ],
            [
                'id' => '4',
                'menu_id' => '1',
                'menu_item_name' => 'Filet de poisson',
                'menu_item_price' => '7.99',
                'menu_item_description' => 'C\'est halal.',
                'other_details' => 'Peut contenir des traces de poisson.',
                'created' => '2019-09-11',
                'modified' => '2019-09-11',
            ],
        ];

        $table = $this->table('menu_items');
        $table->insert($data)->save();
    }
}
