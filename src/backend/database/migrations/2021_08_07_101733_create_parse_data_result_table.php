<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParseDataResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parse_data_result', function (Blueprint $table) {
            $table->id();
            $table->text('result');
            $table->unsignedBigInteger('parse_data_id');
            $table->timestamps();

            $table->foreign('parse_data_id')->references('id')->on('parse_data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parse_data_result');
    }
}
