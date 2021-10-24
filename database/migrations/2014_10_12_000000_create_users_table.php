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
            $table->boolean('is_active')->default('1');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            
            $table->string('company_name')->nullable();
            $table->integer('company_number')->nullable();
            $table->string('vat_id')->nullable();
            $table->string('company_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('postal_code')->nullable();
            $table->integer('phone_number')->nullable();
            $table->integer('bank_account')->nullable();
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
