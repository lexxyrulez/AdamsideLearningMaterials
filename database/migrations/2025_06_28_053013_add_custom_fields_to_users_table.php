<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('user_type')->nullable()->after('phone');
            $table->boolean('is_approved')->default(false)->after('user_type');
            $table->boolean('is_admin')->default(false)->after('is_approved');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'user_type', 'is_approved', 'is_admin']);
        });
    }
}