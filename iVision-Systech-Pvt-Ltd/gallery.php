<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>	
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>"iVision" Systech Pvt. Ltd.</title>		
     <?php include('headcss.php')?>	
</head>
<body class="home-v1">
	
	<?php include('header.php')?>

    <!-- Page Heading Section Start -->	
	<div class="pagehding-sec">
		<div class="images-overlay"></div>		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page-heading">
						<h1>Gallery</h1>
					</div>				
					<div class="page-breadcrumb-inner">
						<div class="page-breadcrumb">
							<div class="breadcrumb-list">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="#">Gallery</a></li>
								</ul>
							</div>					
						</div>				
					</div>				
				</div>				
			</div>
		</div>
	</div>
  <!-- Gallery Section Start -->
	<div class="gallery-sec pt-50 pb-50">	
		<div class="container">
			
			<div class="row">		
				<div class="gallery-area">	
					
					<!-- Gallery Filter End -->
					<!-- Gallery container Start -->
					<div class="gallery-container">	
					<?php
						
						$sql = "SELECT * FROM `gallery` WHERE `status` = '1' limit 8";
						$res = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_assoc($res)){
						    $image = $row['image'];
						    
						
						
						?>
						<!-- Gallery Item Block Start -->
						<div class="col-xs-12 col-sm-6 col-md-3 ">
							<div class="gallery-item">
								<img src="<?=$site?>admin/uploads/gallery/<?=$image?>" alt="" />
								<div class="gallery-overlay">
									<div class="gallery-overlay-text">
										<span class="gallery-button">
										<a href="<?=$site?>admin/uploads/gallery/<?=$image?>" class="gallery-photo"><i class="icofont-image"></i></a>
											
										</span>
									</div>
								</div>
							</div>								
						</div>								
						<!-- Gallery Item Block End -->	
						
						<?php
						}
						?>
							
					</div>
				
				</div>				
			</div>
		</div>
	</div>
		
      
	<?php include('footer.php')?>
</body>
</html>