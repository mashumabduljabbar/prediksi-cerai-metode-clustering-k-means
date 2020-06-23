				<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dataset</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
							<label><a class="btn-sm btn-primary nav-link" style="width:160px;" href="<?php echo base_url("dataset/dataset_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah Dataset</span>
							</a></label>
							</div>
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
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
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
                                               <th>&nbsp;&nbsp;Action&nbsp;&nbsp;</th>
                                            </tr>
                                        </tfoot>
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
			"ajax": "<?php echo base_url('dataset/get_data_master_dataset/');?>" ,
			"columns": [
				{ "data": "np_dataset" },
				{ "data": "jenisdataset" },
				{ "data": "updataset" },
				{ "data": "utdataset" },
				{ "data": "ukdataset" },
				{ "data": "jadataset" },
				{ "data": "mediasi_dataset" },
				{ "data": "alasandataset" },
				{ "data": "putusan_dataset" }
			],
			"ordering": false,
			columnDefs: [
				   {
				   targets: [9],
				    data: 'id_dataset',
				   render: function ( data, type, row, meta ) { 

					var edit = "<a href='<?php echo base_url();?>dataset/dataset_ubah/"+data+"' title='Ubah'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> </button></a>";
					var hapus = "<a onclick=\"return confirm('Yakin untuk menghapus dataset ini ?')\" href='<?php echo base_url();?>dataset/dataset_aksi_hapus/"+data+"' title='Hapus'> <button type='button' class='btn btn-sm  btn-danger'><i class='fa fa-trash'></i> </button></a>";
					
					return edit +  hapus;
				   }
				},],
			});
	});
</script>