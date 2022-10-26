<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('post_type');
            $table->string('title');
            $table->string('date');
            $table->string('phone');
            $table->string('description');
            $table->string('address');
            $table->string('land_area');
            $table->string('land_height');
            $table->string('road_width');
            $table->string('price');
            $table->string('y_price')->nullable();
            $table->string('electricity')->nullable();
            $table->string('gas')->nullable();
            $table->string('water')->nullable();
            $table->string('drainage_system')->nullable();
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
          $table->bigInteger('table_api')->default(13);
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
        Schema::dropIfExists('lands');
    }
}
