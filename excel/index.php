<!DOCTYPE html>
<?php
	include 'db.php';
?>
<html lang="en">
	<body>
				<form  action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
								<input type="file" name="file" id="file">
							<button type="submit" id="submit" name="Import" data-loading-text="Loading...">Upload</button>
	</body>
</html>
