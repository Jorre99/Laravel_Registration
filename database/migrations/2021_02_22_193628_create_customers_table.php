<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('telephone_nr')->nullable();
            $table->string('street')->nullable();
            $table->string('house_nr')->nullable();
            $table->string('box_nr')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('email');
            $table->date('birth_date')->nullable();
            $table->string('note')->nullable();

            $table->timestamps();
        });

        DB::table('customers')->insert(
            [
                [
                    'name' => 'Van den Broek',
                    'first_name' => 'Jef',
                    'telephone_nr' => '0471823643',
                    'street' => 'begijnlaan',
                    'house_nr' => '37',
                    'box_nr' => '8',
                    'postal_code' => '2400',
                    'city' => 'Mol',
                    'email' => 'jef.vdb@mail.com',
                    'birth_date' => '2006-05-05',
                    'note' => 'Heeft al enkele keren zwemles gehad',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Jansens',
                    'first_name' => 'Heleen',
                    'telephone_nr' => '0478643643',
                    'street' => 'bosstraat',
                    'house_nr' => '22',
                    'box_nr' => '',
                    'postal_code' => '2200',
                    'city' => 'Herentals',
                    'email' => 'HeleenJan@mail.com',
                    'birth_date' => '2010-03-08',
                    'note' => 'Zou graag samen met haar broer Michael Jansens willen zwemmen',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Jansens',
                    'first_name' => 'Michael',
                    'telephone_nr' => '0478643643',
                    'street' => 'bosstraat',
                    'house_nr' => '22',
                    'box_nr' => '',
                    'postal_code' => '2200',
                    'city' => 'Herentals',
                    'email' => 'HeleenJan@mail.com',
                    'birth_date' => '2010-03-08',
                    'note' => 'Zou graag samen met zijn zus Heleen Jansens willen zwemmen',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'De Klerk',
                    'first_name' => 'Henry',
                    'telephone_nr' => '0478643572',
                    'street' => 'lindelaan',
                    'house_nr' => '3',
                    'box_nr' => '',
                    'postal_code' => '2200',
                    'city' => 'Herentals',
                    'email' => 'dk.henry@mail.com',
                    'birth_date' => '2008-08-03',
                    'note' => '',
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
        Schema::dropIfExists('costumers');
    }
}
