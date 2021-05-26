<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->nullable();
            $table->foreignId('user_id');
            $table->dateTime('date');
            $table->integer('active');
            $table->integer('is_subsidized');
            $table->timestamps();

            // Foreign key relations
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });

        DB::table('receipts')->insert(
            [
                [
                    'school_id' => 1,
                    'user_id' => 1,
                    'date' => '2021-09-01',
                    'active' => 1,
                    'is_subsidized' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'school_id' => 2,
                    'user_id' => 1,
                    'date' => '2021-09-01',
                    'active' => 1,
                    'is_subsidized' => 0,
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
        Schema::dropIfExists('receipts');
    }
}
