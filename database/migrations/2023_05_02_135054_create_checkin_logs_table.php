<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckinLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkin_logs', function (Blueprint $table) {
            $table->id();
            $table->string('member_id')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('datetime')->nullable();
            $table->string('is_pt')->nullable();


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
        Schema::dropIfExists('checkin_logs');
    }
}
