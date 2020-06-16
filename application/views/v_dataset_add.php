			<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Dataset</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
							Silahkan melengkapi form berikut
							</div>
							<div class="card-body">
					<?php 
					if($_POST['np_dataset_eksis']==1){
							$np_dataset = $_POST['np_dataset'];
							$jenis_dataset = $_POST['jenis_dataset'];
							$up_dataset = $_POST['up_dataset'];
							$ut_dataset = $_POST['ut_dataset'];
							$uk_dataset = $_POST['uk_dataset'];
							$ja_dataset = $_POST['ja_dataset'];
							$mediasi_dataset = $_POST['mediasi_dataset'];
							$mediasi_dataset2 = $_POST['mediasi_dataset'];
							$alasan_dataset = $_POST['alasan_dataset'];
							$putusan_dataset = $_POST['putusan_dataset'];
							$putusan_dataset2 = $_POST['putusan_dataset'];
					?>
					<p style="color:red;"><i>NP sudah digunakan, silahkan coba yang lain.</i></p>
					<?php 
					}else{
							$np_dataset = "";
							$jenis_dataset = "";
							$up_dataset = "";
							$ut_dataset = "";
							$uk_dataset = "";
							$ja_dataset = "";
							$mediasi_dataset = "";
							$mediasi_dataset2 = "Pilih Mediasi";
							$alasan_dataset = "";
							$putusan_dataset = "";
							$putusan_dataset2 = "Pilih Putusan";
					}?>
					
				  <?php echo form_open_multipart("dataset/dataset_aksi_tambah"); ?>
					<div class="col-md-6">
						<div class="form-group">
							<label>	NP</label>
							<input type="text" class="form-control" name="np_dataset" placeholder="NP" value="<?php echo $np_dataset;?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Jenis</label>
							<input type="text" class="form-control" name="jenis_dataset" placeholder="Jenis" value="<?php echo $jenis_dataset;?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Usia Penggugat atau Pemohon</label>
							<input type="number" class="form-control" name="up_dataset" placeholder="Usia Penggugat atau Pemohon" value="<?php echo $up_dataset;?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Usia Tergugat atau Termohon</label>
							<input type="number" class="form-control" name="ut_dataset" placeholder="Usia Tergugat atau Termohon" value="<?php echo $ut_dataset;?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Umur Perkawinan</label>
							<input type="number" class="form-control" name="uk_dataset" placeholder="Umur Perkawinan" value="<?php echo $uk_dataset;?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Jumlah Anak</label>
							<input type="number" class="form-control" name="ja_dataset" placeholder="Jumlah Anak" value="<?php echo $ja_dataset;?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Mediasi</label>
							<select class="form-control" name="mediasi_dataset" required>
								<option value="<?php echo $mediasi_dataset;?>"><?php echo $mediasi_dataset2;?></option>
								<option value="Gagal">Gagal</option>
								<option value="Berhasil">Berhasil</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Alasan</label>
							<input type="text" class="form-control" name="alasan_dataset" placeholder="Alasan" value="<?php echo $alasan_dataset;?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>	Putusan</label>
							<select class="form-control" name="putusan_dataset" required>
								<option value="<?php echo $putusan_dataset;?>"><?php echo $putusan_dataset2;?></option>
								<option value="Dikabulkan">Dikabulkan</option>
								<option value="Ditolak">Ditolak</option>
							</select>
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