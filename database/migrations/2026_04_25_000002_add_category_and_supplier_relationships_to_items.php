<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (! Schema::hasColumn('items', 'category_id')) {
            Schema::table('items', function (Blueprint $table) {
                $table->foreignId('category_id')->nullable()->after('nama_barang')->constrained('categories')->nullOnDelete();
            });
        }

        if (! Schema::hasColumn('items', 'supplier_id')) {
            Schema::table('items', function (Blueprint $table) {
                $table->foreignId('supplier_id')->nullable()->after('category_id')->constrained('suppliers')->nullOnDelete();
            });
        }

        if (Schema::hasColumn('items', 'kategori')) {
            $categories = DB::table('items')->select('kategori')->distinct()->pluck('kategori');
            $categoryMap = [];

            foreach ($categories as $kategori) {
                $existingCategory = DB::table('categories')->where('nama_kategori', $kategori)->first();

                if ($existingCategory) {
                    $categoryMap[$kategori] = $existingCategory->id;
                } else {
                    $categoryMap[$kategori] = DB::table('categories')->insertGetId([
                        'nama_kategori' => $kategori,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            foreach (DB::table('items')->get() as $item) {
                if (isset($categoryMap[$item->kategori])) {
                    DB::table('items')->where('id', $item->id)->update(['category_id' => $categoryMap[$item->kategori]]);
                }
            }

            Schema::table('items', function (Blueprint $table) {
                $table->dropColumn('kategori');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('kategori')->after('nama_barang');
            $table->dropForeign(['category_id']);
            $table->dropForeign(['supplier_id']);
            $table->dropColumn(['category_id', 'supplier_id']);
        });
    }
};
