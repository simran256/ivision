<?php 

include "conn.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$category_slug = isset($_GET['url']) ? $_GET['url'] : '';

if (empty($category_slug)) {
    echo "Category not specified.";
    exit;
}

// Fetch the category details based on the slug
$stmt = $conn->prepare("SELECT * FROM cat_prod WHERE ct_pd_url = ? AND status = '1' LIMIT 1");
$stmt->bind_param('s', $category_slug);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $subcategory = $result->fetch_assoc();
    $subcategory_id = $subcategory['id']; // Get the subcategory ID
    $subcategory_name = $subcategory['ct_pd_name']; // Get the subcategory name
} else {
    echo "Invalid category.";
    exit;
}

// Fetch products under the specified subcategory
$stmt_products = $conn->prepare("SELECT * FROM cat_prod WHERE sub_category_id = ? AND status = '1'");
$stmt_products->bind_param('i', $subcategory_id);
$stmt_products->execute();
$products_result = $stmt_products->get_result();
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
                                    <li><a href="#"><?= $category_name ?? 'category' ?></a></li>
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
 <div class="service-page-sec pt-100 pb-70">
    
     
        <div class="container">    
 
        <div class="row">
                
                    <div class="service-item">     
                    <?php
                    // Sub-subcategories (third level)
                    $sub_sub_cat_sql = "SELECT * FROM `cat_prod` WHERE sub_category_id1 = '$subcategory_id' AND status = '1'";
                    $sub_sub_cat_res = mysqli_query($conn, $sub_sub_cat_sql);
                    while ($sub_sub_cat_row = mysqli_fetch_assoc($sub_sub_cat_res)) {
                        $sub_sub_cat_name = $sub_sub_cat_row['ct_pd_name'];
                     $sub_sub_category_id2 = $sub_sub_cat_row['id'];
                        $sub_sub_cat_url = $sub_sub_cat_row['ct_pd_url'];
                        $sub_sub_cat_desc = $sub_sub_cat_row['long_description'];
                        $product_images = explode(",", $sub_sub_cat_row['cat_pd_image']);
                        
                ?>
                    <div class="col-md-3 col-sm-6 inner">
                        <div class="media">
                            	<div class="service-thumb">
								<a href="#"><img src="<?=$site?>admin/uploads/product/cat_pd_image/<?=$product_images[0]?>" alt=""/></a>
								<div class="service-icon"></div>								
							</div>
							<div class="service-inner-text">
                            <div class="media-body">
                                                           
                                <h2><a href="<?=$site?>product-details/<?= $sub_sub_cat_url ?>"><?= $sub_sub_cat_name ?></a></h2>
                             <p><?= substr($sub_sub_cat_desc, 0, 50); ?></p>
                                                    
                            </div>
                             <a href="<?=$site?>product-details/<?=$sub_sub_cat_url?>" class="rdmoreBtn">Learn More<i class="icofont-long-arrow-right"></i></a>   
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
    <!-- Blog Section End -->        
    <?php include('footer.php')?>
</body>
</html>
