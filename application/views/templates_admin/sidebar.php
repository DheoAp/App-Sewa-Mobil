<div id="layoutSidenav_nav">
		<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<div class="nav">
					<div class="sb-sidenav-menu-heading">Core</div>
					<a class="nav-link" href="index.html">
						<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
						Dashboard
					</a>
					<div class="sb-sidenav-menu-heading">Informasi</div>
					<a class="nav-link" href="<?= base_url('admin/data_mobil');?>">
						<div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
						Data Mobil
					</a>
					<a class="nav-link" href="<?= base_url('admin/data_type');?>">
						<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
						Data Type
					</a>
					<a class="nav-link" href="<?= base_url('admin/data_customer');?>">
						<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
						Data Customer
					</a>
					<a class="nav-link" href="<?= base_url('admin/transaksi');?>">
						<div class="sb-nav-link-icon"><i class="fas fa-random"></i></div>
						Transaksi
					</a>
					<a class="nav-link" href="<?= base_url('admin/laporan');?>">
						<div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
						Laporan
					</a>
				</div>
			</div>
			<div class="sb-sidenav-footer">
				<div class="small">Logged in as:</div>
				<?= $this->session->userdata('nama');?>
			</div>
		</nav>
	</div>