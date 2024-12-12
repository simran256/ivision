<?php 
include("conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<header>
		<div class="header-top">
			<div class="container-fluid">
				<div class="row">
				    <?php
				    $sql = "SELECT * FROM `users` WHERE `status` = '1'";
				    $res = mysqli_query($conn,$sql);
				    $row = mysqli_fetch_assoc($res);
				    $email = $row['email'];
				    $mobile = $row['mobile'];
				    $whatsapp = $row['whatsapp_number'];
				    $address = $row['address'];
				    $fb = $row['facebook_link'];
				    $tw = $row['twittter_link'];
				    $linkedin = $row['linkedin_link'];
				    $instagram = $row['instagram_link'];
				    
				    
				    ?>
					<div class="col-md-7 col-sm-8">
						<div class="header-left">
							<span class="social-title">Need Any Help?</span>
							<ul>
								<li><i class="icofont-phone"></i> +91-<?=$mobile?> | <?=$whatsapp?></li>							
								<li><i class="icofont-mail"></i> <?=$email?></li>
							</ul>	
						</div>
					</div>				
					<div class="col-md-5 col-sm-4">
						<div class="header-right-div">
							<div class="soical-profile">
								<span class="social-title">Follow Us</span>
								<ul>
									<li><a href="<?=$fb?>"><i class="icofont-facebook"></i></a></li>
									<li><a href="<?=$tw?>"><i class="icofont-twitter"></i></a></li>
									<li><a href="<?=$linkedin?>"><i class="icofont-linkedin"></i></a></li>
									<li><a href="<?=$instagram?>"><i class="icofont-instagram"></i></a></li>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hd-sec">
			<div class="container-fluid">
				<div class="row">
					<!-- Logo Start -->
					<div class="col-md-2 col-sm-12 col-xs-8">
						<div class="logo main-logo">
							<a href="<?=$site?>index.php"><img src="<?=$site?>img/logo.png" alt=""/></a>
						</div>
					</div>	
					<div class="mobile-nav-menu"></div>						
					<div class="col-md-10 col-sm-10 nav-menu">
						<div class="menu">
<nav id="main-menu" class="main-menu">
   <ul>
      <li class="active"><a href="<?=$site?>index.php">Home</a></li>
      <?php
         // Main Categories (top-level)
         $sql = "SELECT * FROM `cat_prod` WHERE sub_category_id = '0' AND status = '1' LIMIT 3";
         $res = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($res)) {
             $category_name = $row['ct_pd_name'];
             $category_id = $row['id'];
             $category_url = $row['ct_pd_url'];
      ?>
         <li><a href="<?=$site?>products.php?category=<?=$category_url?>"><?php echo $category_name; ?></a>
            <ul>
               <?php
                  // Subcategories (second level)
                  $sub_cat_sql = "SELECT * FROM `cat_prod` WHERE sub_category_id = '$category_id' AND sub_category_id1 = '0' AND status = '1'";
                  $sub_cat_res = mysqli_query($conn, $sub_cat_sql);
                  while ($sub_cat_row = mysqli_fetch_assoc($sub_cat_res)) {
                      $sub_cat_name = $sub_cat_row['ct_pd_name'];
                      $sub_category_id1 = $sub_cat_row['id'];
                      $sub_cat_url = $sub_cat_row['ct_pd_url'];
               ?>
                  <li><a href="<?=$site?>subcat-products.php?url=<?=$sub_cat_url?>"><?php echo $sub_cat_name; ?><i class="fa fa-angle-right"></i></a>
                     <ul>
                        <?php
                           // Sub-subcategories (third level)
                           $sub_sub_cat_sql = "SELECT * FROM `cat_prod` WHERE sub_category_id1 = '$sub_category_id1' AND sub_category_id2 = '0' AND status = '1'";
                           $sub_sub_cat_res = mysqli_query($conn, $sub_sub_cat_sql);
                           while ($sub_sub_cat_row = mysqli_fetch_assoc($sub_sub_cat_res)) {
                               $sub_sub_cat_name = $sub_sub_cat_row['ct_pd_name'];
                               $sub_sub_category_id2 = $sub_sub_cat_row['id'];
                               $sub_sub_cat_url = $sub_sub_cat_row['ct_pd_url'];
                        ?>
                           <li><a href="<?=$site?>product-details/<?= $sub_sub_cat_url ?>"><?php echo $sub_sub_cat_name; ?></a></li>
                        <?php } ?>
                     </ul>
                  </li>
               <?php } ?>
            </ul>
         </li>
      <?php } ?>
      <li class="active"><a href="<?=$site?>service.php">Services</a></li>
      <li class="active"><a href="<?=$site?>contact-us.php">Contact us</a></li>
   </ul>
</nav>



						</div>				
					</div>	
				</div>
			</div>
		</div>
	</header>