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
        Schema::table('library_cards', function (Blueprint $table) {
            //
            $table->string('reason', 255)->after('id'); 
            $table->bigInteger('student_id')->unsigned()->after('reason');
            $table->foreign('student_id')->references('id')->on('student_ids')->onDelete('cascade');
            $table->bigInteger('created_by')->unsigned()->after('student_id');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('library_cards', function (Blueprint $table) {
            //
        });
    }
};
