			<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Configuration <?php if($this->uri->segment(3)=="1"){ ?>
						<font style="color:green; font-style:italic">Sukses</font>
						<?php } ?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
							Silahkan melengkapi form berikut
							</div>
							 <?php echo form_open_multipart("config/config_aksi_ubah"); ?>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Limit Dataset</label>
											<input type="number" name="limit_dataset" value="<?php echo set_value('limit_dataset', $tbl_config->limit_dataset); ?>" class="form-control" />
									</div>
									<div class="form-group">
										<label>Tampilkan Semua Iterasi (Jika tidak maka hanya 2 iterasi terakhir yang ditampilkan)</label>
											<select name="tampilkan_semua_iterasi" class="form-control">
												<option value="<?php echo $tbl_config->tampilkan_semua_iterasi; ?>"><?php $a = array("Tidak","Ya"); echo $a[$tbl_config->tampilkan_semua_iterasi]; ?></option>
												<option value="0">Tidak</option>
												<option value="1">Ya</option>
											</select>
									</div>
									<div class="form-group">
										<label>Cluster 1 Centroid 1</label>
											<input type="number" name="centroid1_1" value="<?php echo set_value('centroid1_1', $tbl_config->centroid1_1); ?>" class="form-control" />
									</div>
									<div class="form-group">
										<label>Cluster 1 Centroid 2</label>
											<input type="number" name="centroid1_2" value="<?php echo set_value('centroid1_2', $tbl_config->centroid1_2); ?>" class="form-control" />
									</div>
									<div class="form-group">
										<label>Cluster 1 Centroid 3</label>
											<input type="number" name="centroid1_3" value="<?php echo set_value('centroid1_3', $tbl_config->centroid1_3); ?>" class="form-control" />
									</div>
									<div class="form-group">
										<label>Cluster 1 Centroid 4</label>
											<input type="number" name="centroid1_4" value="<?php echo set_value('centroid1_4', $tbl_config->centroid1_4); ?>" class="form-control" />
									</div>
									<div class="form-group">
										<label>Cluster 1 Centroid 5</label>
											<input type="number" name="centroid1_5" value="<?php echo set_value('centroid1_5', $tbl_config->centroid1_5); ?>" class="form-control" />
									</div>
									<div class="form-group">
										<label>Cluster 2 Centroid 1</label>
											<input type="number" name="centroid2_1" value="<?php echo set_value('centroid2_1', $tbl_config->centroid2_1); ?>" class="form-control" />
									</div>
									<div class="form-group">
										<label>Cluster 2 Centroid 2</label>
											<input type="number" name="centroid2_2" value="<?php echo set_value('centroid2_2', $tbl_config->centroid2_2); ?>" class="form-control" />
									</div>
									<div class="form-group">
										<label>Cluster 2 Centroid 3</label>
											<input type="number" name="centroid2_3" value="<?php echo set_value('centroid2_3', $tbl_config->centroid2_3); ?>" class="form-control" />
									</div>
									<div class="form-group">
										<label>Cluster 2 Centroid 4</label>
											<input type="number" name="centroid2_4" value="<?php echo set_value('centroid2_4', $tbl_config->centroid2_4); ?>" class="form-control" />
									</div>
									<div class="form-group">
										<label>Cluster 2 Centroid 5</label>
											<input type="number" name="centroid2_5" value="<?php echo set_value('centroid2_5', $tbl_config->centroid2_5); ?>" class="form-control" />
									</div>
									<div class="form-group">
										<input type="submit" value="Submit" class="btn btn-success">
									</div>
								</div>
					<?php echo form_close(); ?>
                        </div>
                    </div>
                </main>