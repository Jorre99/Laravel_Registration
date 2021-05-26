<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool_parties', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->foreignId('customer_id')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('pupil_count')->nullable();
            $table->foreignId('price_id')->nullable();
            $table->foreignId('meal_id')->nullable();
            $table->string('status_pool_party');
            $table->timestamps();

            // Foreign key relations
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('restrict')->onUpdate('cascade');
        });

        DB::table('pool_parties')->insert(

            [
                [
                'date' => '2021-02-24',
                'customer_id' => 1,
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
                'pupil_count' => 15,
                'price_id' => 1,
                'meal_id' => 1,
                'status_pool_party' => 'Aangevraagd',
                'created_at' => now(),
                'updated_at' => now()
                ],
                [
                'date' => '2021-06-25',
                'customer_id' => 1,
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
                'pupil_count' => 20,
                'price_id' => 1,
                'meal_id' => 1,
                'status_pool_party' => 'Beschikbaar',
                'created_at' => now(),
                'updated_at' => now()
                ],
                [
                'date' => '2021-06-26',
                'customer_id' => 1,
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
                'pupil_count' => 12,
                'price_id' => 1,
                'meal_id' => 1,
                'status_pool_party' => 'Beschikbaar',
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
        Schema::dropIfExists('pool_parties');
    }
}
