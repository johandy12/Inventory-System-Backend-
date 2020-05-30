<!Doctype html>
<html lang="en-gb" class="no-js">

<head>
    <title>Red Art - Digital Painting</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
	<meta name="author" content="">
    
    <!-- **CSS - stylesheets** -->
	<link href="resources/views/frontend/styles.css"                            rel="stylesheet" type="text/css" media="all" id="default-css"/>
    <link href="public/frontend/css/plugins/style.css"                          rel="stylesheet" type="text/css" media="all" id="sample-css"/>
    <link href="public/frontend/js/plugins/custom-scroll/mCustomScrollbar.css"  rel="stylesheet" type="text/css"/>
	
    <!-- **Additional - stylesheets** -->
    <link href="resources/views/frontend/favicon.ico"               rel="shortcut icon" type="image/x-icon"/>
	<link href="public/frontend/css/plugins/shortcodes.css"         rel="stylesheet" type="text/css" media="all" id="shortcodes-css"/>
    <link href="public/frontend/css/plugins/skins/red/style.css"    rel="stylesheet" type="text/css" media="all" id="skin-css"/>
    <link href="public/frontend/css/plugins/dark/dark.css"          rel="stylesheet" type="text/css" media="all" id="light-dark-css"/>
    <link href="public/frontend/css/plugins/animations.css"         rel="stylesheet" type="text/css" media="all"/>
    <link href="public/frontend/css/plugins/isotope.css"            rel="stylesheet" type="text/css" media="all"/>
	<link href="public/frontend/css/plugins/responsive.css"         rel="stylesheet" type="text/css" media="all"/>           
    <link href="public/frontend/css/plugins/prettyPhoto.css"        rel="stylesheet" type="text/css"/>
    <link href="public/frontend/css/plugins/pace.css"               rel="stylesheet" type="text/css"/>
    <!--<link href="public/frontend/css/plugins/font-awesome.min.css"   rel="stylesheet" type="text/css"/>-->
</head>

