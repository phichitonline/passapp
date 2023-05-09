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
        Schema::create('typestatuses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('statusid',2);
            $table->string('status');
            $table->timestamps();
        });

        DB::table('typestatuses')->insert(
            array(
                ['statusid'=> '1','status'=> 'ยังใช้งานอยู่','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['statusid'=> '2','status'=>'ระหว่างการสำรวจ','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['statusid'=> '3','status'=>'ชำรุด','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['statusid'=> '4','status'=>'ขอจำหน่าย','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['statusid'=> '9','status'=>'จำหน่ายแล้ว','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")]
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
        Schema::dropIfExists('typestatuses');
    }
};
