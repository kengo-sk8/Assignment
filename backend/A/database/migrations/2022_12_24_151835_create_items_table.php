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
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_id');
            $table->string('name', 255)->nullable();
            $table->string('price', 255)->nullable();
            $table->integer('delete_flag')->default(0);
            $table->timestamp('create_date')->useCurrent();
            $table->timestamp('modify_date')->nullable()->useCurrentOnUpdate();
            $table->timestamp('delete_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
