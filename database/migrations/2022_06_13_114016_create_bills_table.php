<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('bill_name')->nullable();
            $table->string('bill_total')->nullable();
            $table->integer('customer_id');
            $table->string('customer_email');
            $table->string('customer_fullname');
            $table->string('customer_phone');
            $table->string('ship_fullname');
            $table->string('ship_phone');
            $table->string('ship_address');
            $table->integer('is_payment')->default(0);
            $table->integer('is_type')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
