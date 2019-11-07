<?php
use Migrations\AbstractSeed;

/**
 * UserTypes seed.
 */
class UserTypesSeed extends AbstractSeed
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
                'type' => 'Admin',
            ],
            [
                'id' => '2',
                'type' => 'Customer',
            ],
            [
                'id' => '3',
                'type' => 'Visitor',
            ],
        ];

        $table = $this->table('user_types');
        $table->insert($data)->save();
    }
}
