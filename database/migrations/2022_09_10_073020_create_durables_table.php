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
        Schema::create('durables', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('pass_number')->comment('เลขครุภัณฑ์');
            $table->string('pass_name')->comment('ชื่อเรียกครุภัณฑ์');
            $table->string('model')->nullable()->comment('ยี่ห้อ/รุ่น');
            $table->string('serial_no')->nullable()->comment('เลขประจำเครื่อง S/N P/N');
            // $table->string('fasgrp',10)->nullable()->comment('รหัสประเภท');
            $table->string('life')->nullable()->comment('อายุใช้งาน');
            $table->date('str_date')->comment('วันที่ได้มา');
            $table->double('pass_price', 20, 2)->comment('ราคา');
            $table->string('company')->nullable()->comment('แหล่งที่ได้มา');
            $table->string('str1',10)->nullable()->comment('แหล่งงบประมาณ');
            $table->string('docno')->nullable()->comment('เลขที่เอกสารการจัดซื้อหรือได้มา');
            $table->string('depcode',10)->nullable()->comment('รหัสหน่วยงาน');
            $table->string('status')->nullable()->comment('สถานะ');
            $table->dateTime('status4_date')->nullable()->comment('วันที่ขอจำหน่าย');
            $table->dateTime('status9_date')->nullable()->comment('วันที่จำหน่าย');
            $table->string('repair_status')->nullable()->comment('ข้อมูลสถานะการซ่อม');
            $table->string('image_filename')->nullable()->comment('ภาพ1');
            $table->string('image_filename2')->nullable()->comment('ภาพ2');
            $table->string('image_filename3')->nullable()->comment('ภาพ3');
            $table->string('manual_file1')->nullable()->comment('ไฟล์คู่มือ');
            $table->text('memo_text')->nullable()->comment('หมายเหตุ');
            $table->text('locationgps')->nullable()->comment('พิกัด GPS ของครุภัณฑ์');
            $table->string('manual_link')->nullable()->comment('ลิงก์คู่มือ');

            $table->unsignedBigInteger('user_id')->comment('Create by User');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('fasgrp')->comment('Create for Fasgrp');
            $table->foreign('fasgrp')->references('id')->on('typefasgrps');
            // $table->foreign('str1')->references('id')->on('typemoneys');
            // $table->foreign('depcode')->references('depcode')->on('departments');
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
        Schema::dropIfExists('durables');
    }
};
