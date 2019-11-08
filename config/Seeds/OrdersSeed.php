<?php
use Migrations\AbstractSeed;

/**
 * Orders seed.
 */
class OrdersSeed extends AbstractSeed
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
                'user_id' => '1',
                'created' => '2019-09-18',
                'modified' => '2019-09-18',
            ],
            [
                'id' => '5',
                'user_id' => '1',
                'created' => '2019-10-09',
                'modified' => '2019-10-09',
            ],
            [
                'id' => '6',
                'user_id' => '1',
                'created' => '2019-10-09',
                'modified' => '2019-10-09',
            ],
            [
                'id' => '7',
                'user_id' => '5',
                'created' => '2019-10-15',
                'modified' => '2019-10-15',
            ],
            [
                'id' => '8',
                'user_id' => '5',
                'created' => '2019-10-15',
                'modified' => '2019-10-15',
            ],
            [
                'id' => '9',
                'user_id' => '5',
                'created' => '2019-10-15',
                'modified' => '2019-10-15',
            ],
        ];

        $table = $this->table('orders');
        $table->insert($data)->save();
    }
}