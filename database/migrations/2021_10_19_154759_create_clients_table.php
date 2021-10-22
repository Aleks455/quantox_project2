<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    //php artisan make:migration create_clients_table
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->intiger('mobile_num');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->integer('postal_code');
            $table->string('country');
            $table->boolean('is_active')->default('true');//da li treba i ovde dodati?
            $table->timestamps();
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
