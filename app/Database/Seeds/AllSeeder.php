<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class AllSeeder extends Seeder
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

		$users = [];
		for ($i = 0; $i <= 10; $i++) {
			array_push($users, [
				'ip_address'              => '127.0.0.1',
				'username'                => $i == 0 ? 'administrator' : ($i > 7 ? "user_$i" : "tukang_$i"),
				'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
				'email'                   => $i == 0 ? 'admin@admin.com' : ($i > 7 ? 'user'.sprintf('%02d', $i).'@gmail.com' : 'tukang'.sprintf('%02d', $i).'@gmail.com'),
				'activation_code'         => '',
				'forgotten_password_code' => null,
				'created_on'              => '1268889823',
				'last_login'              => '1268889823',
				'active'                  => '1',
				'nama_user'               => $i == 0 ? 'Admin' : $faker->name(),
				'img'											=> 'profile.png',
				'phone'                   => $faker->phoneNumber(),
			]);
		}
		$this->db->table($tables['users'])->insertBatch($users);


		$categories = [
			[
				'nama_kategori'		=> 'mendirikan bangunan',
				'keterangan'			=> null,
			],
			[
				'nama_kategori'		=> 'pemasangan lantai',
				'keterangan'			=> null,
			],
			[
				'nama_kategori'		=> 'septic tank',
				'keterangan'			=> null,
			],
			[
				'nama_kategori'		=> 'atap rumah',
				'keterangan'			=> null,
			],
			[
				'nama_kategori'		=> 'pagar',
				'keterangan'			=> null,
			],
			[
				'nama_kategori'		=> 'cat bangunan',
				'keterangan'			=> null,
			],
		];
		$this->db->table('kategori')->insertBatch($categories);

		$tuakng = [];
		$datatukang = $this->db->table($tables['users'])->like('username', 'tukang_')->get()->getResult();
		foreach ($datatukang as $row) {
			array_push($tuakng, [
				'user_id'				=> $row->id,
				'nama'					=> $row->nama_user,
				'nik'						=> rand(10,10000000),
				'tarif'					=> 150000,
				'umur'					=> 34,
				'alamat'				=> $faker->address(),
				'telp'					=> $row->phone,
				'foto'					=> $row->img,
				'foto_ktp'			=> null,
				'created_at'		=> Time::now(),
				'updated_at'		=> Time::now(),
			]);
		}
		$this->db->table('tukang')->insertBatch($tuakng);

		$kategoriGroups = [];
		$datatukang = $this->db->table('tukang')->get()->getResult();
		$datakategori = $this->db->table('kategori')->get()->getResult();
		foreach($datatukang as $row) {
			array_push($kategoriGroups, [
				'id_tukang'		=> $row->id,
				'id_kategori'	=> $datakategori[rand(0,5)]->id
			]);
		}
		$this->db->table('kategori_group')->insertBatch($kategoriGroups);

		$usersGroups = [];
			for ($i = 1; $i <=11; $i++) {
				array_push($usersGroups, [
					'user_id'  => $i,
					'group_id' => $i == 1 ? 1 : ($i > 8 ? 3 : 2),
				]);
			}
		$this->db->table($tables['users_groups'])->insertBatch($usersGroups);
	}
}
