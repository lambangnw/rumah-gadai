<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Remove petugas role addition if it was planned
        // DB::table('roles')->insert([
        //     'name' => 'petugas',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Create item requests table
        Schema::create('item_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('item_name');
            $table->text('description');
            $table->decimal('estimated_value', 12, 2);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // Remove deletion of petugas if it was planned for removal
        // DB::table('roles')->where('name', 'petugas')->delete();
        Schema::dropIfExists('item_requests');
    }
};