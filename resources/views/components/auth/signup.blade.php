<div class="container mt-6 mb-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 center-screen">
            <div class="card animated fadeIn w-100 p-4 shadow border-0 rounded-lg">
                <div class="card-body">
                    <h4 class="text-primary text-center mb-4"><i class="fas fa-user-plus me-2"></i>Create Account</h4>
                    <hr class="bg-primary"/>
                    <div class="container-fluid m-0 p-0">

                        <div class="container m-0 p-0">
                            <div class="row">
                                <!-- Left Column: Contact Section -->
                                <div class="col-md-6">
                                    <div class="p-2">
                                        <label class="fw-bold small text-uppercase label-large">Email Address <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input id="email" placeholder="Enter your email" class="form-control"
                                                   type="email"/>
                                        </div>
                                    </div>

                                    <div class="p-2">
                                        <label class="fw-bold small text-uppercase label-large">Full Name <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input id="fullName" placeholder="Enter your full name" class="form-control"
                                                   type="text"/>
                                        </div>
                                    </div>

                                    <div class="p-2">
                                        <label class="fw-bold small text-uppercase label-large">Mobile Number <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                            <input id="mobile" placeholder="01XXXXXXXXX" class="form-control"
                                                   type="text"/>
                                        </div>
                                        <small id="mobileHelp" class="form-text text-muted">
                                            Bangladesh format (e.g., 1712345678 or 01712345678)
                                        </small>
                                    </div>
                                </div>

                                <!-- Right Column: Password Section -->
                                <div class="col-md-6">
                                    <div class="p-2">
                                        <label class="fw-bold small text-uppercase label-large">Password <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input id="password" placeholder="Create password" class="form-control"
                                                   type="password"/>
                                        </div>
                                        <small id="passwordHelp" class="form-text text-muted">
                                            Must be 8+ characters with uppercase, lowercase, number and special
                                            character
                                        </small>
                                    </div>

                                    <div class="p-2">
                                        <label class="fw-bold small text-uppercase label-large">Confirm Password <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input id="confirmPassword" placeholder="Confirm password"
                                                   class="form-control" type="password"/>
                                        </div>
                                        <small id="confirmPasswordHelp" class="form-text text-muted">Re-enter your
                                            password</small>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row m-0 p-0 mt-3">
                            <div class="col-md-6 p-2">
                                <button onclick="submitSignup()"
                                        class="w-100 btn-primary text-white fw-bold rounded-pill shadow-sm">
                                    <i class="fas fa-user-plus me-2"></i>Complete Registration
                                </button>
                            </div>
                            <div class="col-md-6 p-2 d-flex justify-content-center align-items-center">
                                <p class="mb-0">Already have an account? <a href="/signin"
                                                                            class="text-primary fw-bold">Sign in</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- Add custom styles -->
