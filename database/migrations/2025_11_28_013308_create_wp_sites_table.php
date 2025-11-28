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
        Schema::create('wp_sites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('server_id')->constrained()->cascadeOnDelete();

            $table->string('domain');
            $table->string('path')->default('/var/www/html');

            // Sensitive DB credentials (encrypted in model)
            $table->string('db_name');
            $table->string('db_user');
            $table->string('db_pass');

            $table->string('container_name')->nullable();

            $table->unsignedTinyInteger('status')
                ->default(0)
                ->comment('0=installing, 1=running, 2=stopped, 3=error');

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wp_sites');
    }
};
