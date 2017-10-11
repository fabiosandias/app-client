<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('address_id');
            $table->string('street', 100)->nullable();
            $table->string('number', 6)->nullable();
            $table->string('state', 60)->nullable();
            $table->string('district', 45)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('complement', 100)->nullable();
            $table->string('zip_code', 12)->nullable();
            $table->timestamps();
            $table->integer('client_id', false, true);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
