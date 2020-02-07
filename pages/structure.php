<?php

echo rex_view::title('Struktur');

echo '
	<div class="structure-container">
		<div class="structure-content"></div>
		<div class="structure-modules">
			<div class="structure-title">Module</div>
			<div class="structure-module" data-module="1">Überschrift</div>
			<div class="structure-module" data-module="2">Text</div>
			<div class="structure-module" data-module="3">Bild</div>
			<div class="structure-module" data-module="4">2 Spalten</div>
		</div>
		<div class="structure-markups">
			<div class="structure-node" data-module="1">
				<div class="structure-node-content">
					<strong>Lorem ipsum</strong>
				</div>
			</div>
			<div class="structure-node" data-module="2">
				<div class="structure-node-content">
					<i>Lorem ipsum dolor sit amet</i>
				</div>
			</div>
			<div class="structure-node" data-module="3">
				<div class="structure-node-content">
					<img src="http://localhost/redaxo/media/redaxotag2018.jpg"/>
				</div>
			</div>
			<div class="structure-node" data-module="4">
				<div class="structure-node-content">
					<div class="row">
						<div class="col-sm-6">Spalte 1</div>
						<div class="col-sm-6">Spalte 2</div>
					</div>
				</div>
			</div>
		</div>
	</div>
';
