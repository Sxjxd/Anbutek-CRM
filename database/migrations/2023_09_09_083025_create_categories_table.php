<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['name' => 'PC'],
            ['name' => 'Gaming Consoles'],
            ['name' => 'Video Games'],
            ['name' => 'Audio'],
            ['name' => 'Offers'],
            // Add more categories if needed
        ]);
    }


    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
