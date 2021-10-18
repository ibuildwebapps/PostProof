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
            $table->string('expected_content_types', 64) ;
            $table->string('client_ips', 64) ;
            $table->string('user_agent', 256) ;
            $table->string('default_locale', 4) ;
            $table->longText('post_data') ;
            $table->longText('get_data') ;
            $table->longText('headers') ;
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
