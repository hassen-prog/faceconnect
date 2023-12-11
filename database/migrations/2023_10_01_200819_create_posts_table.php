<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->date('date_de_publication')->default(now());
            $table->integer('nbLike')->default(0); // Set default value to 0
            $table->integer('nbComment')->default(0); // Set default value to 0
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreignIdFor(\App\Models\Profile::class)->nullable()->constrainted()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
