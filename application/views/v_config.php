			<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Configuration <?php if($this->uri->segment(3)=="1"){ ?>
						<font style="color:green; font-style:italic">Sukses</font>
						<?php } ?></li>
                        </ol>
							 <?php echo form_open_multipart("config/config_aksi_ubah"); ?>
								<div class="box-body">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Dataset Awal</label>
													<input type="number" name="dataset_awal" value="<?php echo set_value('dataset_awal', $tbl_config->dataset_awal); ?>" class="form-control" />
											</div>
											<div class="form-group">
												<label>Dataset Akhir</label>
													<input type="number" name="dataset_akhir" value="<?php echo set_value('dataset_akhir', $tbl_config->dataset_akhir); ?>" class="form-control" />
											</div>
											<div class="form-group">
												<label>Tampilkan Semua Iterasi (Jika tidak maka hanya 2 iterasi terakhir yang ditampilkan)</label>
													<select name="tampilkan_semua_iterasi" class="form-control">
														<option value="<?php echo $tbl_config->tampilkan_semua_iterasi; ?>"><?php $a = array("Tidak","Ya"); echo $a[$tbl_config->tampilkan_semua_iterasi]; ?></option>
														<option value="0">Tidak</option>
														<option value="1">Ya</option>
													</select>
											</div>
										</div>
										<div class="col-md-4">								
											<div class="form-group">
												<label>Cluster 0 Centroid UP</label>
													<input type="number" name="centroid1_1" value="<?php echo set_value('centroid1_1', $tbl_config->centroid1_1); ?>" class="form-control" />
											</div>
											<div class="form-group">
												<label>Cluster 0 Centroid UT</label>
													<input type="number" name="centroid1_2" value="<?php echo set_value('centroid1_2', $tbl_config->centroid1_2); ?>" class="form-control" />
											</div>
											<div class="form-group">
												<label>Cluster 0 Centroid UK</label>
													<input type="number" name="centroid1_3" value="<?php echo set_value('centroid1_3', $tbl_config->centroid1_3); ?>" class="form-control" />
											</div>
											<div class="form-group">
												<label>Cluster 0 Centroid JA</label>
													<input type="number" name="centroid1_4" value="<?php echo set_value('centroid1_4', $tbl_config->centroid1_4); ?>" class="form-control" />
											</div>
											<div class="form-group">
												<label>Cluster 0 Centroid Alasan</label>
													<input type="number" name="centroid1_5" value="<?php echo set_value('centroid1_5', $tbl_config->centroid1_5); ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-4">	
											<div class="form-group">
												<label>Cluster 1 Centroid UP</label>
													<input type="number" name="centroid2_1" value="<?php echo set_value('centroid2_1', $tbl_config->centroid2_1); ?>" class="form-control" />
											</div>
											<div class="form-group">
												<label>Cluster 1 Centroid UT</label>
													<input type="number" name="centroid2_2" value="<?php echo set_value('centroid2_2', $tbl_config->centroid2_2); ?>" class="form-control" />
											</div>
											<div class="form-group">
												<label>Cluster 1 Centroid UK</label>
													<input type="number" name="centroid2_3" value="<?php echo set_value('centroid2_3', $tbl_config->centroid2_3); ?>" class="form-control" />
											</div>
											<div class="form-group">
												<label>Cluster 1 Centroid JA</label>
													<input type="number" name="centroid2_4" value="<?php echo set_value('centroid2_4', $tbl_config->centroid2_4); ?>" class="form-control" />
											</div>
											<div class="form-group">
												<label>Cluster 1 Centroid Alasan</label>
													<input type="number" name="centroid2_5" value="<?php echo set_value('centroid2_5', $tbl_config->centroid2_5); ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-12">	
											<div class="col-md-6">	
												<div class="form-group">
													<input type="submit" value="Submit" class="btn btn-success">
												</div>
											</div>
										</div>
									</div>
								</div>
					<?php echo form_close(); ?>
                    </div>
                </main>