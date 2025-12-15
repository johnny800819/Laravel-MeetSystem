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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // mt_name
            $table->string('location')->nullable(); // mt_position
            $table->text('description')->nullable(); // mt_context
            $table->dateTime('start_time'); // mt_date
            $table->dateTime('end_time')->nullable(); // Extended for better calendar support, v1 only had start
            $table->integer('status')->default(0); // mt_status
            $table->timestamps();
        });

        Schema::create('meeting_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_id')->constrained()->onDelete('cascade');
            // We use user_id referencing admin_users. In v1 it was a name string, here we enforce relation.
            // Note: If v1 users are not fully ported to admin_users, this might be tricky, 
            // but for v2 new system, strict relation is better.
            $table->foreignId('user_id')->constrained('admin_users')->onDelete('cascade'); 
            $table->integer('role')->default(2); // 0: Chairman, 1: Recorder, 2: Member
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_members');
        Schema::dropIfExists('meetings');
    }
};
