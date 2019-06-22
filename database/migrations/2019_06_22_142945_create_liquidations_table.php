<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiquidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidations', function (Blueprint $table) {
            $table->bigIncrements('lichidare_id');
            $table->string('full_name');
            $table->string('cnp');
            $table->string('telephone');
            $table->string('city');
            $table->string('address_details');
            $table->date('contract_date');
            $table->string('product_name');
            $table->float('amount');           
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
        Schema::dropIfExists('liquidations');
    }
}
