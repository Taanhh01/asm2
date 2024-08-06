<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('username')->nullable()->change(); // Cho phép giá trị NULL
        // $table->string('username')->default('default_value')->change(); // Hoặc thêm giá trị mặc định
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('username')->nullable(false)->change(); // Trở lại trạng thái không cho phép NULL
        // $table->string('username')->default(null)->change(); // Xóa giá trị mặc định
    });
}

};
