<script>
    function validateForm() {
        // Retrieve form fields
        var productName = document.getElementById("pname").value;
        var productDescription = document.getElementById("desc").value;
        var productPrice = document.getElementById("price").value;

        // Check for empty fields
        if (productName.trim() === "") {
            alert("Please enter a product description.");
            return false;
        }

        if (productDescription.trim() === "") {
            alert("Please enter a product size.");
            return false;
        }

        if (productPrice.trim() === "") {
            alert("Please enter a product price.");
            return false;
        }

        // Validate product price as a numeric value
        if (isNaN(productPrice)) {
            alert("Product price should be a valid number.");
            return false;
        }

        // Form is valid, allow submission
        return true;
    }
</script>

<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.product.php?action=newproduct" onsubmit="return validateForm();">
        <div id="form-block-center">
            <label for="pname">Product Description</label>
            <input type="text" id="pname" class="input" name="pname" placeholder="Product Description..">

            <label for="desc">Product Size</label>
            <textarea id="desc" class="input" name="desc" placeholder="SIZE - INCHES or FEET | 3 X 5"></textarea>
            
            <label for="price">Product Retail Price</label>
            <input type="text" id="price" class="input" name="price" placeholder="Product price..">

            <label for="ptype">Type</label>
            <select id="ptype" name="ptype">
                <?php
                if ($product->list_types() != false) {
                    foreach ($product->list_types() as $value) {
                        extract($value);
                ?>
                        <option value="<?php echo $type_id; ?>"><?php echo $type_name; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div id="button-block">
            <input type="submit" value="Save">
        </div>
    </form>
</div>
