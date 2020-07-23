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
                  <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" required name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_lengkap" required id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <select class="form-control" name="status" required>
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
          $ins = $db->pdo->prepare("insert into tbl_pemohon set username = '".$_POST['username']."',
                        password = '".md5($_POST['password'])."', nama_lengkap = '".$_POST['nama_lengkap']."',
                        status = '".$_POST['status']."'");
          $ins->execute();
          echo "<script>alert('Data berhasil ditambahkan!')</script>";
          echo "<script>location.href='./?page=pemohon'</script>";
        }
  }elseif(isset($_GET['act']) && ($_GET['act'] == 'edit')){
    $e = $db->pdo->prepare("select * from tbl_pemohon where id_pemohon = '".$_GET['id']."'");
    $e->execute();
    $re = $e->fetch();
    ?>
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Data Pemohon</h3>
            </div>
            <form role="form" method="post" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" readonly value="<?php echo $re['username']; ?>" required placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIK</label>
                  <input type="text" class="form-control" readonly value="<?php echo $re['nik']; ?>" name="nama_lengkap" required id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Lengkap</label>
                  <input type="text" class="form-control" readonly value="<?php echo $re['nama_lengkap']; ?>" name="nama_lengkap" required id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <textarea class="form-control" name="alamat" readonly required id="exampleInputPassword1" placeholder="Alamat"><?php echo $re['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kelurahan</label>
                  <input type="text" class="form-control" readonly value="<?php echo $re['kelurahan']; ?>" name="nama_lengkap" required id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kecamatan</label>
                  <input type="text" class="form-control" readonly value="<?php echo $re['kecamatan']; ?>" name="nama_lengkap" required id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kota</label>
                  <input type="text" class="form-control" readonly value="<?php echo $re['kota']; ?>" name="nama_lengkap" required id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Provinsi</label>
                  <input type="text" class="form-control" readonly value="<?php echo $re['provinsi']; ?>" name="nama_lengkap" required id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kode Pos</label>
                  <input type="text" class="form-control" readonly value="<?php echo $re['kode_pos']; ?>" name="nama_lengkap" required id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Telpon</label>
                  <input type="text" class="form-control" readonly value="<?php echo $re['telp']; ?>" name="nama_lengkap" required id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
              </div>
              <div class="box-footer">
                <?php
                    if($re['status'] == 0){
                        ?><button type="submit" class="btn btn-primary" name="btn-a">Konfirmasi</button><?php
                    }else{
                        ?><button type="submit" class="btn btn-danger" name="btn-b">Batal Konfirmasi</button><?php
                    }
                ?>
                <button type="button" onclick="self.history.back()" class="btn btn-warning">Kembali</button>
              </div>
            </form>
          </div>
        <?php
        if(isset($_POST['btn-a'])){
          $ins = $db->pdo->prepare("update tbl_pemohon set status = '1' where id_pemohon = '".$_GET['id']."'");
          $ins->execute();
          echo "<script>alert('Data berhasil dikonfirmasi!')</script>";
          echo "<script>location.href='./?page=pemohon'</script>";
        }elseif(isset($_POST['btn-b'])){
          $ins = $db->pdo->prepare("update tbl_pemohon set status = '0' where id_pemohon = '".$_GET['id']."'");
          $ins->execute();
          echo "<script>alert('Konfirmasi berhasil dibatalkan!')</script>";
          echo "<script>location.href='./?page=pemohon'</script>";
        }
  }elseif(isset($_GET['act']) && ($_GET['act'] == 'hapus')){
    $del = $db->pdo->prepare("delete from tbl_pemohon where id_pemohon = '".$_GET['id']."'");
    $del->execute();
    echo "<script>location.href='?page=pemohon'</script>";
  }else{
    ?>
        <div class="row">
          <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Pemohon</h3>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th><th>Username</th><th>NIK</th><th>Nama Lengkap</th><th>Telpon</th><th>Status Data</th><th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no=1;
                          $s = $db->pdo->prepare("select * from tbl_pemohon order by 1 asc");
                          $s->execute();
                          while($rs = $s->fetch()){
                            $st = $rs['status'] == 0 ? "<span style='color:red'>Belum Dikonfirmasi</span>" : "<span style='color:blue'>Sudah Dikonfirmasi</span>";
                            echo "<tr><td>".$no."</td>";
                            echo "<td>".$rs['username']."</td>";
                            echo "<td>".$rs['nik']."</td>";
                            echo "<td>".$rs['nama_lengkap']."</td>";
                            echo "<td>".$rs['telp']."</td>";
                            echo "<td>".$st."</td>";
                            echo "<td><a href='?page=pemohon&act=edit&id=".$rs['id_pemohon']."' title='Selengkapnya'><i class='fa fa-bars'></i></a> | ";
                            ?><a href='?page=pemohon&act=hapus&id=<?php echo $rs['id_pemohon']; ?>' title='Hapus' onclick='return confirm("Apakah anda yakin?")'><i class='fa fa-trash text-red'></i></a><?php
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