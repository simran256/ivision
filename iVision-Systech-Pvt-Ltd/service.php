<?php include("conn.php");?>
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
	<div class="pagehding-sec">
		<div class="images-overlay"></div>		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page-heading">
						<h1>Services</h1>
					</div>				
					<div class="page-breadcrumb-inner">
						<div class="page-breadcrumb">
							<div class="breadcrumb-list">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="#">Services</a></li>
								</ul>
							</div>					
						</div>				
					</div>				
				</div>				
			</div>
		</div>
	</div>
	<!-- Page Heading Section End -->	
	<!-- Service Section Start -->	
	<div class="service-page-sec pt-100 pb-70">
		<div class="container">				
			<div class="row">			
				<div class="service-item">
				    <?php
				    $sql = "SELECT * FROM `why2` WHERE `status` ='1'";
				    $res = mysqli_query($conn,$sql);
				    while($row = mysqli_fetch_assoc($res)){
				        $name =$row['name'];
				        $desc =$row['description'];
				        $image =$row['image'];
				        $id = $row['id'];
				    
				    ?>
					<div class="col-md-3 col-sm-6 inner">
						<div class="media">
							<div class="service-thumb">
								<a href="#"><img src="<?=$site?>admin/uploads/service/<?=$image?>" alt=""/></a>
								<div class="service-icon"></div>								
							</div>
							<div class="service-inner-text">
											
								<div class="media-body">
									<h2><a href="<?=$site?>service-details.php?service=<?=$id?>"><?=$name?></a></h2>
									<p><?=substr($desc, 0, 50);?></p>
								</div>	
								
								<a href="<?=$site?>service-details.php?service=<?=$id?>" class="service-readmore">Read More <i class="fa fa-angle-right"></i></a>
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
	<!-- service Section End -->	
<?php include('footer.php')?>	
</body>
</html>