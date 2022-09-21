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
        Schema::create('repairs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('durable_id');
            $table->dateTime('repair_date')->comment('วันที่ส่งซ่อม');
            $table->string('repair_text')->comment('ปัญหาสาเหตุหรืออาการ');
            $table->string('repair_user')->comment('ผู้ส่งซ่อม');
            $table->dateTime('repair_reciev_date')->nullable()->comment('วันที่รับงาน');
            $table->string('repair_reciev_user')->nullable()->comment('ช่างรับงาน');
            $table->dateTime('repair_finish_date')->nullable()->comment('วันที่ซ่อมเสร็จ');
            $table->string('repair_finish_user')->nullable()->comment('ช่างรายงานซ่อมเสร็จ');
            $table->string('repair_status')->comment('สถานะการซ่อม');
            $table->string('repair_image')->nullable()->comment('ภาพประกอบส่งซ่อม');
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
        Schema::dropIfExists('repairs');
    }
};
