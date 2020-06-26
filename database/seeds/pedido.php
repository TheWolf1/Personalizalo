<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pedido extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pedido')->insert([
            'nombre'=>'Kevin',
            'telefono'=>'0966282309',
            'cedula'=>'1002321'

        ]);
    }
}
