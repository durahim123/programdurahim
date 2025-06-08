<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use HasFactory, SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        // Event untuk menciptakan kode sebelum data disimpan
        static::creating(function ($product) {
            $product->no_pasien = self::generateCode();
        });
    }

    public static function generateCode()
    {
        $date = date('Ymd'); // Format tanggal
        $lastPasien = self::whereDate('created_at', today())
            ->orderBy('id', 'desc')
            ->first();

        $lastNumber = $lastPasien ? intval(substr($lastPasien->code, -4)) : 0;
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        return "PASIEN".$newNumber;
    }
}
