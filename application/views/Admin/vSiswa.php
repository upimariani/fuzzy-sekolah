<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Informasi Siswa</h4>
						<?php
						if ($this->session->userdata('success')) {
						?>
							<div class="alert alert-success" role="alert">
								<?= $this->session->userdata('success') ?>
							</div>
						<?php
						}
						?>
						<p class="card-description">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								Tambah Data Siswa
							</button>
						</p>
						<div class="table-responsive">
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th>
											Nama Siswa
										</th>
										<th>
											Jenis Kelamin
										</th>
										<th>
											Kelas
										</th>
										<th>
											Angkatan
										</th>
										<th>
											Alamat
										</th>
										<th>

										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($siswa as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_siswa ?></td>
											<td><?= $value->jk ?></td>
											<td><?= $value->kelas ?></td>
											<td><?= $value->angkatan ?></td>
											<td><?= $value->alamat ?></td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" data-toggle="modal" data-target="#edit<?= $value->id_siswa ?>">Edit</a>
														<a href="<?= base_url('Admin/cSiswa/delete/' . $value->id_siswa) ?>" class="dropdown-item">Delete</a>
													</div>
												</div>
											</td>
										</tr>
									<?php
									}
									?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
	<!-- Modal -->
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('Admin/cSiswa/create') ?>" method="POST" class="forms-sample">
					<div class="modal-body">
						<div class="card">
							<div class="card-body">

								<div class="form-group">
									<label for="exampleInputUsername1">Nama Siswa</label>
									<input type="text" name="nama" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nama Siswa" required>
								</div>
								<div class="form-group">
									<label for="exampleInputConfirmPassword1">Jenis Kelamin</label>
									<select name="jk" class="form-control" required>
										<option value="">---Pilih Jenis Kelamin---</option>
										<option value="Perempuan">Perempuan</option>
										<option value="Laki - Laki">Laki - Laki</option>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Kelas</label>
									<input type="text" name="kelas" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Kelas" required>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Angkatan</label>
									<input type="text" name="angkatan" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Angkatan" required>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Alamat</label>
									<input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Alamat" required>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php
	foreach ($siswa as $key => $value) {
	?>
		<div class="modal fade" id="edit<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= base_url('Admin/cSiswa/update/' . $value->id_user) ?>" method="POST" class="forms-sample">
						<div class="modal-body">
							<div class="card">
								<div class="card-body">

									<div class="form-group">
										<label for="exampleInputUsername1">Nama Siswa</label>
										<input type="text" name="nama" value="<?= $value->nama_siswa ?>" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nama Siswa" required>
									</div>
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Jenis Kelamin</label>
										<select name="jk" class="form-control" required>
											<option value="">---Pilih Jenis Kelamin---</option>
											<option value="Perempuan" <?php if ($value->jk == 'Perempuan') {
																			echo 'selected';
																		} ?>>Perempuan</option>
											<option value="Laki - Laki" <?php if ($value->jk == 'Laki - Laki') {
																			echo 'selected';
																		} ?>>Laki - Laki</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kelas</label>
										<input type="text" name="kelas" value="<?= $value->kelas ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Kelas" required>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Angkatan</label>
										<input type="text" name="angkatan" value="<?= $value->angkatan ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Angkatan" required>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Alamat</label>
										<input type="text" name="alamat" value="<?= $value->alamat ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Alamat" required>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php
	}
	?>
