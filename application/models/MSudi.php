<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSudi extends CI_Model
{
    function AddData($tabel, $data=array())
    {
        $this->db->insert($tabel,$data);
    }

    function UpdateData($tabel,$fieldid,$fieldvalue,$data=array())
    {
        $this->db->where($fieldid,$fieldvalue)->update($tabel,$data);
    }

    function DeleteData($tabel,$fieldid,$fieldvalue)
    {
        $this->db->where($fieldid,$fieldvalue)->delete($tabel);
    }

    function GetData($tabel)
    {
        $query= $this->db->get($tabel);
        return $query->result();
    }

    function GetDataWhere($tabel,$id,$nilai)
    {
        $this->db->where($id,$nilai);
        $query= $this->db->get($tabel);
        return $query;
    }

    function GetDataJoin($tbl1, $tbl2, $param){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->join($tbl2, $param);
        $query = $this->db->get();
        return $query->result();
    }

    ////////////////////// kentung //////////////
    function GetDataJoinWhere($tbl1, $tbl2, $param, $where){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->join($tbl2, $param);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    function GetData2JoinWhere($tbl1, $tbl2, $tbl3, $param, $where){
            $this->db->select('*');
            $this->db->from($tbl1);
            $this->db->from($tbl2);
            $this->db->join($tbl3, $param);
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();
    }
    ////////////////////// kentung ////////////

    function GetData2Join($tbl1, $tbl2, $tbl3, $param){
            $this->db->select('*');
            $this->db->from($tbl1);
            $this->db->from($tbl2);
            $this->db->join($tbl3, $param);
            $query = $this->db->get();
            return $query->result();
    }

    function filter($tbl1, $tbl2, $param,$kode,$nilai){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->join($tbl2, $param);
        $this->db->where($kode, $nilai);
        $query = $this->db->get();
        return $query;
    }

    function filter2($tbl1, $tbl2, $tbl3, $param,$kode,$nilai){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->from($tbl2);
        $this->db->join($tbl3, $param);
        $this->db->where($kode, $nilai);
        $query = $this->db->get();
        return $query;
    }
    // Model pencarian mulai-----------------------------
    function SearchData($tabel,$keyword = [])
    {
        $this->db->or_like($keyword);
        $query = $this->db->get($tabel);
        return $query->result();
    }
    // Model pencarian selesai----------------------------

    //awal Model hitung data------------------------
    function HitungJumlahData($tabel,$field = null,$where = null)
    {   
        $this->db->from($tabel);
        if ($where != null && $field != null) {
            $this->db->where($field, $where);
        }

        $query = $this->db->get();
        if($query->num_rows()>0)
        {
         return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }
//akhir model hitung data--------------------------------

// awal Model status film
function StatusFilm($status_film)
{
            $this->db->select('*');
            $this->db->from('tbl_film');
            $this->db->where('status_film', $status_film);
            $query = $this->db->get();

            return $query->result();
            // fungsi result(); syntax looping di model
            // ketika akan menggunakan foreach di view mesti ada result
}
// akhir Model status film

// awal Model status film
// function StatusTayang($status_tayang)
// {
//             $this->db->select('*');
//             $this->db->from('qw_filmbelitayang1');
//             $this->db->where('status_tayang', $status_tayang);
//             $query = $this->db->get();

//             return $query->result();
// }
// akhir Model status film

// awal Model tanggal tayang
function TanggalTayang($tanggal_tayang,$status_tayang)
{
            $this->db->select('*');
            $this->db->from('qw_filmbelitayang1');
            $this->db->where('tanggal_tayang', $tanggal_tayang);
            $this->db->where('status_tayang', $status_tayang);
            $query = $this->db->get();

            return $query->result();
}
// akhir Model status film

function DaftarKursi($where)
{
            $this->db->select('*');
            $this->db->from('tbl_kursi');
            $this->db->where('kd_tayang', $where);
            $query = $this->db->get();

            return $query->result();
}

function UpdateStatusKursi($tabel,$fieldvalue1,$fieldvalue2,$data = [])
{
    $this->db
    ->where('kd_tayang',$fieldvalue1)
    ->where('no_kursi',$fieldvalue2)
    ->update($tabel,$data);
}

function GetDataLayar()
{
    $this->db->where('status_tampil',1);
    $query= $this->db->get('qw_filmbelitayang1');
    return $query->row();
}

function UpdateAllTayang()
    {
        $data['status_tampil'] = 0;
        $this->db->update('tbl_tayang',$data);
    }
// delete---------------------------------------------------------------------
function StatusTampil($tbl)
{
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->where('status_tampil',0);
    $query = $this->db->get();

    return $query->result();
}

function UpdateStatusTampil()
    {
        $data['status_tampil'] = 1;
        $query = $this->db->update('tbl_film',$data);
        return $query->row();
    }

// delete --------------------------------------------------------------------
//mulai model laporan---------------------------------------------------

//akhir model laporan -----------------------------------------------------------    
}