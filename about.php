		<?php include 'php/head.html'; ?>
	<body>

		<!-- Wrapper -->
			<div id="wrapper" class="divided">

				<!-- Banner -->
					<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="content">
                          
		<?php include 'php/name.html'; ?>
							<p>This website is designed to provide an interace to access information for clients, workers, and students.</p>
                            <p>Feel free to donate bitcoin to help with the continued development of this site:<br><br> bc1qseeemj4wqzpp37xj9kefv6y8nkep2jma8pah88</p>
                            <?php include("pageviews.php"); ?>
							<p><a href="sitemap.php" class="button big wide smooth-scroll-middle">Site Map</a></p>
                             
						<p>
							<a href="index.php" class="button big wide smooth-scroll-middle" onclick="goBack()">Back</a>
                        </p>
<script>
function goBack() {
    window.history.back();
}
</script>
						</div>
					</section>







	</body>
</html>
