<?php
class M_grafik extends CI_Model{
  
 function grafikBbMasuk($id, $year)
 {
   
  $bc = $this->db->query("
   
  select
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=1)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Januari`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=2)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Februari`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=3)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Maret`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=4)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `April`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=5)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Mei`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=6)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Juni`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=7)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Juli`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=8)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Agustus`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=9)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `September`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=10)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Oktober`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=11)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `November`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_masuk)WHERE((Month(tanggal)=12)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Desember`
 from t_bb_masuk GROUP BY YEAR(tanggal) 
   
  ");
   
  return $bc->result_array();
   
 }  
 function grafikBbKeluar($id, $year)
 {
   
  $bc = $this->db->query("
   
  select
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=1)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Januari`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=2)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Februari`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=3)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Maret`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=4)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `April`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=5)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Mei`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=6)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Juni`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=7)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Juli`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=8)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Agustus`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=9)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `September`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=10)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Oktober`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=11)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `November`,
  ifnull((SELECT sum(jumlah) FROM (t_bb_terpakai)WHERE((Month(tanggal)=12)AND id_bbb=$id AND (YEAR(tanggal)=$year))),0) AS `Desember`
 from t_bb_masuk GROUP BY YEAR(tanggal) 
   
  ");
   
  return $bc->result_array();
   
 }
  
    
 function grafikBpMasuk($id, $year)
 {
   
  $bc = $this->db->query("
   
  select
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=1)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Januari`,
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=2)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Februari`,
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=3)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Maret`,
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=4)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `April`,
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=5)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Mei`,
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=6)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Juni`,
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=7)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Juli`,
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=8)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Agustus`,
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=9)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `September`,
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=10)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Oktober`,
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=11)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `November`,
  ifnull((SELECT sum(jumlah) FROM (t_bp_masuk)WHERE((Month(tanggal)=12)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Desember`
 from t_bp_masuk GROUP BY YEAR(tanggal) 
   
  ");
   
  return $bc->result_array();
   
 }  
 function grafikBpKeluar($id, $year)
 {
   
  $bc = $this->db->query("
   
  select
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=1)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Januari`,
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=2)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Februari`,
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=3)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Maret`,
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=4)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `April`,
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=5)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Mei`,
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=6)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Juni`,
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=7)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Juli`,
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=8)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Agustus`,
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=9)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `September`,
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=10)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Oktober`,
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=11)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `November`,
  ifnull((SELECT sum(jumlah) FROM (t_biaya_bahan_penolong)WHERE((Month(tanggal)=12)AND id_bahan_penolong=$id AND (YEAR(tanggal)=$year))),0) AS `Desember`
 from t_biaya_bahan_penolong GROUP BY YEAR(tanggal) 
   
  ");
   
  return $bc->result_array();
   
 }
}
?>