<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwimmingLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swimming_lessons', function (Blueprint $table) {
            $table->id();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('price_id')->nullable();
            $table->string('weekday')->nullable();
            $table->boolean('status_swimming_lesson');
            $table->timestamps();

            // Foreign key relations
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('restrict')->onUpdate('cascade');
        });
        DB::table('swimming_lessons')->insert(
            [
                [
                    'start_time' => '13:00:00',
                    'end_time' => '16:00:00',
                    'user_id' => 1,
                    'price_id' => 1,
                    'weekday' => 'Maandag',
                    'status_swimming_lesson' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'start_time' => '11:00:00',
                    'end_time' => '17:00:00',
                    'user_id' => 2,
                    'price_id' => 1,
                    'weekday' => 'Dinsdag',
                    'status_swimming_lesson' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'start_time' => '10:00:00',
                    'end_time' => '13:00:00',
                    'user_id' => 1,
                    'price_id' => 1,
                    'weekday' => 'woensdag',
                    'status_swimming_lesson' => false,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'start_time' => '10:00:00',
                    'end_time' => '13:00:00',
                    'user_id' => 1,
                    'price_id' => 1,
                    'weekday' => 'woensdag',
                    'status_swimming_lesson' => false,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'start_time' => '11:00:00',
                    'end_time' => '13:00:00',
                    'user_id' => 1,
                    'price_id' => 1,
                    'weekday' => 'vrijdag',
                    'status_swimming_lesson' => true,
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
        Schema::dropIfExists('swimming_lessons');
    }
}
