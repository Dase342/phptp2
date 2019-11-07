<?php
use Migrations\AbstractSeed;

/**
 * OrdersQuantities seed.
 */
class OrdersQuantitiesSeed extends AbstractSeed
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
                'order_id' => '1',
                'quantity_id' => '1',
            ],
            [
                'order_id' => '1',
                'quantity_id' => '1',
            ],
        ];

        $table = $this->table('orders_quantities');
        $table->insert($data)->save();
    }
}
