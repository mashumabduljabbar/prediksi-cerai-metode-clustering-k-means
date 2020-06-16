			<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Alasan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
							Silahkan melengkapi form berikut
							</div>
							<div class="card-body">
					<?php 
					if($_POST['kd_alasan_eksis']==1){
							$kd_alasan = $_POST['kd_alasan'];
							$detail_alasan = $_POST['detail_alasan'];
					?>
					<p style="color:red;"><i>Kode Alasan sudah digunakan, silahkan coba yang lain.</i></p>
					<?php 
					}else{
							$kd_alasan = "";
							$detail_alasan = "";
					}?>
					
				  <?php echo form_open_multipart("alasan/alasan_aksi_tambah"); ?>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Kode Alasan</label>
							<input type="text" class="form-control" name="kd_alasan" placeholder="Kode Alasan" value="<?php echo $kd_alasan;?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Detail</label>
							<input type="text" class="form-control" name="detail_alasan" placeholder="Detail" value="<?php echo $detail_alasan;?>" required>
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