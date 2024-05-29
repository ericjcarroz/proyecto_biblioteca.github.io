<?php

if (empty($_SESSION['active'])) {
	header('location: ../index.php');
}

?>

<?php include 'styles.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white shadow-ec-1 py-1 border-bottom border-1 border-ec-1 rounded-bottom" id="">
	<div class="container-fluid">
		<div class="">
			<div class="row">
				<div class="col">
					
					<a class="navbar-brand text-uppercase fs-5 fw-bold afacad" href="dashboard.php" id="">
						Biblioteca Virtual 
					<em class="fw-normal text-uppercase fs-6 marco-carroz">Marco Antonio Carroz</em>
					</a>
				</div>
			</div>
			
		</div>
		<span class="" id=""></span>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<div class="d-grid gap-2 d-md-flex justify-content-md-end">
						<a href="../config/salir.php" class="text-decoration-none text-light" id="">
							<button type="submit" class="btn btn-outline-dark px-4 border border-secondary rounded-1 fst-normal fw-bold roboto-black-italic" id="btn-salir">
							Salir </button>
							
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../js/menu-lateral.js"></script>
