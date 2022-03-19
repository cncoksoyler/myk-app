<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professions', function (Blueprint $table) {
            $table->id();
            $table->string('standard')->required()->unique();
            $table->string('name')->reqired();
            $table->enum('level', [
                'Seviye 1',
                'Seviye 2',
                'Seviye 3',
                'Seviye 4',
                'Seviye 5'
            ])->required();
            $table->timestamps();
            $table->unique(['name', 'level']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professions');
    }
}
