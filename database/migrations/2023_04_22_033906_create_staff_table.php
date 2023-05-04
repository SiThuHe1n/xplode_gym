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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('nrc_number')->nullable();
            $table->string('address')->nullable();
            $table->double('salary')->nullable();
            $table->date('join_date')->nullable();
            $table->string('image')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();



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
        Schema::dropIfExists('staff');
    }
};