<style>
    .card {
        transition: all 0.3s ease;
    }

    .label-large {
        font-size: .9rem; /* Adjust size as needed */
    }

    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
    }

    .input-group-text {
        background-color: #f8f9fc;
        border-right: none;
    }

    .form-control {
        border-left: none;
    }

    .is-valid {
        border-color: #1cc88a !important;
    }

    .is-invalid {
        border-color: #e74a3b !important;
    }

    .text-primary {
        color: #4e73df !important;
    }

    hr.bg-primary {
        height: 2px;
        opacity: 1;
        background: linear-gradient(90deg, rgba(78, 115, 223, 0) 0%, rgba(78, 115, 223, 1) 50%, rgba(78, 115, 223, 0) 100%);
    }

    .rounded-pill {
        padding: 10px 20px;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
    // Email validation function
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Bangladesh phone number validation
    // Accepts formats: +8801XXXXXXXXX, 01XXXXXXXXX, 1XXXXXXXXX
    function isValidBangladeshPhone(phone) {
        // Remove any spaces
        phone = phone.replace(/\s/g, '');

        // If starts with +880, remove it
        if (phone.startsWith('+880')) {
            phone = phone.substring(4);
        }

        // If starts with 880, remove it
        if (phone.startsWith('880')) {
            phone = phone.substring(3);
        }

        // If starts with 0, remove it
        if (phone.startsWith('0')) {
            phone = phone.substring(1);
        }

        // Now should start with 1 followed by 9 digits
        const phoneRegex = /^1[0-9]{9}$/;
        return phoneRegex.test(phone);
    }

    // Format phone number to standard Bangladesh format
    function formatBangladeshPhone(phone) {
        // Remove any spaces
        phone = phone.replace(/\s/g, '');

        // If starts with +880, remove it
        if (phone.startsWith('+880')) {
            phone = phone.substring(4);
        }

        // If starts with 880, remove it
        if (phone.startsWith('880')) {
            phone = phone.substring(3);
        }

        // Add 0 if it starts directly with 1
        if (phone.startsWith('1') && !phone.startsWith('01')) {
            phone = '0' + phone;
        }

        return phone;
    }

    // Strong password validation
    function isStrongPassword(password) {
        // At least 8 characters, 1 uppercase, 1 lowercase, 1 number, 1 special character
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        return passwordRegex.test(password);
    }

    // Hash password using MD5
    function hashPasswordMD5(password) {
        return CryptoJS.MD5(password).toString();
    }

    function showToast(message, type) {
        // Assuming you have a toast function implemented
        if (type === 'error') {
            errorToast(message);
        } else {
            successToast(message);
        }
    }

    async function submitSignup() {
        // Catch the form value using dom
        let email = document.getElementById('email').value.trim();
        let fullName = document.getElementById('fullName').value.trim();
        let mobile = document.getElementById('mobile').value.trim();
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('confirmPassword').value;

        if (email.length === 0) {
            showToast("Please enter your email address", "error");
            document.getElementById('email').focus();
            return;
        } else if (!isValidEmail(email)) {
            showToast("Please enter a valid email address", "error");
            document.getElementById('email').focus();
            return;
        } else if (fullName.length === 0) {
            showToast("Please enter your full name", "error");
            document.getElementById('fullName').focus();
            return;
        } else if (mobile.length === 0) {
            showToast("Please enter your mobile number", "error");
            document.getElementById('mobile').focus();
            return;
        } else if (!isValidBangladeshPhone(mobile)) {
            showToast("Please enter a valid Bangladesh mobile number", "error");
            document.getElementById('mobile').focus();
            return;
        } else if (password.length === 0) {
            showToast("Please enter a password", "error");
            document.getElementById('password').focus();
            return;
        } else if (!isStrongPassword(password)) {
            showToast("Password must be at least 8 characters and include uppercase, lowercase, number, and special character", "error");
            document.getElementById('password').focus();
            return;
        } else if (confirmPassword !== password) {
            showToast("Passwords do not match", "error");
            document.getElementById('confirmPassword').focus();
            return;
        } else {
            try {
                // Format the phone number to standard format (01XXXXXXXXX)
                const formattedMobile = formatBangladeshPhone(mobile);

                // Hash the password using MD5
                const hashedPassword = hashPasswordMD5(password);

                showLoader();
                // Using axios to post the form value to the backend
                let res = await axios.post('/signup', {
                    email: email,
                    fullName: fullName,
                    mobile: formattedMobile,
                    password: hashedPassword
                });
                hideLoader();

                if (res.status === 200 && res.data["status"] === "success") {
                    successToast(res.data["message"]);
                    // Redirect after successful registration with slight delay
                    setTimeout(() => {
                        window.location.href = '/signin';
                    }, 1000);
                } else if (res.status === 409 && res.data["status"] === "conflict") {
                    errorToast(res.data["message"]);
                }
            } catch (error) {
                hideLoader();

                if (error.response && error.response.data && error.response.data.message) {
                    errorToast(error.response.data.message); // Show meaningful message from backend
                } else {
                    errorToast("Registration failed. Please try again.");
                }

            }
        }
    }

</script>
