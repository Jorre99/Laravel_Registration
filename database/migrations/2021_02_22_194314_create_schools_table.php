<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('street')->nullable();
            $table->string('house_nr')->nullable();
            $table->string('box_nr')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
        });

        DB::table('schools')->insert(
            [
                [
                    'name' => 'deLindebasisschool',
                    'email' => 'delinde.info@hotmail.com',
                    'telephone' => '0452669874',
                    'street' => 'neerslagstraat',
                    'house_nr' => '22',
                    'box_nr' => '1',
                    'postal_code' => '3910',
                    'city' => 'Neerpelt',
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'name' => 'KlimOp',
                    'email' => 'KlimOp.info@hotmail.com',
                    'telephone' => '045987475',
                    'street' => 'koningboudewijnlaan',
                    'house_nr' => '103',
                    'box_nr' => '2',
                    'postal_code' => '2470',
                    'city' => 'Herenthout',
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
        Schema::dropIfExists('schools');
    }
}
