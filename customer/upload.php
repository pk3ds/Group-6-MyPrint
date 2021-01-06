<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Digital Printing Shop</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" /><!--Sets the initial zoom level when the page is first loaded by the browser-->
		<!--Include online Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="customer.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<link rel="icon" href="../img/logo.jpg" type="image/icon">
		<!--End-->
		<?php 
			$ID = $_GET['ID'];
			//Initialize the session
			 include '../include/connection-config.inc.php';
			
		?>
    </head>
    <body>
	<!--Header-->
	<?php include 'include/header.php'; ?>
	<!--End-->

	<div class="container-fluid p-5"><!--Grid positioning for container padding 5px-->
		<div class="row">
			<div class="col-md-7">
				<h2>Upload Design</h2>
				<h5>(<?php
						$sql = "SELECT `Name` FROM `product` where `ID` like '".$ID."';";
						$result = $pdo->query($sql);
						echo ($result->fetchColumn());
					?>)</h5>
				<hr class="d-block" />
				<form method="post" action="upload2.php/?ID=<?php echo $ID?>" class="shadow-sm p-2" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="job_name" class="col-sm-5 col-form-label">Job name:</label>
						<div class="col-sm-6 p-2">
							<input type="text" class="form-control" id="job_name" name="job_name" required />
						</div>
						<label for="quantity" class="col-sm-5 col-form-label">Quantity:</label>
                        <div class="col-sm-6 p-2">
                            <input type="number" class="form-control" id="quantity" min="10" value="100" name="quantity">
                        </div>
						<label for="size" class="col-sm-5 col-form-label">Size:</label>
                        <div class="col-sm-6 p-2">
                            <select class="form-control" id="size" name="size"><!--Bootstrap form style-->
                                <?php
								switch($ID){
								case '1':
									echo '<option class="active" value="Size: A4">A4</option>';
									break;
								case '2':
									echo '<option class="active" value="Size: 29.5(W)X70(H)">29.5"(W)X70"(H)</option>';
									break;
								case'3': 
									echo '<option class="active" value="Size: A4 X 3">A4 X 3</option>';
									echo '<option class="" value="Size: A4 X 4">A4 X 4</option>';
									break;
								case '4':
									echo '<option class="active" value="Size: 152mm x 210mm (Potrait)">152mm x 210mm (Potrait)</option>';
									echo '<option class="" value="Size: 210mm x 152mm (Landscape)">210mm x 152mm (Landscape)</option>';
									break;
								case '5':
									echo '<option class="active" value="Size: 89mm x 54mm">89mm x 54mm</option>';
									break;
								case '6':
									echo '<option class="selected" value="Size: 20&quot; x 30&quot;">20&quot; x 30&quot;</option>';
									break;
								}
								?>
                            </select>
                        </div>
						<?php
						if($ID != '2' and $ID !='4'){
							echo '<label for="colour" class="col-sm-5 col-form-label">Colour:</label>';
							echo '<div class="col-sm-6 p-2">';
								echo '<select class="form-control" id="colour" name="colour">';
								switch($ID) {
								case '1':
									echo '<option class="active" value="Color: Black and White">Black and White</option>';
									echo '<option class="" value="Color: Color">Color</option>';
									break;
								case '3': 
								case '5':
									echo '<option class="active" value="Color: 4C x 4C">4C x 4C</option>';
									break;
								case '6':
									echo '<option class="active" value="Color: 4C x 0C">4C x 0C</option>';
									break;
								}
								echo '</select>';
							echo '</div>';
						}
						?>
                        <label for="material" class="col-sm-5 col-form-label">Material:</label>
                        <div class="col-sm-6 p-2">
                            <select class="form-control" id="material" name="material">
                                <?php 
								switch($ID){
								case '1':
								case '3':
								case '6':
									echo '<option class="active" value="Material: 128gsm Art Paper">128gsm Art Paper</option>';
									echo '<option class="" value="Material: 157gsm Art Paper">157gsm Art Paper</option>';
									break;
								case '2':
									echo '<option class="active" value="Material: Synthetic paper">Synthetic paper</option>';
									break;
								case '4':
									echo '<option class="active" value="Material: Inlay: 210gsm Art Card">Inlay: 210gsm Art Card</option>';
									echo '<option class="" value="Material: Stand - Black Linmaster wrap into 700gsm Hard Board">Stand - Black Linmaster wrap into 700gsm Hard Board</option>';
									break;
								case '5':
									echo '<option class="active" value="Material: 260gsm Art Card">260gsm Art Card</option>';
									echo '<option class="" value="Material: 260gsm Art Card with Matt Lamination">260gsm Art Card with Matt Lamination</option>';
									echo '<option class="" value="Material: 260gsm Art Card with Matt Lamination + 1 Side Spot UV">260gsm Art Card with Matt Lamination + 1 Side Spot UV</option>';
									echo '<option class="" value="Material: 260gsm Art Card with Matt Lamination + 2 Side Spot UV">260gsm Art Card with Matt Lamination + 2 Side Spot UV</option>';
									break;
								}
								?>
                            </select>
                        </div>
						<?php
							if($ID == '4'){
								echo '<label for="sheets" class="col-sm-5 col-form-label">Sheets:</label>';
								echo '<div class="col-sm-6 p-2">';	
									echo '<select class="form-control" id="sheets" name="sheets">';
										echo '<option class="active" value="Sheets: 8 Sheets (16 pages)">8 Sheets (16 pages)</option>';
										echo '<option class="" value="Sheets: 14 Sheets (28 pages)">14 Sheets (28 pages)</option>';
									echo '</select>';
								echo '</div>';
							
								echo '<label for="stand" class="col-sm-5 col-form-label">Stand:</label>';
								echo '<div class="col-sm-6 p-2">';	
								echo '<select class="form-control" id="stand" name="stand">';
									echo '<option class="active" value="Sheets: 700gsm hard board stand - black">700gsm hard board stand - black</option>';
								echo '</select>';
								echo '</div>';
							}
			
							if($ID == '3'){
								echo '<label for="fold" class="col-sm-5 col-form-label">Fold:</label>';
								echo '<div class="col-sm-6 p-2">';
									echo '<select class="form-control" id="fold" name="Fold">';
										echo '<option class="active" value="Fold: 2 fold-3 panel ( C / Z Fold)">2 fold-3 panel ( C / Z Fold)</option>';
										echo '<option class="" value="Fold: 3 fold-4 panel ( C / Z Fold)">3 fold-4 panel ( C / Z Fold)</option>';
									echo '</select>';
								echo '</div>';
							}
						?>
						<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->
						<?php
							if($ID == '2'){
								echo '<label for="finishing" class="col-sm-5 col-form-label">Finishing:</label>';
								echo '<div class="col-sm-6 p-2">';
									echo '<select class="form-control" id="finishing" name="finishing">';
										echo '<option class="active" value="1">No</option>';
										echo '<option class="" value="Finishing: 1 side Matt lamination">1 side Matt lamination</option>';
										echo '<option class="" value="Finishing: 1 side Gloss lamination">1 side Gloss lamination</option>';
									echo '</select>';
								echo '</div>';
								echo '<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->';
								echo '<label for="print" class="col-sm-5 col-form-label">Print:</label>';
								echo '<div class="col-sm-6 p-2">';	
									echo '<select class="form-control" id="print" name="print">';
										echo '<option class="active" value="Print: 4C x 0C">4C x 0C</option>';
									echo '</select>';
								echo '</div>';
							}
						?>
                        <label for="process_day" class="col-sm-5 col-form-label">Process Day:</label>
                        <div class="col-sm-6 p-2">
                            <select class="form-control" id="process_day" name="process_day">
                                <option class="active" value="Process Day: 3 to 5 Business Day">3 to 5 Business Day</option>
                            </select>
                        </div>
						<label for="File" class="col-lg-5 col-form-label float-right">Default file:</label>
						<div class="col-sm-6 p-2">
							<input type="file" id="filename" name="filename" accept="application/pdf, image/*" required />
							<br />
						</div>
						<div class="col-lg p-2">
							<p>IMPORTANT: I have verified that spelling and contents are correct. I am satisfied with the
							document layout. I understand that my document will print exactly as it appears here. I cannot make
							any changes once my order is placed and I assume all responsibility for typographical, formatting
							and design errors.</p>
							<div class="float-right p-3">
							<input type="checkbox" class="form-check-input" id="agreement" name="agreement" required /> 
							<label class="form-check-label" for="agreement">I agree.</label></div>
						</div>
						<div class="container-fluid">
						<input type="submit" class="btn btn-primary float-right btn-sm" name="submit" id="submit"/>
						<a href="product_catalog.php?ID=<?php echo $ID;?>" class="btn btn-info btn-sm float-left" role="button">&#8592;Back</a></div>
					</div>
				</form>
				<br />
				<hr class="d-block" />
				<br />
			</div>
			<!--Right info and template tab-->
			<div class="col-md-5">
				<ul class="nav nav-pills" role="tablist">
					<?php
					if($ID != '3'){
						echo '<li class="nav-item">';
						echo '<a class="nav-link active" data-toggle="pill" href="#template">Template</a>';
						echo '</li>';
					}
					?>
				</ul>
				<hr class="d-block" />
				<div class="tab-content">
					<div id="template" class="container tab-pane active"><!--Fade effect to container-->
						<br />
						<?php
						
							if($ID != '3'){
								$sql = "SELECT `Name` FROM `product` where `ID` like '".$ID."';";
								$result = $pdo->query($sql);
								$name = ($result->fetchColumn());
								if ($handle = opendir('product/Product_Template/'.$name)) {
								while (false !== ($entry = readdir($handle))) {
									if ($entry != "." && $entry != "..") {
										echo '<img src="../img/template-icon.png" class="img-fluid" alt="Template icon"/>';
										echo '<a href="download.php?file='.$entry.'&ID='.$ID.'">'.$entry.'</a><br>';
									}
								}
								closedir($handle);
								}
							}
						?>
					</div>
				</div>
				<hr class="d-block" />
			</div>
		</div>
	</div>
	<?php include 'include/footer.html'; ?>
	</body>	
</html>