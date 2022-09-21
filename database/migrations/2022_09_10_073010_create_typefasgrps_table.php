<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typefasgrps', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('type_name_fasgrp')->comment('ประเภทครุภัณฑ์');
            $table->timestamps();
        });

        DB::table('typefasgrps')->insert(
            array(
                ['type_name_fasgrp'=> 'ครุภัณฑ์สำนักงาน','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['type_name_fasgrp'=> 'ครุภัณฑ์ยานพาหนะและขนส่ง','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['type_name_fasgrp'=> 'ครุภัณฑ์ไฟฟ้าและวิทยุ','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['type_name_fasgrp'=> 'ครุภัณฑ์โฆษณาและเผยแพร่','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['type_name_fasgrp'=> 'ครุภัณฑ์การเกษตร','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['type_name_fasgrp'=> 'ครุภัณฑ์ก่อสร้าง','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['type_name_fasgrp'=> 'ครุภัณฑ์การแพทย์','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['type_name_fasgrp'=> 'ครุภัณฑ์คอมพิวเตอร์','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['type_name_fasgrp'=> 'ครุภัณฑ์งานบ้านงานครัว','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")],
                ['type_name_fasgrp'=> 'ครุภัณฑ์อื่น','created_at'=> date("Y-m-d H:i:s"),'updated_at'=> date("Y-m-d H:i:s")]
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
        Schema::dropIfExists('typefasgrps');
    }
};
