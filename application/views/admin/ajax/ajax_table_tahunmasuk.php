<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_tambah_tahun"> <i class="icon-plus-circle2"></i> Tambah Tahun</button>
	<a type="button" class="btn btn-warning btn-xs"><i class="icon-printer2"></i> Print</a>
</div>
<table class="table table-bodered table striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Tahun Masuk</th>
			<th>Keterangan</th>
			<th>Aktif</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no='1';
		foreach($query->result() as $row) { ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row->tahunmasuk; ?></td>
			<td><?php echo $row->keterangan; ?></td>
			<td>
				<div class="radio">
					<label>
						<input type="radio" class="styled" name="inputAktif" id="inputAktif" value="1" <?php echo ($row->aktif=='1' ? "checked" : "");?> >
						<input type="hidden" name="inputLembaga" id="inputLembaga" value="<?php echo $carilembaga; ?>">
					</label>
				</div>

				<!--AJAX AKTIF-->
				<script type="text/javascript"> 
					$(document).ready(function(){ 
						$("#inputAktif").change(function(){ 
							var aktif = $("#inputAktif").val();
							var lembaga = $("#inputLembaga").val();  
							$.ajax({ 
								type	: 'GET', 
								url	: "<?php echo base_url().'admin/do_aktiftahun/'.$row->idtahunmasuk; ?>", 
								data	: "aktif="+aktif+"&lembaga="+lembaga, 
								cache	: false,
								success	: function(data){ 
									location.reload();
								} 
							}); 
						}); 
					});

					$(document).on('click','.inputAktif',function()
					{ 
						var aktif = ($(this).hasClass("btn-success")) ? '0' : '1'; 
						var msg = (aktif=='0')? 'Deactivate' : 'Activate'; 
						if(confirm("Are you sure to "+ msg))
						{ 
							var current_element = $(this); 
							var id = $(current_element).attr('data');
							url = "<?php echo base_url().'admin/do_aktiftahun/'.$row->idtahunmasuk; ?>"; 
							$.ajax({
								type:"GET",
								url: url, 
								data: {"id":id,"aktif":aktif}, 
								success: function(data) { 
									location.reload();
								} });
						}  
					});
				</script>
			</td>
			<td>
				<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update_tahun<?php echo $row->idtahunmasuk; ?>"> <i class="icon-pencil"></i></button>
				<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus_tahun<?php echo $row->idtahunmasuk; ?>"> <i class="icon-trash"></i></button>
				<!-- Modal Update Tahun -->
				<div id="update_tahun<?php echo $row->idtahunmasuk; ?>" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h6 class="modal-title">Update Tahun Masuk</h6>
							</div>
							<form class="form-horizontal" action="<?php echo base_url().'admin/do_updatetahun/'.$row->idtahunmasuk; ?>" method="POST">
								<div class="modal-body">
									<div class="form-group">
										<div class="col-lg-2"></div>
										<label class="control-label col-lg-2">Lembaga <span style="color: red">*</span></label>
										<div class="col-lg-6">
											<input type="text" class="form-control" name="inputLembaga" value="<?php echo $carilembaga; ?>" readonly required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-2"></div>
										<label class="control-label col-lg-2">Tahun Masuk <span style="color: red">*</span></label>
										<div class="col-lg-6">
											<input type="text" class="form-control" name="inputTahunMasuk" value="<?php echo $row->tahunmasuk; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-2"></div>
										<label class="control-label col-lg-2">Keterangan</label>
										<div class="col-lg-6">
											<textarea class="form-control" name="inputKeterangan"><?php echo $row->keterangan; ?></textarea>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Modal Update Tahun -->
				<!-- Modal Hapus-->
				<div id="hapus_tahun<?php echo $row->idtahunmasuk; ?>" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-danger">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Hapus Data Tahun Masuk</h4>
							</div>
							<div class="modal-body">
								<h5 class="text-semibold mt-5">Apakah Anda yakin ingin menghapus Tahun Masuk <?php echo $row->tahunmasuk; ?> ?</h5>
							</div>
							<div class="modal-footer">
								<a type="button" class="btn bg-danger-400" href="<?php echo base_url().'admin/do_hapustahun/'.$row->idtahunmasuk; ?>">Ya</a>
								<button type="button" class="btn btn-link" data-dismiss="modal">Tidak</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Modal Hapus-->
			</td>
		</tr>
		<?php $no++; }?>
	</tbody>

</table>

<!-- Modal Tambah Tahun -->
<div id="modal_tambah_tahun" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Tambah Tahun Masuk</h6>
			</div>
			<form class="form-horizontal" action="<?php echo base_url(); ?>admin/do_tambahtahun" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<div class="col-lg-2"></div>
						<label class="control-label col-lg-2">Lembaga <span style="color: red">*</span></label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="inputLembaga" value="<?php echo $carilembaga; ?>" readonly required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-2"></div>
						<label class="control-label col-lg-2">Tahun Masuk <span style="color: red">*</span></label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="inputTahunMasuk" value="" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-2"></div>
						<label class="control-label col-lg-2">Keterangan</label>
						<div class="col-lg-6">
							<textarea class="form-control" name="inputKeterangan" value=""></textarea>
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Modal Tambah Tahun -->

