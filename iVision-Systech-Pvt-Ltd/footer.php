<?php

include("conn.php");

$sql = "SELECT * FROM `users` WHERE `status` = '1'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
$phone = $row['mobile'];
$whatsapp = $row['whatsapp_number'];
$email = $row['email'];
$email2 = $row['enquiry_email'];
$address = $row['address'];
$fb = $row['facebook_link'];
$link = $row['linkedin_link'];
$tw = $row['twittter_link'];
$insta = $row['instagram_link'];

?>
<footer class="footer">	
		<div class="footer-overlay"></div>	
		<div class="footer-sec">	
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div class="footer-wedget-one">
							<h2>Company Info</h2>
							<p>"iVision" Systech in Delhi provides cost effective & innovative solutions to improve the Process Plants and Energy Efficiency through solutions aimed at Automating the systems or incorporating a software or even provide services in that area.</p>	
							<div class="footer-social">
								<ul>
									<li><a href="<?=$fb?>"><i class="icofont-facebook"></i></a></li>
									<li><a href="<?=$tw?>"><i class="icofont-twitter"></i></a></li>
									<li><a href="<?=$link?>"><i class="icofont-linkedin"></i></a></li>
									<li><a href="<?=$insta?>"><i class="icofont-instagram"></i></a></li>
								</ul>								
							</div>		
						</div>
					</div>	
					<div class="col-md-6 col-sm-6">
						<div class="footer-widget-menu">
						
						
						<div class="row">
						    
                            <div class="col-md-6">
                            	<ul>
                            	    <h2>Sevices & Solutions</h2>
                            	    <?php
				    $sql = "SELECT * FROM `why2` WHERE `status` ='1'";
				    $res = mysqli_query($conn,$sql);
				    while($row = mysqli_fetch_assoc($res)){
				        $name =$row['name'];
				        $desc =$row['description'];
				        $image =$row['image'];
				        $id =$row['id'];
				    
				    ?>
								  <li><a href="<?=$site?>service-details.php?service=<?=$id?>"><?=$name?></a></li>

                                  <?php
				    }
				    ?>
							</ul>
                            </div>
                           
                            <div class="col-md-6">
                             <ul>
                                 <h2>Categories</h2>
                                  <?php
         // Main Categories (top-level)
         $sql = "SELECT * FROM `cat_prod` WHERE sub_category_id = '0' AND status = '1'";
         $res = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($res)) {
             $category_name = $row['ct_pd_name'];
             $category_id = $row['id'];
             $category_url = $row['ct_pd_url'];
      ?>
                                
                                 <li><a href="<?=$site?>products.php?category=<?=$category_url?>"><?php echo $category_name; ?></a></li>
                              
                  <?php
         }
         ?>
                                </ul>
                            </div>
                            </div>
						</div>
					</div>	
					<div class="col-md-3 col-sm-6">
						<div class="footer-wedget-four">
							<h2>contact form </h2>
							<div class="footer-contact-inner">
								<div class="footer-contact-info">
									<div class="footer-contact-info-icon">
										<i class="icofont-google-map"></i>
									</div>							
									<div class="footer-contact-info-text">
										<span><?=$address?></span>
										
									</div>
								</div>
							</div>				
							<div class="footer-contact-inner">
								<div class="footer-contact-info">
									<div class="footer-contact-info-icon">
										<i class="icofont-email"></i>
									</div>							
									<div class="footer-contact-info-text">
										<span><?=$email?></span>
										<span><?=$email2?></span>
									</div>
								</div>
							</div>				
							<div class="footer-contact-inner">
								<div class="footer-contact-info">
									<div class="footer-contact-info-icon">
										<i class="icofont-telephone"></i>
									</div>							
									<div class="footer-contact-info-text">
										<span>+91-<?=$phone?> </span>
										<span>+91-<?=$whatsapp?></span>
									</div>
								</div>
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom-sec">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-sm-7">
						<div class="copy-right ">                                                                                        
							<span>&copy; 2024 "iVision" System Pvt. Ltd. all Rights Reserved </span>
						</div>
					</div>				
                  <div class="col-md-5 col-12">
                     <div class="footer-link">
                         <ul>
                       <li><a href="<?=$site?>about-us.php">About us</a></li>
                       <li><a href="<?=$site?>gallery.php">Gallery</a></li>
                       <li><a href="<?=$site?>contact-us.php">Contact us</a></li>
                       <li><a href="<?=$site?>service.php">Services</a></li>
                         </ul>
                      </div>
                    </div>								
				</div>
			</div>
		</div>
	</footer>
    <script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/owl.animate.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/jquery.counterup.min.js"></script>
	<script src="js/modernizr.min.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/jquery.meanmenu.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/custom.js"></script>