<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('domenDate');
            $table->string('hostDate')->nullable();
            $table->string('comment')->nullable();
            $table->string('domenPrice')->nullable();
            $table->string('hostPrice')->nullable();
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
        Schema::dropIfExists('domens');
    }
}
