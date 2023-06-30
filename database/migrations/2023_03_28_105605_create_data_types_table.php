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
        Schema::create('data_types', function (Blueprint $table) {
            $table->id('customer_id');
            // $table->bigIncrements('admin_id');

            $table->string('customer_name')->nullable(true); // 225
            $table->string('admin_name', 20);

            $table->text('description');
            $table->mediumText('text_medium');
            $table->longText('text_long');
            
            $table->char('char_name',20)->nullable(true);

            $table->boolean('confirmed');

            $table->integer('votes');
            $table->bigInteger('viewer_number');

            $table->float('amount')->default(1000);
            
            $table->date('birthday')->nullable(true);
            $table->dateTime('order_date');
            $table->timestamp('release_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_types');
    }
};
