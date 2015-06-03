<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User as User;
use DB as DB;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		//$this->call('UserTableSeeder');
        $this->call('PlayerTableSeeder');
	}

}


class UserTableSeeder extends Seeder {

    public function run() {
        User::truncate();

        User::create( [
                'email' => 'siddique@yahoo.com' ,
                'password' => Hash::make( '123456' ) ,
                'name' => 'Sid' ,
            ] );
    }
}


class PlayerTableSeeder extends Seeder {

    public function run() {

        DB::table('players')->insert([
            ['first_name' => 'Ben', 'last_name' => 'Amos', 'team_id' => 1],
            ['first_name' => 'Tyler', 'last_name' => 'Blackett', 'team_id' => 2],
            ['first_name' => 'Daley', 'last_name' => 'Blind', 'team_id' => 3],
            ['first_name' => 'Michael', 'last_name' => 'Carrick', 'team_id' => 4],
            ['first_name' => 'Tom', 'last_name' => 'Cleverley', 'team_id' => 5],
            ['first_name' => 'Jonny', 'last_name' => 'Evans', 'team_id' => 6],
            ['first_name' => 'Marouane', 'last_name' => 'Fellaini', 'team_id' => 7],
            ['first_name' => 'Darren', 'last_name' => 'Fletcher', 'team_id' => 8],
            ['first_name' => 'Javier', 'last_name' => 'Hernandez', 'team_id' => 9],
            ['first_name' => 'Ander', 'last_name' => 'Herrera', 'team_id' => 10],
            ['first_name' => 'Reece', 'last_name' => 'James', 'team_id' => 11],
            ['first_name' => 'Saidy', 'last_name' => 'Janko', 'team_id' => 12],
            ['first_name' => 'Adnan', 'last_name' => 'Januzaj', 'team_id' => 13],
            ['first_name' => 'Sam', 'last_name' => 'Johnstone', 'team_id' => 14],
            ['first_name' => 'Phil', 'last_name' => 'Jones', 'team_id' => 1]
        ]);

    }
}