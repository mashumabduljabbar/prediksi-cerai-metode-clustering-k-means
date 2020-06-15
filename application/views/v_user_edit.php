			<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Ubah User</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
							Silahkan melengkapi form berikut
							</div>
							<div class="card-body">
					<?php 
					if(isset($_POST['username_eksis'])=="1"){
							$lv_user = $_POST['lv_user'];
							$username = $_POST['username'];
							$nm_user = $_POST['nm_user'];
							$password = $_POST['password'];
					?>
					<p style="color:red;"><i>Username sudah digunakan, silahkan coba yang lain.</i></p>
					<?php 
					}else{
							$lv_user = $tbl_user->lv_user;
							$username = $tbl_user->username;
							$nm_user = $tbl_user->nm_user;
							$password = $tbl_user->password;
					}?>
					
				  <?php echo form_open_multipart("user/user_aksi_ubah"); ?>
					<input type="hidden"name="id_user" value="<?php echo $tbl_user->id_user;?>" required>
					<div class="col-md-6">
						<div class="form-group">
							<select name="lv_user" class="form-control">
								<option value="<?php echo $lv_user;?>"><?php echo $lv_user;?></option>
								<option value="admin">admin</option>
								<option value="pengguna">pengguna</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Nama User</label>
							<input type="text" class="form-control" name="nm_user" placeholder="Nama User" value="<?php echo $nm_user;?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Username</label>
							<input type="text" class="form-control" name="username[]" placeholder="Username" value="<?php echo $username;?>" required>
							<input type="hidden" name="username[]" value="<?php echo $tbl_user->username;?>" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Password</label>
							<input type="password" class="form-control" name="password[]" placeholder="Password" value="<?php echo $password;?>" required>
							<input type="hidden" name="password[]" value="<?php echo $tbl_user->password;?>" >
						</div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
						<input type="submit" onclick="return confirm('Apakah Yakin Menyimpan?');" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<?php echo form_close(); ?>
				  
                            </div>
                        </div>
                    </div>
                </main>