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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();delete
            // $table->boolean('is_active')->default('true'); //add this one
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            
            $table->string('company_name');
            $table->integer('company_number');
            $table->string('vat_id');
            $table->string('company_address');
            $table->string('city');
            $table->string('state');
            $table->integer('postal_code');
            $table->integer('phone_number');
            $table->integer('bank_account');
        });
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
