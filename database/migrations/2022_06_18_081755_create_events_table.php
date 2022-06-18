<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 60);
            $table->text('outline', 800)->comment('イベントの概要');
            $table->string('address');
            $table->date('event_date');
            $table->time('start_time');
            $table->time('finish_time');
            $table->integer('capacity')->unsigned();;
            $table->timestamps();
            $table->softDeletes();
            
            $table->unsignedBigInteger('sport_id');
            $table->foreign('sport_id')->references('id')->on('sports')
            ->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('host_id');
            $table->foreign('host_id')->references('id')->on('hosts')
            ->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