<body>
    <!-- <div class="loader-wrapper">
        <div id="large-header" class="large-header">
            <h1 class="loader-title"><span>Red</span> Art</h1>
        </div>        
    </div> -->
    <!-- **Wrapper** -->
    <div class="wrapper">
        <div class="inner-wrapper">
            <div class="navbar">
                <div id="header-wrapper" class="dt-sticky-menu"> <!-- **header-wrapper Starts** -->
                    <header class="slide-bar">
                        <div class="header-container">
                            <div class="header-inner">
                                <a href="#" class="close-btn">
                                    <span class="close"></span>
                                </a>
                                <a href="index.html" class="logo-container">
                                    <!-- <img src="public/frontend/images/logo.png" alt="" > -->
                                    <img src="public/frontend/images/BabelacImg/linkedin_banner_image_1_2.jpg" alt="" >
                                    <!-- <img src="/public/frontend/js/images/BabelacImg/pinterest_profile_image.png" alt="" > -->
                                </a>
                                <nav>
                                    <ul class="menu type3">
                                        <li class="menu-item-simple-parent">
                                            <!-- <a href="#">Inventory<span class="arrow"></span></a> -->
                                            <!-- <a href="#">Inventory</a> -->
                                                <input class="search form-control mr-sm-2" type="search" placeholder="Search" aria-label="search">
                                                <br>
                                                <br>
                                                <button type="submit" class="searchButton dt-sc-button type1 small">Search</button>
                                                <!-- <a class="dt-sc-button small type3" style="width: inherit;" href="#">Login</a><div class="clear"> </div> -->
                                            <!-- <ul class="sub-menu">
                                                <li><a href="http://www.wedesignthemes.com/html/redart/default">Default</a></li>
                                            </ul> -->
                                        </li>
                                        <li class="menu-item-simple-parent"><a href="#">Inventory<span class="arrow"></span></a>
                                            <ul class="sub-menu">
                                                <li><a href="gallery.html">Category A</a></li>
                                                <li><a href="gallery.html">Category B</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-simple-parent"><a href="#">Sales<span class="arrow"></span></a>
                                            <ul class="sub-menu">
                                                <li><a href="gallery.html">Sales Statistics</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li class="menu-item-simple-parent"><a href="#">Seller<span class="arrow"></span></a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html">Seller List</a></li>
                                            </ul>
                                        </li>   -->
                                        <!-- <li class="current_page_item menu-item-simple-parent"><a href="#">Account<span class="arrow"></span></a>                                                                         -->
                                        <li class="menu-item-simple-parent"><a href="#">Account<span class="arrow"></span></a>
                                            <ul class="sub-menu">
                                                <!-- kalo usernya admin, display ini, kalo gk hide -->
                                                <li><a href="blog.html">Master Data</a></li>
                                                <li><a href="blog.html">Your Profile</a></li>
                                                <li><a href="blog.html">Logout</a></li>
                                            </ul>
                                        </li>                                           
                                    </ul>
                                </nav>
                                <div class="social-icons">
                                    <a class="fa fa-facebook" href="#"></a>
                                    <a class="fa fa-twitter" href="#"></a>
                                    <a class="fa fa-instagram" href="#"></a>
                                </div>
                                <p class="copyrights">COPYRIGHT &copy; <a href="">BABELAC</a></p>                        
                            </div>
                        </div>
                    </header>
                    
                    <div class="header-bar active" style="display:block">
                        <a href="#" class="menu-nav">
                            <span></span>
                        </a>
                        <a class="logo-mini" href="index.html">
                            <!-- <img src="/public/frontend/js/images/logo-mini.png" alt=""> -->
                            <span><i>BABE</i>LAC</span>
                        </a>
                        <a class="logo-mobile" href="index.html">
                            <!-- <img alt="" src="/public/frontend/js/images/logo-mini.png"> -->
                            <p><span>BABE</span>LAC</p>
                        </a>
                    </div>
                </div><!-- **header-wrapper Ends** -->
            </div>

            <div id="main">
                <div class="container">
                    <div class="main-title" data-animation="pullDown" data-delay="100" style="margin-bottom: 20px;">
                        <h3> Login </h3>
                    </div>
                        <!-- **respond - Starts** -->
                        <div id="respond">
                            <!-- INI BUAT LOGIN -->
                            <div id="loginInfo"></div>
                            <form id="commentform"  method="post"> 
                                <div>
                                    <p class="input-text form-group">
                                        <div class="dt-sc-one-third column first"></div>
                                        <div class="dt-sc-one-third column">
                                            <h3>E-mail</h3>
                                            <input id="emailText" class="emailID input-field" type="email" required="" value="" autocomplete="off" name="txtemail" title="Please enter your valid email" placeholder="Email *" />
                                        </div>
                                    <div class="dt-sc-one-third column"></div>
                                    </p>
                                </div>

                                <div>
                                    <p class="input-text form-group">
                                        <div class="dt-sc-one-third column first"></div>
                                        <div class="dt-sc-one-third column">
                                            <h3>Password</h3>
                                            <input id="passwordText" class="passwordID input-field" type="password" required="" value="" autocomplete="off" name="txtpassword" title="Please enter your valid password" placeholder="Password *" />
                                        </div>
                                    <div class="dt-sc-one-third column"></div>
                                    </p>
                                </div>

                                <div class="dt-sc-hr-invisible-very-small"></div>
                                <div class="dt-sc-one-third column first"></div>
                                <div class="dt-sc-one-third column">
                                    <p class="form-group">
                                        <!-- <input type="submit" value="Login" name="submit" class="dt-sc-button large type1" style="width: inherit;"/><div class="clear"> </div> -->
                                        <a id="login" class="dt-sc-button large type3" type="submit" value="login" style="width: inherit;" onclick="">Login</a>
                                        <div class="clear"> </div>
                                    </p>
                                    <!-- <a class="dt-sc-button small type3">Small Button</a><div class="clear"> </div>
                                    <a class="dt-sc-button medium type3" href="#">Medium Button</a><div class="clear"> </div>
                                    <a class="dt-sc-button large type3" href="#">Large Button</a><div class="clear"> </div>
                                    <a class="dt-sc-button xlarge type3" href="#">XLarge Button</a><div class="clear"> </div> -->
                                </div>
                                <div class="dt-sc-one-third column"></div>
                            </form>
                            <div id="ajax_contactform_msg"></div>                            
                        </div> <!-- **respond- Ends** -->
                    </section>
                </div>
                <footer id="footer"  data-animation="fadeIn" data-delay="100">
                    <div class="container">
                        <div class="copyright">
                            <ul class="footer-links">
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Privacy policy</a></li>
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">Faq</a></li>                    
                            </ul>
                            <!-- <ul class="payment-options">
                                <li><a href="#" class="fa fa-cc-amex"></a></li>
                                <li><a href="#" class="fa fa-cc-mastercard"></a></li>
                                <li><a href="#" class="fa fa-cc-visa"></a></li>
                                <li><a href="#" class="fa fa-cc-discover"></a></li>
                                <li><a href="#" class="fa fa-cc-paypal"></a></li>
                            </ul> -->
                            <p>© 2020 <a href="#">Babelac</a>. All rights reserved.</p>
                        </div>
                    </div>
                </footer>
            </div><!-- Main Ends Here-->
        </div>
    </div><!-- **Wrapper Ends** -->
    
    <!-- **jQuery** -->  
	<script src="public/frontend/js/plugins/jquery-3.3.1.min.js"                   type="text/javascript"></script>
	<script src="public/frontend/js/plugins/jquery.tabs.min.js"                     type="text/javascript"></script>
    <script src="public/frontend/js/plugins/jquery-migrate.min.js"                  type="text/javascript"></script>
    <script src="public/frontend/js/plugins/jquery.inview.js"                       type="text/javascript"></script>
    <script src="public/frontend/js/plugins/jquery.viewport.js"                     type="text/javascript"></script>
	<script src="public/frontend/js/plugins/jquery.validate.min.js"                 type="text/javascript"></script>    
	<script src="public/frontend/js/plugins/jsplugins.js"                           type="text/javascript"></script>    
    <script src="public/frontend/js/plugins/custom-scroll/mCustomScrollbar.min.js"  type="text/javascript"></script>
	<script src="public/frontend/js/plugins/modernizr.js"                           type="text/javascript"></script>
	<script src="public/frontend/js/login.js"                                       type="text/javascript"></script>
</body>
</html>
