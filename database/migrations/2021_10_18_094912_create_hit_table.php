<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hit', function (Blueprint $table) {
            $table->id();
            $table->string('tag', 32)->nullable()->default(null) ;
            $table->string('scheme', 8) ;
            $table->string('method', 8) ;
            $table->string('remote_address', 32);
            $table->string('remote_host', 64);
            $table->string('user_agent', 256) ;
            $table->string('default_locale', 4) ;
            $table->longText('raw_data') ;
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
        Schema::dropIfExists('hit');
    }
}
