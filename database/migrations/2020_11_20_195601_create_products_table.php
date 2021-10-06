<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('serial_no')->unique();
            $table->string('name');
            $table->string('model');
            $table->string('year')->nullable()->default(null);
            $table->string('description');
            $table->string('manufacturer');
            $table->string('color')->nullable()->default(null);
            $table->integer('front_camera')->nullable()->default(null);
            $table->integer('back_camera')->nullable()->default(null);
            $table->integer('ram')->nullable()->default(null);
            $table->integer('storage')->nullable()->default(null);
            $table->string('display_size')->nullable()->default(null);
            $table->string('display_resolution')->nullable()->default(null);
            $table->string('processor')->nullable()->default(null);
            $table->string('battery')->nullable()->default(null);
            $table->string('os')->nullable()->default(null);
            $table->string('graphics_card')->nullable()->default(null);
            $table->double('weight')->nullable()->default(null);
            $table->double('price');
            $table->double('discount');
            $table->integer('total_quantity');
            $table->boolean('is_active');
            $table->foreignId('category_id')->onDelete('set null');
            $table->string('label')->nullable()->default(null);
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
        Schema::dropIfExists('products');
    }
}
