<!DOCTYPE html>
<html>
	<?php include 'head.php';?>
	<script src="http://users.sussex.ac.uk/~lj234/mobile3dapp/part_2/assets/js/readyGallery.js"></script>
	<script src="http://users.sussex.ac.uk/~lj234/mobile3dapp/part_2/assets/js/interaction.js"></script>
	<body>
		<?php include 'nav.php';?>
		<section class="section">
			<div class="container is-fluid">
				<div class="columns">
					<div class="column is-one-fifth">
						<aside class="menu">
							<p class="menu-label">Actions</p>
							<ul class="menu-list">
								<li><a href="#spin" onclick="spin()">Spin</a></li>
								<li><a href="#wireframe" onclick="wireframe()">Wireframe</a></li>
								<li><a href="#lighting" onclick="lighting()">Lighting</a></li>
								<li><a href="#cam1" onclick="cam1()">Camera</a></li>
								<li><a href="#cam2" onclick="cam2()">Camera<sup>2</sup></a></li>
							</ul>
						</aside>
					</div>

					<div class="column">
						<x3d showStat="false" id="model">
							<scene>
								<inline id="x3domUrl" url="#" nameSpaceName="model" mapDEFToID="true"> </inline>
							</scene>
						</x3d>
					</div>

					<div class="column is-one-fifth">
						<h3 class="title is-3">Description</h3>

						<b>Name</b>
						<p id="json-name"></p>

						<b>Place of Origin</b>
						<p id="json-origin"></p>

						<b>Materials</b>
						<p id="json-materials"></p>

						<b>Manufacture By</b>
						<p id="json-manufacturer"></p>

						<b>Production Date</b>
						<p id="json-production-date"></p>

						<b>Description</b>
						<p id="json-description"></p>

						<p style="font-size: 12px; margin-top: 1rem; color: gray;">There is audio with all models.</p>
					</div>
				</div>

				<h4 class="title is-3">Other Museum Models</h4>
				<div class="container columns">
					<?php
						for ($i = 0; $i <= 3; $i++) { 
							echo '<div class="column">'.
								'<figure style="cursor: pointer" class="image is-16by9">'.
								'<img id="model'.$i.'" src="#" alt="">'.
								'</figure>'.
								'</div>';
						}
					?>
				</div>
			</div>
		</section>
	</body>
</html>
