<?php
class FuzzyTsukamoto
{
    /*
     * Object User
     */
    var $user;

    // besar pinjaman
    var $nominalPinjaman;
    var $umur;
    var $jangkawaktu;

    var $hasil;

    function __construct($id,$nominalPinjaman,$jangkawaktu)
    {
        $user = new dataUser($id);

        $this->user                 = $user;
        $this->nominalPinjaman      = $nominalPinjaman;
        $this->jangkawaktu          = $jangkawaktu;
        $this->umur                 = $this->hitungUmur($user->umur);
    }

    function hitungUmur($number){
        $bday = new DateTime($number);
        $today = new DateTime('00:00:00');
        $diff = $today->diff($bday);
        return $diff->y;
    }

    function cekGaji(){
        // variabel asosiatif array untuk return data
        $retval = array();

        // Mencari Miu Gaji Sedikit
        if($this->user->gaji <= 1200000){
            $retval['mugajisedikit'] = 1;
        }elseif (($this->user->gaji >= 1200000) && ($this->user->gaji <= 2500000)){
            $retval['mugajisedikit'] = (2500000 - $this->user->gaji) / (2500000-1200000);
        }elseif (($this->user->gaji >= 2500000)){
            $retval['mugajisedikit'] = 0;
        }

        // Mencari Miu Gaji Sedang
//        if ($this->user->gaji < 1200000){
//            $retval['mugajisedang'] = 0;
//        }else
        if ($this->user->gaji == 2500000){
            $retval['mugajisedang'] = 1;
        }elseif (($this->user->gaji >= 1200000) && ($this->user->gaji <= 2500000)){
            $retval['mugajisedang'] = ($this->user->gaji - 1200000) / (2500000-1200000);
        }elseif (($this->user->gaji > 2500000) && ($this->user->gaji < 5000000)){
            $retval['mugajisedang'] = (5000000 - $this->user->gaji) / (5000000 - 2500000);
        }else{
            $retval['mugajisedang'] = 0;
        }

        // Mencari Miu Gaji Banyak
        if ($this->user->gaji <= 2500000){
            $retval['mugajibanyak'] = 0;
        }elseif(($this->user->gaji >= 2500000) && ($this->user->gaji <= 5000000)){
            $retval['mugajibanyak'] =  ($this->user->gaji - 2500000) / (5000000 - 2500000);
        }elseif ($this->user->gaji >= 5000000){
            $retval['mugajibanyak'] = 1;
        }

        //var_dump($retval);
        return $retval;

    }

    function cekumur(){
        // variabel asosiatif array untuk return data
        $retval = array();
        //var_dump($this->umur);

        // Miu Umur Muda
        if($this->umur <= 35){
            $retval['muumurmuda'] = 1;
        }elseif (($this->umur >= 35) && ($this->umur <= 55)){
            $retval['muumurmuda'] = (55 - $this->umur) / (55-35);
        }elseif ($this->umur >= 55){
            $retval['muumurmuda'] = 0;
        }

        // miu umur parobaya
        if($this->umur == 55){
            $retval['muumurparobaya'] = 1;
        }elseif (($this->umur >= 35) && ($this->umur <= 55)){
            $retval['muumurparobaya'] = ($this->umur - 35) / (55-35);
        }elseif (($this->umur >= 55) && ($this->umur <= 60)){
            $retval['muumurparobaya'] = (60 - $this->umur) / (60-55);
        }else{
            $retval['muumurparobaya'] = 0;
        }

        if($this->umur <= 55){
            $retval['muumurtua'] = 0;
        }elseif (($this->umur >= 55) && ($this->umur <= 60)){
            $retval['muumurtua'] = ($this->umur - 55) / (60-55);
        }elseif ($this->umur >= 60){
            $retval['muumurtua'] = 1;
        }

        // var_dump($retval);
        return $retval;
    }

