<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-primary navbar-dark border-bottom">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
		</li>
	</ul>

	<!-- SEARCH FORM -->
	<form class="form-inline ml-3">
		<div class="input-group input-group-sm">
			<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" />
			<div class="input-group-append">
				<button class="btn btn-navbar" type="submit">
					<i class="fa fa-search"></i>
				</button>
			</div>
		</div>
	</form>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?php echo site_url('/') ?>" class="brand-link ml-2">
		<span class="brand-text font-weight-heavy">Portal</span><span class="brand-text font-weight-light">Brigad</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<?php $active = $this->uri->segment(1); ?>
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
							 with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?php echo site_url('/') ?>" class="nav-link <?php if ($active == '') echo 'active'; ?>">
						<i class=" nav-icon fa fa-dashboard"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('zamestnavatelia/'); ?>" class="nav-link <?php if ($active == 'zamestnavatelia') echo 'active'; ?>">
						<i class="nav-icon fa fa-building"></i>
						<p>
							Zamestnávatelia
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('studenti/'); ?>" class="nav-link <?php if ($active == 'studenti') echo 'active'; ?>">
						<i class="nav-icon fa fa-user"></i>
						<p>
							Študenti
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('zrucnosti/'); ?>" class="nav-link <?php if ($active == 'zrucnosti') echo 'active'; ?>">
						<i class="nav-icon fa fa-book"></i>
						<p>
							Zručnosti
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('brigady/'); ?>" class="nav-link <?php if ($active == 'brigady') echo 'active'; ?>">
						<i class="nav-icon fa fa-briefcase"></i>
						<p>
							Brigády
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('kategorie/'); ?>" class="nav-link <?php if ($active == 'kategorie') echo 'active'; ?>">
						<i class="nav-icon fa fa-folder"></i>
						<p>
							Kategórie
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>