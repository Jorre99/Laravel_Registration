<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->float('price')->nullable();
            $table->timestamps();
        });

        DB::table('prices')->insert(
            [
                [
                    'name' => 'zwemles_kind',
                    'price' => 5.00,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'school_kind',
                    'price' => 1.90,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'zwemfeest_kind',
                    'price' => 3.20,
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
        Schema::dropIfExists('prices');
    }
}
