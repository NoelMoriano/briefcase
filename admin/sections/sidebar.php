<!-- Sidebar -->
<ul
	class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
	id="accordionSidebar"
>
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center"
		href="<?=$_SESSION['userType'] == "admin" ? "index.php" : "users.php" ?>"
	>
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Panel Control <sup>1</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0" />

	<!-- Nav Item - Dashboard -->
	<!--<li class="nav-item active">
		<a class="nav-link" href="index.php">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a
		>
	</li>-->

	<!-- Divider -->
	<hr class="sidebar-divider" />

	<!-- Nav Item - Charts -->
	<!--<li class="nav-item">
		<a class="nav-link" href="category.php">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Categorias</span></a
		>
	</li>-->

	<!-- Nav Item - Tables -->
	<li class="nav-item">
		<a class="nav-link" href="users.php">
			<i class="fas fa-fw fa-table"></i>
			<span><?=$_SESSION['userType'] == "admin" ? "Usuarios" : "Perfil" ?></span></a
		>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="userImages.php">
			<i class="fas fa-fw fa-image"></i>
			<span>Fotos</span>
		</a>
	</li>
	<!-- Nav Item - Educations -->
	<li class="nav-item">
		<a class="nav-link" href="educations.php">
			<i class="fas fa-fw fa-book"></i>
			<span>Educación</span>
		</a>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="experiences.php">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Experiencia</span></a
		>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="technical-skills.php">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Habilidades Técnicas</span></a
		>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="professional-skills.php">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Habilidades Profesionales</span></a
		>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="languages.php">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Lenguajes</span></a
		>
	</li>

	<!--<li class="nav-item">
		<a class="nav-link" href="educations.php">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Habilidades Técnicas</span></a
		>
	</li>-->

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block" />

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>
<!-- End of Sidebar -->
