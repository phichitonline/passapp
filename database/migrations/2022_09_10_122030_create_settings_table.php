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
        Schema::create('settings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('s_no')->comment('เลขที่หนังสือของหน่วยงาน');
            $table->string('s_name')->comment('ชื่อหน่วยงาน');
            $table->string('s_headname')->comment('ชื่อหัวหน้าหน่วยงาน');
            $table->string('s_address')->comment('ที่อยู่');
            $table->string('module1',10)->comment('ระบบศูนย์เครื่องมือแพทย์');
            $table->string('module2',10)->comment('ระบบงานซ่อม');
            $table->string('module3',10)->comment('เปิดใช้การระบุพิกัด GPS');
            $table->string('module4',10)->comment('ระบบงานอื่นๆ');
            $table->string('module5',10)->comment('Line notify แจ้งเตือนการส่งซ่อม');
            $table->string('linetoken')->nullable()->comment('Line notify accToken');
            $table->timestamps();
        });

        DB::table('settings')->insert(
            array(
                [
                    's_no'=> 'เลขที่หนังสือ',
                    's_name'=> 'ชื่อโรงพยาบาล',
                    's_headname'=> 'ชื่อหัวหน้าหน่วยงาน',
                    's_address'=> 'ที่อยู่',
                    'module1'=> '1',
                    'module2'=> '1',
                    'module3'=> '1',
                    'module4'=> '0',
                    'module5'=> '0',
                    'linetoken'=> '',
                    'created_at'=> date("Y-m-d H:i:s"),
                    'updated_at'=> date("Y-m-d H:i:s")
                ]
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
        Schema::dropIfExists('settings');
    }
};
