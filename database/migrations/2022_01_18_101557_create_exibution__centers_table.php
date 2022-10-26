<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExibutionCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exibution__centers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('post_type');
            $table->string('title');
            $table->string('date');
            $table->string('phone');
            $table->string('description');
            $table->string('address');
            $table->string('room_size');
            $table->string('interior_condition');
            $table->string('floor_level');
            $table->string('room_type');
            $table->string('price');
            $table->string('toilet')->nullable();
            $table->string('lift')->nullable();
            $table->string('fire_exit')->nullable();
            $table->string('generator')->nullable();
            $table->string('parking')->nullable();
            $table->string('photo')->nullable();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('photo4')->nullable();
            $table->string('photo5')->nullable();
            $table->string('photo6')->nullable();
            $table->string('video')->nullable();
            $table->boolean('active')->nullable();
          $table->bigInteger('table_api')->default(20);
          $table->SoftDeletes();
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
        Schema::dropIfExists('exibution__centers');
    }
}
