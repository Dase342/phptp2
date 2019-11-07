<?php
use Migrations\AbstractSeed;

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
                'id' => '1',
                'username' => 'admin',
                'password' => '$2y$10$W6i98KEa9Of/DUNQNZbxQ.t2axu.7qwwGP.1zrTFp1ObZobv91Tt6',
                'email' => 'admin@admin.com',
                'created' => '2019-09-11',
                'modified' => '2019-09-18',
                'user_type_id' => '1',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
