<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    
    protected $fillable = [
        'customer_id',
        'item_id',
        'petugas_id',
        'nilai_taksiran',
        'nilai_jaminan',
        'nilai_pencairan',
        'jasa_tarif_sewa_modal',
        'jasa_tarif_sewa_modal_persen',
        'jangka_waktu',
        'kondisi_barang',
        'status',
        'tanggal_transaksi',
        'tanggal_jatuh_tempo'
    ];

    protected $casts = [
        'tanggal_transaksi' => 'datetime',
        'tanggal_jatuh_tempo' => 'datetime',
        'nilai_taksiran' => 'decimal:2',
        'nilai_jaminan' => 'decimal:2',
        'nilai_pencairan' => 'decimal:2',
        'jasa_tarif_sewa_modal' => 'decimal:2',
        'jasa_tarif_sewa_modal_persen' => 'decimal:2'
    ];

    // Relasi ke Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi ke Item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Relasi ke Petugas (User)
    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
} 