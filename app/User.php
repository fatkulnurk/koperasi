<?php
require_once "DataAkses.php";

class User
{
    var $id;
    var $nama;
    var $email;
    var $namalengkap;
    var $kelamin;
    var $gaji;
    var $umur;
    var $pekerjaan;
    var $password;
    var $tipe_akun;
    var $timestamp;

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