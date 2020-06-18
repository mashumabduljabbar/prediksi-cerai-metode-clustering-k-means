<style>
.center{
	vertical-align:middle;
	text-align:center;
}
</style>
				<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Clustering</li>
                        </ol>

                                    <?php
									$tbl_dataset = $this->db->query("select
a.id_dataset,									
CASE
	WHEN a.up_dataset < 30 THEN 1
	WHEN a.up_dataset >=30 AND a.up_dataset <=40 THEN 2
	WHEN a.up_dataset > 40 THEN 3 
END as up_dataset,
CASE
	WHEN a.ut_dataset < 30 THEN 1
	WHEN a.ut_dataset >=30 AND a.ut_dataset <=40 THEN 2
	WHEN a.ut_dataset > 40 THEN 3 
END as ut_dataset,
CASE
	WHEN a.uk_dataset < 10 THEN 1
	WHEN a.uk_dataset >=10 AND a.uk_dataset <=20 THEN 2
	WHEN a.uk_dataset > 20 THEN 3 
END as uk_dataset,
a.ja_dataset,
CHAR_LENGTH(a.alasan_dataset) as alasan_dataset
from tbl_dataset a 
order by a.id_dataset ASC
LIMIT 300
")->result();
									
$centroid1_1 = 2;									
$centroid1_2 = 1;									
$centroid1_3 = 1;									
$centroid1_4 = 1;									
$centroid1_5 = 1;
					
$centroid2_1 = 3;									
$centroid2_2 = 2;									
$centroid2_3 = 2;									
$centroid2_4 = 3;									
$centroid2_5 = 1;	

$n = 0;
$no[$n] = 1;								
									?>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Normalisasi Data</div>
							<div class="card-body">
                                <div class="table-responsive">
									<table class="table table-bordered small" id="interasi<?php echo $n;?>" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Data ke-i</th>
                                                <th style="text-align:center;">UP</th>
                                                <th style="text-align:center;">UT</th>
                                                <th style="text-align:center;">UK</th>
                                                <th style="text-align:center;">JA</th>
                                                <th style="text-align:center;">Alasan</th>
                                                <th style="text-align:center;">Centroid 1</th>
                                                <th style="text-align:center;">Centroid 2</th>
                                                <th style="text-align:center;" >Cluster</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($tbl_dataset as $dataset){ ?>
											<tr>
												<td><?php echo $no[$n];?></td>
												<td><?php echo $dataset->up_dataset;?></td>
												<td><?php echo $dataset->ut_dataset;?></td>
												<td><?php echo $dataset->uk_dataset;?></td>
												<td><?php echo $dataset->ja_dataset;?></td>
												<td><?php echo $dataset->alasan_dataset;?></td>
												<td>
<?php 
$a[$n][$dataset->id_dataset] = pow(($dataset->up_dataset-$centroid1_1),2);
$b[$n][$dataset->id_dataset] = pow(($dataset->ut_dataset-$centroid1_2),2);
$c[$n][$dataset->id_dataset] = pow(($dataset->uk_dataset-$centroid1_3),2);
$d[$n][$dataset->id_dataset] = pow(($dataset->ja_dataset-$centroid1_4),2);
$e[$n][$dataset->id_dataset] = pow(($dataset->alasan_dataset-$centroid1_5),2);
$c0[$n][$dataset->id_dataset] = round(sqrt($a[$n][$dataset->id_dataset]+$b[$n][$dataset->id_dataset]+$c[$n][$dataset->id_dataset]+$d[$n][$dataset->id_dataset]+$e[$n][$dataset->id_dataset]),2);

echo $c0[$n][$dataset->id_dataset];
?>
												</td>
												<td>
<?php 
$g[$n][$dataset->id_dataset] = pow(($dataset->up_dataset-$centroid2_1),2);
$h[$n][$dataset->id_dataset] = pow(($dataset->ut_dataset-$centroid2_2),2);
$i[$n][$dataset->id_dataset] = pow(($dataset->uk_dataset-$centroid2_3),2);
$j[$n][$dataset->id_dataset] = pow(($dataset->ja_dataset-$centroid2_4),2);
$k[$n][$dataset->id_dataset] = pow(($dataset->alasan_dataset-$centroid2_5),2);
$c1[$n][$dataset->id_dataset] = round(sqrt($g[$n][$dataset->id_dataset]+$h[$n][$dataset->id_dataset]+$i[$n][$dataset->id_dataset]+$j[$n][$dataset->id_dataset]+$k[$n][$dataset->id_dataset]),2);

echo $c1[$n][$dataset->id_dataset];
?>
												</td>
												<td>
<?php 
if($c0[$n][$dataset->id_dataset]<$c1[$n][$dataset->id_dataset]){
	$clustering[$n][$dataset->id_dataset] = 0; 
}else{
	$clustering[$n][$dataset->id_dataset] = 1; 
}
echo $clustering[$n][$dataset->id_dataset];
?>
												</td>
											</tr>
										<?php $no[$n]++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

<?php 
for($x=1;$x<10; $x++){ 
?>
<!-------------------------------------------------------------------------->
<!-------------------------------------------------------------------------->
<!-------------------------------------------------------------------------->
<!-------------------------------------------------------------------------->
<?php
$n = $x;
$sum_a[$n]=0; $sum_b[$n]=0; $sum_c[$n]=0; $sum_d[$n]=0; $sum_e[$n]=0; 
$sum_g[$n]=0; $sum_h[$n]=0; $sum_i[$n]=0; $sum_j[$n]=0; $sum_k[$n]=0; 

$count_a[$n]=0; $count_b[$n]=0; $count_c[$n]=0; $count_d[$n]=0;  $count_e[$n]=0; 
$count_g[$n]=0; $count_h[$n]=0; $count_i[$n]=0; $count_j[$n]=0;  $count_k[$n]=0; 
$no[$n] = 1;								
?>	
						<div class="card mb-4" style="display:none;">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Iterasi -<?php echo $n;?></div>
							<div class="card-body">
											<table class="table table-bordered small" id="interasi<?php echo $n;?>" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th style="text-align:center; vertical-align:middle;" rowspan="2">Data ke-i</th>
														<th style="vertical-align:middle; text-align:center;" colspan="5">Cluster 0</th>
														<th style="vertical-align:middle; text-align:center;" colspan="5" >Cluster 1</th>
													</tr>
													<tr>
														<th style="text-align:center;">UP</th>
														<th style="text-align:center;">UT</th>
														<th style="text-align:center;">UK</th>
														<th style="text-align:center;">JA</th>
														<th style="text-align:center;">Alasan</th>
														<th style="text-align:center;">UP</th>
														<th style="text-align:center;">UT</th>
														<th style="text-align:center;">UK</th>
														<th style="text-align:center;">JA</th>
														<th style="text-align:center;">Alasan</th>
													</tr>
												</thead>
												<tbody>
												<?php foreach($tbl_dataset as $dataset){ ?>
													<tr>
														<td><?php echo $no[$n];?></td>
		<?php 

		if($clustering[$n-1][$dataset->id_dataset]==0){
			$a[$n][$dataset->id_dataset] = $dataset->up_dataset;
			$b[$n][$dataset->id_dataset] = $dataset->ut_dataset;
			$c[$n][$dataset->id_dataset] = $dataset->uk_dataset;
			$d[$n][$dataset->id_dataset] = $dataset->ja_dataset;
			$e[$n][$dataset->id_dataset] = $dataset->alasan_dataset;
		}else{
			$a[$n][$dataset->id_dataset] = 0;
			$b[$n][$dataset->id_dataset] = 0;
			$c[$n][$dataset->id_dataset] = 0;
			$d[$n][$dataset->id_dataset] = 0;
			$e[$n][$dataset->id_dataset] = 0;
		}


		if($clustering[$n-1][$dataset->id_dataset]==1){
			$g[$n][$dataset->id_dataset] = $dataset->up_dataset;
			$h[$n][$dataset->id_dataset] = $dataset->ut_dataset;
			$i[$n][$dataset->id_dataset] = $dataset->uk_dataset;
			$j[$n][$dataset->id_dataset] = $dataset->ja_dataset;
			$k[$n][$dataset->id_dataset] = $dataset->alasan_dataset;
		}else{
			$g[$n][$dataset->id_dataset] = 0;
			$h[$n][$dataset->id_dataset] = 0;
			$i[$n][$dataset->id_dataset] = 0;
			$j[$n][$dataset->id_dataset] = 0;
			$k[$n][$dataset->id_dataset] = 0;
		}

		$sum_a[$n]+= $a[$n][$dataset->id_dataset];
		if($a[$n][$dataset->id_dataset]){
			$count_a[$n]+= 1;
		}
		
		$sum_b[$n]+= $b[$n][$dataset->id_dataset];
		if($b[$n][$dataset->id_dataset]){
			$count_b[$n]+= 1;
		}
		
		$sum_c[$n]+= $c[$n][$dataset->id_dataset];
		if($c[$n][$dataset->id_dataset]){
			$count_c[$n]+= 1;
		}
		
		$sum_d[$n]+= $d[$n][$dataset->id_dataset];
		if($d[$n][$dataset->id_dataset]){
			$count_d[$n]+= 1;
		}
		
		$sum_e[$n]+= $e[$n][$dataset->id_dataset];
		if($e[$n][$dataset->id_dataset]){
			$count_e[$n]+= 1;
		}
		
		$sum_g[$n]+= $g[$n][$dataset->id_dataset];
		if($g[$n][$dataset->id_dataset]){
			$count_g[$n]+= 1;
		}
		
		$sum_h[$n]+= $h[$n][$dataset->id_dataset];
		if($h[$n][$dataset->id_dataset]){
			$count_h[$n]+= 1;
		}
		
		$sum_i[$n]+= $i[$n][$dataset->id_dataset];
		if($i[$n][$dataset->id_dataset]){
			$count_i[$n]+= 1;
		}
		
		$sum_j[$n]+= $j[$n][$dataset->id_dataset];
		if($j[$n][$dataset->id_dataset]){
			$count_j[$n]+= 1;
		}
		
		$sum_k[$n]+= $k[$n][$dataset->id_dataset];
		if($k[$n][$dataset->id_dataset]){
			$count_k[$n]+= 1;
		}
		?>		
															<td><?php echo $a[$n][$dataset->id_dataset];?></td>
															<td><?php echo $b[$n][$dataset->id_dataset];?></td>
															<td><?php echo $c[$n][$dataset->id_dataset];?></td>
															<td><?php echo $d[$n][$dataset->id_dataset];?></td>
															<td><?php echo $e[$n][$dataset->id_dataset];?></td>
															<td><?php echo $g[$n][$dataset->id_dataset];?></td>
															<td><?php echo $h[$n][$dataset->id_dataset];?></td>
															<td><?php echo $i[$n][$dataset->id_dataset];?></td>
															<td><?php echo $j[$n][$dataset->id_dataset];?></td>
															<td><?php echo $k[$n][$dataset->id_dataset];?></td>
													</tr>
												<?php $no[$n]++; } ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="card mb-4" style="display:none;">
									<div class="card-header"><i class="fas fa-table mr-1"></i>Iterasi -<?php echo $n;?></div>
										<div class="card-body">
											<table class="table table-bordered small" id="data<?php echo $n;?>" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th style="text-align:center;">Data ke-i</th>
														<th style="text-align:center;">Centroid 1</th>
														<th style="text-align:center;">Centroid 2</th>
														<th style="text-align:center;">Cluster</th>
													</tr>
												</thead>
												<tbody>
												<?php
$no[$n] = 1;
												foreach($tbl_dataset as $dataset){ 
$centroid1_1 = round($sum_a[$n]/$count_a[$n],2);							
$centroid1_2 = round($sum_b[$n]/$count_b[$n],2);							
$centroid1_3 = round($sum_c[$n]/$count_c[$n],2);							
$centroid1_4 = round($sum_d[$n]/$count_d[$n],2);							
$centroid1_5 = round($sum_e[$n]/$count_e[$n],2);							
$a[$n][$dataset->id_dataset] = pow(($dataset->up_dataset-$centroid1_1),2);
$b[$n][$dataset->id_dataset] = pow(($dataset->ut_dataset-$centroid1_2),2);
$c[$n][$dataset->id_dataset] = pow(($dataset->uk_dataset-$centroid1_3),2);
$d[$n][$dataset->id_dataset] = pow(($dataset->ja_dataset-$centroid1_4),2);
$e[$n][$dataset->id_dataset] = pow(($dataset->alasan_dataset-$centroid1_5),2);
$c0[$n][$dataset->id_dataset] = round(sqrt($a[$n][$dataset->id_dataset]+$b[$n][$dataset->id_dataset]+$c[$n][$dataset->id_dataset]+$d[$n][$dataset->id_dataset]+$e[$n][$dataset->id_dataset]),2);

$centroid2_1 = round($sum_g[$n]/$count_g[$n],2);							
$centroid2_2 = round($sum_h[$n]/$count_h[$n],2);							
$centroid2_3 = round($sum_i[$n]/$count_i[$n],2);							
$centroid2_4 = round($sum_j[$n]/$count_j[$n],2);							
$centroid2_5 = round($sum_k[$n]/$count_k[$n],2);
$g[$n][$dataset->id_dataset] = pow(($dataset->up_dataset-$centroid2_1),2);
$h[$n][$dataset->id_dataset] = pow(($dataset->ut_dataset-$centroid2_2),2);
$i[$n][$dataset->id_dataset] = pow(($dataset->uk_dataset-$centroid2_3),2);
$j[$n][$dataset->id_dataset] = pow(($dataset->ja_dataset-$centroid2_4),2);
$k[$n][$dataset->id_dataset] = pow(($dataset->alasan_dataset-$centroid2_5),2);
$c1[$n][$dataset->id_dataset] = round(sqrt($g[$n][$dataset->id_dataset]+$h[$n][$dataset->id_dataset]+$i[$n][$dataset->id_dataset]+$j[$n][$dataset->id_dataset]+$k[$n][$dataset->id_dataset]),2);

if($c0[$n][$dataset->id_dataset]<$c1[$n][$dataset->id_dataset]){
	$clustering[$n][$dataset->id_dataset] = 0; 
}else{
	$clustering[$n][$dataset->id_dataset] = 1; 
}							
?>
													<tr>
														<td><?php echo $no[$n];?></td>
														<td><?php echo $c0[$n][$dataset->id_dataset];?></td>
														<td><?php echo $c1[$n][$dataset->id_dataset];?></td>
														<td><?php echo $clustering[$n][$dataset->id_dataset];?></td>
													</tr>
												<?php $no[$n]++;} ?>
												</tbody>
											</table>
										</div>
									</div>
<!-------------------------------------------------------------------------->
<!-------------------------------------------------------------------------->
<!-------------------------------------------------------------------------->
<!-------------------------------------------------------------------------->
<?php 
$y = 0;
foreach($tbl_dataset as $dataset){ 
	if($clustering[$n-1][$dataset->id_dataset]!=$clustering[$n][$dataset->id_dataset]){
		$y+= 1;
	}
}
	if($y==0){
		$nilai_x_terakhir = $x;
		break;
	}
} ?>
						<div class="card mb-4">
							<div class="card-body">
								PADA ITERASI KE-<?php echo $nilai_x_terakhir-1;?> DAN KE-<?php echo $nilai_x_terakhir;?> TIDAK ADA VARIABEL YANG BERPINDAH CLUSTERNYA DAN SUDAH COCOK DENGAN PERHITUNGAN PADA RAPIDMINER 
							</div>
						</div>
<?php 
$n=$nilai_x_terakhir-1;
?>						
						<div class="card mb-4">
									<div class="card-header"><i class="fas fa-table mr-1"></i>Iterasi -<?php echo $n;?></div>
										<div class="card-body">
											<table class="table table-bordered small" id="dataakhir<?php echo $n;?>" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th style="text-align:center;">Data ke-i</th>
														<th style="text-align:center;">Centroid 1</th>
														<th style="text-align:center;">Centroid 2</th>
														<th style="text-align:center;">Cluster</th>
													</tr>
												</thead>
												<tbody>
												<?php
$no[$n] = 1;
												foreach($tbl_dataset as $dataset){ 
$centroid1_1 = round($sum_a[$n]/$count_a[$n],2);							
$centroid1_2 = round($sum_b[$n]/$count_b[$n],2);							
$centroid1_3 = round($sum_c[$n]/$count_c[$n],2);							
$centroid1_4 = round($sum_d[$n]/$count_d[$n],2);							
$centroid1_5 = round($sum_e[$n]/$count_e[$n],2);							
$a[$n][$dataset->id_dataset] = pow(($dataset->up_dataset-$centroid1_1),2);
$b[$n][$dataset->id_dataset] = pow(($dataset->ut_dataset-$centroid1_2),2);
$c[$n][$dataset->id_dataset] = pow(($dataset->uk_dataset-$centroid1_3),2);
$d[$n][$dataset->id_dataset] = pow(($dataset->ja_dataset-$centroid1_4),2);
$e[$n][$dataset->id_dataset] = pow(($dataset->alasan_dataset-$centroid1_5),2);
$c0[$n][$dataset->id_dataset] = round(sqrt($a[$n][$dataset->id_dataset]+$b[$n][$dataset->id_dataset]+$c[$n][$dataset->id_dataset]+$d[$n][$dataset->id_dataset]+$e[$n][$dataset->id_dataset]),2);

$centroid2_1 = round($sum_g[$n]/$count_g[$n],2);							
$centroid2_2 = round($sum_h[$n]/$count_h[$n],2);							
$centroid2_3 = round($sum_i[$n]/$count_i[$n],2);							
$centroid2_4 = round($sum_j[$n]/$count_j[$n],2);							
$centroid2_5 = round($sum_k[$n]/$count_k[$n],2);
$g[$n][$dataset->id_dataset] = pow(($dataset->up_dataset-$centroid2_1),2);
$h[$n][$dataset->id_dataset] = pow(($dataset->ut_dataset-$centroid2_2),2);
$i[$n][$dataset->id_dataset] = pow(($dataset->uk_dataset-$centroid2_3),2);
$j[$n][$dataset->id_dataset] = pow(($dataset->ja_dataset-$centroid2_4),2);
$k[$n][$dataset->id_dataset] = pow(($dataset->alasan_dataset-$centroid2_5),2);
$c1[$n][$dataset->id_dataset] = round(sqrt($g[$n][$dataset->id_dataset]+$h[$n][$dataset->id_dataset]+$i[$n][$dataset->id_dataset]+$j[$n][$dataset->id_dataset]+$k[$n][$dataset->id_dataset]),2);

if($c0[$n][$dataset->id_dataset]<$c1[$n][$dataset->id_dataset]){
	$clustering[$n][$dataset->id_dataset] = 0; 
}else{
	$clustering[$n][$dataset->id_dataset] = 1; 
}							
?>
													<tr>
														<td><?php echo $no[$n];?></td>
														<td><?php echo $c0[$n][$dataset->id_dataset];?></td>
														<td><?php echo $c1[$n][$dataset->id_dataset];?></td>
														<td><?php echo $clustering[$n][$dataset->id_dataset];?></td>
													</tr>
												<?php $no[$n]++;} ?>
												</tbody>
											</table>
										</div>
							</div>
<?php 
$n=$nilai_x_terakhir;
?>	
<?php echo form_open_multipart("dataset/dataset_aksi_ubah_bulk"); ?>				
						<div class="card mb-4">
									<div class="card-header"><i class="fas fa-table mr-1"></i>Iterasi -<?php echo $n;?></div>
										<div class="card-body">
											<table class="table table-bordered small" id="dataakhir<?php echo $n;?>" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th style="text-align:center;">Data ke-i</th>
														<th style="text-align:center;">Centroid 1</th>
														<th style="text-align:center;">Centroid 2</th>
														<th style="text-align:center;">Cluster</th>
													</tr>
												</thead>
												<tbody>
												<?php
$no[$n] = 1;
												foreach($tbl_dataset as $dataset){ 
$centroid1_1 = round($sum_a[$n]/$count_a[$n],2);							
$centroid1_2 = round($sum_b[$n]/$count_b[$n],2);							
$centroid1_3 = round($sum_c[$n]/$count_c[$n],2);							
$centroid1_4 = round($sum_d[$n]/$count_d[$n],2);							
$centroid1_5 = round($sum_e[$n]/$count_e[$n],2);							
$a[$n][$dataset->id_dataset] = pow(($dataset->up_dataset-$centroid1_1),2);
$b[$n][$dataset->id_dataset] = pow(($dataset->ut_dataset-$centroid1_2),2);
$c[$n][$dataset->id_dataset] = pow(($dataset->uk_dataset-$centroid1_3),2);
$d[$n][$dataset->id_dataset] = pow(($dataset->ja_dataset-$centroid1_4),2);
$e[$n][$dataset->id_dataset] = pow(($dataset->alasan_dataset-$centroid1_5),2);
$c0[$n][$dataset->id_dataset] = round(sqrt($a[$n][$dataset->id_dataset]+$b[$n][$dataset->id_dataset]+$c[$n][$dataset->id_dataset]+$d[$n][$dataset->id_dataset]+$e[$n][$dataset->id_dataset]),2);

$centroid2_1 = round($sum_g[$n]/$count_g[$n],2);							
$centroid2_2 = round($sum_h[$n]/$count_h[$n],2);							
$centroid2_3 = round($sum_i[$n]/$count_i[$n],2);							
$centroid2_4 = round($sum_j[$n]/$count_j[$n],2);							
$centroid2_5 = round($sum_k[$n]/$count_k[$n],2);
$g[$n][$dataset->id_dataset] = pow(($dataset->up_dataset-$centroid2_1),2);
$h[$n][$dataset->id_dataset] = pow(($dataset->ut_dataset-$centroid2_2),2);
$i[$n][$dataset->id_dataset] = pow(($dataset->uk_dataset-$centroid2_3),2);
$j[$n][$dataset->id_dataset] = pow(($dataset->ja_dataset-$centroid2_4),2);
$k[$n][$dataset->id_dataset] = pow(($dataset->alasan_dataset-$centroid2_5),2);
$c1[$n][$dataset->id_dataset] = round(sqrt($g[$n][$dataset->id_dataset]+$h[$n][$dataset->id_dataset]+$i[$n][$dataset->id_dataset]+$j[$n][$dataset->id_dataset]+$k[$n][$dataset->id_dataset]),2);

if($c0[$n][$dataset->id_dataset]<$c1[$n][$dataset->id_dataset]){
	$clustering[$n][$dataset->id_dataset] = 0; 
}else{
	$clustering[$n][$dataset->id_dataset] = 1; 
}							
?>
													<tr>
														<td><?php echo $no[$n];?></td>
														<td><?php echo $c0[$n][$dataset->id_dataset];?></td>
														<td><?php echo $c1[$n][$dataset->id_dataset];?></td>
														<td><?php echo $clustering[$n][$dataset->id_dataset];?>
														<input type="hidden" name="id_dataset[]" value="<?php echo $dataset->id_dataset;?>" >
														<input type="hidden" name="clustering_dataset[]" value="<?php echo $clustering[$n][$dataset->id_dataset];?>" >
														</td>
													</tr>
												<?php $no[$n]++;} ?>
												</tbody>
											</table>
										</div>
										<div class="col-md-6">
									  <div class="form-group">
										<input type="submit" onclick="return confirm('Apakah Yakin untuk Lanjut?');" value="Lihat Dataset" class="btn btn-success">
									  </div>
									</div>
							</div>
<?php echo form_close(); ?>
					</div>
                </main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
	$('#interasi0').DataTable();
	$('#interasi1').DataTable();
	$('#interasi2').DataTable();
	$('#interasi3').DataTable();
	$('#interasi4').DataTable();
	$('#interasi5').DataTable();
	$('#interasi6').DataTable();
	$('#interasi7').DataTable();
	$('#interasi8').DataTable();
	$('#interasi9').DataTable();
	$('#data1').DataTable();
	$('#data2').DataTable();
	$('#data3').DataTable();
	$('#data4').DataTable();
	$('#data5').DataTable();
	$('#data6').DataTable();
	$('#data7').DataTable();
	$('#data8').DataTable();
	$('#data9').DataTable();
	$('#dataakhir1').DataTable();
	$('#dataakhir2').DataTable();
	$('#dataakhir3').DataTable();
	$('#dataakhir4').DataTable();
	$('#dataakhir5').DataTable();
	$('#dataakhir6').DataTable();
	$('#dataakhir7').DataTable();
	$('#dataakhir8').DataTable();
	$('#dataakhir9').DataTable();
});
</script>