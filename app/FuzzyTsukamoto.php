<?php
class FuzzyTsukamoto
{
    var $user;

    // besar pinjaman
    var $nominalPinjaman;
    var $umur;

    var $hasil;

    function __construct($id,$nominalPinjaman)
    {
        $user = new dataUser($id);

        $this->user                 = $user;
        $this->nominalPinjaman      = $nominalPinjaman;
    }

    function gaji(){
        if($this->user->gaji <= 1200000){
            return "rendah";
        }elseif (($this->user->gaji > 1200000) && ($this->user->gaji < 2000000)){
            return "sedang";
        }elseif (($this->user->gaji > 2000000) && ($this->user->gaji < 5000000)){
            return "tinggi";
        }else{
            return "eror";
        }
    }

    function umur(){
        if($this->user->umur <= 35){
            return "muda";
        }elseif (($this->user->umur > 35) && ($this->user->umur <= 55)){
            return "parobaya";

        }elseif (($this->user->umur >= 55) && ($this->user->umur <= 60)){
            return "tua";
        }else{
            return "eror";
        }
    }

    function besarPinjaman(){
        if($this->nominalPinjaman <= 5000000){
            return "sedikit";
        }elseif (($this->nominalPinjaman >= 5000000) && ($this->nominalPinjaman <= 15000000)){
            return "sedang";
        }elseif (($this->nominalPinjaman > 15000000) && ($this->nominalPinjaman <= 30000000)){
            return "banyak";
        }else{
            return "eror";
        }
    }

    function hitungData(){
        $aturan = array
        (
            /*
             * --------------------------------------------------------------*
             *  INDEX | GAJI | UMUR | BESAR PINJAMAN | JANGKA WAKTU | HASIL  *
             * --------------------------------------------------------------*
            */
            array("R1","sedikit","muda","sedikit","pendek","tidak layak"),
            array("R2","sedikit","muda","sedikit","sedang","tidak layak"),
            array("R3","sedikit","muda","sedikit","panjang","tidak layak"),
            array("R4","sedikit","muda","sedang","pendek","tidak layak"),
            array("R5","sedikit","muda","sedang","sedang","tidak layak"),
            array("R6","sedikit","muda","sedang","panjang","tidak layak"),
            array("R7","sedikit","muda","banyak","pendek","tidak layak"),
            array("R8","sedikit","muda","banyak","sedang","tidak layak"),
            array("R9","sedikit","muda","banyak","panjang","tidak layak"),

            array("R10","sedikit","parobaya","sedikit","pendek","tidak layak"),
            array("R11","sedikit","parobaya","sedikit","sedang","tidak layak"),
            array("R12","sedikit","parobaya","sedikit","panjang","tidak layak"),
            array("R13","sedikit","parobaya","sedang","pendek","tidak layak"),
            array("R14","sedikit","parobaya","sedang","sedang","tidak layak"),
            array("R15","sedikit","parobaya","sedang","panjang","tidak layak"),
            array("R16","sedikit","parobaya","banyak","pendek","tidak layak"),
            array("R17","sedikit","parobaya","banyak","sedang","tidak layak"),
            array("R18","sedikit","parobaya","banyak","panjang","tidak layak")
        );


//        for ($i = 0 ; $i<count($aturan);$i++){
//            for($j=0; $j < count($aturan);$j++){
//
//            }
//        }
    }

    function hasilPeminjam(){
        if($this->hasil <= 50){
            return "Tidak Layak";
        }else if (($this->hasil > 50) && ($this->hasil <= 95)){
            return "Layak";
        }else{
            return "Eror";
        }
    }

    function cekUmur(){
    }

}

class dataUser{
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

    function __construct($id)
    {
        $dataAkses = new DataAkses();
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