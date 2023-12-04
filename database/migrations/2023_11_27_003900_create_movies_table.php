<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->comment('映画タイトル')->unique();
            $table->text('image_url')->comment('画像URL');
            $table->integer('published_year')->comment('公開年');
            $table->tinyInteger('is_showing')->default(0)->comment('上映中かどうか');
            $table->text('description')->comment('概要');
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
        Schema::dropIfExists('movies');
    }
}
