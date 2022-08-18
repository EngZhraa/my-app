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
        Schema::create('enforcments', function (Blueprint $table) {
            $table->id();
            $table->integer('cred_id');
            $table->string('enf_num');
            $table->date('enf_date');
            $table->integer('enf_amnt');
            $table->integer('offic_rec_num');
            $table->integer('exch-rate');
            $table->date('offic_rec_date');
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
        Schema::dropIfExists('enforcments');
    }
};
