<?php
$uri = $this->uri->segment_array();
if(isset($uri[3])){
	if($uri[3] == 'review_rapor'){
		$border = '';
		$class = 'table table-bordered';
	} else {
		$border = 'border="1"';
		$class = 'table';
	}
} 

$s = $this->db->get_where('siswa',['nis' => $siswa_nis])->row();
$sekolah = $this->db->get('data_sekolah')->row();
$setting = $this->db->get('setting')->row();
$ajaran = $this->db->get_where('ajaran',['id' => $ajaran_id])->row();
$kelas = $this->db->get_where('kelas',['id' => $kelas_id])->row();
$karakter = $this->db->get_where('perkembangan_karakter',array('siswa_nis' => $siswa_nis,'ajaran_id' => $ajaran_id))->row();

var_dump($karakter);
?>

<table>
  <tr>
    <td>Nama Peserta Didik</td><td>:</td><td><?= $s->nama ?></td>
  </tr>
  <tr>
    <td>NISN/NIS</td><td>:</td> <td><?= $s->nisn.'/'.$s->nis ?></td>
  </tr>
  <tr>
    <td>Kelas/Semester</td><td>:</td> <td><?= $kelas->nama.'/'.$ajaran->smt ?></td>
  </tr>
  <tr>
    <td>Tahun Pelajaran</td><td>:</td> <td><?= $ajaran->tahun ?></td>
  </tr>
</table>
<br>
<div class="strong">G.&nbsp;&nbsp;Deskripsi Perkembangan Karakter</div>
<table <?= $class; ?> <?= $border ?>>
  <thead>
    <tr>
      <th style="width: 200px">Karakter yang dibangun</th>
      <th style="width: 500px">Deskripsi</th>
    </tr>
    <tr>
      <td>Integritas</td>
      <td><?= (isset($karakter->integritas) ? $karakter->integritas : '-' ) ?></td>
    </tr>
    <tr>
      <td>Religius</td>
      <td><?= (isset($karakter->religius) ? $karakter->religius : '-' ) ?></td>
    </tr>
    <tr>
      <td>Nasionalis</td>
      <td><?= (isset($karakter->nasionalis) ? $karakter->nasionalis : '-') ?></td>
    </tr>
    <tr>
      <td>Mandiri</td>
      <td><?= (isset($karakter->mandiri ) ? $karakter->mandiri : '-' ) ?></td>
    </tr>
    <tr>
      <td>Gotong-royong</td>
      <td><?= (isset($karakter->gotong_royong ) ? $karakter->gotong_royong : '-') ?></td>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<br>
<div class="strong">H.&nbsp;&nbsp;Catatan Perkembangan Karakter</div>
<table width="100%" border="1">
  <tr>
    <td style="padding:10px 10px 60px 10px;"><?= (isset($karakter->catatan) ? $karakter->catatan : '-' ) ?></td>
  </tr>
</table> 
<br>
<table width="100%">
  <tr>
    <td style="width:30%">
    <p>Mengetahui;<br>Orang Tua/Wali</p><br>
<br>
<br>
<br>
<br>
<br>
    <p>...................................................................</p>
  </td>
  <td style="width:40%"></td>
    <td style="width:30%"><p><?php echo $sekolah->kabupaten; ?>, .................................,20....<br>Wali Kelas</p><br>
<br>
<br>
<br>
<br>
<br>
<p>
<?php
$wali_kelas = $this->db->get_where('user',['id' => $kelas->guru_id])->row();
echo $wali_kelas->name;
?>
<br>
NIP. <?php echo $wali_kelas->nip; ?></p>
</td>
  </tr>
</table>
