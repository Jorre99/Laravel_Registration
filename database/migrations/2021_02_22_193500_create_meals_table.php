<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price')->nullable();
            $table->boolean('status_meal');
            $table->timestamps();
        });

        DB::table('meals')->insert(
            [
                [
                    'name' => 'Frietjes met frikandel',
                    'price' => 4.99,
                    'status_meal' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Spaghetti bolognaise',
                    'price' => 7.50,
                    'status_meal' => false,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
