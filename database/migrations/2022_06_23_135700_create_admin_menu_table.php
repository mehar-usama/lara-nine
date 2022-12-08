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
        Schema::create('admin_menu', function (Blueprint $table) {
            $table->id();
            $table->integer('parent')->nullable();
            $table->string('icon')->nullable();
            $table->string('title')->nullable();
            $table->string('controller')->nullable();
            $table->string('action')->nullable();
            $table->tinyInteger('show_in_menu')->nullable();
            $table->integer('sort_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_menus');
    }
};
