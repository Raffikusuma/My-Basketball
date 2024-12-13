<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    
    use HasFactory;
    protected $table = 'pemains';
    protected $primaryKey = 'id_pemain';
    public $incrementing = true;
    protected $fillable = ['nama_pemain', 'posisi', 'tim'];
    public $timestamps = true;
}
