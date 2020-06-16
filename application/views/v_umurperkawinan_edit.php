			<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Ubah Umur Perkawinan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
							Silahkan melengkapi form berikut
							</div>
							<div class="card-body">
					<?php 
					if(isset($_POST['kd_umurperkawinan_eksis'])==1){
							$kd_umurperkawinan = $_POST['kd_umurperkawinan'];
							$nilai_umurperkawinan = $_POST['nilai_umurperkawinan'];
					?>
					<p style="color:red;"><i>Kode Umur Perkawinan sudah digunakan, silahkan coba yang lain.</i></p>
					<?php 
					}else{
							$kd_umurperkawinan = $tbl_umurperkawinan->kd_umurperkawinan;
							$nilai_umurperkawinan = $tbl_umurperkawinan->nilai_umurperkawinan;
					}?>
					
				  <?php echo form_open_multipart("umurperkawinan/umurperkawinan_aksi_ubah"); ?>
					<input type="hidden" name="id_umurperkawinan" value="<?php echo $tbl_umurperkawinan->id_umurperkawinan;?>" required>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Kode Umur Perkawinan</label>
							<input type="text" class="form-control" name="kd_umurperkawinan[]" placeholder="Kode Umur Perkawinan" value="<?php echo $kd_umurperkawinan;?>" required>
							<input type="hidden" name="kd_umurperkawinan[]" value="<?php echo $tbl_umurperkawinan->kd_umurperkawinan;?>" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Nilai</label>
							<input type="text" class="form-control" name="nilai_umurperkawinan" placeholder="Nilai" value="<?php echo $nilai_umurperkawinan;?>" required>
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