<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('meta', function (Blueprint $table) {
            $table->integer('metaable_id');
            $table->string('metaable_type');
            $table->string('key');
            $table->string('value');

            $table->unique(['metaable_id', 'metaable_type', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('meta');
    }
}
