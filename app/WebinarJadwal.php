<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebinarJadwal extends Model
{
    protected $dates = [
        'tanggal_awal',
        'tanggal_akhir',
        'tgl_daftar_awal',
        'tgl_daftar_akhir'
    ];
    
    public function getTanggalPelaksanaanAttribute(){
        return "{$this->tanggal_awal->isoFormat('d, MMMM Y')} - {$this->tanggal_akhir->isoFormat('d, MMMM Y')}";
    }    

    public function getTanggalPendaftaranAttribute(){
        return "{$this->tgl_daftar_awal->isoFormat('d, MMMM Y')} - {$this->tgl_daftar_akhir->isoFormat('d, MMMM Y')}";
    }    

    // relasi webinarJadwal ke penyelenggara dengan constraint 1 to Many
    public function userOrganizer(){
        return $this->belongsTo('App\User', 'id_user');
    }
}
