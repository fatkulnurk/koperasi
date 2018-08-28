<?php
require_once "DataAkses.php";

class User
{
    var $id;
    var $nip;
    var $nama;
    var $email;
    var $namalengkap;
    var $kelamin;
    var $gaji;
    var $sisagaji;
    var $umur;
    var $golongan;
    var $unitkerja;
    var $nohp;
    var $pekerjaan;
    var $password;

    // tanggungan
    var $tanggunganBri;
    var $tanggunganBpd;
    var $tanggunganBpr;
    var $tanggunganKpri;
    var $tanggunganSekbid;
    var $tanggunganLainnya;

    var $tipe_akun;
    var $timestamp;

    /*
     * Ini adalah contructor
     */
    function __construct()
    {
        $dataAkses = new DataAkses();

        if(isset($_SESSION["id"])){
            $id = $_SESSION["id"];
        }else{
            $id = "";
        }

        $user = $dataAkses->ambilUserTertentu($id);

        $this->id           = $user['user_id'];
        $this->nip          = $user['user_nip'];
        $this->email        = $user['user_email'];
        $this->nama         = $user['user_namalengkap'];
        $this->namalengkap  = $user['user_namalengkap'];
        $this->kelamin      = $user['user_kelamin'];
        $this->gaji         = $user['user_gaji'];
        $this->sisagaji     = $user['user_sisa_gaji'];
        $this->umur         = $user['user_umur'];
        $this->golongan     = $user['user_golongan'];
        $this->unitkerja    = $user['user_unitkerja'];
        $this->nohp         = $user['user_nohp'];
        $this->pekerjaan    = $user['user_pekerjaan']; // jabatan
        $this->password     = $user['user_password'];

        // tanggungan
        $this->tanggunganBri        = $user['user_tanggungan_bri'];
        $this->tanggunganBpd        = $user['user_tanggungan_bpd'];
        $this->tanggunganBpr        = $user['user_tanggungan_bpr'];
        $this->tanggunganKpri       = $user['user_tanggungan_kpriedipeni'];
        $this->tanggunganSekbid     = $user['user_tanggungan_sekbid'];
        $this->tanggunganLainnya    = $user['user_tanggungan_lainlain'];

        $this->tipe_akun    = $user['user_tipe_akun'];
        $this->timestamp    = $user['user_timestamp'];
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $dataAkses = new DataAkses();
        $this->id = $id;

        $user = $dataAkses->ambilUserTertentu($id);

        $this->id           = $user['user_id'];
        $this->nama         = $user['user_namalengkap'];
        $this->namalengkap  = $user['user_namalengkap'];
        $this->email        = $user['user_email'];
        $this->kelamin      = $user['user_kelamin'];
        $this->gaji         = $user['user_gaji'];
        $this->umur         = $user['user_umur'];
        $this->pekerjaan    = $user['user_pekerjaan'];
        $this->password     = $user['user_password'];
        $this->tipe_akun    = $user['user_tipe_akun'];
        $this->timestamp    = $user['user_timestamp'];
    }

    /*
     * FUNGSI CEK HAK AKSES
     *
     * maksudnya ini untuk cek apakah dia sebagai admin atau pengurus
     * jika tipe akun 3 berarti user biasa (anggota)
     * jika tipe akun bernilai 2 berarti pengurus
     * jika tipe akun bernilai 1 maka dia admin
     *
     * */
    public function isAnggota(){
        if($this->tipe_akun == 3){
            return true;
        }else{
            return false;
        }
    }

    public function isPengurus(){
        if($this->getTipeAkun() < 3){
            return true;
        }else{
            return false;
        }
    }

    public function isAdmin(){
        if($this->getTipeAkun() < 2){
            return true;
        }else{
            return false;
        }
    }


    /* FUNGSI SETTER & GETTER */
    /**
     * @return mixed
     */
    public function getGolongan()
    {
        return $this->golongan;
    }

    /**
     * @return mixed
     */
    public function getNip()
    {
        return $this->nip;
    }

    /**
     * @return mixed
     */
    public function getNohp()
    {
        return $this->nohp;
    }

    /**
     * @return mixed
     */
    public function getSisagaji()
    {
        return $this->sisagaji;
    }

    /**
     * @return mixed
     */
    public function getTanggunganBpd()
    {
        return $this->tanggunganBpd;
    }

    /**
     * @return mixed
     */
    public function getTanggunganBpr()
    {
        return $this->tanggunganBpr;
    }

    /**
     * @return mixed
     */
    public function getTanggunganBri()
    {
        return $this->tanggunganBri;
    }

    /**
     * @return mixed
     */
    public function getTanggunganKpri()
    {
        return $this->tanggunganKpri;
    }

    /**
     * @return mixed
     */
    public function getTanggunganLainnya()
    {
        return $this->tanggunganLainnya;
    }

    /**
     * @return mixed
     */
    public function getTanggunganSekbid()
    {
        return $this->tanggunganSekbid;
    }

    /**
     * @return mixed
     */
    public function getUnitkerja()
    {
        return $this->unitkerja;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }



    /**
     * @return mixed
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getGaji()
    {
        return $this->gaji;
    }

    /**
     * @return mixed
     */
    public function getKelamin()
    {
        return $this->kelamin;
    }

    /**
     * @return mixed
     */
    public function getNamalengkap()
    {
        return $this->namalengkap;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getPekerjaan()
    {
        return $this->pekerjaan;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return mixed
     */
    public function getTipeAkun()
    {
        return $this->tipe_akun;
    }

    /**
     * @return mixed
     */
    public function getUmur()
    {
        return $this->umur;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}