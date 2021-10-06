<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerUpdateStockQuantity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(' CREATE TRIGGER `update_product_quantity_stock` AFTER INSERT ON `order_details`
        FOR EACH ROW update products set 
        total_quantity = (select products.total_quantity - order_details.quantity 
        from products inner join order_details on
         order_details.product_id = products.id
          where order_details.id =
           (select MAX(order_details.id) from order_details))
            where products.id = (select order_details.product_id from order_details where order_details.id =
             ( select max(order_details.id) from order_details))
            ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_product_quantity_stock');
    }
}
