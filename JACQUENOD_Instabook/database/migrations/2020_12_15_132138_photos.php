<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Photos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->date("date")->nullable();
            $table->string("file");
            $table->integer("resolution")->nullable();            
            $table->integer("width");
            $table->integer("height");
            $table->foreignId("user_id")->nullable()->constrained()->onDelete("set null"); 
            $table->foreignId("group_id")->constrained()->onDelete("cascade"); 
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
        //
    }
}
