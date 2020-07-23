<?php
  if(isset($_GET['act']) && ($_GET['act'] == 'add')){
    ?>
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Pemohon</h3>
            </div>
            <form role="form" method="post" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" readonly class="form-control" id="exampleInputEmail1" required placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" readonly class="form-control" id="exampleInputPassword1" required name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Lengkap</label>
                  <input type="text" readonly class="form-control" name="nama_lengkap" required id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <select readonly class="form-control" name="status" required>
                      <option value="" selected=""></option>
                      <?php
                        $arr = array(1=>"Pemohon");
                        foreach($arr as $key=>$val){
                          echo "<option value='".$key."'>".$val."</option>";
                        }
                      ?>
                  </select>
                  <p class="help-block">Status merupakan status user dan memiliki hak akses yang berbeda-beda</p>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btn-a">Tambah</button>
                <button type="button" onclick="self.history.back()" class="btn btn-warning">Batal</button>
              </div>
            </form>
          </div>
        <?php
        if(isset($_POST['btn-a'])){
          $ins = $db->pdo->prepare("insert into tbl_akta_kematian set username = '".$_POST['username']."',
                        password = '".md5($_POST['password'])."', nama_lengkap = '".$_POST['nama_lengkap']."',
                        status = '".$_POST['status']."'");
          $ins->execute();
          echo "<script>alert('Data berhasil ditambahkan!')</script>";
          echo "<script>location.href='./?page=akta-kematian'</script>";
        }
  }elseif(isset($_GET['act']) && ($_GET['act'] == 'edit')){
    $e = $db->pdo->prepare("select *, tbl_akta_kematian.status AS statusd, tbl_akta_kematian.nama_lengkap as nama_alm
                            from tbl_akta_kematian, tbl_pemohon
                            where tbl_akta_kematian.id_pemohon = tbl_pemohon.id_pemohon
                            AND tbl_akta_kematian.id_akta_kematian = '".$_GET['id']."'");
    $e->execute();
    $re = $e->fetch();
    ?>
    <div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Detail Permohonan Akta Kematian</h3>
	        </div>
	        <form role="form" method="post" action="">
	          <div class="box-body">
	          	<label for="exampleInputEmail1">DATA KEMATIAN</label>
	           	<div class="form-group">
	              <label for="exampleInputEmail1">Hari</label>
	              <input type="text" class="form-control" disabled value="<?php echo $re['hari']; ?>" id="exampleInputEmail1" name="hari">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Tanggal</label>
	              <input type="text" class="form-control" disabled value="<?php echo $re['tanggal']; ?>" name="tanggal" id="datepicker">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Di</label>
	              <textarea class="form-control" name="di" disabled required><?php echo $re['alamat']; ?></textarea>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Nama Lengkap</label>
	              <input type="text" class="form-control" disabled value="<?php echo $re['nama_alm']; ?>" id="exampleInputEmail1" name="nama_lengkap">
	            </div>
	           	<div class="form-group">
	              <label for="exampleInputEmail1">TTL</label>
	              <textarea class="form-control" disabled id="exampleInputEmail1" required name="ttl"><?php echo $re['ttl']; ?></textarea>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Pekerjaan</label>
	              <input type="text" class="form-control" disabled id="exampleInputEmail1" value="<?php echo $re['pekerjaan']; ?>" name="pekerjaan">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Kebangsaan</label>
	              <select disabled name="kebangsaan" class="form-control">
	              	<option value="" selected></option>
	              <?php
	              	$arr = array("WNI", "WNA");
	              	foreach($arr as $key=>$val){
	              		if($val == $re['kebangsaan']){
	              			echo "<option value='".$val."' selected>".$val."</option>";
	              		}else{
	              			echo "<option value='".$val."'>".$val."</option>";
	              		}
	              	}
	              ?>
	              </select>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Agama</label>
	              <select name="agama" disabled class="form-control">
	              	<option value="" selected></option>
	              <?php
	              	$arr = array("Islam", "Kristen", "Hindu", "Budha", "Lainnya");
	              	foreach($arr as $key=>$val){
	              		if($val == $re['agama']){
	              			echo "<option value='".$val."' selected>".$val."</option>";
	              		}else{
	              			echo "<option value='".$val."'>".$val."</option>";
	              		}
	              	}
	              ?>
	              </select>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Alamat</label>
	              <textarea class="form-control" disabled id="exampleInputEmail1" required name="alamat"><?php echo $re['alamat']; ?></textarea>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Alamat Pemakaman</label>
	              <textarea class="form-control" disabled id="exampleInputEmail1" required name="alamat_pemakaman"><?php echo $re['alamat_pemakaman']; ?></textarea>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Tanggal Pemakaman</label>
	              <input type="text" class="form-control" disabled value="<?php echo $re['tanggal_pemakaman']; ?>" name="tanggal_pemakaman" id="datepicker2">
	            </div>
	            <label for="exampleInputEmail1">DATA ORANG TUA</label>
	           	<div class="form-group">
	              <label for="exampleInputEmail1">Nama Ayah</label>
	              <input type="text" disabled class="form-control" value="<?php echo $re['nama_ayah']; ?>" id="exampleInputEmail1" name="nama_ayah">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Pekerjaan Ayah</label>
	              <input type="text" class="form-control" disabled value="<?php echo $re['pekerjaan_ayah']; ?>" id="exampleInputEmail1" name="pekerjaan_ayah">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Apakah masih hidup?</label>
	              <select name="status_k_ayah" disabled class="form-control" requred>
	              	<option value="" selected=""></option>
	              	<?php
	              		$arr = array("Ya", "Tidak");
	              		foreach($arr as $key=>$val){
	              			if($re['status_k_ayah'] == $val){
	              				echo "<option value='".$val."' selected>".$val."</option>";
	              			}else{
	              				echo "<option value='".$val."'>".$val."</option>";
	              			}
	              		}
	              	?>
	              </select>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Alamat Ayah</label>
	              <textarea class="form-control" disabled id="exampleInputEmail1" required name="alamat_ayah"><?php echo $re['alamat_ayah']; ?></textarea>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Nama Ibu</label>
	              <input type="text" class="form-control" disabled value="<?php echo $re['nama_ibu']; ?>" id="exampleInputEmail1" name="nama_ibu">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">TTL</label>
	              <textarea class="form-control" disabled id="exampleInputEmail1" required name="ttl_ibu"><?php echo $re['ttl_ibu']; ?></textarea>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Apakah masih hidup?</label>
	              <select name="status_k_ibu" disabled class="form-control" requred>
	              	<option value="" selected=""></option>
	              	<?php
	              		$arr = array("Ya", "Tidak");
	              		foreach($arr as $key=>$val){
	              			if($re['status_k_ayah'] == $val){
	              				echo "<option value='".$val."' selected>".$val."</option>";
	              			}else{
	              				echo "<option value='".$val."'>".$val."</option>";
	              			}
	              		}
	              	?>
	              </select>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Alamat</label>
	              <textarea class="form-control" disabled id="exampleInputEmail1" required name="alamat_ibu"><?php echo $re['alamat_ibu']; ?></textarea>
	            </div>
	          </div>
              <div class="box-footer">
                <?php
                    if($re['statusd'] == 0){
                        ?><button type="submit" class="btn btn-primary" name="btn-a">Setujui Permohonan</button><?php
                    }else{
                        ?><button type="submit" class="btn btn-danger" name="btn-b">Tolak Permohonan</button><?php
                    }
                ?>
                <button type="button" onclick="self.history.back()" class="btn btn-warning">Kembali</button>
              </div>
            </form>
          </div>
        <?php
        if(isset($_POST['btn-a'])){
          $ins = $db->pdo->prepare("update tbl_akta_kematian set status = '1' where id_akta_kematian = '".$_GET['id']."'");
          $ins->execute();
          echo "<script>alert('Data berhasil disetujui!')</script>";
          echo "<script>location.href='./?page=akta-kematian'</script>";
        }elseif(isset($_POST['btn-b'])){
          $ins = $db->pdo->prepare("update tbl_akta_kematian set status = '0' where id_akta_kematian = '".$_GET['id']."'");
          $ins->execute();
          echo "<script>alert('Konfirmasi berhasil ditolak!')</script>";
          echo "<script>location.href='./?page=akta-kematian'</script>";
        }
  }elseif(isset($_GET['act']) && ($_GET['act'] == 'hapus')){
    $del = $db->pdo->prepare("delete from tbl_akta_kematian where id_akta_kematian = '".$_GET['id']."'");
    $del->execute();
    echo "<script>location.href='?page=akta-kematian'</script>";
  }elseif(isset($_GET['act']) && ($_GET['act'] == 'cetak')){
    ?>
    <style type="text/css">
      #pagep {
        padding: 0;
        margin: 0 auto;
        width: 800px;
      }

      #header {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
      }

      .small {
        font-size: 12px;
      }

      #contentp {
        padding: 20px;
      }

      #bodyp {
      }
    </style>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Cetak Surat Permohonan Akta Kematian</h3>
              </div>
              <div class="box-body">
                <div style="overflow: scroll; height: 400px;">
                <div id="pagep">
                  <div id="bodyp">
                    <div id="header">
                      <u>SURAT KETERANGAN AKTA KEMATIAN</u><br />
                    </div>
                    <center><span style="text-align: center">Nomor: </span></center>
                    <div id="contentp">
                      Yang bertanda tangan dibawah ini: <br /><br />
                      <?php
                        $q = $db->pdo->prepare("select *, tbl_akta_kematian.nama_lengkap as nama_alm
                                                from tbl_akta_kematian, tbl_pemohon
                                                where tbl_akta_kematian.id_pemohon = tbl_pemohon.id_pemohon
                                                AND tbl_akta_kematian.id_akta_kematian = '".$_GET['id']."'");
                        $q->execute();
                        $r = $q->fetch();
                      ?>
                      <table>
                        <tr><td width="120px">Nama Lengkap</td><td width="20px;">:</td><td>SAHRUDIN, S.IP</td></tr>
                        <tr><td>Jabatan</td><td>:</td><td>Lurah Kayu Merah</td></tr>
                      </table><br />
                      Dengan ini menerangkan bahwa, <br /><br />
                      <table>
                        <tr><td width="220px">Nama Lengkap</td><td width="20px;">:</td><td><?php echo $r['nama_alm']; ?></td></tr>
                        <tr><td>TTL</td><td>:</td><td><?php echo $r['ttl']; ?></td></tr>
                        <tr><td>Pekerjaan</td><td>:</td><td><?php echo $r['pekerjaan']; ?></td></tr>
                        <tr><td>Kebangsaan</td><td>:</td><td><?php echo $r['kebangsaan']; ?></td></tr>
                        <tr><td>Agama</td><td>:</td><td><?php echo $r['agama']; ?></td></tr>
                        <tr><td>Alamat</td><td>:</td><td><?php echo $r['alamat']; ?></td></tr>
                      </table><br />
                      Benar bahwa yang bersangkutan adalah penduduk sementara yang berdomisili di "<strong><?php echo strtoupper($r['alamat']); ?></strong>" dan sepengetahuan kami bahwa benar yang bersangkutan sudah Meninggal Dunia dan di kuburkan di <?php echo $r['alamat_pemakaman']; ?> pada tanggal <?php echo $r['tanggal_pemakaman']; ?>.<br />
                      Demikian Surat Keterangan ini dibuat dan diberikan kepada yang bersangkutan untuk digunakan sebagaimana mestinya.<br /><br />
                      <table align="right">
                          <tr><td><center>Ternate, <?php echo date("d F Y"); ?></center></td></tr>
                          <tr><td><center>Lurah Kayu Merah</center></td></tr>
                          <tr><td><center><br /><br /><br /></center></td></tr>
                          <tr><td><center><strong><u>SAHRUDIN, S.IP</u></strong></center></td></tr>
                          <tr><td><center>NIP. 198104162010011004</center></td></tr>
                      </table>
                    </div>
                  </div>
                </div>
                <br /><br /><br /><br /><br /><br /><br /><br /><br />
                <div id="pagep">
                  <div id="bodyp">
                    <div id="header">
                    	FORMULIR ISIAN DATA MEMPEROLEH<br />
                      	<u>AKTA KEMATIAN</u>
                    </div>
                    <div id="contentp">
                      Yang bertanda tangan dibawah ini menerangkan bahwa: <br /><br />
                      <?php
                        $q = $db->pdo->prepare("select *, tbl_akta_kematian.nama_lengkap as nama_alm
                                                from tbl_akta_kematian, tbl_pemohon
                                                where tbl_akta_kematian.id_pemohon = tbl_pemohon.id_pemohon
                                                AND tbl_akta_kematian.id_akta_kematian = '".$_GET['id']."'");
                        $q->execute();
                        $r = $q->fetch();
                      ?>
                      <table>
                        <tr><td width="120px">Hari</td><td width="20px;">:</td><td><?php echo $r['hari']; ?></td></tr>
                        <tr><td>Tanggal</td><td>:</td><td><?php echo $r['tanggal']; ?></td></tr>
                        <tr><td>Di</td><td>:</td><td><?php echo $r['di']; ?></td></tr>
                      </table><br />
                      Telah meninggal dunia, <br /><br />
                      <table>
                        <tr><td width="220px">Nama Lengkap</td><td width="20px;">:</td><td><?php echo $r['nama_alm']; ?></td></tr>
                        <tr><td>TTL</td><td>:</td><td><?php echo $r['ttl']; ?></td></tr>
                        <tr><td>Pekerjaan</td><td>:</td><td><?php echo $r['pekerjaan']; ?></td></tr>
                        <tr><td>Kebangsaan</td><td>:</td><td><?php echo $r['kebangsaan']; ?></td></tr>
                        <tr><td>Agama</td><td>:</td><td><?php echo $r['agama']; ?></td></tr>
                        <tr><td>Alamat</td><td>:</td><td><?php echo $r['alamat']; ?></td></tr>
                        <tr><td></td><td></td><td></td></tr>
                        <tr><th>AYAH</th></tr>
                        <tr><td>Nama Lengkap</td><td>:</td><td><?php echo $r['nama_ayah']; ?></td></tr>
                        <tr><td>Pekerjaan</td><td>:</td><td><?php echo $r['pekerjaan_ayah']; ?></td></tr>
                        <tr><td>Apakah masih hidup?</td><td>:</td><td><?php echo $r['status_k_ayah']; ?></td></tr>
                        <tr><td></td><td></td><td></td></tr>
                        <tr><th>IBU</th></tr>
                        <tr><td>Nama Lengkap</td><td>:</td><td><?php echo $r['nama_ibu']; ?></td></tr>
                        <tr><td>TTL</td><td>:</td><td><?php echo $r['ttl_ibu']; ?></td></tr>
                        <tr><td>Apakah masih hidup?</td><td>:</td><td><?php echo $r['status_k_ibu']; ?></td></tr>
                        <tr><td>Alamat</td><td>:</td><td><?php echo $r['alamat_ibu']; ?></td></tr>
                      </table><br />
                      Surat Keterangan ini dibuat atas dasar yang sebenarnya.<br /><br />
                      <table align="right">
                          <tr><td><center>Ternate, <?php echo date("d F Y"); ?></center></td></tr>
                          <tr><td><center>Lurah Kayu Merah</center></td></tr>
                          <tr><td><center><br /><br /><br /></center></td></tr>
                          <tr><td><center><strong><u>SAHRUDIN, S.IP</u></strong></center></td></tr>
                          <tr><td><center>NIP. 198104162010011004</center></td></tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <a href="./cetak-akta-kematian.php?id=<?php echo $_GET['id']; ?>" class="btn btn-default" target="_blank"><i class='fa fa-print'></i> Print</a>
                <button type="button" onclick="self.history.back()" class="btn btn-warning">Kembali</button>
              </div>
            </div>
        </div>
    </div>
    <?php
  }else{
    ?>
        <div class="row">
          <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Permohonan Akta Kematian</h3>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th><th>Pemohon</th><th>Telpon</th><th>Tanggal Pengajuan</th>
                          <th>Status Data</th><th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no=1;
                          $s = $db->pdo->prepare("select *, tbl_akta_kematian.status AS statusd
                                                  from tbl_akta_kematian, tbl_pemohon
                                                  where tbl_akta_kematian.id_pemohon = tbl_pemohon.id_pemohon
                                                  order by 1 asc");
                          $s->execute();
                          while($rs = $s->fetch()){
                            $st = $rs['statusd'] == 0 ? "<span style='color:red'>Belum Disetujui</span>" : "<span style='color:blue'>Sudah Disetujui</span>";
                            echo "<tr><td>".$no."</td>";
                            echo "<td><small>NIK: ".$rs['nik']."</small><br />".$rs['nama_lengkap']."</td>";
                            echo "<td>".$rs['telp']."</td>";
                            echo "<td>".$rs['tanggal']."</td>";
                            echo "<td>".$st."</td>";
                            echo "<td><a href='?page=akta-kematian&act=edit&id=".$rs['id_akta_kematian']."' title='Selengkapnya'><i class='fa fa-bars'></i></a> | ";
                            ?><a href='?page=akta-kematian&act=hapus&id=<?php echo $rs['id_akta_kematian']; ?>' title='Hapus' onclick='return confirm("Apakah anda yakin?")'><i class='fa fa-trash text-red'></i></a><?php
                            if($rs['statusd'] == 1){
                              echo " | <a href='?page=akta-kematian&act=cetak&id=".$rs['id_akta_kematian']."' title='Cetak'><i class='fa fa-print'></i></a>";
                            }
                            echo "</td></tr>";
                            $no++;
                  }
                        ?>
                      </tbody>
                      <tfoot>
                      </tfoot>
                    </table>
                </div>
              </div>
            </div>
        </div>
    <?php
  }
?>