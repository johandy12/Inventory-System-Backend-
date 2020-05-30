<!Doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

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
    <link href="public/frontend/css/plugins/bootstrap.css"          rel="stylesheet" type="text/css">         
    <link href="public/frontend/css/plugins/prettyPhoto.css"        rel="stylesheet" type="text/css"/>
    <link href="public/frontend/css/plugins/pace.css"               rel="stylesheet" type="text/css"/>
    <!--<link href="public/frontend/css/plugins/font-awesome.min.css"   rel="stylesheet" type="text/css"/>-->
    <link rel="stylesheet" href="../node_modules/chart.js/dist/Chart.min.css" rel="stylesheet" type="text/css"> 
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
            <div id="header-wrapper" class="dt-sticky-menu"> <!-- **header-wrapper Starts** -->
                <header class="slide-bar">
                    <div class="header-container">
                        <div class="header-inner">
                            <a href="#" class="close-btn">
                                <span class="close"></span>
                            </a>
                            <a href="index.html" class="logo-container">
                                <!-- <img src="/public/frontend/js/images/logo.png" alt="" > -->
                                <img src="/public/frontend/js/images/BabelacImg/linkedin_banner_image_1_2.jpg" alt="" >
                                <!-- <img src="/public/frontend/js/images/BabelacImg/twitter_profile_image2.jpg" alt="" > -->
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
                    <div class="share-mini">
                        <a class="show fa fa-share-alt" href="#"></a>
                        <div class="icons" style="display: none;">
                            <a class="fa fa-facebook" href="#"></a>
                            <a class="fa fa-twitter" href="#"></a>
                            <a class="fa fa-instagram" href="#"></a>
                        </div>
                    </div>                
                </div>
            </div><!-- **header-wrapper Ends** -->
            <div id="main">
                <div class="breadcrumb"><!-- *BreadCrumb Starts here** -->
                    <div class="container">
                        <h2>HO<span>ME</span></h2>
                        <div class="user-summary">
                            <div class="account-links">
                                <a href="#">My Account</a>
                                <!-- <a href="#">Checkout</a> -->
                            </div>
                            <!-- <div class="cart-count">
                                <a href="#">Shopping Bag: 0 items</a> 
                                <a href="#">($0.00)</a>
                            </div> -->
                        </div>
                    </div>
                </div><!-- *BreadCrumb Ends here** -->
                <div class="container">
                    <div class="main-title" data-animation="pullDown" data-delay="100" style="margin-bottom: 20px;">
                        <h3>Popular Item</h3>
                    </div>
                    <!-- ISI KODE DISINI -->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 marginBottomApply"><img class="HoverImage" src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" alt="picture 1"></div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 marginBottomApply"><img class="HoverImage" src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" alt="picture 1"></div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 marginBottomApply"><img class="HoverImage" src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" alt="picture 1"></div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 marginBottomApply"><img class="HoverImage" src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" alt="picture 1"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 marginBottomApply"><img class="HoverImage" src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" alt="picture 1"></div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 marginBottomApply"><img class="HoverImage" src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" alt="picture 1"></div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 marginBottomApply"><img class="HoverImage" src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" alt="picture 1"></div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 marginBottomApply"><img class="HoverImage" src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" alt="picture 1"></div>
                    </div>
                    
                    <!-- <p style="text-align: center;">
                        <a class="HoverImage" href = "https://www.tokopedia.com/"><img src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" style="padding-right: 2%;padding-left: 3%; width:250px; height: 200px;"></a>
                        <a class="HoverImage" href = "https://www.tokopedia.com/"><img src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" style="padding-right: 2%;padding-left: 3%; width:250px; height: 200px;"></a>
                        <a class="HoverImage" href = "https://www.tokopedia.com/"><img src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" style="padding-right: 2%;padding-left: 3%; width:250px; height: 200px;"></a>
                        <a class="HoverImage" href = "https://www.tokopedia.com/"><img src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" style="padding-right: 2%;padding-left: 3%; width:250px; height: 200px;"></a>
                        <a class="HoverImage" href = "https://www.tokopedia.com/"><img src="/public/frontend/js/images/BabelacImg/linkedin_profile_image.png" style="padding-right: 2%;padding-left: 3%; width:250px; height: 200px;"></a>
                    </p> -->
                    </div>
                    <br>
                    <div class="container">
                        <div class="main-title" data-animation="pullDown" data-delay="100" style="margin-bottom: 20px;">
                            <h3>Monthly Average Sales</h3>
                        </div>

                    </div>
                    <div>
                        <canvas id="barChart" ></canvas>
                        <canvas id="pieChart" ></canvas>
                    </div>
                    <script>
                        var ctx = document.getElementById('barChart').getContext('2d');
                        var ctx2 = document.getElementById('pieChart').getContext('2d');
                        //Global Options
                        Chart.defaults.global.defaultFontFamily='Josefin Sans';
                        Chart.defaults.global.defaultFontSize=14;
                        Chart.defaults.global.animation.easing = 'easeOutQuart';
                        Chart.defaults.global.animation.duration = 2500;
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June','July','August','Sept','Nov','Dec'],
                                datasets: [{
                                    label: 'Total Sales',
                                    data: [12, 19, 3, 5, 2, 3, 15, 8, 4, 14, 2],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(51, 233, 51,1 )',
                                        '#E933E9',
                                        '#3333E9',
                                        '#E9E933',
                                        '#E98E33'
                                    ]
                                    // ],
                                    // borderColor: [
                                    //     'rgba(255, 99, 132, 1)',
                                    //     'rgba(54, 162, 235, 1)',
                                    //     'rgba(255, 206, 86, 1)',
                                    //     'rgba(75, 192, 192, 1)',
                                    //     'rgba(153, 102, 255, 1)',
                                    //     'rgba(255, 159, 64, 1)'
                                    // ],
                                    // borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });

                        var myChart = new Chart(ctx2, {
                            type: 'pie',
                            data: {
                                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June','July','August','Sept','Nov','Dec'],
                                datasets: [{
                                    
                                    label: 'Total Sales',
                                    data: [12, 19, 3, 5, 2, 3, 15, 8, 4, 14, 2],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(51, 233, 51,1 )',
                                        '#E933E9',
                                        '#3333E9',
                                        '#E9E933',
                                        '#E98E33'
                                    ],
                                    
                                    borderColor: 'black'
                                    ,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                onResize : function(instance,size){

                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                    
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
	<script src="public/frontend/js/plugins/jquery-1.11.2.min.js" type="text/javascript"></script>
	<script src="public/frontend/js/plugins/jquery.tabs.min.js"></script>
    <script type="text/javascript" src="public/frontend/js/plugins/jquery-migrate.min.js"></script>
    <script src="public/frontend/js/plugins/jquery.inview.js" type="text/javascript"></script>
    <script src="public/frontend/js/plugins/jquery.viewport.js" type="text/javascript"></script>
	<script src="public/frontend/js/plugins/jquery.validate.min.js" type="text/javascript"></script>    
	<script src="public/frontend/js/plugins/jsplugins.js" type="text/javascript"></script>    
    <script type="text/javascript" src="public/frontend/js/plugins/custom-scroll/mCustomScrollbar.min.js"></script>
    <script src="public/frontend/js/plugins/custom.js"></script>
	<script src="public/frontend/js/plugins/modernizr.js" type="text/javascript"></script>    
    <script type="text/javascript" src="Inventory_Category.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <!-- <script type="text/javascript" src="myChart.js"></script> -->
    <!-- <script type="text/javascript" src="../node_modules/chart.js/dist/Chart.js"></script> -->
</body>
</html>
