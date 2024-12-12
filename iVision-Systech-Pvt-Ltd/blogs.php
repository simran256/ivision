<?php 

include("conn.php");



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
						<h1>Blogs</h1>
					</div>				
					<div class="page-breadcrumb-inner">
						<div class="page-breadcrumb">
							<div class="breadcrumb-list">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="#">Blogs</a></li>
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
			    <?php
			    $sql = "SELECT * FROM `tbl_blog` WHERE `is_active` = '1'";
                $res = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($res)){
                     $name = $row['blog_heading'];
			        $desc = $row['blog_description'];
			        $url = $row['blog_url'];
			        $image = $row['blog_img'];
			        $author = $row['blog_posted_by'];
			         $date = $row['tstp'];
					$date2 = date($date);
                
			    ?>
				<div class="col-md-4 col-sm-4">				
					<div class="sngl-blg">
						<div class="sngl-blg-img">
							<img src="<?=$site?>admin/uploads/blog/<?=$image?>" alt=""/>
						</div>	
						<div class="sngl-blg-dsc">
							<ul>
								<li><i class="icofont-clock-time"></i><?=$date2?></li>
								<li><i class="icofont-ui-user"></i><?=$author?></li>

							</ul>							
							<h2 class="blg-title"><a href="blog-details.php"><?=$name?></a></h2>
							<p><?=$desc?></p>
							<a href="<?=$site?>blog-details/<?=$url?>" class="rdmoreBtn">Learn More<i class="icofont-long-arrow-right"></i></a>						
						</div>
					</div>
				</div>		
			    <?php
			    }
			    ?>
			</div>
			<!--<div class="row">-->
			<!--	<div class="col-md-12">-->
			<!--		<div class="pagination custom-pagination">-->
			<!--			<ul class="pagination custom-pagination">-->
			<!--				<li class="active"><a href="#">01</a></li>-->
			<!--				<li><a href="#">02</a></li>-->
			<!--				<li><a href="#">03</a></li>-->
			<!--				<li><a href="#">04</a></li>-->
			<!--			</ul>				-->
			<!--		</div>			-->
			<!--	</div>			-->
			<!--</div>			-->
			
		</div>
	</div>		
	<!-- Blog Section End -->		
	<?php include('footer.php')?>
</body>

</html>