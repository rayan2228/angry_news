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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('writer_id');
            $table->integer('parent_category_id');
            $table->string('post_heading');
            $table->string('post_slug')->unique();
            $table->string('post_thumbnail');
            $table->longText('post_description')->nullable();
            $table->string('post_status')->default('active');
            $table->string('featured')->default('deactive');
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
};
