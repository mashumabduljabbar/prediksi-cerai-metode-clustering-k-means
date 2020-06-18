				<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dataset Clustering</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    
									<table class="table table-bordered" id="dataDataset" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NP</th>
                                                <th>Jenis</th>
                                                <th>UP</th>
                                                <th>UT</th>
                                                <th>UK</th>
                                                <th>JA</th>
                                                <th>Mediasi</th>
                                                <th>Alasan</th>
                                                <th>Putusan</th>
                                                <th>Clustering</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
$('#dataDataset').DataTable({
			"ajax": "<?php echo base_url('dataset/get_data_master_dataset_clustering/');?>" ,
			"ordering": false,
			"columns": [
				{ "data": "np_dataset" },
				{ "data": "jenisdataset" },
				{ "data": "updataset" },
				{ "data": "utdataset" },
				{ "data": "ukdataset" },
				{ "data": "jadataset" },
				{ "data": "mediasi_dataset" },
				{ "data": "alasandataset" },
				{ "data": "putusan_dataset" },
				{ "data": "clustering_dataset" }
			],
			});
	});
</script>