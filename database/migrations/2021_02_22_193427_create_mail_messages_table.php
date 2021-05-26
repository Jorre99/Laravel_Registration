<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_messages', function (Blueprint $table) {
            $table->id();
            $table->string('type_mail')->nullable();
            $table->string('text')->nullable();
            $table->string('topic')->nullable();
            $table->timestamps();
        });

        DB::table('mail_messages')->insert(

            [
                'type_mail' => 'Lesson_cancellation',
                'text' => 'De zwemlessen gaan deze week niet door!',
                'topic' => 'Les afgelast.',
                'created_at' => now(),
                'updated_at' => now()
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
        Schema::dropIfExists('mail_messages');
    }
}
