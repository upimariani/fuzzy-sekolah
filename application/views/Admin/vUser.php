<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Informasi User</h4>
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
								Tambah Data User
							</button>
						</p>
						<div class="table-responsive">
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th>
											Nama User
										</th>
										<th>
											Alamat
										</th>
										<th>
											No Telepon
										</th>
										<th>
											Username
										</th>
										<th>
											Password
										</th>
										<th>
											Level User
										</th>
										<th>

										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($user as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_user ?></td>
											<td><?= $value->alamat ?></td>
											<td><?= $value->no_hp ?></td>
											<td><?= $value->username ?></td>
											<td><?= $value->password ?></td>
											<td><?php
												if ($value->level_user == '1') {
												?>
													<span class="badge badge-success">Admin</span>
												<?php
												} else if ($value->level_user == '2') {
												?>
													<span class="badge badge-warning">Prodi</span>
												<?php
												} else if ($value->level_user == '3') {
												?>
													<span class="badge badge-info">Kepala Sekolah</span>
												<?php
												}
												?>
											</td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" data-toggle="modal" data-target="#edit<?= $value->id_user ?>">Edit</a>
														<a href="<?= base_url('Admin/cUser/delete/' . $value->id_user) ?>" class="dropdown-item">Delete</a>
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
				<form action="<?= base_url('Admin/cUser/create') ?>" method="POST" class="forms-sample">
					<div class="modal-body">
						<div class="card">
							<div class="card-body">

								<div class="form-group">
									<label for="exampleInputUsername1">Nama User</label>
									<input type="text" name="nama" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nama User" required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Alamat</label>
									<input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat" required>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">No Telepon</label>
									<input type="number" name="no_hp" class="form-control" id="exampleInputPassword1" placeholder="Masukkan No Telepon" required>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Username</label>
											<input type="text" name="username" class="form-control" id="exampleInputConfirmPassword1" placeholder="Masukkan Username" required>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Password</label>
											<input type="text" name="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Masukkan Password" required>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputConfirmPassword1">Level User</label>
									<select name="level" class="form-control" required>
										<option value="">---Pilih Level User---</option>
										<option value="1">Admin</option>
										<option value="2">Prodi</option>
										<option value="3">Kepala Sekolah</option>
									</select>
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
	foreach ($user as $key => $value) {
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
					<form action="<?= base_url('Admin/cUser/update/' . $value->id_user) ?>" method="POST" class="forms-sample">
						<div class="modal-body">
							<div class="card">
								<div class="card-body">

									<div class="form-group">
										<label for="exampleInputUsername1">Nama User</label>
										<input type="text" name="nama" value="<?= $value->nama_user ?>" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nama User" required>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Alamat</label>
										<input type="text" name="alamat" value="<?= $value->alamat ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat" required>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">No Telepon</label>
										<input type="number" name="no_hp" value="<?= $value->no_hp ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan No Telepon" required>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputConfirmPassword1">Username</label>
												<input type="text" name="username" value="<?= $value->username ?>" class="form-control" id="exampleInputConfirmPassword1" placeholder="Masukkan Username" required>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputConfirmPassword1">Password</label>
												<input type="text" name="password" value="<?= $value->password ?>" class="form-control" id="exampleInputConfirmPassword1" placeholder="Masukkan Password" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Level User</label>
										<select name="level" class="form-control" required>
											<option value="">---Pilih Level User---</option>
											<option value="1" <?php if ($value->level_user == '1') {
																	echo 'selected';
																} ?>>Admin</option>
											<option value="2" <?php if ($value->level_user == '2') {
																	echo 'selected';
																} ?>>Prodi</option>
											<option value="3" <?php if ($value->level_user == '3') {
																	echo 'selected';
																} ?>>Kepala Sekolah</option>
										</select>
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
