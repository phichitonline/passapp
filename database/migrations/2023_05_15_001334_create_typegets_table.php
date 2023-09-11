<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typegets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('getid',2);
            $table->string('get_name');
            $table->timestamps();
        });

        DB::table('typegets')->insert(
            array(
                ['getid'=> '1','get_name'=>'วิธีตกลงราคา','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['getid'=> '2','get_name'=>'วิธีสอบราคา','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['getid'=> '3','get_name'=>'วิธีประกวดราคา','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['getid'=> '4','get_name'=>'วิธีพิเศษ','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['getid'=> '5','get_name'=>'วิธีกรณีพิเศษ','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['getid'=> '6','get_name'=>'วิธี e-Auction','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typegets');
    }
};
