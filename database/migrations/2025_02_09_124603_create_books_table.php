<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
            Schema::create('books', function (Blueprint $table) { 
            $table->id(); 
            $table->string('kode_buku')->unique(); 
            $table->string('judul_buku'); 
            $table->string('pengarang'); 
            $table->string('penerbit'); 
            $table->year('tahun_terbit'); 
            $table->string('foto_cover')->nullable(); 
            $table->timestamps(); 
            });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
