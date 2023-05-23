<script>
    function validateForm() {
        // Retrieve form fields
        var customerName = document.getElementById("sname").value;
        var address = document.getElementById("or_add").value;
        var contactNumber = document.getElementById("amount").value;

        // Check for empty fields
        if (customerName.trim() === "") {
            alert("Please enter a customer name.");
            return false;
        }

        if (address.trim() === "") {
            alert("Please enter an address.");
            return false;
        }

        if (contactNumber.trim() === "") {
            alert("Please enter a contact number.");
            return false;
        }

        // Validate contact number as a numeric value
        if (isNaN(contactNumber)) {
            alert("Contact number should be a valid number.");
            return false;
        }

        // Validate contact number length
        if (contactNumber.length !== 11) {
            alert("Contact number should be exactly 11 digits.");
            return false;
        }

        // Form is valid, allow submission
        return true;
    }
</script>


<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.order.php?action=create" onsubmit="return validateForm();">
        <div id="form-block-center">
            <label for="sname">Customer Name</label>
            <input type="text" id="sname" class="input" name="sname" placeholder="Customer name..">

            <label for="or_add">Address</label>
            <textarea id="or_add" class="input" name="or_add" placeholder="Address.."></textarea>
            
            <label for="amount">Contact Number</label>
            <input type="text" id="amount" class="input" name="amount" placeholder="Contact Number.."/>
        
        </div>
        <div id="button-block">
            <input type="submit" value="Create">
        </div>
    </form>
</div>
