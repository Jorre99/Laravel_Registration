<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_class_id');
            $table->foreignId('receipt_id');
            $table->date('date');
            $table->integer('pupil_count');
            $table->timestamps();

            // Foreign key relations
            $table->foreign('school_class_id')->references('id')->on('school_classes')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('receipt_id')->references('id')->on('receipts')->onDelete('restrict')->onUpdate('cascade');
        });

        DB::table('pool_appointments')->insert(
            [
                [
                    'school_class_id' => 1,
                    'receipt_id' => 1,
                    'date' => '2021-09-24',
                    'pupil_count' => 22,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'school_class_id' => 7,
                    'receipt_id' => 2,
                    'date' => '2021-09-24',
                    'pupil_count' => 17,
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
        Schema::dropIfExists('pool_appointments');
    }
}