    function cekBesarPinjaman(){
        // variabel asosiatif array untuk return data
        $retval = array();

        /* Miu Nominal Sedikit*/
        if($this->nominalPinjaman <= 5000000){
            $retval['munominalsedikit'] = 1;
        }elseif (($this->nominalPinjaman >= 5000000) && ($this->nominalPinjaman <= 15000000)){
            $retval['munominalsedikit'] = (15000000 - $this->nominalPinjaman) / (15000000 - 5000000);
        }elseif ($this->nominalPinjaman >= 15000000){
            $retval['munominalsedikit'] = 0;
        }

        /* Miu Nominal sedang */
        if(($this->nominalPinjaman >= 5000000) && ($this->nominalPinjaman <= 15000000)){
            $retval['munominalsedang'] = ($this->nominalPinjaman - 5000000) / (15000000 - 5000000);
        }elseif (($this->nominalPinjaman >= 15000000) && ($this->nominalPinjaman <= 30000000)){
            $retval['munominalsedang'] = (30000000 - $this->nominalPinjaman) / (30000000 - 15000000);
        }elseif ($this->nominalPinjaman >= 30000000){
            $retval['munominalsedang'] = 1;
        }else{
            $retval['munominalsedang'] = 0;
        }

        /* Miu nominal banyak*/
        if ($this->nominalPinjaman <= 15000000){
            $retval['munominalbanyak'] = 0;
        }elseif (($this->nominalPinjaman >= 15000000) && ($this->nominalPinjaman <= 30000000)){
            $retval['munominalbanyak'] = ($this->nominalPinjaman - 15000000) / (30000000 - 15000000);
        }elseif ($this->nominalPinjaman >= 30000000){
            $retval['munominalbanyak'] = 1;
        }

        // var_dump($retval);

        return $retval;
    }

    function cekJangkaWaktu(){
        // variabel asosiatif array untuk return data
        $retval = array();

        // miu jangka pendek
        if($this->jangkawaktu <= 5){

            $retval['mujangkapendek'] = 1;

        }elseif (($this->jangkawaktu >= 5) && ($this->jangkawaktu <= 12)){

            $retval['mujangkapendek'] = (12 - $this->jangkawaktu) / (12 - 5);

        }elseif ($this->jangkawaktu >= 12){
            $retval['mujangkapendek'] = 0;
        }

        // mu jangka sedang
        if(($this->jangkawaktu >= 5) && ($this->jangkawaktu <= 12)){

            $retval['mujangkasedang'] = ($this->jangkawaktu - 5) / (12 - 5);

        }elseif (($this->jangkawaktu >= 12) && ($this->jangkawaktu <= 20)){

            $retval['mujangkasedang'] = (20 - $this->jangkawaktu) / (20 - 12);

        }elseif ($this->jangkawaktu == 12){

            $retval['mujangkasedang'] = 1;

        }else{

            $retval['mujangkasedang'] = 0;

        }

        // miu jangka panjang
        if($this->jangkawaktu <= 12){

            $retval['mujangkapanjang'] = 0;

        }elseif (($this->jangkawaktu >= 12) && ($this->jangkawaktu <= 20)){

            $retval['mujangkapanjang'] = ($this->jangkawaktu - 12) / (20-12);

        }elseif ($this->jangkawaktu >= 20){

            $retval['mujangkapanjang'] = 1;

        }

        // var_dump($retval);
        return $retval;
    }

