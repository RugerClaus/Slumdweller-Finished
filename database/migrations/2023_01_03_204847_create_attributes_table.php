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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('options1', 255)->nullable();
            $table->string('options2', 255)->nullable();
            $table->string('options3', 255)->nullable();
            $table->string('options4', 255)->nullable();
            $table->string('options5', 255)->nullable();
            $table->string('options6', 255)->nullable();
            $table->string('options7', 255)->nullable();
            $table->string('options8', 255)->nullable();
            $table->string('options9', 255)->nullable();
            $table->string('options10', 255)->nullable();
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
        Schema::dropIfExists('attributes');
    }
};
