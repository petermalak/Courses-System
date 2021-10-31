<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger("reference_type_id");
            $table->unsignedBigInteger("course_id");
            $table->unsignedBigInteger("lecture_id")->nullable();
            $table->unsignedBigInteger("upload_id");
            $table->foreign("reference_type_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("course_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("lecture_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("upload_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('references');
    }
}
