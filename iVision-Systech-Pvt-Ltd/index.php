<?php include('conn.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$headerQuery = "SELECT * FROM `cms_menu` WHERE `page_url`='home'";
$headerResult = mysqli_query($conn, $headerQuery);

if ($headerResult && mysqli_num_rows($headerResult) > 0) {
    // Fetch data as an associative array
    $header1 = mysqli_fetch_assoc($headerResult);
} else {
    $header1 = ['page_title' => '', 'message' => '', 'page_keyword' => '']; // Default values if no result is found
}
// Check if 'alias' exists in GET parameters
$url = isset($_GET['alias']) ? $_GET['alias'] : '';

// Fetch header information only if alias is provided
if ($url) {
    $headerQuery = mysqli_query($conn, "SELECT * FROM cat_prod WHERE ct_pd_url='$url'");
    if ($headerQuery && mysqli_num_rows($headerQuery) > 0) {
        $header = mysqli_fetch_assoc($headerQuery);
        $product_url = $header['ct_pd_url'];
    } else {
        $product_url = ''; // Handle case where no product is found
    }
} else {
    $product_url = ''; // Handle missing alias parameter
}


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>	
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
		<title><?php echo $header1['page_title'];?></title>
    <!--<meta name="author" content="<?php echo $theme['company_name'];?>">-->
    <meta name="description" content="<?php echo $header1['message'];?>">
    <link rel="canonical" href="<?php echo $header1['page_keyword'];?>" >		
     <?php include('headcss.php')?>	
</head>
<body class="home-v1">
	
	<?php include('header.php')?>
	<div class="slider">
		<div class="all-slide owl-item">	
			<!-- Slider Single Item Start -->
			<div class="single-slide" style="background-image:url(img/slide1.jpg);">
				<div class="slider-overlay"></div>
				<div class="slider-wrapper">
					<div class="slider-text">
						<div class="slider-caption">
							<h1>Welcome to "iVision" Systech Pvt Ltd.</h1>	
							<p>"iVision" Systech in Delhi provides cost effective & innovative solutions to improve the Process Plants and Energy Efficiency through solutions aimed at Automating the systems or incorporating a software or even provide services in that area. </p>	
							<ul>
								<li><a href="about-us.php">learn more <i class="icofont-long-arrow-right"></i></a></li>					
								
							</ul>							
						</div>	
					</div>
				</div>				
			</div>
			<!-- Slider Single Item End -->
			<!-- Slider Single Item Start -->
			<div class="single-slide" style="background-image:url(img/slider2.jpg);">
				<div class="slider-overlay"></div>
				<div class="slider-wrapper">
					<div class="slider-text">
						<div class="slider-caption">
							<h1>Welcome to "iVision" Systech Pvt Ltd.</h1>		
							<p>"iVision" Systech in Delhi provides cost effective & innovative solutions to improve the Process Plants and Energy Efficiency through solutions aimed at Automating the systems or incorporating a software or even provide services in that area. </p>
							<ul>
								<li><a href="about-us.php">learn more <i class="icofont-long-arrow-right"></i></a></li>					
								
							</ul>							
						</div>	
					</div>
				</div>				
			</div>	
			<!-- Slider Single Item End -->
		</div>			
	</div>
	<!-- Slider Section End -->		
	<!-- About Start -->
	<div class="about-sec pt-100 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="about-us-v2">
                        <h1>Welcome to "iVision" Systech Pvt Ltd.</h1>
                        <p>Established in the year 2002 at Delhi, (India), we  “"iVision" Systech Pvt Ltd.”, are a Private Limited Company and leading service provider, engaged in proving quality approved Piping Analysis Services, Network Design Services, Scanning Modeling Services, Heat Exchanger Design Services, Tank Design Services, Pressure Vessel Designing Services and Chimney Design Services. Under the direction of “Mr. Susheel Gupta”, we have marked the remarkable name in the industry.</p>
					   <ul class="about-tab">
							<li class="active"><a data-toggle="tab" href="#History" aria-expanded="true">AIM</a></li>
							<li class=""><a data-toggle="tab" href="#Mission" aria-expanded="false">Vision</a></li>
							<li class=""><a data-toggle="tab" href="#support" aria-expanded="false">Mission</a></li>
						</ul>
						<div class="tab-content">	
							<div id="History" class="tab-pane active">				
								<div class="about-desc">
									<h1>AIM </h1>
									<p> "iVision"  aims  to  be  leading  technology  partner  to  EPC,  Oil  &  Gas, Power and Manufacturing organizations by way of imparting Technical Trainings,  implementing  state-of-the-art  Software  Solutions  and providing Engineering Services.</p>
									<a href="about-us.php">Read More</a>
								</div>
							</div>							
							<div id="Mission" class="tab-pane">				
								<div class="about-desc">
									<h1>VISION </h1>
									<p>Easier,  Economic  and  Eco-Friendly  technology,  ISPL’s  vision is  to  cultivate  sustainable  technology  under  the  light  of  these  3E’s  for the benefit of humanity.</p>
									<a href="about-us.php">Read More</a>
								</div>
							</div>							
							<div id="support" class="tab-pane">				
								<div class="about-desc">
									<h1>MISSION</h1>
									<p>"iVision"  is  focused  to  its  aim  while  maintaining  long  term  and healthy relationship with its customers globally.</p>
									<a href="about-us.php">Read More</a>
								</div>
							</div>										
						</div>			
					</div>	
				</div>	
				<div class="col-md-4">
					<div class="about-us-contact">
						<div class="about-us-contact-title">
							<h1>Free Consultation</h1>
							<div class="contact-title-border"></div>
						</div>						
						<form action="contact-us.php" method= "post">
							<div class="contact-field">
								<div class="single-input-field">
									<input type="text" placeholder="Name" name="name" required/>
								</div>	
								<div class="single-input-field">
									<input type="email" placeholder="Email" name="email" required/>
								</div>								
								<div class="single-input-field">
									<input type="text" placeholder="Phone No" name="phone" required/>
								</div>						
								<div class="single-input-field">
									<input type="text" placeholder="Subject" name="subject" required/>
								</div>																		
								<div class="single-input-field">
									<textarea style="color:white;"  placeholder="Message" name="message" required></textarea>
								</div>																		
								<div class="single-input-fieldsbtn">
									<input type="submit" value="submit now" name="submit"/>
								</div>							
							</div>							
						</form>							
					</div>
				</div>					
			</div>
		</div>		
	</div>
	<!-- About End -->	
	<!-- Service Section Start -->	
	<div class="service-sec pt-50 pb-50">
		<div class="container">		
			<div class="row latest-project-title-sec">
				<div class="col-md-3">
					<div class="latest-project-title">
						<span>Get Service</span>
						<h1>Services We Offer</h1>
					</div>
				</div>
				<div class="col-md-7">
					<div class="latest-project-subtitle">
						<p>The company is a leading provider of consulting & training solutions for Engineering, Procurement & Construction, Business Process, Oil & Gas, Process, Power (Generation, Transmission and Distribution), Building services Consultants, Ship Building, Government and Manufacturing sector.</p>
					</div>
				</div>
				<div class="col-md-2">
					<div class="latest-project-button">
						<a href="<?=$site?>service.php">View All <i class="icofont-long-arrow-right"></i></a>
					</div>
				</div>
			</div>			
			<div class="row">			
				<div class="service-item">
				    <?php
				    $sql = "SELECT * FROM `why2` WHERE `status`='1'";
				    $res =mysqli_query($conn,$sql);
				    while($row =mysqli_fetch_assoc($res)){
				        
				    $image = $row['image'];
				    $service_name = $row['name'];
				    $id = $row['id'];
				    // $service_url = $row['service_url'];
				    $desc = $row['description'];
				    // $meta_title = $row['title'];
				    // $meta_desc = $row['meta_description'];
				    
				    ?>
					<div class="col-md-3 col-sm-6 inner">
						<div class="media">
							<div class="service-thumb">
								<a href="engineering-design-and-analysis.php"><img src="<?=$site?>admin/uploads/service/<?=$image?>" alt="image"/></a>
								<div class="service-icon"></div>								
							</div>
							<div class="service-inner-text">
														
								<div class="media-body">
									<h2><a href="<?=$site?>service-details.php?service=<?=$id?>"><?=$service_name?></a></h2>
								</div>	
								<p><?=substr($desc, 0, 50);?></p>
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
	<div class="why-choose-us-v1-sec">
		<div class="container">			
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="video-inner">
						
					</div>				
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="why-choose-v1">
						<div class="why-choose-v1-title">
							<span>Why Choose Us</span>
							<h1>Why Trust Our Client</h1>
						</div>					
						<div class="why-choose-v1-single">
							<div class="media">
								<div class="media-left">
									<div class="icon">
										<i class="icofont-industries-2"></i>
									</div>						
								</div>						
								<div class="media-body">
									<h2>Great business advices.</h2>
									<p>Atomorum principes eu mea, at nec insolens dissentiet, no vis nulla lucilius. Nam veritus pericula id. </p>
								</div>				
							</div>						
						</div>						
						<div class="why-choose-v1-single">
							<div class="media">
								<div class="media-left">
									<div class="icon">
										<i class="icofont-rocket-alt-2"></i>
									</div>						
								</div>						
								<div class="media-body">
									<h2>secure, verifying, fast solution</h2>
									<p>Atomorum principes eu mea, at nec insolens dissentiet, no vis nulla lucilius. Nam veritus pericula id. </p>
								</div>				
							</div>						
						</div>						
						<div class="why-choose-v1-single">
							<div class="media">
								<div class="media-left">
									<div class="icon">
										<i class="icofont-live-support"></i>
									</div>						
								</div>						
								<div class="media-body">
									<h2>life time support</h2>
									<p>Atomorum principes eu mea, at nec insolens dissentiet, no vis nulla lucilius. Nam veritus pericula id. </p>
								</div>				
							</div>						
						</div>															
					</div>
				</div>
			
			</div>					
		</div>
	</div>	
	<!-- Why Choose Us Sec Start -->		
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
	<!-- Gallery Section Start -->
	<div class="gallery-sec pt-50 pb-50">	
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="sec-title">
						<span>Company Project</span>
						<h1>Company Project Gallery</h1>
						<div class="border-shape"></div>
					</div>
				</div>
			</div>		
			<div class="row">		
				<div class="gallery-area">	
					<div class="gallery-container">	
						<?php
						
						$sql = "SELECT * FROM `gallery` WHERE `status` = '1' limit 8";
						$res = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_assoc($res)){
						    $image = $row['image'];
						    
						
						
						?>
						<!-- Gallery Item Block Start -->
						<div class="col-xs-12 col-sm-6 col-md-3 filtr-item Petroleum">
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
					<!-- Gallery Load More Button Start-->
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="gallery-load-more-btn">
									<a href="<?=$site?>gallery.php">View All <i class="icofont-thin-double-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- Gallery Load More Button Start-->
				</div>				
			</div>
		</div>
	</div>
		
	
	<!-- team Section End -->		
	<div class="testimonial-v1-sec">
		<div class="container">	
			<div class="row">
				<div class="col-md-12">
					<div class="sec-title">
						<h1>What Say Our CLient</h1>
						<p>These reviews highlight "iVision" Systech Pvt Ltd’s dedication to delivering quality services and maintaining strong client relationships.</p>
					</div>
				</div>
			</div>		
			<div class="row">
				<div class="col-md-12">
					<div class="testimonial-v1-all">
					      <?php
					    $sql = "SELECT * FROM `daysdata` WHERE `status`='1'";
					    $res = mysqli_query($conn,$sql);
					    while($row = mysqli_fetch_assoc($res)){
					        $image  = explode(",", $row['image']);
					        $name =$row['name'];
					        $desc = $row['description'];
					        $post = $row['designation'];
					        $date = $row['date'];
					        $date2 = date($date);
					    ?>
						<div class="single-testimonial-v1">
							<div class="testimonial-v1-img">
							   <img src="img/c.jpg" alt="">
							</div>
							<div class="details">
							   <h2><a href="#"><?=$name?> </a></h2>
							   <span><?=$post?></span>
							</div>
							<div class="rating">
							   <p>"<?=$desc?>"</p>
							  					   
							</div>
						</div>					
						<?php
					    }
					    ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Blog Section Start -->		
	<div class="blog-sec">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="sec-title">
						<h1>Our Latest Blog</h1>
						
					</div>
				</div>
			</div>				
			<div class="row">
			    <?php
			    $sql = "SELECT * FROM `tbl_blog` WHERE `is_active` = '1' LIMIT 3";
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
							<h2 class="blg-title"><a href="<?=$site?>blog-details/<?=$url?>"><?=$name?></a></h2>
							<p><?=$desc?></p>
							<a href="<?=$site?>blog-details/<?=$url?>" class="rdmoreBtn">Learn More<i class="icofont-long-arrow-right"></i></a>						
						</div>
					</div>
				</div>					
			<?php
			}
			?>
				
				
			</div>
			<div class="latest-project-button">
						<a href="<?=$site?>blogs.php">View All <i class="icofont-long-arrow-right"></i></a>
					</div>
		</div>
	</div>		
	<?php include('footer.php')?>
</body>
</html>