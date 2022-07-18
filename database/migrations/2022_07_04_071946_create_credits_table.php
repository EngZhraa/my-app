<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            
            $table->string('cred_num');
            $table->string('sub_name');
            $table->integer('cred_amnt');
            $table->date('cred_open_date');
            $table->string('cred_exc_comp');
            $table->integer('ex_price');
            $table->double('per_cred_cont');
            $table->date('ship_end_date');
            $table->date('cred_end_date');
            $table->string('notes');
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
        Schema::dropIfExists('credits');
    }
};
