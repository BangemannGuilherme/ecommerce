<?php if(!class_exists('Rain\Tpl')){exit;}?>        </body>
    </html>
<div class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">Information</h3>
                    <ul class="no-bullet">
                        <li><a href="/">Site map</a></li>
                        <li><a href="/">About us</a></li>
                        <li><a href="/">FAQ</a></li>
                        <li><a href="/">Privacy Policy</a></li>
                        <li><a href="/">Contact</a></li>
                    </ul>
                </div> <!-- .widget -->
            </div> <!-- column -->
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">Consumer Service</h3>
                    <ul class="no-bullet">
                        <li><a href="/">Secure</a></li>
                        <li><a href="/">Shipping &amp; Returns</a></li>
                        <li><a href="/">Shipping</a></li>
                        <li><a href="/">Orders &amp; Returns</a></li>
                        <li><a href="/">Group Sales</a></li>
                    </ul>
                </div> <!-- .widget -->
            </div> <!-- column -->
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">My Account</h3>
                    <ul class="no-bullet">
                        <li><a href="/login">Login/Register</a></li>
                        <li><a href="/">Settings</a></li>
                        <li><a href="/cart">Cart</a></li>
                        <li><a href="/">Order Tracking</a></li>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </div> <!-- .widget -->
            </div> <!-- column -->
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">Genres</h3>
                    <ul class="no-bullet">
                        <?php require $this->checkTemplate("categories-menu");?>
                    </ul>
                </div> <!-- .widget -->
            </div> <!-- column -->
            <div class="col-md-6">
                <div class="widget">
                    <h3 class="widget-title">Join our newsletter</h3>
                    <form action="#" class="newsletter-form">
                        <input type="text" placeholder="Enter your email...">
                        <input type="submit" value="Subsribe">
                    </form>
                </div> <!-- .widget -->
            </div> <!-- column -->
        </div><!-- .row -->

        <div class="colophon">
            <div class="copy">Copyright © Guiboy 2021. All rights reserved.</div>
            <div class="social-links square">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
            </div> <!-- .social-links -->
        </div> <!-- .colophon -->
    </div> <!-- .container -->
</div> <!-- .site-footer -->
</div>

<div class="overlay"></div>

<div class="auth-popup popup">
<a href="#" class="close"><i class="fa fa-times"></i></a>
<div class="row">
    <div class="col-md-6">
        <h2 class="section-title">Login</h2>
        <form action="#">
            <input type="text" placeholder="Email address...">
            <input type="password" placeholder="Password...">
            <input type="submit" value="Login">
        </form>
    </div> <!-- .column -->
    <div class="col-md-6">
        <h2 class="section-title">Create an account</h2>
        <form action="#">
            <input type="text" placeholder="Name...">
            <input type="text" placeholder="Email address...">
            <input type="text" placeholder="Phone...">
            <input type="password" placeholder="Password...">
            <input type="submit" value="Register">
        </form>
    </div> <!-- .column -->
</div> <!-- .row -->
</div> <!-- .auth-popup -->

<script src="/resources/site/js/jquery-1.11.1.min.js"></script>
<script src="/resources/site/js/plugins.js"></script>
<script src="/resources/site/js/app.js"></script>

</body>

</html>