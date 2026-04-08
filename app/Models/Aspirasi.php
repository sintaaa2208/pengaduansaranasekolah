<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $table = 'aspirasis';
    protected $primaryKey = 'id_aspirasi';
    protected $fillable = ['id_pelaporan', 'nis', 'id_kategori', 'lokasi', 'ket', 'status', 'feedback'];

    const STATUS_MENUNGGU = 'Menunggu';
    const STATUS_PROSES = 'Proses';
    const STATUS_SELESAI = 'Selesai';

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_MENUNGGU => 'Menunggu',
            self::STATUS_PROSES => 'Proses',
            self::STATUS_SELESAI => 'Selesai',
        ];
    }
}
