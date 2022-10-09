<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name')->unique();
            $table->string('name-slug')->unique();
            $table->text('description');
            $table->string('rfc',20)->nullable()->default('XAXX010101000');
            $table->text('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('web')->nullable();
            $table->string('email')->unique();
            $table->text('logo')->nullable();
            $table->string('slogan')->nullable();


            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
