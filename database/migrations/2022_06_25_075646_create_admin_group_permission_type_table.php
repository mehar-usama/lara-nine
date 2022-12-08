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
        Schema::create('admin_group_permission_type', function (Blueprint $table) {
          $table->integer('group_id')->nullable();
          $table->integer('menu_id')->nullable();
          $table->string('controller')->nullable();
          $table->integer('list_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_group_permission_types');
    }
};
