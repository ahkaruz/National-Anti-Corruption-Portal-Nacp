<div class="container mt-4 mb-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-5 center-screen">
            <div class="card animated fadeIn w-100 p-4 shadow border-0 rounded-lg">
                <div class="card-body">
                    <h4 class="text-primary text-center mb-4">Sign in</h4>
                    <hr class="bg-primary"/>
                    <div class="container-fluid m-0 p-0">
                        <!-- Form fields stacked vertically -->
                        <div class="mb-3">
                            <label class="fw-bold small text-uppercase label-large">Email Address <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input id="email" placeholder="Enter your email" class="form-control" type="email"/>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold small text-uppercase label-large">Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input id="password" placeholder="Create password" class="form-control" type="password"/>
                            </div>
                        </div>

                        <!-- Login button -->
                        <div class="mb-3">
                            <button onclick="submitSignin()" class="mt-2 w-100 btn-primary text-white fw-bold rounded-pill shadow-sm">
                               Login
                            </button>
                        </div>

                        <!-- Register here link -->
                        <div class="mb-3 text-center">
                            <p class="mb-0">Don't have an account? <a href="/signup" class="text-primary fw-bold">Sing up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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
    function hashPasswordMD5(password) {
        return CryptoJS.MD5(password).toString();
    }

    async function submitSignin () {
        let email = document.getElementById('email').value.trim();
        let password = document.getElementById('password').value;

        if (email.length === 0) {
            errorToast("Email is required");
        } else if (password.length === 0) {
            errorToast("Password is required");
        } else {
            showLoader();
            const hashedPassword = hashPasswordMD5(password);
            let res = await axios.post('/signin', {
                email: email,
                password: hashedPassword
            });
            console.log(res);
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast("Login successful");
                window.location.href = '/submitForm';
            } else {
                errorToast('Incorrect email or password. Please try again.');
            }
        }
    }

</script>
