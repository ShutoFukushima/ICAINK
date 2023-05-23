<script>
    function validateForm() {
        // Retrieve form fields
        var firstName = document.getElementById("fname").value;
        var lastName = document.getElementById("lname").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmpassword").value;

        // Check for empty fields
        if (firstName === "" || lastName === "" || email === "" || password === "" || confirmPassword === "") {
            alert("Please fill in all fields.");
            return false;
        }

        // Validate email format
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        // Validate password strength (minimum 8 characters with at least one uppercase letter, one lowercase letter, and one digit)
        var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/;
        if (!passwordRegex.test(password)) {
            alert("Password should be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one digit.");
            return false;
        }

        // Check if password and confirm password match
        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }

        // Form is valid, allow submission
        return true;
    }
</script>
<div id="boxwrap">
    <h3>Provide the Required Information</h3>
    <div id="form-block">
        <form method="POST" action="processes/process.user.php?action=new" onsubmit="return validateForm();">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="First Name...">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Last Name...">

            <label for="access">Access Level</label>
            <select id="access" name="access">
              <option value="staff">Staff</option>
              <option value="supervisor">Supervisor</option>
              <option value="Manager">Manager</option>
            </select>
        </div>
        <div id="form-block-half">
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Email Address...">

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Password...">

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm Password...">
            
        </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
    </form>
    </div>
</div>