<?php
use Migrations\AbstractSeed;

/**
 * Quantities seed.
 */
class QuantitiesSeed extends AbstractSeed
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
                'menu_item_id' => '1',
                'quantity' => '2',
                'created' => '2019-10-03',
                'modified' => '2019-10-03',
            ],
        ];

        $table = $this->table('quantities');
        $table->insert($data)->save();
    }
}
