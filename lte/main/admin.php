<ul class="menu-child">
	<li><a href='?page=admin'>Daftar Admin</a></li>
	<li><a href='?page=admin&act=add'>Tambah Admin</a></li>
	<div style="clear: both;"></div>
</ul>
<?php
	if(isset($_GET['act']) && ($_GET['act'] == 'add')){
		?>
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Admin</h3>
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
                  	  	$arr = array(1=>"Administrator");
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
        	$ins = $db->pdo->prepare("insert into tbl_admin set username = '".$_POST['username']."',
        							  password = '".md5($_POST['password'])."', nama_lengkap = '".$_POST['nama_lengkap']."',
        							  status = '".$_POST['status']."'");
        	$ins->execute();
        	echo "<script>alert('Data berhasil ditambahkan!')</script>";
        	echo "<script>location.href='./?page=admin'</script>";
        }
	}elseif(isset($_GET['act']) && ($_GET['act'] == 'edit')){
		$e = $db->pdo->prepare("select * from tbl_admin where id_admin = '".$_GET['id']."'");
		$e->execute();
		$re = $e->fetch();
		?>
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Admin</h3>
            </div>
            <form role="form" method="post" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $re['username']; ?>" required placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                  <p class="help-block"><span style="color:red">*</span> Kosongkan jika tidak diganti</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Lengkap</label>
                  <input type="text" class="form-control" value="<?php echo $re['nama_lengkap']; ?>" name="nama_lengkap" required id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <select class="form-control" name="status" required>
                  	  <option value="" selected=""></option>
                  	  <?php
                  	  	$arr = array(1=>"Administrator");
                  	  	foreach($arr as $key=>$val){
                  	  		if($re['status'] == $key){
                  	  			echo "<option value='".$key."' selected>".$val."</option>";
                  	  		}else{
                  	  			echo "<option value='".$key."'>".$val."</option>";
                  	  		}
                  	  	}
                  	  ?>
                  </select>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btn-a">Ubah</button>
                <button type="button" onclick="self.history.back()" class="btn btn-warning">Batal</button>
              </div>
            </form>
          </div>
        <?php
        if(isset($_POST['btn-a'])){
        	$pass = (empty($_POST['password'])) ? "" : "password = '".md5($_POST['password'])."',";
        	$ins = $db->pdo->prepare("update tbl_admin set username = '".$_POST['username']."',
        							  ".$pass." nama_lengkap = '".$_POST['nama_lengkap']."',
        							  status = '".$_POST['status']."'
        							  where id_admin = '".$_GET['id']."'");
        	$ins->execute();
        	echo "<script>alert('Data berhasil diubah!')</script>";
        	echo "<script>location.href='./?page=admin'</script>";
        }
	}elseif(isset($_GET['act']) && ($_GET['act'] == 'hapus')){
		$del = $db->pdo->prepare("delete from tbl_admin where id_admin = '".$_GET['id']."'");
		$del->execute();
		echo "<script>location.href='?page=admin'</script>";
	}else{
		?>
      	<div class="row">
        	<div class="col-xs-12">
          		<div class="box">
            		<div class="box-header">
              			<h3 class="box-title">Data Administrator</h3>
	            	</div>
            		<div class="box-body">
              			<table id="example2" class="table table-bordered table-hover">
                			<thead>
				                <tr>
				                  <th>No</th><th>Username</th><th>Nama Lengkap</th><th>Group User</th><th>Aksi</th>
				                </tr>
                			</thead>
			                <tbody>
			                	<?php
			                		$no=1;
			                		$s = $db->pdo->prepare("select * from tbl_admin order by 1 asc");
			                		$s->execute();
			                		while($rs = $s->fetch()){
			                			echo "<tr><td>".$no."</td>";
			                			echo "<td>".$rs['username']."</td>";
			                			echo "<td>".$rs['nama_lengkap']."</td>";
			                			echo "<td>".status($rs['status'])."</td>";
			                			echo "<td><a href='?page=admin&act=edit&id=".$rs['id_admin']."' title='Ubah'><i class='fa fa-edit'></i></a> | ";
			                			?><a href='?page=admin&act=hapus&id=<?php echo $rs['id_admin']; ?>' title='Hapus' onclick='return confirm("Apakah anda yakin?")'><i class='fa fa-trash text-red'></i></a><?php
			                			echo "</td></tr>";
			                			$no++;
									}
			                	?>
			                </tbody>
                			<tfoot>
				                <tr>
				                  <th>No</th><th>Username</th><th>Nama Lengkap</th><th>Group User</th><th>Aksi</th>
				                </tr>
                			</tfoot>
              			</table>
            		</div>
          		</div>
          	</div>
        </div>
		<?php
	}
?>