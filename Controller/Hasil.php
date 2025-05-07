<?php
require_once "Database.php";
require_once "Leptop.php";
require_once "Kriteria.php";
class Hasil{
    private $db;
    private $leptop;
    private $kriteria;

    public function __construct(){
        $this->db = new database();   
        $this->leptop = new Leptop();   
        $this->kriteria = new Kriteria();   
    }
    function getHasil(){
        $hasil = $this->db->Select("hasil");
    
        usort($hasil, function($a, $b) {
            return $b['nilai'] <=> $a['nilai']; // ASCENDING
        });
    
        return $hasil;
    }
    
    function tambahHasil($datas){
        $this->db->insert("hasil",$datas);
    }
    function clear(){
        $this->db->deleteHasil();
    }

    function hitungHasil(){
        $leptops = $this->leptop->getLeptop();
        $data = $this->kriteria->getKriteria();

        $ram = array_column($data, 'ram');
        $core = array_column($data, 'core');
        $pemakaian = array_column($data, 'pemakaian');
        $bobot = array_column($data, 'bobot');
        $harga = array_column($data, 'harga');

        //menentukan nilai minimum dan maximum
        $min = [
            'ram' => min($ram),
            'core' => min($core),
            'pemakaian' => min($pemakaian),
            'bobot' => min($bobot),
            'harga' => min($harga)
        ];
        $max = [
            'ram' => max($ram),
            'core' => max($core),
            'pemakaian' => max($pemakaian),
            'bobot' => max($bobot),
            'harga' => max($harga)
        ];
        
        //normalisasi setiap kriteria
        $bobot = [
            'ram' => 0.2,
            'core' => 0.2,
            'pemakaian' => 0.2,
            'bobot' => 0.15,
            'harga' => 0.25
        ];
        foreach ($leptops as $x) {
            $ks = $this->kriteria->getKriteria();
            foreach ($ks as $k) {
                if ($k['id_laptop'] === $x['id']) {
                    $normalisasi = [
                        'id_laptop' => $k['id_laptop'],
                        'ram' => (($k['ram'] - $min['ram']) / ($max['ram'] - $min['ram']))*100, // benefit
                        'core' => (($k['core'] - $min['core']) / ($max['core']-$min['core']))*100, // benefit
                        'pemakaian' => ((($k['pemakaian']-$min['pemakaian']) / ($max['pemakaian'] - $min['pemakaian'])))*100, // benefit
                        'bobot' => (($max['bobot'] - $k['bobot'])/($max['bobot']-$min['bobot']))*100, // cost
                        'harga' => (($max['harga'] - $k['harga'])/($max['harga'] - $min['harga']))*100 // cost
                    ];
                    $hasil =[
                        'id_laptop' => $normalisasi['id_laptop'],
                        'nilai' => ($normalisasi['ram']*$bobot['ram'])+($normalisasi['core']*$bobot['core'])+($normalisasi['pemakaian']*$bobot['pemakaian'])+($normalisasi['bobot']*$bobot['bobot'])+($normalisasi['harga']*$bobot['harga'])
                    ];

                    
                    $this->tambahHasil($hasil);
                    break;
                }
            }
        }
    }
}