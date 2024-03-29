<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<footer class="bg-light">
    <div class="container py-5">
        <div class="row py-4">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <p class="font-italic text-muted">21, Kandy Road, Malabe. Sri Lanka.</p>
            <p class="font-italic text-muted">Follow us for exclusive discounts & new arrivals</p>
            <ul class="list-inline mt-4" style="font-size: 1.5rem;">
            <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter-xs"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i class="fa fa-vimeo"></i></a></li>
            </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
            <h6 class="text-uppercase font-weight-bold mb-4">Shop</h6>
            <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="user-all-products.php" class="text-muted">All Products</a></li>
            <li class="mb-2"><a href="user-all-laptop.php" class="text-muted">Laptops</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Keyboards</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Mice</a></li>
            </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
            <h6 class="text-uppercase font-weight-bold mb-4">Company</h6>
            <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="user-login.php" class="text-muted">Login</a></li>
            <li class="mb-2"><a href="user-signup.php" class="text-muted">Register</a></li>
            <li class="mb-2"><a href="user-wishlist.php" class="text-muted">Wishlist</a></li>
            <li class="mb-2"><a href="contact-us.php" class="text-muted">Contact Us</a></li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-6 mb-lg-0">
            <h6 class="text-uppercase font-weight-bold mb-4">Newsletter</h6>
            <p class="text-muted mb-4">SIGN UP FOR OUR NEWSLETTER, GET 10% OFF YOUR NEXT ORDER</p>
            <form action="user-subscription.php" method="POST">
                <div class="p-1 rounded border">
                <div class="input-group">
                    <input type="email" placeholder="Enter your email address" class="form-control border-0 shadow-0" name="subscriberMail" required>
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-link" name="subscribe"><i class="fa fa-paper-plane"></i></button>
                    </div>
                </div>
                </div>
            </form>
        </div>
        </div>
        <div class="py-4">
            <p class="text-center text-dark mb-0 py-2">© 2021 laptopcart.lk (Pvt) Ltd. All rights reserved.</p>
        </div>
    </div>
</footer>


<style>
    html, body{
        height: 100%;
    }
    main {
        min-height: 100vh;
    }
    footer {
        bottom: 0;
        width: 100%;
    }
    i {
        color: blue;
    }
    .form-control::placeholder {
        font-size: 0.95rem;
        color: #aaa;
        font-style: italic;
    }
    .form-control.shadow-0:focus {
        box-shadow: none;
    }
</style>