    function hitungData(){
        // variabel data
        $miugaji            = $this->cekGaji();
        $miumur             = $this->cekumur();
        $miubesarpinjaman   = $this->cekBesarPinjaman();
        $miujangkawaktu     = $this->cekJangkaWaktu();
//
//        var_dump($miugaji);
//        echo "<hr>";
//        var_dump($miumur);
//        echo "<hr>";
//        var_dump($miubesarpinjaman);
//        echo "<hr>";
//        var_dump($miujangkawaktu);
//        echo "<hr>";
//        echo "<hr>";
//        echo "<hr>";
//

        $alphas = array();
        $zs = array();



        // rule 1
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapendek']));
        $temp = 95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 2
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkasedang']));
        $temp = 95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 3
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapanjang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 4
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapendek']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 5
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkasedang']));
        $temp = 95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 6
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapanjang']));
        $temp = 95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 7
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurmuda'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapendek']));
        $temp = 95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 8
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurmuda'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkasedang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 9
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurmuda'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapanjang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 10
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapendek']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 11
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkasedang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 12
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapanjang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 13
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapendek']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 14
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkasedang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 15
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapanjang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 16
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapendek']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 17
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkasedang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 18
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapanjang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 19
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapendek']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 20
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkasedang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 21
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapanjang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 22
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapendek']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 23
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkasedang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 24
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapanjang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 25
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurtua'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapendek']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 26
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurtua'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkasedang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);
//        var_dump(end($alphas));
//        echo "<hr>";

        // rule 27
        array_push($alphas,min($miugaji['mugajisedikit'],$miumur['muumurtua'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapanjang']));
        $temp =  95 - (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        /*
         * Rule LAYAk
         * 50 + */
        // rule 28
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 29
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 30
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 31
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 32
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 33
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 34
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurmuda'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 35
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurmuda'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 36
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurmuda'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 37
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 38
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 39
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 40
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 41
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 42
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 43
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 44
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 45
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 46
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 47
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 48
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 49
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 50
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 51
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 52
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurtua'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 53
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurtua'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 54
        array_push($alphas,min($miugaji['mugajisedang'],$miumur['muumurtua'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 55
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 56
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 57
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);
        // var_dump($temp);

        // rule 58
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 59
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 60
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurmuda'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 61
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurmuda'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 62
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurmuda'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 63
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurmuda'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 64
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 65
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 66
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 67
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 68
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 69
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 70
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 71
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 72
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurparobaya'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 73
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 74
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 75
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedikit'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 76
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 77
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 78
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurtua'],$miubesarpinjaman['munominalsedang'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 79
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurtua'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapendek']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 80
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurtua'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkasedang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);

        // rule 81
        array_push($alphas,min($miugaji['mugajibanyak'],$miumur['muumurtua'],$miubesarpinjaman['munominalbanyak'],$miujangkawaktu['mujangkapanjang']));
        $temp = 50 + (end($alphas) * (95 - 50));
        array_push($zs,$temp);


//        echo "<hr>";
//        echo "<hr>";
//        echo "<hr>";
//        echo "<hr>";
//        echo "<hr>";
//        echo "<hr>";
//        var_dump($alphas);
//        echo "<hr>";
//        var_dump($zs);
//        echo "<hr>";
        //print_r($alphas);
        // echo "<hr>";
         //print_r($zs);
        // var_dump($zs);

        // echo count($alphas);
        $counter = 0;
        $counter2 = 0;
        for ($i = 0; $i < count($alphas) - 1; $i++){
            $counter += $alphas[$i] * $zs[$i];
            $counter2 += $alphas[$i];
        }

//        if($counter2 == 0){
//            //$counter2 = 1;
//        }

        $htemp = $counter / $counter2;
        return $htemp;
    }

    function hasilPeminjam(){
        // variabel asosiatif array untuk return data
         // $retval = array();

        $x = $this->hitungData();
        // var_dump($x);

        // Tidak Layak
        if($x <= 50){
            $tidaklayak = 1;
        }elseif (($x >= 50) && ($x <= 95)){
            $tidaklayak  = (95 - $x) / (95 - 50);
        }elseif ($x >= 95){
            $tidaklayak  = 0;
        }

        // Layak
        if($x <= 50){
            $layak = 0;
        }elseif (($x >= 50) && ($x <= 95)){
            $layak = ($x - 50) / (95 - 50);
        }elseif ($x >= 95){
            $layak = 1;
        }

        // var_dump($tidaklayak);
       // var_dump($tidaklayak);
        if($tidaklayak > $layak){
        //if($tidaklayak <= 0.50){
            return "Tidak Layak";
        }else{
            return "Layak";
        }

    }

}

class dataUser{
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