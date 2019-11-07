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
                'menu_item_price' => '7.00',
                'menu_item_description' => 'Two patties with 3 bread combined with lettuce, cheese and special sauce Big wac.',
                'other_details' => '',
                'created' => '2019-08-30',
                'modified' => '2019-10-16',
                'files_id' => '13',
            ],
            [
                'id' => '2',
                'menu_id' => '1',
                'menu_item_name' => 'wac poulet',
                'menu_item_price' => '5.00',
                'menu_item_description' => 'Fried chicken sandwich with lettuce and special sauce made by a human.',
                'other_details' => '',
                'created' => '2019-08-30',
                'modified' => '2019-10-16',
                'files_id' => '14',
            ],
            [
                'id' => '4',
                'menu_id' => '1',
                'menu_item_name' => 'Filet de poisson',
                'menu_item_price' => '7.99',
                'menu_item_description' => 'It\'s halal.',
                'other_details' => 'May contain fish.',
                'created' => '2019-09-11',
                'modified' => '2019-09-11',
                'files_id' => '0',
            ],
            [
                'id' => '5',
                'menu_id' => '1',
                'menu_item_name' => 'Wac nugget',
                'menu_item_price' => '22.00',
                'menu_item_description' => '',
                'other_details' => '',
                'created' => '2019-10-16',
                'modified' => '2019-10-16',
                'files_id' => '0',
            ],
        ];

        $table = $this->table('menu_items');
        $table->insert($data)->save();
    }
}
