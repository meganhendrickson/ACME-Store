<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/ACME/common/header.php';

    //check if user is logged in
    if (!$_SESSION['loggedin']){
        header ("Location: http://localhost/acme");
    }
    //check if user is admin level
    if ($_SESSION['clientData']['clientLevel'] < 2) {
        header ("Location: http://localhost/acme");
    }
?>

<!-- NEW PRODUCT VIEW -->
<!-- PAGE CONTENT -->
<section>

    <h2>Add Product</h2>
    <div class="message">
        <?php if (isset($message)) {echo $message;}?>
    </div>
    <p>Add a new product below. All fields are required!</p>
    <form action="http://localhost/ACME/products/index.php" method="post">
        <fieldset>
            <label>Select category:</label><br>
                <?php  //Drop down select list using $categories array
                    $catList = '<select name="category">';
                    foreach ($categories as $category){
                        $catList .= "<option value='$category[categoryId]'";
                        if(isset($categoryId)){
                            if($category['categoryID'] === $categoryId){
                            $catList .= ' selected ';
                            }
                        }
                        $catList .= ">$category[categoryName].</option>";
                    }
                    $catList .= '</select>';
                    echo $catList; 
                ?>
            <br>
            <label>Product Name:</label><br>
            <input required type="text" name="invName" id="invName"
                <?php if(isset($invName)) {echo "value='$invName'";} ?>/><br>
            
            <label>Product Description:</label><br>
            <input required type="text" name="invDescription" id="invDescription"
                <?php if(isset($invDescription)) {echo "value='$invDescription'";} ?>/><br>
            
            <label>Product Image (use image admin to upload image):</label><br>
            <input readonly type="text" name="invImage" id="invImage" value="http://localhost/ACME/images/no-image.png"/><br>
            
            <label>Product Thumbnail (use image admin to upload image):</label><br>
            <input readonly type="text" name="invThumbnail" id="invThumbnail" value="http://localhost/ACME/images/no-image.png"/><br>
            
            <label>Product Price:</label><br>
            <input required type="number" name="invPrice" id="invPrice"
                <?php if(isset($invPrice)) {echo "value='$invPrice'";} ?>/><br>
            
            <label>Number in Stock:</label><br>
            <input required type="number" name="invStock" id="invStock"
                <?php if(isset($invStock)) {echo "value='$invStock'";} ?>/><br>
            
            <label>Shipping Size (W x H x L in inches):</label><br>
            <input required type="number" name="invSize" id="invSize"
                <?php if(isset($invSize)) {echo "value='$invSize'";} ?>/><br>
            
            <label>Product Weight (lbs):</label><br>
            <input required type="number" name="invWeight" id="invWeight"
                <?php if(isset($invWeight)) {echo "value='$invWeight'";} ?>/><br>
            
            <label>Product Location (city name):</label><br>
            <input required type="text" name="invLocation" id="invLocation"
                <?php if(isset($invLocation)) {echo "value='$invLocation'";} ?>/><br>
            
            <label>Vendor Name:</label><br>
            <input required type="text" name="invVendor" id="invVendor"
                <?php if(isset($invVendor)) {echo "value='$invVendor'";} ?>/><br>
            
            <label>Primary Material:</label><br>
            <input required type="text" name="invStyle" id="invStyle"
                <?php if(isset($invStyle)) {echo "value='$invStyle'";} ?>/><br>
        </fieldset>
        <input type="submit" class="button" name="submit" value="Add Product" />
        <!-- Action Key - Value Pair -->
        <input type="hidden" name="action" value="add-prod">
    </form>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'].'/ACME/common/footer.php'?>