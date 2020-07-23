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
          $ins = $db->pdo->prepare("insert into tbl_pindah_wni set username = '".$_POST['username']."',
                        password = '".md5($_POST['password'])."', nama_lengkap = '".$_POST['nama_lengkap']."',
                        status = '".$_POST['status']."'");
          $ins->execute();
          echo "<script>alert('Data berhasil ditambahkan!')</script>";
          echo "<script>location.href='./?page=pindah-wni'</script>";
        }
  }elseif(isset($_GET['act']) && ($_GET['act'] == 'edit')){
    $e = $db->pdo->prepare("select *, tbl_pindah_wni.status AS statusd from tbl_pindah_wni, tbl_pemohon
                            where tbl_pindah_wni.id_pemohon = tbl_pemohon.id_pemohon
                            AND tbl_pindah_wni.id_pindah_wni = '".$_GET['id']."'");
    $e->execute();
    $re = $e->fetch();
    ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Permohonan Pindah WNI</h3>
      </div>
      <form role="form" method="post" action="">
        <div class="box-body">
          <label for="exampleInputEmail1">DATA PEMOHON</label>
          <div class="form-group">
            <label for="exampleInputEmail1">NIK</label>
            <input type="text" readonly class="form-control" value="<?php echo $re['nik']; ?>" id="exampleInputEmail1" required asd="No. KK" name="no_kk">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" readonly class="form-control" value="<?php echo $re['nama_lengkap']; ?>" id="exampleInputEmail1" required asd="No. KK" name="no_kk">
          </div>
          <label for="exampleInputEmail1">DATA DAERAH ASAL</label>
          <div class="form-group">
            <label for="exampleInputEmail1">Nomor Kartu Keluarga</label>
            <input type="text" readonly class="form-control" id="exampleInputEmail1" value="<?php echo $re['no_kk']; ?>" required asd="No. KK" name="no_kk">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Kepala Keluarga</label>
            <input type="text" readonly class="form-control" id="exampleInputPassword1" value="<?php echo $re['nama_kepala_keluarga']; ?>" required name="nama_kepala_keluarga" asd="Nama Kepala Keluarga">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <textarea readonly class="form-control" name="alamat" required id="exampleInputPassword1" asd="Nama Lengkap"><?php echo $re['alamat']; ?></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kelurahan</label>
            <input type="text" readonly class="form-control" value="<?php echo $re['kelurahan']; ?>" id="exampleInputPassword1" required name="kelurahan">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kecamatan</label>
            <input type="text" readonly class="form-control" value="<?php echo $re['kecamatan']; ?>" id="exampleInputPassword1" required name="kecamatan">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kota</label>
            <input type="text" readonly class="form-control" value="<?php echo $re['kota']; ?>" id="exampleInputPassword1" required name="kota">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Provinsi</label>
            <input type="text" readonly class="form-control" value="<?php echo $re['provinsi']; ?>" id="exampleInputPassword1" required name="provinsi">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kode Pos</label>
            <input type="text" readonly class="form-control" value="<?php echo $re['kode_pos']; ?>" id="exampleInputPassword1" required name="kode_pos">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Telepon</label>
            <input type="text" readonly class="form-control" value="<?php echo $re['telp']; ?>" id="exampleInputPassword1" required name="telp">
          </div>
          <label for="exampleInputEmail1">DATA KEPINDAHAN</label>
          <div class="form-group">
            <label for="exampleInputPassword1">Alasan Pindah</label>
            <select readonly class="form-control" required name="alasan_pindah">
                <option value="" selected></option>
                <?php
                  $arr = array('Pekerjaan', 'Pendidikan', 'Keamanan',
                         'Kesehatan', 'Perumahan', 'Keluarga', 'Lainnya');
                  for($i=0; $i<count($arr); $i++){
                    if($re['alasan_pindah'] == $i){
                      echo "<option value='".$i."' selected>".$arr[$i]."</option>";
                    }else{
                      echo "<option value='".$i."'>".$arr[$i]."</option>";
                    }
                  }
                ?>  
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat Tujuan Pindah</label>
            <textarea readonly class="form-control" name="alamat_tujuan_pindah" required id="exampleInputPassword1" asd="Nama Lengkap"><?php echo $re['alamat_tujuan_pindah']; ?></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kelurahan</label>
            <input type="text" value="<?php echo $re['kelurahan_p']; ?>" readonly class="form-control" id="exampleInputPassword1" required name="kelurahan_p">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kecamatan</label>
            <input type="text" readonly class="form-control" value="<?php echo $re['kecamatan_p']; ?>" id="exampleInputPassword1" required name="kecamatan_p">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kota</label>
            <input type="text" readonly class="form-control" value="<?php echo $re['kota_p']; ?>" id="exampleInputPassword1" required name="kota_p">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Provinsi</label>
            <input type="text" readonly class="form-control" value="<?php echo $re['provinsi_p']; ?>" id="exampleInputPassword1" required name="provinsi_p">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Jenis Perpindahan</label>
            <select readonly class="form-control" required name="jenis_perpindahan">
                <option value="" selected></option>
                <?php
                  $arr = array('Kep Keluarga', 'Kep Kel dan Sebga Aggota Kel',
                 'Keb Kelga dan Seluruh Anggota Kel',
                 'Anggota Keluarga');
                  for($i=0; $i<count($arr); $i++){
                    if($re['jenis_perpindahan'] == $i){
                      echo "<option value='".$i."' selected>".$arr[$i]."</option>";
                    }else{
                      echo "<option value='".$i."'>".$arr[$i]."</option>";
                    }
                  }
                ?>  
            </select>
          </div>
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Data Anggota Keluarga yang Pindah</h3>
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
                            $t = $db->pdo->prepare("select * from tbl_temp_pindah_wni
                                                    where id_pindah_wni = '".$_GET['id']."'");
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
          $ins = $db->pdo->prepare("update tbl_pindah_wni set status = '1' where id_pindah_wni = '".$_GET['id']."'");
          $ins->execute();
          echo "<script>alert('Data berhasil disetujui!')</script>";
          echo "<script>location.href='./?page=pindah-wni'</script>";
        }elseif(isset($_POST['btn-b'])){
          $ins = $db->pdo->prepare("update tbl_pindah_wni set status = '0' where id_pindah_wni = '".$_GET['id']."'");
          $ins->execute();
          echo "<script>alert('Konfirmasi berhasil ditolak!')</script>";
          echo "<script>location.href='./?page=pindah-wni'</script>";
        }
  }elseif(isset($_GET['act']) && ($_GET['act'] == 'hapus')){
    $del = $db->pdo->prepare("delete from tbl_pindah_wni where id_pindah_wni = '".$_GET['id']."'");
    $del->execute();

    $del = $db->pdo->prepare("delete from tbl_temp_pindah_wni where id_pindah_wni = '".$_GET['id']."'");
    $del->execute();
    echo "<script>location.href='?page=pindah-wni'</script>";
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
                  <h3 class="box-title">Cetak Surat Pengantar Pindah</h3>
              </div>
              <div class="box-body">
                <div style="overflow: scroll; height: 400px;">
                <div id="pagep">
                  <div id="bodyp">
                    <div id="header">
                      SURAT PENGANTAR PINDAH<br /><u>ANTAR KABUPATEN KOTA PROVINSI</u><br />
                    </div>
                    <center><span style="text-align: center">Nomor: </span></center>
                    <div id="contentp">
                      Yang bertanda tangan dibawah ini, menerangkan Permohonan Pindah Penduduk WNI dengan data sebagai berikut : <br /><br />
                      <?php
                        $q = $db->pdo->prepare("select * from tbl_pindah_wni, tbl_pemohon
                                                where tbl_pindah_wni.id_pemohon = tbl_pemohon.id_pemohon
                                                AND tbl_pindah_wni.id_pindah_wni = '".$_GET['id']."'");
                        $q->execute();
                        $r = $q->fetch();
                      ?>
                      <table>
                        <tr><td>1. </td><td width="210px">NIK</td><td width="20px">:</td><td><?php echo $r['nik']; ?></td></tr>
                        <tr><td>2. </td><td>Nama Lengkap</td><td>:</td><td><?php echo $r['nama_lengkap']; ?></td></tr>
                        <tr><td>3. </td><td>Nama Kepala Keluarga</td><td>:</td><td><?php echo $r['nama_kepala_keluarga']; ?></td></tr>
                        <tr><td>4. </td><td>Alamat Sekarang</td><td>:</td><td><?php echo $r['alamat']; ?></td></tr>
                        <tr><td>5. </td><td>Alamat Tujuan Pindah</td><td>:</td><td><?php echo $r['alamat_tujuan_pindah']; ?></td></tr>
                        <tr><td>6. </td><td>Jumlah Keluarga yang Pindah</td><td>:</td><td>
                          <?php
                            $t = $db->pdo->prepare("select * from tbl_temp_pindah_wni
                                                    where id_pindah_wni = '".$_GET['id']."'");
                            $t->execute();
                            echo $t->rowCount();
                          ?>
                          Orang</td></tr>
                      </table><br /><br />
                      Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir.
                      Demikian surat pengantar pindah ini dibuat agar digunakan sebagaimana mestinya.<br /><br />
                      <table align="right">
                          <tr><td><center>Ternate, <?php echo date("d F Y"); ?></center></td></tr>
                          <tr><td><center>Lurah Kayu Merah</center></td></tr>
                          <tr><td><center><br /><br /><br /></center></td></tr>
                          <tr><td><center><strong><u>SAHRUDIN, S.IP</u></strong></center></td></tr>
                          <tr><td><center>NIP. 198104162010011004</center></td></tr>
                      </table>
                    </div>
                  </div>
                </div><br /><br /><br /><br /><br /><br /><br /><hr /><br /><br />
                <div id="pagep">
                  <div id="bodyp">
                    <div id="header">
                      FORMULIR PERMOHONAN PINDAH WNI<br /><u>Antar Kabupaten/Kota Provinsi</u><br />
                    </div>
                    <center><span style="text-align: center">Nomor: </span></center>
                    <div id="contentp">
                      <?php
                      $e = $db->pdo->prepare("select *, tbl_pindah_wni.status AS statusd from tbl_pindah_wni, tbl_pemohon
                            where tbl_pindah_wni.id_pemohon = tbl_pemohon.id_pemohon
                            AND tbl_pindah_wni.id_pindah_wni = '".$_GET['id']."'");
                      $e->execute();
                      $re = $e->fetch();
                      ?>
                        <form role="form" method="post" action="">
                          <div class="box-body">
                            <label for="exampleInputEmail1">DATA PEMOHON</label>
                            <div class="form-group">
                              <label for="exampleInputEmail1">NIK</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['nik']; ?>" id="exampleInputEmail1" required asd="No. KK" name="no_kk">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Lengkap</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['nama_lengkap']; ?>" id="exampleInputEmail1" required asd="No. KK" name="no_kk">
                            </div>
                            <label for="exampleInputEmail1">DATA DAERAH ASAL</label>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nomor Kartu Keluarga</label>
                              <input type="text" readonly class="form-control" id="exampleInputEmail1" value="<?php echo $re['no_kk']; ?>" required asd="No. KK" name="no_kk">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama Kepala Keluarga</label>
                              <input type="text" readonly class="form-control" id="exampleInputPassword1" value="<?php echo $re['nama_kepala_keluarga']; ?>" required name="nama_kepala_keluarga" asd="Nama Kepala Keluarga">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Alamat</label>
                              <textarea readonly class="form-control" name="alamat" required id="exampleInputPassword1" asd="Nama Lengkap"><?php echo $re['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kelurahan</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kelurahan']; ?>" id="exampleInputPassword1" required name="kelurahan">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kecamatan</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kecamatan']; ?>" id="exampleInputPassword1" required name="kecamatan">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kota</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kota']; ?>" id="exampleInputPassword1" required name="kota">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Provinsi</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['provinsi']; ?>" id="exampleInputPassword1" required name="provinsi">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kode Pos</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kode_pos']; ?>" id="exampleInputPassword1" required name="kode_pos">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Telepon</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['telp']; ?>" id="exampleInputPassword1" required name="telp">
                            </div>
                            <label for="exampleInputEmail1">DATA KEPINDAHAN</label>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Alasan Pindah</label>
                              <select readonly class="form-control"  required name="alasan_pindah">
                                  <option value="" selected></option>
                                  <?php
                                    $arr = array('Pekerjaan', 'Pendidikan', 'Keamanan',
                                           'Kesehatan', 'Perumahan', 'Keluarga', 'Lainnya');
                                    for($i=0; $i<count($arr); $i++){
                                      if($re['alasan_pindah'] == $i){
                                        echo "<option value='".$i."' selected>".$arr[$i]."</option>";
                                      }else{
                                        echo "<option value='".$i."'>".$arr[$i]."</option>";
                                      }
                                    }
                                  ?>  
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Alamat Tujuan Pindah</label>
                              <textarea readonly class="form-control" name="alamat_tujuan_pindah" required id="exampleInputPassword1" asd="Nama Lengkap"><?php echo $re['alamat_tujuan_pindah']; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kelurahan</label>
                              <input type="text" value="<?php echo $re['kelurahan_p']; ?>" readonly class="form-control" id="exampleInputPassword1" required name="kelurahan_p">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kecamatan</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kecamatan_p']; ?>" id="exampleInputPassword1" required name="kecamatan_p">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kota</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kota_p']; ?>" id="exampleInputPassword1" required name="kota_p">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Provinsi</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['provinsi_p']; ?>" id="exampleInputPassword1" required name="provinsi_p">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Jenis Perpindahan</label>
                              <select readonly class="form-control" required name="jenis_perpindahan">
                                  <option value="" selected></option>
                                  <?php
                                    $arr = array('Kep Keluarga', 'Kep Kel dan Sebga Aggota Kel',
                                   'Keb Kelga dan Seluruh Anggota Kel',
                                   'Anggota Keluarga');
                                    for($i=0; $i<count($arr); $i++){
                                      if($re['jenis_perpindahan'] == $i){
                                        echo "<option value='".$i."' selected>".$arr[$i]."</option>";
                                      }else{
                                        echo "<option value='".$i."'>".$arr[$i]."</option>";
                                      }
                                    }
                                  ?>  
                              </select>
                            </div>
                            <div class="row">
                        <div class="box-header">
                            <h3 class="box-title">Data Anggota Keluarga yang Pindah</h3>
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
                                  $t = $db->pdo->prepare("select * from tbl_temp_pindah_wni
                                                          where id_pindah_wni = '".$_GET['id']."'");
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
                          <tr><td><center><strong><u>(RUSMINI M)</u></strong></center></td><td></td><td><center><strong><u>(<?php echo strtoupper($r['nama_lengkap']); ?>)</u></strong></center></td></tr>
                      </table>
                          </div>
                        </div>
                    </div>
                  </div>
                </div><hr /><br /><br />
                <div id="pagep">
                  <div id="bodyp">
                    <div id="header">
                      SURAT PENGANTAR PINDAH<br /><u>ANTAR KECAMATAN</u><br />
                    </div>
                    <center><span style="text-align: center">Nomor: </span></center>
                    <div id="contentp">
                      Yang bertanda tangan dibawah ini, menerangkan Permohonan Pindah Penduduk WNI dengan data sebagai berikut : <br /><br />
                      <?php
                        $q = $db->pdo->prepare("select * from tbl_pindah_wni, tbl_pemohon
                                                where tbl_pindah_wni.id_pemohon = tbl_pemohon.id_pemohon
                                                AND tbl_pindah_wni.id_pindah_wni = '".$_GET['id']."'");
                        $q->execute();
                        $r = $q->fetch();
                      ?>
                      <table>
                        <tr><td>1. </td><td width="210px">NIK</td><td width="20px">:</td><td><?php echo $r['nik']; ?></td></tr>
                        <tr><td>2. </td><td>Nama Lengkap</td><td>:</td><td><?php echo $r['nama_lengkap']; ?></td></tr>
                        <tr><td>3. </td><td>Nama Kepala Keluarga</td><td>:</td><td><?php echo $r['nama_kepala_keluarga']; ?></td></tr>
                        <tr><td>4. </td><td>Alamat Sekarang</td><td>:</td><td><?php echo $r['alamat']; ?></td></tr>
                        <tr><td>5. </td><td>Alamat Tujuan Pindah</td><td>:</td><td><?php echo $r['alamat_tujuan_pindah']; ?></td></tr>
                        <tr><td>6. </td><td>Jumlah Keluarga yang Pindah</td><td>:</td><td>
                          <?php
                            $t = $db->pdo->prepare("select * from tbl_temp_pindah_wni
                                                    where id_pindah_wni = '".$_GET['id']."'");
                            $t->execute();
                            echo $t->rowCount();
                          ?>
                          Orang</td></tr>
                      </table><br /><br />
                      Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir.
                      Demikian surat pengantar pindah ini dibuat agar digunakan sebagaimana mestinya.<br /><br />
                      <table align="right">
                          <tr><td><center>Ternate, <?php echo date("d F Y"); ?></center></td></tr>
                          <tr><td><center>Lurah Kayu Merah</center></td></tr>
                          <tr><td><center><br /><br /><br /></center></td></tr>
                          <tr><td><center><strong><u>SAHRUDIN, S.IP</u></strong></center></td></tr>
                          <tr><td><center>NIP. 198104162010011004</center></td></tr>
                      </table>
                    </div>
                  </div>
                </div><br /><br /><br /><br /><br /><br /><hr /><br /><br />
                <div id="pagep">
                  <div id="bodyp">
                    <div id="header">
                      FORMULIR PERMOHONAN PINDAH WNI<br /><u>Antar Kecamatan Dalam Satu Kabupaten Kota</u><br />
                    </div>
                    <center><span style="text-align: center">Nomor: </span></center>
                    <div id="contentp">
                      <?php
                      $e = $db->pdo->prepare("select *, tbl_pindah_wni.status AS statusd from tbl_pindah_wni, tbl_pemohon
                            where tbl_pindah_wni.id_pemohon = tbl_pemohon.id_pemohon
                            AND tbl_pindah_wni.id_pindah_wni = '".$_GET['id']."'");
                      $e->execute();
                      $re = $e->fetch();
                      ?>
                        <form role="form" method="post" action="">
                          <div class="box-body">
                            <label for="exampleInputEmail1">DATA PEMOHON</label>
                            <div class="form-group">
                              <label for="exampleInputEmail1">NIK</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['nik']; ?>" id="exampleInputEmail1" required asd="No. KK" name="no_kk">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Lengkap</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['nama_lengkap']; ?>" id="exampleInputEmail1" required asd="No. KK" name="no_kk">
                            </div>
                            <label for="exampleInputEmail1">DATA DAERAH ASAL</label>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nomor Kartu Keluarga</label>
                              <input type="text" readonly class="form-control" id="exampleInputEmail1" value="<?php echo $re['no_kk']; ?>" required asd="No. KK" name="no_kk">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama Kepala Keluarga</label>
                              <input type="text" readonly class="form-control" id="exampleInputPassword1" value="<?php echo $re['nama_kepala_keluarga']; ?>" required name="nama_kepala_keluarga" asd="Nama Kepala Keluarga">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Alamat</label>
                              <textarea readonly class="form-control" name="alamat" required id="exampleInputPassword1" asd="Nama Lengkap"><?php echo $re['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kelurahan</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kelurahan']; ?>" id="exampleInputPassword1" required name="kelurahan">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kecamatan</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kecamatan']; ?>" id="exampleInputPassword1" required name="kecamatan">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kota</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kota']; ?>" id="exampleInputPassword1" required name="kota">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Provinsi</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['provinsi']; ?>" id="exampleInputPassword1" required name="provinsi">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kode Pos</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kode_pos']; ?>" id="exampleInputPassword1" required name="kode_pos">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Telepon</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['telp']; ?>" id="exampleInputPassword1" required name="telp">
                            </div>
                            <label for="exampleInputEmail1">DATA KEPINDAHAN</label>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Alasan Pindah</label>
                              <select readonly class="form-control"  required name="alasan_pindah">
                                  <option value="" selected></option>
                                  <?php
                                    $arr = array('Pekerjaan', 'Pendidikan', 'Keamanan',
                                           'Kesehatan', 'Perumahan', 'Keluarga', 'Lainnya');
                                    for($i=0; $i<count($arr); $i++){
                                      if($re['alasan_pindah'] == $i){
                                        echo "<option value='".$i."' selected>".$arr[$i]."</option>";
                                      }else{
                                        echo "<option value='".$i."'>".$arr[$i]."</option>";
                                      }
                                    }
                                  ?>  
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Alamat Tujuan Pindah</label>
                              <textarea readonly class="form-control" name="alamat_tujuan_pindah" required id="exampleInputPassword1" asd="Nama Lengkap"><?php echo $re['alamat_tujuan_pindah']; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kelurahan</label>
                              <input type="text" value="<?php echo $re['kelurahan_p']; ?>" readonly class="form-control" id="exampleInputPassword1" required name="kelurahan_p">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kecamatan</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kecamatan_p']; ?>" id="exampleInputPassword1" required name="kecamatan_p">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kota</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['kota_p']; ?>" id="exampleInputPassword1" required name="kota_p">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Provinsi</label>
                              <input type="text" readonly class="form-control" value="<?php echo $re['provinsi_p']; ?>" id="exampleInputPassword1" required name="provinsi_p">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Jenis Perpindahan</label>
                              <select readonly class="form-control" required name="jenis_perpindahan">
                                  <option value="" selected></option>
                                  <?php
                                    $arr = array('Kep Keluarga', 'Kep Kel dan Sebga Aggota Kel',
                                   'Keb Kelga dan Seluruh Anggota Kel',
                                   'Anggota Keluarga');
                                    for($i=0; $i<count($arr); $i++){
                                      if($re['jenis_perpindahan'] == $i){
                                        echo "<option value='".$i."' selected>".$arr[$i]."</option>";
                                      }else{
                                        echo "<option value='".$i."'>".$arr[$i]."</option>";
                                      }
                                    }
                                  ?>  
                              </select>
                            </div>
                            <div class="row">
                        <div class="box-header">
                            <h3 class="box-title">Data Anggota Keluarga yang Pindah</h3>
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
                                  $t = $db->pdo->prepare("select * from tbl_temp_pindah_wni
                                                          where id_pindah_wni = '".$_GET['id']."'");
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
                          <tr><td><center><strong><u>(RUSMINI M)</u></strong></center></td><td></td><td><center><strong><u>(<?php echo strtoupper($r['nama_lengkap']); ?>)</u></strong></center></td></tr>
                      </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <div class="box-footer">
                <a href="./cetak-pindah-wni.php?id=<?php echo $_GET['id']; ?>" class="btn btn-default" target="_blank"><i class='fa fa-print'></i> Print</a>
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
                    <h3 class="box-title">Data Permohonan Pindah WNI</h3>
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
                          $s = $db->pdo->prepare("select *, tbl_pindah_wni.status AS statusd
                                                  from tbl_pindah_wni, tbl_pemohon
                                                  where tbl_pindah_wni.id_pemohon = tbl_pemohon.id_pemohon
                                                  order by 1 asc");
                          $s->execute();
                          while($rs = $s->fetch()){
                            $st = $rs['statusd'] == 0 ? "<span style='color:red'>Belum Disetujui</span>" : "<span style='color:blue'>Sudah Disetujui</span>";
                            echo "<tr><td>".$no."</td>";
                            echo "<td><small>NIK: ".$rs['nik']."</small><br />".$rs['nama_lengkap']."</td>";
                            echo "<td>".$rs['telp']."</td>";
                            echo "<td>".$rs['tanggal']."</td>";
                            echo "<td>".$st."</td>";
                            echo "<td><a href='?page=pindah-wni&act=edit&id=".$rs['id_pindah_wni']."' title='Selengkapnya'><i class='fa fa-bars'></i></a> | ";
                            ?><a href='?page=pindah-wni&act=hapus&id=<?php echo $rs['id_pindah_wni']; ?>' title='Hapus' onclick='return confirm("Apakah anda yakin?")'><i class='fa fa-trash text-red'></i></a><?php
                            if($rs['statusd'] == 1){
                              echo " | <a href='?page=pindah-wni&act=cetak&id=".$rs['id_pindah_wni']."' title='Cetak'><i class='fa fa-print'></i></a>";
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