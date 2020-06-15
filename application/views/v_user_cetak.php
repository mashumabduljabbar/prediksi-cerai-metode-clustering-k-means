<style>
.laporan{
	width: 100%;
	border: 1px solid black;
	border-collapse: collapse;
}

th,td
{
    font-family: arial;
    font-size: 8pt;
	padding: 5px;
}
</style>
<table width="100%" style="border-bottom:1px solid #9966cc;">
<tr>
	<td style="text-align:left; padding:10px;">
		<img src="<?php echo base_url("assets/header.jpg"); ?>" width="45%">
	</td>
</tr>
</table>
<h4 style="text-align:center;">LAPORAN DATA USER</h4>
<table width="100%" border="1" class="laporan">
	<thead>
		<tr>
			<th>Level</th>
			<th>Nama User</th>
			<th>Username</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		$query = $this->db->query("select * from tbl_user order by nm_user ASC");
		
		if($query->num_rows()>0){
			foreach($query->result() as $data){
		
		echo "
		<tr>
			<td>$data->lv_user</td>
			<td>$data->nm_user</td>
			<td>$data->username</td>
		</tr>";
			 }
		}
		?>
	</tbody>
</table>