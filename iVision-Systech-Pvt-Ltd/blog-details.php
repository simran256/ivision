<?php
include("conn.php");
      
				
$url = mysqli_real_escape_string($conn, $_GET['alias']);
$query = "SELECT * FROM `tbl_blog` WHERE `blog_url` = '$url' AND `is_active` = '1' LIMIT 1";
$res = mysqli_query($conn, $query);

if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $name = $row['blog_heading'];
    $desc = $row['blog_description'];
    $url = $row['blog_url'];
    $image = $row['blog_img'];
    $author = $row['blog_posted_by'];
    $date = $row['tstp'];
    $date2 = date("d M, Y", strtotime($date)); // Formatted date
}      
				
				
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
						<h1>Blog Details</h1>
					</div>				
					<div class="page-breadcrumb-inner">
						<div class="page-breadcrumb">
							<div class="breadcrumb-list">
								<ul>
									<li><a href="<?=$site?>index.php">Home</a></li>
									<li><a href="#"><?=$name?> </a></li>
								</ul>
							</div>					
						</div>				
					</div>				
				</div>				
			</div>
		</div>
	</div>
	<!-- Page Heading Section End -->	
	<!-- Blog Section Start -->		
	<div class="blog-sec pt-100 pb-70">
		<div class="container">		
			<div class="row">
				<div class="col-md-12">	
				
					<div class="single-blog">
						<div class="sngl-blg-img">
							<img src="<?=$site?>admin/uploads/blog/<?=$image?>" alt=""/>
						</div>	
						<div class="sngl-blg-dsc">
							<ul>
								<li><i class="icofont-clock-time"></i><?=$date2?></li>
								<li><i class="icofont-ui-user"></i><?=$author?></li>
								
							</ul>							
							<h2 class="blg-title"><a href="#"><?=$name?></a></h2>
							<p><?=$desc?></p>	
						</div>
							
																	
					</div>
				</div>	
							
			</div>
		</div>
	</div>		
	<!-- Blog Section End -->		
	<!-- Footer Section Start -->
<?php  include("footer.php"); ?>
	<!-- Scripts Js End -->	
</body>

<!-- Mirrored from themeearth.com/tf/html/finixpa/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 10:14:59 GMT -->
</html>