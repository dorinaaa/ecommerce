<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpUserOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE PROCEDURE MerrPorositeKlientit( IN Kod_klienti BIGINT(20) )  BEGIN  
        select O.date as porosi_date, O.id as porosi_id, OD.quantity as sasi, OD.total_price as cmim_total, addr.city, addr.state, addr.street, p.name as produkt, s.name as statusi, s.color, cat.name as kategori, cat.photo
         from orders O 
         inner join order_details OD on O.id = OD.order_id 
         inner join addresses addr on addr.id=O.address_id 
         inner join products p on p.id=OD.product_id and p.is_active=1 
         inner join statuses s on s.id=O.status_id 
         inner join categories cat on cat.id=p.category_id
         where O.user_id=Kod_klienti; END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS MerrPorositeKlientit');
    }
}
