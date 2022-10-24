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
        Schema::create('filter_processes', function (Blueprint $table) {
            $table->id();
            $table->string('cat_id');
            $table->string('product_id');
            $table->string('Stage_1')->nullable();
            $table->string('Stage_2')->nullable();
            $table->string('Stage_3')->nullable();
            $table->string('Stage_4')->nullable();
            $table->string('Stage_5')->nullable();
            $table->string('Stage_6')->nullable();
            $table->string('Stage_7')->nullable();
            $table->string('Stage_8')->nullable();
            $table->string('Stage_9')->nullable();
            $table->string('Stage_10')->nullable();
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
        Schema::dropIfExists('filter_processes');
    }
};
