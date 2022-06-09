<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('kcons');
            $table->string('serv_chrg')->nullable();
            $table->string('vat')->nullable();
            $table->string('nhil')->nullable();
            $table->string('getfund')->nullable();
            $table->string('strl_levi')->nullable();
            $table->string('gov_levi')->nullable();
            $table->string('total_chrg')->nullable();
            $table->string('del')->default('no');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('tarifs');
    }
}
