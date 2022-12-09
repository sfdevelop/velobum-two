<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('AdminCreate');
        $this->call('ContactCreate');
        $this->call('TextPagesCreate');
        $this->call('CreateParentCategory');
        $this->call('CreateOnePages');
    }
}
class AdminCreate extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->delete();
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'login' => 'admin',
            'password' => Hash::make('admin'),
        ]);
    }
}
class ContactCreate extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('contacts')->delete();
        DB::table('contacts')->truncate();
        DB::table('contacts')->insert([
            'email' => null,
            'tel' => null,
            'addresses' => null,
        ]);
    }
}
class TextPagesCreate extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('text_pages')->delete();
        DB::table('text_pages')->truncate();
        DB::table('text_pages')->insert([
            'category' => 1,
            'value' => null
        ]);
    }
}
class CreateParentCategory extends Seeder {
    public function run() {
        DB::table('categories')->delete();
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            'parent_id' => 0,
            'name' => 'Не определено'
        ]);
    }
}
class CreateOnePages extends Seeder {
    public function run() {
        DB::table('one_pages')->delete();
        DB::table('one_pages')->truncate();
        DB::table('one_pages')->insert([
            ['id' => 1,
            'value' => null],
            ['id' => 2,
            'value' => null]
        ]);
    }
}