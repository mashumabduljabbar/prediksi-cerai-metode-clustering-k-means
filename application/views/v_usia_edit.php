			<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Ubah Usia</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
							Silahkan melengkapi form berikut
							</div>
							<div class="card-body">
					<?php 
					if(isset($_POST['kd_usia_eksis'])==1){
							$kd_usia = $_POST['kd_usia'];
							$nilai_usia = $_POST['nilai_usia'];
					?>
					<p style="color:red;"><i>Kode Usia sudah digunakan, silahkan coba yang lain.</i></p>
					<?php 
					}else{
							$kd_usia = $tbl_usia->kd_usia;
							$nilai_usia = $tbl_usia->nilai_usia;
					}?>
					
				  <?php echo form_open_multipart("usia/usia_aksi_ubah"); ?>
					<input type="hidden" name="id_usia" value="<?php echo $tbl_usia->id_usia;?>" required>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Kode Usia</label>
							<input type="text" class="form-control" name="kd_usia[]" placeholder="Kode Usia" value="<?php echo $kd_usia;?>" required>
							<input type="hidden" name="kd_usia[]" value="<?php echo $tbl_usia->kd_usia;?>" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Nilai</label>
							<input type="text" class="form-control" name="nilai_usia" placeholder="Nilai" value="<?php echo $nilai_usia;?>" required>
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