<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id');
            $table->string('class_name');
            $table->boolean('is_subsidized');
            $table->timestamps();

            // Foreign key relations
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('restrict')->onUpdate('cascade');

        });

        DB::table('school_classes')->insert(
[
            [
                'school_id' => 1,
                'class_name' => '0A',
                'is_subsidized' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'school_id' => 2,
                'class_name' => '0B',
                'is_subsidized' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
    ]
        );

        for ($i = 0; $i <= 10; $i++) {
            DB::table('school_classes')->insert(
                [
                    'school_id' => 2,
                    'class_name' => "$i B",
                    'is_subsidized' => false,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('school_classes')->insert(
                [
                    'school_id' => 1,
                    'class_name' => "$i A",
                    'is_subsidized' => false,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_classes');
    }
}
