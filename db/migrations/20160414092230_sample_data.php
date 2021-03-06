<?php

use Phinx\Migration\AbstractMigration;

class SampleData extends AbstractMigration
{
    public function up()
    {
        $users = [
            [
                'email'      => 'bob@bob.com',
                'password'   => 'bob',
                'first_name' => 'Bob',
                'last_name'  => 'Smith',
                'token'      => '',
            ],

            [
                'email'      => 'john@john.com',
                'password'   => 'john',
                'first_name' => 'john',
                'last_name'  => 'john',
                'token'      => '',
            ]
        ];

        $images = [
            [
                'url' => 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/a3a2cf47122431.587108a34d3f8.jpg',
                'name' => 'sun',
                'description' => 'Bright Sun',
                'userid' => 1,
            ],

            [
                'url' => 'https://mir-s3-cdn-cf.behance.net/project_modules/1400/6f963e52031945.590201b690882.jpg',
                'name' => 'Phone',
                'description' => 'Phone Flame Burner',
                'userid' => 1,
            ],

            [
                'url' => 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/7c5eb551677069.58f6680f4fa9b.jpg',
                'name' => 'Boat',
                'description' => 'Wooden Boat',
                'userid' => 2,
            ]
        ];

        $this->table('users')->insert($users)->save();
        $this->table('images')->insert($images)->save();
    }

    public function down()
    {
        $this->execute('DELETE FROM users');
        $this->execute('DELETE FROM images');
    }
}
