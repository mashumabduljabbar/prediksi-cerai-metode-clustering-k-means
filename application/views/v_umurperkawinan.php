				<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Umur Perkawinan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
							<label><a class="btn-sm btn-primary nav-link" style="width:220px;" href="<?php echo base_url("umurperkawinan/umurperkawinan_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah Umur Perkawinan</span>
							</a></label>
							</div>
							<div class="card-body">
                                <div class="table-responsive">
                                    
									<table class="table table-bordered" id="dataUmurPerkawinan" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Kode<i style="color:white;">_</i>Umur Perkawinan</th>
                                                <th>Nilai</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Kode Umur Perkawinan</th>
                                               <th>Nilai</th>
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
$('#dataUmurPerkawinan').DataTable({
			"ajax": "<?php echo base_url('umurperkawinan/get_data_master_umurperkawinan/');?>" ,
			"columns": [
				{ "data": "kd_umurperkawinan" },
				{ "data": "nilai_umurperkawinan" }
			],
			columnDefs: [
				   {
				   targets: [2],
				    data: 'id_umurperkawinan',
				   render: function ( data, type, row, meta ) { 

					var edit = "<a href='<?php echo base_url();?>umurperkawinan/umurperkawinan_ubah/"+data+"' title='Ubah'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> </button></a>";
					var hapus = "<a onclick=\"return confirm('Yakin untuk menghapus umurperkawinan ini ?')\" href='<?php echo base_url();?>umurperkawinan/umurperkawinan_aksi_hapus/"+data+"' title='Hapus'> <button type='button' class='btn btn-sm  btn-danger'><i class='fa fa-trash'></i> </button></a>";
					
					return edit +  hapus;
				   }
				},],
			});
	});
</script>