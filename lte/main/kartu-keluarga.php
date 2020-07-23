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
          $ins = $db->pdo->prepare("insert into tbl_kartu_keluarga set username = '".$_POST['username']."',
                        password = '".md5($_POST['password'])."', nama_lengkap = '".$_POST['nama_lengkap']."',
                        status = '".$_POST['status']."'");
          $ins->execute();
          echo "<script>alert('Data berhasil ditambahkan!')</script>";
          echo "<script>location.href='./?page=kartu-keluarga'</script>";
        }
  }elseif(isset($_GET['act']) && ($_GET['act'] == 'edit')){
    $e = $db->pdo->prepare("select *, tbl_kartu_keluarga.status AS statusd from tbl_kartu_keluarga, tbl_pemohon
                            where tbl_kartu_keluarga.id_pemohon = tbl_pemohon.id_pemohon
                            AND tbl_kartu_keluarga.id_kartu_keluarga = '".$_GET['id']."'");
    $e->execute();
    $re = $e->fetch();
    ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Permohonan Kartu Keluarga</h3>
      </div>
      <form role="form" method="post" action="">
          <div class="box-body">
          	<label for="exampleInputEmail1">DATA PEMOHON</label>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Lengkap</label>
              <input type="text" class="form-control" disabled value="<?php echo $re['nama_lengkap']; ?>" id="exampleInputEmail1" required asd="No. KK" name="no_kk">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">NIK Pemohon</label>
              <input type="text" class="form-control" id="exampleInputPassword1" disabled value="<?php echo $re['nik']; ?>" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">NIK KK Semula</label>
              <input type="text" class="form-control" disabled value="<?php echo $re['nik_kk_semula']; ?>" name="nik_kk_semula" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Alamat Pemohon</label>
              <textarea class="form-control" disabled name="alamat_pemohon" required id="exampleInputPassword1" asd="Nama Lengkap"><?php echo $re['alamat_pemohon']; ?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kelurahan</label>
              <input type="text" disabled class="form-control" value="<?php echo $re['kelurahan']; ?>" id="exampleInputPassword1" required name="kelurahan">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kecamatan</label>
              <input type="text" disabled class="form-control" value="<?php echo $re['kecamatan']; ?>" id="exampleInputPassword1" required name="kecamatan">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kota</label>
              <input type="text" disabled class="form-control" id="exampleInputPassword1" value="<?php echo $re['kota']; ?>" required name="kota">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Provinsi</label>
              <input type="text" disabled class="form-control" value="<?php echo $re['provinsi']; ?>" id="exampleInputPassword1" required name="provinsi">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kode Pos</label>
              <input type="text" disabled class="form-control" value="<?php echo $re['kode_pos']; ?>" id="exampleInputPassword1" required name="kode_pos">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Telepon</label>
              <input type="text" disabled class="form-control" id="exampleInputPassword1" value="<?php echo $re['telp']; ?>" required name="telp">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Alasan Pemohon</label>
              <select class="form-control" disabled required name="alasan_pemohon">
              		<option value="" selected></option>
              		<?php
              			$arr = array('Karena membentuk keluarga baru',
              						 'Karena kartu keluarga hilang/rusak', 'Lainnya');
              			for($i=0; $i<count($arr); $i++){
              				if($re['alasan_pemohon'] == $arr[$i]){
              					echo "<option value='".$arr[$i]."' selected>".$arr[$i]."</option>";
              				}else{
              					echo "<option value='".$arr[$i]."'>".$arr[$i]."</option>";
              				}
              			}
              		?>	
              </select>
            </div>
		     </div>
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Daftar Anggota Keluarga Pemohon</h3>
                  </div>
                  <div class="box-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>No</th><th>NIK</th><th>Nama Lengkap</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no=1;
                            $t = $db->pdo->prepare("select * from tbl_temp_kartu_keluarga
                                                    where id_kartu_keluarga = '".$_GET['id']."'");
                            $t->execute();
                            while($rt = $t->fetch()){
                              echo "<tr><td>".$no."</td><td>".$rt['nik']."</td><td>".$rt['nama_lengkap']."</td></tr>";
                              $no++;
                            }
                          ?>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
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
          $ins = $db->pdo->prepare("update tbl_kartu_keluarga set status = '1' where id_kartu_keluarga = '".$_GET['id']."'");
          $ins->execute();
          echo "<script>alert('Data berhasil disetujui!')</script>";
          echo "<script>location.href='./?page=kartu-keluarga'</script>";
        }elseif(isset($_POST['btn-b'])){
          $ins = $db->pdo->prepare("update tbl_kartu_keluarga set status = '0' where id_kartu_keluarga = '".$_GET['id']."'");
          $ins->execute();
          echo "<script>alert('Konfirmasi berhasil ditolak!')</script>";
          echo "<script>location.href='./?page=kartu-keluarga'</script>";
        }
  }elseif(isset($_GET['act']) && ($_GET['act'] == 'hapus')){
    $del = $db->pdo->prepare("delete from tbl_kartu_keluarga where id_kartu_keluarga = '".$_GET['id']."'");
    $del->execute();

    $del = $db->pdo->prepare("delete from tbl_temp_kartu_keluarga where id_kartu_keluarga = '".$_GET['id']."'");
    $del->execute();
    echo "<script>location.href='?page=kartu-keluarga'</script>";
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
              <div class="box-body">
                <div style="overflow: scroll; height: 400px;">
                <div id="pagep">
                  <div id="bodyp">
                    <div id="header">
                      FORMULIR PERMOHONAN KARTU KELUARGA (KK) BARU WARGA NEGARA INDONESIA<br />
                    </div>
                    <div id="contentp">
                      <?php
                      $e = $db->pdo->prepare("select *, tbl_kartu_keluarga.status AS statusd from tbl_kartu_keluarga, tbl_pemohon
                            where tbl_kartu_keluarga.id_pemohon = tbl_pemohon.id_pemohon
                            AND tbl_kartu_keluarga.id_kartu_keluarga = '".$_GET['id']."'");
                      $e->execute();
                      $re = $e->fetch();
                      ?>
                        <form role="form" method="post" action="">
		          <div class="box-body">
		          	<label for="exampleInputEmail1">DATA PEMOHON</label>
		            <div class="form-group">
		              <label for="exampleInputEmail1">Nama Lengkap</label>
		              <input type="text" class="form-control" disabled value="<?php echo $re['nama_lengkap']; ?>" id="exampleInputEmail1" required asd="No. KK" name="no_kk">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputPassword1">NIK Pemohon</label>
		              <input type="text" class="form-control" id="exampleInputPassword1" disabled value="<?php echo $re['nik']; ?>" >
		            </div>
		            <div class="form-group">
		              <label for="exampleInputPassword1">NIK KK Semula</label>
		              <input type="text" class="form-control" disabled value="<?php echo $re['nik_kk_semula']; ?>" name="nik_kk_semula" id="exampleInputPassword1" required>
		            </div>
		            <div class="form-group">
		              <label for="exampleInputPassword1">Alamat Pemohon</label>
		              <textarea class="form-control" name="alamat_pemohon" disabled required id="exampleInputPassword1" asd="Nama Lengkap"><?php echo $re['alamat_pemohon']; ?></textarea>
		            </div>
		            <div class="form-group">
		              <label for="exampleInputPassword1">Kelurahan</label>
		              <input type="text" class="form-control" disabled value="<?php echo $re['kelurahan']; ?>" id="exampleInputPassword1" required name="kelurahan">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputPassword1">Kecamatan</label>
		              <input type="text" class="form-control" disabled value="<?php echo $re['kecamatan']; ?>" id="exampleInputPassword1" required name="kecamatan">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputPassword1">Kota</label>
		              <input type="text" class="form-control" disabled id="exampleInputPassword1" value="<?php echo $re['kota']; ?>" required name="kota">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputPassword1">Provinsi</label>
		              <input type="text" class="form-control" disabled value="<?php echo $re['provinsi']; ?>" id="exampleInputPassword1" required name="provinsi">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputPassword1">Kode Pos</label>
		              <input type="text" class="form-control" disabled value="<?php echo $re['kode_pos']; ?>" id="exampleInputPassword1" required name="kode_pos">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputPassword1">Telepon</label>
		              <input type="text" class="form-control" disabled id="exampleInputPassword1" value="<?php echo $re['telp']; ?>" required name="telp">
		            </div>
		            <div class="form-group">
		              <label for="exampleInputPassword1">Alasan Pemohon</label>
		              <select class="form-control" required disabled name="alasan_pemohon">
		              		<option value="" selected></option>
		              		<?php
		              			$arr = array('Karena membentuk keluarga baru',
		              						 'Karena kartu keluarga hilang/rusak', 'Lainnya');
		              			for($i=0; $i<count($arr); $i++){
		              				if($re['alasan_pemohon'] == $arr[$i]){
		              					echo "<option value='".$arr[$i]."' selected>".$arr[$i]."</option>";
		              				}else{
		              					echo "<option value='".$arr[$i]."'>".$arr[$i]."</option>";
		              				}
		              			}
		              		?>	
		              </select>
		            </div>
		          </div>
                            <div class="row">
                        <div class="box-header">
                            <h3 class="box-title">Daftar Anggota Keluarga Pemohon</h3>
                        </div>
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>No</th><th>NIK</th><th>Nama Lengkap</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $no=1;
                                  $t = $db->pdo->prepare("select * from tbl_temp_kartu_keluarga
                                                          where id_kartu_keluarga = '".$_GET['id']."'");
                                  $t->execute();
                                  while($rt = $t->fetch()){
                                    echo "<tr><td>".$no."</td><td>".$rt['nik']."</td><td>".$rt['nama_lengkap']."</td></tr>";
                                    $no++;
                                  }
                                ?>
                              </tbody>
                            </table><br /><br />
                            <table align="center">
                          <tr><td><center>Petugas Registrasi</center></td><td width="300px;"></td><td><center>Pemohon</center></td></tr>
                          <tr><td><center><br /><br /><br /></center></td></tr>
                          <tr><td><center><strong><u>(RUSMINI M)</u></strong></center></td><td></td><td><center><strong><u>(<?php echo strtoupper($re['nama_lengkap']); ?>)</u></strong></center></td></tr>
                      </table>
                          </div>
                        </div>
                    </div>
                  </div>
                </div><hr /><br /><br />
                    </div>
                  </div>
              <div class="box-footer">
                <a href="./cetak-kartu-keluarga.php?id=<?php echo $_GET['id']; ?>" class="btn btn-default" target="_blank"><i class='fa fa-print'></i> Print</a>
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
                    <h3 class="box-title">Data Permohonan Kartu Keluarga</h3>
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
                          $s = $db->pdo->prepare("select *, tbl_kartu_keluarga.status AS statusd
                                                  from tbl_kartu_keluarga, tbl_pemohon
                                                  where tbl_kartu_keluarga.id_pemohon = tbl_pemohon.id_pemohon
                                                  order by 1 asc");
                          $s->execute();
                          while($rs = $s->fetch()){
                            $st = $rs['statusd'] == 0 ? "<span style='color:red'>Belum Disetujui</span>" : "<span style='color:blue'>Sudah Disetujui</span>";
                            echo "<tr><td>".$no."</td>";
                            echo "<td><small>NIK: ".$rs['nik']."</small><br />".$rs['nama_lengkap']."</td>";
                            echo "<td>".$rs['telp']."</td>";
                            echo "<td>".$rs['tanggal']."</td>";
                            echo "<td>".$st."</td>";
                            echo "<td><a href='?page=kartu-keluarga&act=edit&id=".$rs['id_kartu_keluarga']."' title='Selengkapnya'><i class='fa fa-bars'></i></a> | ";
                            ?><a href='?page=kartu-keluarga&act=hapus&id=<?php echo $rs['id_kartu_keluarga']; ?>' title='Hapus' onclick='return confirm("Apakah anda yakin?")'><i class='fa fa-trash text-red'></i></a><?php
                            if($rs['statusd'] == 1){
                              echo " | <a href='?page=kartu-keluarga&act=cetak&id=".$rs['id_kartu_keluarga']."' title='Cetak'><i class='fa fa-print'></i></a>";
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