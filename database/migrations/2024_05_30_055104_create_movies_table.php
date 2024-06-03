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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('m_title');
            $table->text('m_short_desc');
            $table->string('Production');
            $table->string('country');
            // $table->integer('Duration');
            $table->string('Duration');
            $table->string('m_poster')->nullable();
            $table->string('m_video_poster')->nullable();
            $table->string('watch_url')->nullable();
            $table->string('m_trailer_link')->nullable();
            $table->string('watch_btn_title')->nullable();
            $table->boolean('is_active')->default(true);
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
};
