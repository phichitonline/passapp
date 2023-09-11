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
        Schema::table('durables', function (Blueprint $table) {
            $table->string('getid',2)->nullable()->comment('วิธีการที่ได้มา');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('durables', function (Blueprint $table) {
            //
        });
    }
};
