<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->string('phone');
            $table->float('square_meters')->nullable(); // ??? ????????????
            $table->string('car_description')->nullable(); // ??? ????
            $table->boolean('is_active')->default(false); // ?????? ?????????
            $table->foreignId('subcategory_id')->constrained('subcategories');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
