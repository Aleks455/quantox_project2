<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_items', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('item_id')->constrained()->onDelete('cascade');
            // $table->string('item_name');
            // $table->integer('item_price');
            // $table->integer('quantity');
            // $table->integer('total');
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
        Schema::dropIfExists('service_items');
    }
}              
                        