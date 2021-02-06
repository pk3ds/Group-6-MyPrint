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
		<?php 
			$ID = $_GET['ID'];
			// Initialize the session
			include '../include/connection-config.inc.php';
			
		?>
		<!--End-->
    </head>
    <body>
        <?php include 'include/header.php'; ?>
		<!--End-->
        <!--Content-->
        <div class="container-fluid p-5"><!--Fluid Grid container for positioning-->
            <div class="row">
                <!--Left-aligned Product Navigation-->
                <?php include 'include/catalog-nav.inc.php'; //Include the header.?>
				<!--End-->
                <!--Center-aligned Product Details-->
				<div class="col-md-5">
				<h2>
					<?php
						$sql = "SELECT `Name` FROM `product` where `ID` like '".$ID."';"; //Display Name o product
						$result = $pdo->query($sql);
						echo ($result->fetchColumn());
					?>
				</h2>
				<h5>
					<?php
						$sql = "SELECT `Catchphrase` FROM `product` where `ID` like '".$ID."';"; //D
						$result = $pdo->query($sql);
						echo ($result->fetchColumn());
					?>
				</h5>
				<figure class="mt-5">
					<img src="../img/
					<?php 
						$sql = "SELECT `Name` FROM `product` where `ID` like '".$ID."';";
						$result = $pdo->query($sql);
						echo ($result->fetchColumn());
					?>
						.jpg" class="img-fluid w-50 mx-auto d-block" alt="Poster 1" />
					<figcaption>
						<p>
							<span class="d-flex justify-content-center">
								<i>Example of 
								<?php 
									$sql = "SELECT `Name` FROM `product` where `ID` like '".$ID."';";
									$result = $pdo->query($sql);
									echo ($result->fetchColumn());
								?>
								</i>
							</span>
						</p>
					</figcaption>
				</figure>
				<br />
				<ul class="nav nav-pills" role="tablist"><!--Dynamic tab-->
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#description">Description</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="pill" href="#pricing">Pricing</a>
					</li>
					<?php
					if($ID != '3'){
						echo '<li class="nav-item">';
						echo '<a class="nav-link" data-toggle="pill" href="#template">Template</a>';
						echo '</li>';
					}
					?>
				</ul>
				<hr class="d-block" />
				<?php
					
					$sql = "SELECT `Details` FROM `product` WHERE `ID` like '".$ID."';";
					$result = $pdo->query($sql);
					echo ($result->fetchColumn());
				?>
				<div id="template" class="container tab-pane fade"><!--Fade effect to container-->
                            <br />
				<?php
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
					?>
					</div>
                    </div>
                    <hr class="d-block"/><!--Visible to all-->'
                </div>
                <!--Right-aligned Price Calculator and Upload file-->
                <div class="col-md-4">
                    <h3>Price Calculator</h3>
                    <form >
                    <div class="form-group row"><!--Form container-->
                        <label for="size" class="col-sm-5 col-form-label">Size:</label>
                        <div class="col-sm-7 p-1">
                            <select class="form-control" id="size" name="size"><!--Bootstrap form style-->
                                <?php
								switch($ID){
								case '1':
									echo '<option class="active" value="1">A4</option>';
									break;
								case '2':
									echo '<option class="active" value="1">29.5"(W)X70"(H)</option>';
									break;
								case'3': 
									echo '<option class="active" value="1">A4 X 3</option>';
									echo '<option class="" value="2">A4 X 4</option>';
									break;
								case '4':
									echo '<option class="active" value="1">152mm x 210mm (Potrait)</option>';
									echo '<option class="" value="2">210mm x 152mm (Landscape)</option>';
									break;
								case '5':
									echo '<option class="active" value="1">89mm x 54mm</option>';
									break;
								case '6':
									echo '<option class="selected" value="1">20&quot; x 30&quot;</option>';
									break;
								}
								?>
                            </select>
                        </div>
						<?php
						if($ID != '2' and $ID !='4'){
							echo '<label for="colour" class="col-sm-5 col-form-label">Colour:</label>';
							echo '<div class="col-sm-7 p-1">';
								echo '<select class="form-control" id="colour" name="colour">';
								switch($ID) {
								case '1':
									echo '<option class="active" value="1">Black and White</option>';
									echo '<option class="" value="2">Color</option>';
									break;
								case '3': 
								case '5':
									echo '<option class="active" value="1">4C x 4C</option>';
									break;
								case '6':
									echo '<option class="active" value="1">4C x 0C</option>';
									break;
								}
								echo '</select>';
							echo '</div>';
						}
						?>
                        
                        <label for="quantity" class="col-sm-5 col-form-label">Quantity:</label>
                        <div class="col-sm-7 p-1">
                            <input type="number" class="form-control" id="quantity" min="10" value="100">
                        </div>
                        <label for="material" class="col-sm-5 col-form-label">Material:</label>
                        <div class="col-sm-7 p-1">
                            <select class="form-control" id="material" name="material">
                                <?php 
								switch($ID){
								case '1':
								case '3':
								case '6':
									echo '<option class="active" value="1">128gsm Art Paper</option>';
									echo '<option class="" value="2">157gsm Art Paper</option>';
									break;
								case '2':
									echo '<option class="active" value="1">Synthetic paper</option>';
									break;
								case '4':
									echo '<option class="active" value="1">Inlay: 210gsm Art Card</option>';
									echo '<option class="" value="2">Stand - Black Linmaster wrap into 700gsm Hard Board</option>';
									break;
								case '5':
									echo '<option class="active" value="1">260gsm Art Card</option>';
									echo '<option class="" value="2">260gsm Art Card with Matt Lamination</option>';
									echo '<option class="" value="3">260gsm Art Card with Matt Lamination + 1 Side Spot UV</option>';
									echo '<option class="" value="4">260gsm Art Card with Matt Lamination + 2 Side Spot UV</option>';
									break;
								}
								?>
                            </select>
                        </div>
						<?php
							if($ID == '4'){
								echo '<label for="sheets" class="col-sm-5 col-form-label">Sheets:</label>';
								echo '<div class="col-sm-7 p-1">';	
									echo '<select class="form-control" id="sheets">';
										echo '<option class="active" value="1">8 Sheets (16 pages)</option>';
										echo '<option class="" value="2">14 Sheets (28 pages)</option>';
									echo '</select>';
								echo '</div>';
							
								echo '<label for="stand" class="col-sm-5 col-form-label">Stand:</label>';
								echo '<div class="col-sm-7 p-1">';	
								echo '<select class="form-control" id="stand">';
									echo '<option class="active" value="1">700gsm hard board stand - black</option>';
								echo '</select>';
								echo '</div>';
							}
			
							if($ID == '3'){
								echo '<label for="fold" class="col-sm-5 col-form-label">Fold:</label>';
								echo '<div class="col-sm-7 p-1">';
									echo '<select class="form-control" id="fold" name="Fold">';
										echo '<option class="active" value="1">2 fold-3 panel ( C / Z Fold)</option>';
										echo '<option class="" value="2">3 fold-4 panel ( C / Z Fold)</option>';
									echo '</select>';
								echo '</div>';
							}
						?>
						<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->
						<?php
							if($ID == '2'){
								echo '<label for="finishing" class="col-sm-5 col-form-label">Finishing:</label>';
								echo '<div class="col-sm-7 p-1">';
									echo '<select class="form-control" id="finishing">';
										echo '<option class="active" value="1">No</option>';
										echo '<option class="" value="2">1 side Matt lamination</option>';
										echo '<option class="" value="3">1 side Gloss lamination</option>';
									echo '</select>';
								echo '</div>';
								echo '<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->';
								echo '<label for="print" class="col-sm-5 col-form-label">Print:</label>';
								echo '<div class="col-sm-7 p-1">';	
									echo '<select class="form-control" id="print">';
										echo '<option class="active" value="1">4C x 0C</option>';
									echo '</select>';
								echo '</div>';
							}
						?>
                        <label for="process_day" class="col-sm-5 col-form-label">Process Day:</label>
                        <div class="col-sm-7 p-1">
                            <select class="form-control" id="process_day" name="process_day">
                                <option class="active" value="1">3 to 5 Business Day</option>
                            </select>
                        </div>
                    </div>
                    <span class="text-info font-weight-bolder">Total:</span> 
                    <script><!--
					function priceCalculator() {
						
						var total = 0.00;
						
						switch("<?php echo $ID;?>"){
							case '1':
								var e = document.getElementById("colour");
								var colour = parseInt(e.options[e.selectedIndex].value);
								var quantity = parseInt(document.getElementById("quantity").value);//get the value with specific id
								e = document.getElementById("material");
								var material = parseInt(e.options[e.selectedIndex].value);
								if(colour==1) {
									if(quantity<=100)
										total = quantity * 0.20;
									if((quantity>100) && (quantity<=300))
										total = quantity * 0.15;
									if(quantity>300)
										total = quantity * 0.10;
								}
								if(colour==2) {
									if(quantity<=100)
										total = quantity * 1.00;
									if(quantity>100 && quantity<=300)
										total = quantity * 0.85;
									if(quantity>300)
										total = quantity * 0.60;
								}
								if(material == 2)
										total *= 1.15;
								break;
							case '2':
								var quantity = parseInt(document.getElementById("quantity").value);
								e = document.getElementById("finishing");
								var finishing = parseInt(e.options[e.selectedIndex].value);
								if(finishing == 1)
									total = quantity * 30.00;
								if(finishing == 2)
									total = quantity * 32.00;
								if(finishing == 3)
									total = quantity * 33.00;
								break;
							case '3':
								var quantity = parseInt(document.getElementById("quantity").value);
								var e = document.getElementById("size");
								var size = parseInt(e.options[e.selectedIndex].value);
								e = document.getElementById("material");
								var material = parseInt(e.options[e.selectedIndex].value);
								if(quantity < 300)
									total = quantity * 1.1;
								if(quantity >= 300 && quantity <500)
									total = quantity * 1.02;
								if(quantity >= 500)
									total = quantity * 0.95;
								if(material == 2)
										total *= 1.15;
								if(size == 2)
									total *= 1.2;
								break;
							case '4':
								var quantity = parseInt(document.getElementById("quantity").value);
								e = document.getElementById("material");
								var material = parseInt(e.options[e.selectedIndex].value);
								e = document.getElementById("sheets");
								var sheets = parseInt(e.options[e.selectedIndex].value);
								if(quantity < 100)
									total = quantity * 10;
								if(quantity >= 100 && quantity <200)
									total = quantity * 9;
								if(quantity >= 200)
									total = quantity * 8;
								if(material == 2)
									total *= 1.13;
								if(sheets==2)
									total *= 1.6;
								break;
							case '5':
								var quantity = parseInt(document.getElementById("quantity").value);
								e = document.getElementById("material");
								var material = parseInt(e.options[e.selectedIndex].value);
								if(quantity<200)
									total = quantity * 0.50;
								if(quantity>=200)
									total = quantity * 0.40;
								if(material == 1)
									total *= 1.20;
								if(material == 2)
									total *= 1.30;
								if(material == 3)
									total *= 1.40;
								if(material == 4)
									total *= 1.50;
								break;
									
							case '6':
								var quantity = parseInt(document.getElementById("quantity").value);
								e = document.getElementById("material");
								var material = parseInt(e.options[e.selectedIndex].value);
								if(quantity<10)
									total = quantity * 5.00;
								if(quantity>=10 && quantity<20)
									total = quantity * 4.50;
								if(quantity>=20 && quantity<30)
									total = quantity * 4.30;
								if(quantity>=30)
									total = quantity * 4.00;
								if(material == 2)
									total *= 1.20;
								break;
						}
						document.getElementById("displayPrice").innerHTML = "RM   " + total.toFixed(2);
					}
					</script>
					
					<span id="displayPrice" class="content-small-box-content rightalign"> RM 0.00
					</span>					
                    <button type="button" class="btn btn-primary float-right" onclick="priceCalculator()">Calculate</button>
                    <hr class="d-block" /></form>
                    <br />
                    <h3>Ready to go?</h3>
                    <br />
                    <a href="upload.php?ID=<?php echo $ID;?>">
						<img src="../img/upload.jpg" class="img-fluid" alt="Upload icon"/> Upload your file for printing.
					</a>
                    <hr class="d-block" />
					<!--Share button -->
					<h4>Share this product!</h4>
					<div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="http://medanilmu.ddns.net/website/customer/product_catalog.php?ID=<?php echo $ID ?>" data-a2a-title="Hey! I just found this amazing printing website. Check out their products!">
					<a class="a2a_button_facebook"></a>
					<a class="a2a_button_twitter"></a>
					<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
					</div>
					<script async src="https://static.addtoany.com/menu/page.js"></script>
					<hr class="d-block" />
                </div>
				<!--End-->
            </div>
        </div>
		<?php include 'include/footer.html'; ?>
	</body>	
</html>
