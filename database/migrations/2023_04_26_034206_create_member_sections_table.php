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
        Schema::create('member_sections', function (Blueprint $table) {
            $table->id();
            $table->string('member_id')->nullable();
            $table->string('package_id')->nullable();
            $table->string('trainer_id')->nullable();
            $table->string('trainer_section')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('datetime')->nullable();
            $table->double('amount')->nullable();
            $table->string('payment_method2')->nullable();
            $table->double('amount2')->nullable();
            $table->string('note')->nullable();

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
        Schema::dropIfExists('member_sections');
    }
};
