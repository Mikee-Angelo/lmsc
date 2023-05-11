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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255); 
            $table->text('description'); 
            $table->string('edition', 100); 
            $table->string('isbn', 17);
            $table->string('copyright_year', 20); 
            $table->string('year_published', 20); 
            $table->smallInteger('pages');
            $table->smallInteger('height')->nullable();
            $table->smallInteger('width')->nullable();
            $table->smallInteger('depth')->nullable();
            $table->integer('price');
            $table->string('file_path', 255)->nullable();
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
        Schema::dropIfExists('books');
    }
};
