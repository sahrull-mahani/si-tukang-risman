<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class Basic extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $config = config('IonAuth\\Config\\IonAuth');
        $this->DBGroup = empty($config->databaseGroupName) ? '' : $config->databaseGroupName;
        $tables        = $config->tables;

        $groups = [
            [
                'name'        => 'admin',
                'description' => 'Administrator',
            ],
            [
                'name'        => 'tukang',
                'description' => 'Tukang',
            ],
            [
                'name'        => 'users',
                'description' => 'Masyarakat',
            ],
        ];
        $this->db->table($tables['groups'])->insertBatch($groups);

        $users = [
            'ip_address'              => '127.0.0.1',
            'username'                => 'administrator',
            'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
            'email'                   => 'admin@admin.com',
            'activation_code'         => '',
            'forgotten_password_code' => null,
            'created_on'              => '1268889823',
            'last_login'              => '1268889823',
            'active'                  => '1',
            'nama_user'               => 'Admin',
            'img'                     => 'profile.png',
            'phone'                   => '08'
        ];



        $this->db->table($tables['users'])->insert($users);



        $usersGroups = [
            'user_id'  => 1,
            'group_id' => 1,
        ];

        $this->db->table($tables['users_groups'])->insert($usersGroups);
    }
}