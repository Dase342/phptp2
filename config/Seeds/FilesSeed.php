<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
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
                'id' => '0',
                'name' => 'default.png',
                'path' => 'uploads/files/',
                'created' => '2019-10-15 00:00:00',
                'modified' => '2019-10-15 00:00:00',
                'status' => '1',
            ],
            [
                'id' => '13',
                'name' => 'bmac.jpg',
                'path' => 'uploads/files/',
                'created' => '2019-10-16 01:58:41',
                'modified' => '2019-10-16 01:58:41',
                'status' => '1',
            ],
            [
                'id' => '14',
                'name' => 'mpoul.png',
                'path' => 'img/',
                'created' => '2019-10-16 02:16:11',
                'modified' => '2019-10-16 02:16:11',
                'status' => '1',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
