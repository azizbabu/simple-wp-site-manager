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
        Schema::create('site_backups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wp_site_id')->constrained()->cascadeOnDelete();

            // backup_type: 0=full, 1=db, 2=files
            $table->unsignedTinyInteger('backup_type')
                ->default(0)
                ->comment('0=full, 1=db, 2=files');

            $table->string('path'); // local or cloud storage path
            $table->unsignedBigInteger('size')->nullable(); // backup size in bytes

             // Audit Trail
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
        Schema::dropIfExists('site_backups');
    }
};
