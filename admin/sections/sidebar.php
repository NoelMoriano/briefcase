<!-- Sidebar -->
<ul
	class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion"
	id="accordionSidebar"
>
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center"
		href="<?=$_SESSION['userType'] == "admin" ? "index.php" : "users.php" ?>"
	>
		<div class="sidebar-brand-icon rotate-n-15">			
			<img src="../assets/images/favicon.ico" alt="Tecnicos servitec" style="width:50px">
		</div>
		<div class="sidebar-brand-text mx-3">Panel Control</div>
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
		<a class="nav-link" href="<?=$_SESSION['userType'] == "admin" ? "index.php" : "users.php" ?>">
			<i class="fas fa-fw fa-home"></i>
			<span>Inicio</span></a
		>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="users.php">
			<i class="fas fa-fw fa-users"></i>
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
			<i class="fas fa-fw fa-school"></i>
			<span>Educación</span>
		</a>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="experiences.php">
			<i class="fas fa-fw fa-user-tie"></i>
			<span>Experiencia</span></a
		>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="technical-skills.php">
			<i class="fas fa-fw fa-user-tie"></i>
			<span>Habilidades Técnicas</span></a
		>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="professional-skills.php">
			<i class="fas fa-fw fa-user-tie"></i>
			<span>Habilidades Profesionales</span></a
		>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="languages.php">
			<i class="fas fa-fw fa-language"></i>
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
