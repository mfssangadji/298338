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
          $ins = $db->pdo->prepare("insert into tbl_izin_usaha set username = '".$_POST['username']."',
                        password = '".md5($_POST['password'])."', nama_lengkap = '".$_POST['nama_lengkap']."',
                        status = '".$_POST['status']."'");
          $ins->execute();
          echo "<script>alert('Data berhasil ditambahkan!')</script>";
          echo "<script>location.href='./?page=izin-usaha'</script>";
        }
  }elseif(isset($_GET['act']) && ($_GET['act'] == 'edit')){
    $e = $db->pdo->prepare("select *, tbl_izin_usaha.status AS statusd from tbl_izin_usaha, tbl_pemohon
                            where tbl_izin_usaha.id_pemohon = tbl_pemohon.id_pemohon
                            AND tbl_izin_usaha.id_izin_usaha = '".$_GET['id']."'");
    $e->execute();
    $re = $e->fetch();
    ?>
    <div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Detail Permohonan Izin Usaha</h3>
	        </div>
	        <form role="form" method="post" action="">
	          <div class="box-body">
	            <div class="form-group">
	              <label for="exampleInputEmail1">Nama Lengkap</label>
	              <input type="text" class="form-control" readonly value="<?php echo $ru['nama_lengkap']; ?>" id="exampleInputEmail1" required asd="No. KK" name="">
	            </div>
	           	<div class="form-group">
	              <label for="exampleInputEmail1">Tempat Tanggal Lahir</label>
	              <textarea class="form-control" readonly id="exampleInputEmail1" required asd="No. KK" name="ttl"><?php echo $re['ttl']; ?></textarea>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Pekerjaan</label>
	              <input type="text" readonly value="<?php echo $re['pekerjaan']; ?>" class="form-control" id="exampleInputEmail1" name="pekerjaan">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Kebangsaan</label>
	              <select name="kebangsaan" readonly class="form-control">
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
	              <select name="agama" readonly class="form-control">
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
	              <label for="exampleInputEmail1">Status Perkawinan</label>
	              <select name="status_perkawinan" readonly class="form-control">
	              	<option value="" selected></option>
	              <?php
	              	$arr = array("Menikah", "Belum Menikah");
	              	foreach($arr as $key=>$val){
	              		if($val == $re['status_perkawinan']){
	              			echo "<option value='".$val."' selected>".$val."</option>";
	              		}else{
	              			echo "<option value='".$val."'>".$val."</option>";
	              		}
	              	}
	              ?>
	              </select>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Status Tempat usaha</label>
	              <select name="status_tempat_usaha" readonly class="form-control">
	              	<option value="" selected></option>
	              <?php
	              	$arr = array("Milik Sendiri", "Bukan Milik Sendiri");
	              	foreach($arr as $key=>$val){
	              		if($val == $re['status_tempat_usaha']){
	              			echo "<option value='".$val."' selected>".$val."</option>";
	              		}else{
	              			echo "<option value='".$val."'>".$val."</option>";
	              		}
	              	}
	              ?>
	              </select>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Jenis Usaha</label>
	              <input type="text" class="form-control" readonly value="<?php echo $re['jenis_usaha']; ?>" id="exampleInputEmail1" name="jenis_usaha">
	            </div>
	           	<div class="form-group">
	              <label for="exampleInputEmail1">Alamat Tempat Usaha</label>
	              <textarea class="form-control" id="exampleInputEmail1" readonly required name="alamat_tempat_usaha"><?php echo $re['alamat_tempat_usaha']; ?></textarea>
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
          $ins = $db->pdo->prepare("update tbl_izin_usaha set status = '1' where id_izin_usaha = '".$_GET['id']."'");
          $ins->execute();
          echo "<script>alert('Data berhasil disetujui!')</script>";
          echo "<script>location.href='./?page=izin-usaha'</script>";
        }elseif(isset($_POST['btn-b'])){
          $ins = $db->pdo->prepare("update tbl_izin_usaha set status = '0' where id_izin_usaha = '".$_GET['id']."'");
          $ins->execute();
          echo "<script>alert('Konfirmasi berhasil ditolak!')</script>";
          echo "<script>location.href='./?page=izin-usaha'</script>";
        }
  }elseif(isset($_GET['act']) && ($_GET['act'] == 'hapus')){
    $del = $db->pdo->prepare("delete from tbl_izin_usaha where id_izin_usaha = '".$_GET['id']."'");
    $del->execute(); 
    echo "<script>location.href='?page=izin-usaha'</script>";
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
                  <h3 class="box-title">Cetak Surat Permohonan Izin Usaha</h3>
              </div>
              <div class="box-body">
                <div style="overflow: scroll; height: 400px;">
                <div id="pagep">
                  <div id="bodyp">
                    <div id="header">
                      <u>SURAK KETERANGAN IZIN USAHA</u><br />
                    </div>
                    <center><span style="text-align: center">Nomor: </span></center>
                    <div id="contentp">
                      Yang bertanda tangan dibawah ini: <br /><br />
                      <?php
                        $q = $db->pdo->prepare("select * from tbl_izin_usaha, tbl_pemohon
                                                where tbl_izin_usaha.id_pemohon = tbl_pemohon.id_pemohon
                                                AND tbl_izin_usaha.id_izin_usaha = '".$_GET['id']."'");
                        $q->execute();
                        $r = $q->fetch();
                      ?>
                      <table>
                        <tr><td width="120px">Nama Lengkap</td><td width="20px;">:</td><td>SAHRUDIN, S.IP</td></tr>
                        <tr><td>Jabatan</td><td>:</td><td>Lurah Kayu Merah</td></tr>
                      </table><br />
                      Dengan ini menyatakan bahwa, <br /><br />
                      <table>
                        <tr><td width="220px">Nama Lengkap</td><td width="20px;">:</td><td><?php echo $r['nama_lengkap']; ?></td></tr>
                        <tr><td>TTL</td><td>:</td><td><?php echo $r['ttl']; ?></td></tr>
                        <tr><td>Pekerjaan</td><td>:</td><td><?php echo $r['pekerjaan']; ?></td></tr>
                        <tr><td>Kebangsaan</td><td>:</td><td><?php echo $r['kebangsaan']; ?></td></tr>
                        <tr><td>Agama</td><td>:</td><td><?php echo $r['agama']; ?></td></tr>
                        <tr><td>Status Perkawinan</td><td>:</td><td><?php echo $r['status_perkawinan']; ?></td></tr>
                        <tr><td>Status Tempat Usaha</td><td>:</td><td><?php echo $r['status_tempat_usaha']; ?></td></tr>
                        <tr><td>Jenis Usaha</td><td>:</td><td><strong><?php echo strtoupper($r['jenis_usaha']); ?></strong></td></tr>
                        <tr><td>Alamat Tempat Usaha</td><td>:</td><td><?php echo $r['alamat_tempat_usaha']; ?></td></tr>
                      </table><br />
                      Benar bahwa yang bersangkutan mempunyai Usaha "<strong><?php echo strtoupper($r['jenis_usaha']); ?></strong>" yang terletak di <?php echo $r['alamat_tempat_usaha']; ?>.<br />
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
                <br /><br /><br /><br /><br /><br /><br />
              </div>
              <div class="box-footer">
                <a href="./cetak-izin-usaha.php?id=<?php echo $_GET['id']; ?>" class="btn btn-default" target="_blank"><i class='fa fa-print'></i> Print</a>
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
                    <h3 class="box-title">Data Permohonan Izin Usaha</h3>
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
                          $s = $db->pdo->prepare("select *, tbl_izin_usaha.status AS statusd
                                                  from tbl_izin_usaha, tbl_pemohon
                                                  where tbl_izin_usaha.id_pemohon = tbl_pemohon.id_pemohon
                                                  order by 1 asc");
                          $s->execute();
                          while($rs = $s->fetch()){
                            $st = $rs['statusd'] == 0 ? "<span style='color:red'>Belum Disetujui</span>" : "<span style='color:blue'>Sudah Disetujui</span>";
                            echo "<tr><td>".$no."</td>";
                            echo "<td><small>NIK: ".$rs['nik']."</small><br />".$rs['nama_lengkap']."</td>";
                            echo "<td>".$rs['telp']."</td>";
                            echo "<td>".$rs['tanggal']."</td>";
                            echo "<td>".$st."</td>";
                            echo "<td><a href='?page=izin-usaha&act=edit&id=".$rs['id_izin_usaha']."' title='Selengkapnya'><i class='fa fa-bars'></i></a> | ";
                            ?><a href='?page=izin-usaha&act=hapus&id=<?php echo $rs['id_izin_usaha']; ?>' title='Hapus' onclick='return confirm("Apakah anda yakin?")'><i class='fa fa-trash text-red'></i></a><?php
                            if($rs['statusd'] == 1){
                              echo " | <a href='?page=izin-usaha&act=cetak&id=".$rs['id_izin_usaha']."' title='Cetak'><i class='fa fa-print'></i></a>";
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