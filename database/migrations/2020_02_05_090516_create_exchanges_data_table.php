<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('exchanges_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("Symbol")->nullable();
            $table->string("Exchange")->nullable();
            $table->string("Company_name")->nullable();
            $table->date("Trade_date")->nullable();
            $table->time("Trade_time",3)->nullable();
            $table->float("Option_trade_price",255,3)->nullable();
            $table->integer("Trade_size")->nullable();
            $table->string("Trade_exchange")->nullable();
            $table->string("Trade_condition")->nullable();
            $table->string("Option_symbol")->nullable();
            $table->date("Option_expiration")->nullable();
            $table->double("Price_strike",255,3)->nullable();
            $table->string("Call_Put")->nullable();
            $table->string("Style")->nullable();
            $table->float("Bid_price",255,3)->nullable();
            $table->time("Bid_time",3)->nullable();
            $table->integer("Bid_size")->nullable();
            $table->string("Bid_exchange")->nullable();
            $table->float("Ask_price",255,3)->nullable();
            $table->time("Ask_time",3)->nullable();
            $table->integer("Ask_size")->nullable();
            $table->string("Ask_exchange")->nullable();
            $table->float("Underlying_bid_price",255,3)->nullable();
            $table->float("Underlying_ask_price",255,3)->nullable();
            $table->time("Underlying_bid_time",3)->nullable();
            $table->time("Underlying_ask_time",3)->nullable();
            $table->float("Underlying_last_price",255,3)->nullable();
            $table->time("Underlying_last_time",3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges_data');
    }
}
