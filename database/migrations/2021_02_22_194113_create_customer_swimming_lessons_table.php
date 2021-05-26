<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSwimmingLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_swimming_lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->date('date');
            $table->foreignId('swimming_lesson_id');
            $table->string('status_customer_swimming_lesson');
            $table->timestamps();

            // Foreign key relations
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('swimming_lesson_id')->references('id')->on('swimming_lessons')->onDelete('restrict')->onUpdate('cascade');
        });

        DB::table('customer_swimming_lessons')->insert(
            [
                [
                    'customer_id' => 1,
                    'swimming_lesson_id' => 1,
                    'date' => '2021-02-24',
                    'status_customer_swimming_lesson' => 'wachtend',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'customer_id' => 2,
                    'swimming_lesson_id' => 2,
                    'date' => '2021-02-24',
                    'status_customer_swimming_lesson' => 'wachtend',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'customer_id' => 3,
                    'swimming_lesson_id' => 2,
                    'date' => '2021-02-24',
                    'status_customer_swimming_lesson' => 'wachtend',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'customer_id' => 4,
                    'swimming_lesson_id' => 1,
                    'date' => '2021-02-24',
                    'status_customer_swimming_lesson' => 'actief',
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
        Schema::dropIfExists('customer_swimming_lessons');
    }
}
