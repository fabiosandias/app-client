<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 7);
            $table->string('first_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->date('date_birth')->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('legal_name', 80)->nullable();
                $table->string('responsible_name', 80)->nullable();
            $table->string('cnpj', 18)->nullable()->nullable();
            $table->string('state_registration', 45)->nullable();
            $table->boolean('excluded')->default(0);
            $table->timestamps();
            $table->integer('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
