<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('sur_name');
            $table->string('telephone')->nullable();
            $table->string('password');
            $table->integer('admin');
            $table->integer('is_swimmingInstructor')->default(false);
            $table->boolean('is_contactpersoon')->default(false);
            $table->string('unique_link')->unique()->nullable();

            $table->rememberToken();
            $table->timestamps();

            // Foreign key relations
        });

        DB::table('users')->insert(

            [
                [
                    'email' => 'B-degraaf@hotmail.com',
                    'name' => 'Bart',
                    'sur_name' => 'De Graaf',
                    'telephone' => '0471132455',
                    'password' => Hash::make('admin1234'),
                    'admin' => 1,
                    'is_swimmingInstructor' => 1,
                    'unique_link' => 'this.shouldbealink.be',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'email' => 'J-Fransen@hotmail.com',
                    'name' => 'Jef',
                    'sur_name' => 'Franssen',
                    'telephone' => '0471148655',
                    'password' => Hash::make('admin1234'),
                    'admin' => 1,
                    'is_swimmingInstructor' => 1,
                    'unique_link' => 'this.shouldbealink2.be',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'email' => 'docent.admin@hotmail.com',
                    'name' => 'docent',
                    'sur_name' => 'admin',
                    'telephone' => '0471117555',
                    'password' => Hash::make('docent1234'),
                    'admin' => 1,
                    'is_swimmingInstructor' => 1,
                    'unique_link' => 'this.shouldbealink3.be',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'email' => 'docent.zwemleraar@hotmail.com',
                    'name' => 'docent',
                    'sur_name' => 'zwemleraar',
                    'telephone' => '0471174155',
                    'password' => Hash::make('docent1234'),
                    'admin' => 0,
                    'is_swimmingInstructor' => 1,
                    'unique_link' => 'this.shouldbealink4.be',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
