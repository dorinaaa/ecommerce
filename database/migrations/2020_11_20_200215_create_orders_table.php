<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->double('total_price');
            $table->string('transaction_id');
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('address_id')->onDelete('set null');
            $table->foreignId('status_id')->onDelete('set null');
            $table->foreignId('transport_method_id')->nullable()->default(null)->onDelete('set null');
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
        Schema::dropIfExists('orders');
    }
}
