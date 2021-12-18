<?php
/**
 * Helpher untuk mencetak tanggal dalam format bahasa indonesia
 *
 * @package CodeIgniter
 * @category Helpers
 * @author Ardianta Pargo (ardianta_pargo@yhaoo.co.id)
 * @link https://gist.github.com/ardianta/ba0934a0ee88315359d30095c7e442de
 * @version 1.0
 */
/**
 * Fungsi untuk merubah bulan bahasa inggris menjadi bahasa indonesia
 * @param int nomer bulan, Date('m')
 * @return string nama bulan dalam bahasa indonesia
 */
if (!function_exists('hari')) {
    function hari(){
        $hari = Date("D");
        switch ($hari) {
        case 'Sun':
            $hari = "Minggu";
        break;
 
        case 'Mon':         
            $hari = "Senin";
        break;
 
        case 'Tue':
            $hari = "Selasa";
        break;
 
        case 'Wed':
            $hari = "Rabu";
        break;
 
        case 'Thu':
            $hari = "Kamis";
        break;
 
        case 'Fri':
            $hari = "Jumat";
        break;
 
        case 'Sat':
            $hari = "Sabtu";
        break;
        
        default:
            $hari = "Tidak di ketahui";     
        break;
    }
        return $hari;
    }
}
/**
 * Fungsi untuk membuat tanggal dalam format bahasa indonesia
 * @param void
 * @return string format tanggal sekarang (contoh: 22 Desember 2016)
 */
if (!function_exists('tanggal')) {
    function tanggal() {
        $tanggal = Date('d');
        return $tanggal;
    }
}