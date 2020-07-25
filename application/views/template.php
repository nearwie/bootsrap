<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php'; ?>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php include 'templates/sidebar.php'; ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php include 'templates/topbar.php'; ?>
				<!-- End of Topbar -->

				<?php echo $contents; ?>

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<?php include 'templates/footer.php'; ?>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
  </script>
	<?php $this->layout->get_js(); ?>
</body>
</html>