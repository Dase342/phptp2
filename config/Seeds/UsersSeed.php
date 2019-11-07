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
                'uuid' => 'cd527758-6dea-49a2-bf11-64006d5aec1a',
                'status' => '1',
            ],
            [
                'id' => '4',
                'username' => 'test',
                'password' => '$2y$10$5Qw6Uhg4t4Y7RK9/udglpuFOWlly3fnz3N9yfBeqpgWWxTC8atn.e',
                'email' => 'test@test.com',
                'created' => '2019-10-15',
                'modified' => '2019-10-15',
                'user_type_id' => '1',
                'uuid' => '016c51a8-f42b-45aa-a231-77a0a2da4474',
                'status' => '1',
            ],
            [
                'id' => '5',
                'username' => 'test2',
                'password' => '$2y$10$C0BjzxT0LAIycvcqdgMpxuSZxeQLzCE6Viv9Ko.N4Wi0iu9Y4V.ZO',
                'email' => 'test@test2.com',
                'created' => '2019-10-15',
                'modified' => '2019-10-15',
                'user_type_id' => '2',
                'uuid' => 'a8e6fbb4-7d86-40c2-93c9-79df2978ee8d',
                'status' => '1',
            ],
            [
                'id' => '6',
                'username' => 'test3',
                'password' => '$2y$10$sG/GpIeq3z8pU.0cUWIa.e.bQ.7PLoklZo3Z.qBqSJdMoqgIgrZ0G',
                'email' => 'test3@test.com',
                'created' => '2019-10-16',
                'modified' => '2019-10-16',
                'user_type_id' => '2',
                'uuid' => '696dda64-70e6-4657-a57e-1817a01cb142',
                'status' => '1',
            ],
            [
                'id' => '7',
                'username' => 'fasf',
                'password' => '$2y$10$1P5ZFWvlhZwCNZkNGCYXLOGVRLfr7Q1nWFhSztcCQNOJg12ujR4UO',
                'email' => 'test@test4.com',
                'created' => '2019-10-16',
                'modified' => '2019-10-17',
                'user_type_id' => '2',
                'uuid' => '145d4cad-85e8-4a07-8bf2-9210068904b4',
                'status' => '1',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
