<?php

use App\Models\Criteria;
use App\Models\siswa;
use App\Models\Subcriteria;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatesiswaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreignIdFor(Criteria::class)->nullable();
            $table->foreignId('subcriteria_id')->nullable()->references('id')->on('subcriterias')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa_details');
    }
}
