<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    // Pastikan fillable Anda sudah sesuai
    protected $fillable = [
        'user_id',
        'paket_id',
        'trainer_id',
        'discount',
        'harga',
        'status',
        'bukti_bayar',
    ];

    /**
     * Membangun jembatan relasi ke tabel User
     * Setiap 1 transaksi dimiliki oleh (belongsTo) 1 User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Membangun jembatan relasi ke tabel Paket Gym (opsional tapi sangat berguna)
     */
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    /**
     * Membangun jembatan relasi ke tabel Trainer (opsional tapi sangat berguna)
     */
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }
}
