<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParseDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('parse_data');

        Schema::create('parse_data', function (Blueprint $table) {
            $table->id();
            $table->string('url', 2083);
            $table->text('data')->nullable();
            $table->boolean('finished')->default(false);
            $table->boolean('error')->default(false);
            $table->unsignedBigInteger('parse_id');
            $table->timestamps();

            $table->foreign('parse_id')->references('id')->on('parse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parse_data');
    }
}
