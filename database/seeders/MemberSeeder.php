<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('responsables')->insert([
            'name' => "Ana Rosa",
            'cellphone' => '23445577',
            'email' => null
        ]);
        DB::table('groups')->insert([
            'title' => "Segundo Grupo",
            'description' => "Segundo Sub grupo"
        ]);

        DB::table('members')->insert([
            'name' => 'Eliasib',
            'surnames' => 'Toriz',
            'cellphone' => "3329885848",
            'phone' => null,
            'email' => 'eliasibt97@gmail.com',
            'age' => 23,
            'address' => 'Nazareth 618, int. B',
            'born_date' => '1997-04-30',
            'birth_place' => 'El Salvador',
            'baptism_date' => '2011-05-29',
            'holy_spirit_receive_date' => '2012-07-25',
            'status' => 'Activo',
            'observations' => null,
            'group_id' => 1,
            'responsable_id' => 1
        ]);

        DB::table('activities')->insert([
            'title' => 'Coro',
            'Description' => null
        ]);

        DB::table('activities_members')->insert([
            'activity_id' => 1,
            'member_id' => 1
        ]);

    }
}
