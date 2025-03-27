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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('department_id');
            $table->uuid('uniqid');
            $table->string('title');
            $table->text('init_msg');
            $table->integer('last_reply')->nullable();
            $table->integer('user_read')->nullable();
            $table->integer('admin_read')->nullable();
            $table->integer('resolved')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::table('tickets', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');  
        });    
           
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
