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
        Schema::table('psychologist_certificates', function (Blueprint $table) {
            // Defaultnya 'pending' saat baru upload
            $table->string('status')->default('pending')->after('certificate_path'); 
            // Opsional: Alasan penolakan
            $table->text('reject_reason')->nullable()->after('status'); 
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('psychologist_certificates', function (Blueprint $table) {
            $table->dropColumn(['status', 'reject_reason']);
        });
    }
};
