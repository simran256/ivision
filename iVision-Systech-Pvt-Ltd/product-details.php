
<?php
include("conn.php");
$url = mysqli_real_escape_string($conn, $_GET['alias']);
$query = "SELECT * FROM cat_prod WHERE ct_pd_url = '$url' AND status = '1' LIMIT 1";
$header = mysqli_query($conn, $query);

if (mysqli_num_rows($header) > 0) {
    $header1 = mysqli_fetch_assoc($header);
    $subcategory_id = $header1['id']; // Get the subcategory ID
    $subcategory_name = $header1['ct_pd_name']; // Get the subcategory name
    $product_images = explode(",", $header1['cat_pd_image']); // Split image filenames
    $price = $header1['cat_pd_price'];
    $mrp =$header1['cat_pd_mrp'];
    $long_desc = $header1['long_description'];
} 
// Fetch products under the specified subcategory using `sub_category_id`
$sub_cat_query = "SELECT * FROM `cat_prod` WHERE sub_category_id1 = '$subcategory_id' AND status = '1'";
$sub_cat_result = mysqli_query($conn, $sub_cat_query);


?>
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
						<h1><?=$subcategory_name?></h1>
					</div>				
					<div class="page-breadcrumb-inner">
						<div class="page-breadcrumb">
							<div class="breadcrumb-list">
								<ul>
									<li><a href="<?=$site?>index.php">Home</a></li>
									<li><a href="#"><?=$subcategory_name?></a></li>
                                 
								</ul>
							</div>					
						</div>				
					</div>				
				</div>				
			</div>
		</div>
	</div>
	<!-- Page Heading Section End -->	
	<!-- Service Details Section Start -->	
	<div class="service-details-page pt-100 pb-100">
		<div class="container">		
			<div class="row">	
				
				<div class="col-md-6">
					<div class="service-details">
						
						<h2><?=$subcategory_name?></h2>
						<p><?= $long_desc?></p>
					</div>
				</div>
                <div class="col-md-6">
                 <div class="service-details-thumb">
						<img src="<?=$site?>admin/uploads/product/cat_pd_image/<?=$product_images[0]?>" alt="image"/>
						</div>
                </div>
                <div class="row">
                    <h2 class="service_feature">Key aspects of piping design and modeling engineering:</h2>
							<div class="col-md-6">
								<div class="faq-single">
									<div class="media">
										<div class="media-left">
											<div class="icon">
												<i class="icofont-arrow-right"></i>
											</div>						
										</div>						
										<div class="media-body">
											<h2>System Layout</h2>
											<p> Piping design begins with the creation of a detailed layout that defines the path of the piping network. This includes determining the placement of pipes, valves, fittings,</p>
										</div>				
									</div>						
								</div>							
								<div class="faq-single">
									<div class="media">
										<div class="media-left">
											<div class="icon">
												<i class="icofont-arrow-right"></i>
											</div>						
										</div>						
										<div class="media-body">
											<h2>Material Selection</h2>
											<p> Engineers must select appropriate materials based on the properties of the fluids or gases being transported, such as temperature, pressure, and corrosiveness. </p>
										</div>				
									</div>						
								</div>								
							</div>						
							<div class="col-md-6">
								<div class="faq-single">
									<div class="media">
										<div class="media-left">
											<div class="icon">
												<i class="icofont-arrow-right"></i>
											</div>						
										</div>						
										<div class="media-body">
											<h2>3D Modeling </h2>
											<p> Advanced software such as AutoCAD, SolidWorks, or Plant Design System (PDS) is used for 3D modeling of piping systems. This enables engineers to visualize .</p>
										</div>				
									</div>						
								</div>							
								<div class="faq-single">
									<div class="media">
										<div class="media-left">
											<div class="icon">
												<i class="icofont-arrow-right"></i>
											</div>						
										</div>						
										<div class="media-body">
											<h2> Cost Efficiency</h2>
											<p>Piping engineers work to optimize designs, reducing material costs, minimizing pressure drops, and ensuring that the layout allows for efficient construction and operation.</p>
										</div>				
									</div>						
								</div>								
							</div>
						</div>
			</div>
		</div>	
	</div>	
    <!-- Call To Action Section Start -->	
	<div class="call-to-action-sec">
		<div class="call-to-action-overlay"></div>
		<div class="container">
			<div class="row">	
				<div class="col-md-8 col-sm-9">
					<div class="call-to-action-text">
						<h2>contact with us for customer support</h2>
						<p>we are provide 24/7 hours to support.</p>
					</div>												
				</div>				
				<div class="col-md-4 col-sm-3">
					<div class="call-to-action-text">
						<a href="<?=$site?>contact-us.php" class="btn">get support <i class="icofont-thin-double-right"></i></a>
					</div>												
				</div>					
			</div>					
		</div>
	</div>
	<!-- Call To Action Section Start -->	
	<!-- Service Details Section End -->	
	<?php include('footer.php')?>
</body>
</html>