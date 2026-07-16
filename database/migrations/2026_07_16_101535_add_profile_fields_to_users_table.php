<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
    
            $table->uuid('uuid')->nullable()->after('id');

            $table->string('phone')->nullable()->after('email');
            
            $table->enum('gender', ['male', 'female'])->nullable();
            
            $table->date('date_of_birth')->nullable();
            
            $table->text('address')->nullable();
            
            $table->string('avatar', 255)->nullable();
            
            $table->boolean('status')->default(true);
            
            $table->timestamp('last_login_at')->nullable();
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
    
            $table->dropColumn([
                'uuid',
                'phone',
                'avatar',
                'gender',
                'date_of_birth',
                'address',
                'status',
                'last_login_at',
            ]);
    
        });
    }
};


