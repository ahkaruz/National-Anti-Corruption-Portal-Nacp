<!-- Hero Section -->
<section id="hero" class="hero section">
    <div class="container" data-aos="fade-up" data-aos-delay="50">

        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-up" data-aos-delay="200">

                    <h1 class="mb-4" style="font-size: 3.2rem">
                        National
                        <br>Anti-Corruption<br>
                        Portal<br>
                        <span class="accent-text">Transparency in Action</span>
                    </h1>

                    <p class="mb-4 mb-md-4">
                        Empowering citizens to report corruption, track complaints, and hold public officials
                        accountable. Join us in building a corruption-free Bangladesh through transparency and
                        collective action.
                    </p>

                    <div class="hero-buttons">
                        <a href="/signup" class="btn btn-primary me-0 me-sm-2 mx-0">Sign up</a>
                        {{--                        <a href="https://youtu.be/K34gBCjzni8?si=3u_RGyJbv9iYoSUz" class="btn btn-link mt-2 mt-sm-0 glightbox">--}}
                        {{--                            <i class="bi bi-play-circle me-1"></i>--}}
                        {{--                            How It Works--}}
                        {{--                        </a>--}}
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="gradient-border shadow">
                    <div class="card transparent-card">
                        <div class="card-body">
                            <h4 class="text-primary text-center mb-5">Sign in</h4>
                            <div class="container-fluid m-0 p-0">

                                <div class="mb-3">
                                    <label class="fw-bold small text-uppercase label-large">Email Address <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input id="email" placeholder="Enter your email" class="form-control" type="email" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-bold small text-uppercase label-large">Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input id="password" placeholder="Create password" class="form-control" type="password" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button onclick="submitSignin()" class="mt-2 w-100 btn-primary text-white fw-bold rounded-pill shadow-sm">
                                        Login
                                    </button>
                                </div>

                                <div class="mb-3 text-center">
                                    <p class="mb-0">Don't have an account? <a href="/signup" class="text-primary fw-bold">Sign up</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="50">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="stat-content">
                        <h4>95% Case Resolution</h4>
                        <p class="mb-0">Complaints addressed</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="stat-content">
                        <h4>12.5k Citizens</h4>
                        <p class="mb-0">Active participants</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-lightning"></i>
                    </div>
                    <div class="stat-content">
                        <h4>24h Response</h4>
                        <p class="mb-0">Average SLA time</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="stat-content">
                        <h4>64 Districts</h4>
                        <p class="mb-0">Nationwide coverage</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Hero Section -->

<style>
    .gradient-border {
        border-radius: 1rem;
    }

    .transparent-card {
        background-color: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: 1rem;
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
