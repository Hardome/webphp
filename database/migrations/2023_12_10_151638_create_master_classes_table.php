<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
//            $table->date('date');
//            $table->time('time');
            $table->timestamp('startAt');
            $table->integer('limit');
            $table->integer('cost');
            $table->unsignedBigInteger('creatorId');
            $table->foreign('creatorId')->references('id')->on('users');
            $table->unsignedBigInteger('creativityId');
            $table->foreign('creativityId')->references('id')->on('creativity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_classes');
    }
};
