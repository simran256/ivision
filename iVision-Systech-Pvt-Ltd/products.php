<?php
include("conn.php");
// Get category slug from URL if set

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
						<h1>Products</h1>
					</div>				
					<div class="page-breadcrumb-inner">
						<div class="page-breadcrumb">
							<div class="breadcrumb-list">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="#"><?=$category_name ?? 'category'?></a></li>
								</ul>
							</div>					
						</div>				
					</div>				
				</div>				
			</div>
		</div>
	</div>
	<!-- Page Heading Section End -->	
	
<div class="service-page-sec pt-100 pb-70">
		<div class="container">				
			<div class="row">	
			<?php
	$category_slug = isset($_GET['category']) ? $_GET['category'] : '';

// Fetch the specific main category based on slug
$main_cat_sql = "SELECT * FROM `cat_prod` WHERE ct_pd_url = '$category_slug' AND sub_category_id = '0' AND status = '1'";
$main_cat_res = mysqli_query($conn, $main_cat_sql);
$main_category = mysqli_fetch_assoc($main_cat_res);

// If the main category exists
if ($main_category) {
    $category_name = $main_category['ct_pd_name'];
    $category_id = $main_category['id'];
    $category_url = $main_category['ct_pd_url'];
} 
	?>
				<div class="service-item">
				     <?php
			    // Fetch subcategories (second level) of the specific main category
			    $sub_cat_sql = "SELECT * FROM `cat_prod` WHERE sub_category_id = '$category_id' AND sub_category_id1 = '0' AND status = '1'";
			    $sub_cat_res = mysqli_query($conn, $sub_cat_sql);
			    while ($sub_cat_row = mysqli_fetch_assoc($sub_cat_res)) {
			        $sub_cat_name = $sub_cat_row['ct_pd_name'];
			        $sub_category_id1 = $sub_cat_row['id'];
			        $sub_cat_url = $sub_cat_row['ct_pd_url'];
			        $sub_cat_desc = $sub_cat_row['long_description'];
			        $product_images = explode(",", $sub_cat_row['cat_pd_image']); // Split image filenames
			    ?>
					<div class="col-md-3 col-sm-6 inner">
						<div class="media">
							<div class="service-thumb">
								<a href="#"><img src="<?=$site?>admin/uploads/product/cat_pd_image/<?=$product_images[0]?>" alt=""/></a>
								<div class="service-icon"></div>								
							</div>
							<div class="service-inner-text">
											
								<div class="media-body">
									<h2><a href="<?=$site?>subcat-products.php?url=<?=$sub_cat_url?>"><?= $sub_cat_name ?></a></h2>
									<p><?= $sub_cat_desc ?></p>

								</div>									
								<a href="<?=$site?>subcat-products.php?url=<?=$sub_cat_url?>" class="service-readmore">Read More <i class="fa fa-angle-right"></i></a>

								
							</div>
						</div>
					</div>						
						<?php
			    }
			    ?>
					
				</div>										
			</div>
					
		</div>		
	</div>

	<?php include('footer.php')?>
</body>
</html>
