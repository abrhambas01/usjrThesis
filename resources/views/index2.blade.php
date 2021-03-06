<!DOCTYPE html>
<html lang="en" class="no-focus"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<title>Mypharma</title>

	<meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
	<meta name="author" content="pixelcave">
	<meta name="robots" content="noindex, nofollow">

	<!-- Open Graph Meta -->
	<meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
	<meta property="og:site_name" content="Codebase">
	<meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
	<meta property="og:type" content="website">
	<meta property="og:url" content="">
	<meta property="og:image" content="">

	<!-- Icons -->
	<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
	<link rel="shortcut icon" href="assets/img/favicons/favicon.png">
	<link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/android-chrome-192x192.png">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
	<!-- END Icons -->

	<!-- Stylesheets -->
	<!-- Codebase framework -->
	<link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

	<!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
	<link rel="stylesheet" id="css-theme" href="assets/css/themes/earth.min.css">

  <link rel="stylesheet" id="css-theme" href="css/fonts.css">


  <!-- END Stylesheets -->
</head>
<body>
	<!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Codebase() -> uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-inverse'                           Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-inverse'                       Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
          -->
          <div id="page-container" class="main-content-boxed">
           <!-- Main Container -->
           <main id="main-container">
            <!-- Hero -->
            <div class="bg-image" style="background-image: url('assets/img/photos/photo34@2x.jpg');">
             <div class="hero bg-black-op">
              <div class="hero-inner">
               <div class="content content-full text-center">
                <h1 class="display-3 font-w700 text-white mb-10 invisible logo" data-toggle="appear" data-class="animated fadeInDown">
                 <i class="si si-map font-size-h1 text-success"></i>

                 <span class="text-success logo-1">Mypharma</span>
               </h1>
               <h2 class="font-w400 text-white-op mb-50 invisible logo-main" data-toggle="appear" data-class="animated fadeInDown">Medicines for Filipino Elderlies
               </h2>
               <a class="btn btn-hero btn-noborder btn-rounded btn-success mb-10 invisible" data-toggle="appear" href="{{ url('login') }}">
                 <i class="fa fa-shopping-bag mr-10"></i> Account Login
               </a>
               <a class="btn btn-hero btn-noborder btn-rounded btn-alt-primary mb-10 invisible" data-toggle="appear" href="#">
                 <i class="si si-rocket mr-5"></i> Request for An Account
               </a>
             </div>
           </div>
         </div>
       </div>
       <!-- END Hero -->

       <!-- Feature: Powerful Layout -->
       <div class="bg-white">
         <div class="content">
          <div class="pt-100 pb-50">
           <h3 class="h1 font-w700 text-center mb-10">
            How  <span class="text-primary">it works ? </span>
          </h3>
          <h4 class="h3 font-w400 text-muted text-center mb-30">	Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
          <hr>
          <div class="row nice-copy my-10">
            <div class="col-md-4 py-20">
             <h4 class="font-size-xl font-w700 text-uppercase mb-10">
              <i class="fa fa-circle-o text-elegance mr-5"></i> Admin
            </h4>
            <p class="mb-0">Registers / Adds  Users to the Site. Manages all the users </p>
          </div>
          <div class="col-md-4 py-20">
           <h4 class="font-size-xl font-w700 text-uppercase mb-10">
            <i class="fa fa-refresh text-earth mr-5"></i> Social Workers
          </h4>
          <p class="mb-0">	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non sunt pariatur quibusdam voluptas quae, tempore maiores dolorem consectetur itaque, vel, enim aspernatur distinctio. Necessitatibus, fugit. Veritatis illo nam dolore sint!</p>
        </div>
        <div class="col-md-4 py-20">
         <h4 class="font-size-xl font-w700 text-uppercase mb-10">
          <i class="fa fa-bolt text-danger mr-5"></i> Couriers
        </h4>
        <p class="mb-0">	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum officiis saepe porro, accusantium eius voluptatibus deserunt debitis dolore. Maiores, vero!</p>
      </div>
    </div>
  </div>
</div>
</div>
<!-- END Feature: Powerful Layout -->

<!-- Feature: Bootstrap 4 -->
<!-- Features -->
<div class="bg-body-light">
 <div class="content content-full">
  <div class="pt-100 pb-50">
   <h3 class="h1 font-w700 text-center mb-10">
    Feature <span class="text-primary">Rich</span>
  </h3>
  <h4 class="h3 font-w400 text-muted text-center mb-30">Extra care and thought were put into each and every one.</h4>
  <hr>
  <div class="row nice-copy py-10">
    <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">HTML5 &amp; CSS3</h4>
     <p class="mb-0">Using the latest technologies, following the best practices. W3C valid code.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Fully Responsive</h4>
     <p class="mb-0">User Interface auto adjusts and looks great to any screen size.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Retina Ready</h4>
     <p class="mb-0">User Interface looks crispy clear on high resolution screens.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Cross Browser Support</h4>
     <p class="mb-0">It plays nice with all modern browsers including IE (10 and up).</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Fast &amp; Lightweight</h4>
     <p class="mb-0">It is created to be as fast and lightweight as possible. You can use only what you need.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Custom JS APIs</h4>
     <p class="mb-0">Powerful JavaScript APIs are included. Layout or blocks manipulation is just a JS call away.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Get Started Version</h4>
     <p class="mb-0">Simple version with boilerplate pages to help you rocket start your project.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">PHP Version</h4>
     <p class="mb-0">A PHP version is included to assist you with your custom PHP project.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">HTML Version</h4>
     <p class="mb-0">The generic and abstract version which can be used with any framework or language.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">RTL Support</h4>
     <p class="mb-0">Boilerplate RTL pages are also included in 'Get Started' version providing a good starting point.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Components</h4>
     <p class="mb-0">Carefully picked and integrated to enhance and enrich your project with great functionality.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">6 Inspiring Color Themes</h4>
     <p class="mb-0">Carefully chosen and integrated color themes to choose from for your website/dashboard.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">800+ Font Based Icons</h4>
     <p class="mb-0">With so many unique icons included in Codebase, you don’t have to worry about running out.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Super-Fast UI</h4>
     <p class="mb-0">GPU powered sidebar animations and smart CSS styles will ensure a great experience.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Flexible Side Areas</h4>
     <p class="mb-0">Multiple available layouts and completely adjustable by using the powerful layout API.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Designed Pages</h4>
     <p class="mb-0">All kinds of pages, carefully designed, to get inspired and create your own.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Gulp Tasks</h4>
     <p class="mb-0">Time-saving tasks that will be a valuable tool to your workflow.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Easy Updating</h4>
     <p class="mb-0">Updating a template can be hard but if you follow the instructions you will be just a copy-paste away.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Free Updates</h4>
     <p class="mb-0">All updates are free for existing customers to download. Great new features at no extra cost.</p>
   </div>
   <div class="col-md-4 py-20">
     <h4 class="font-size-lg font-w700 text-uppercase mb-5">Support</h4>
     <p class="mb-0">By purchasing a license, you are eligible to email support. We are here to help!</p>
   </div>
   <div class="col-md-4 py-20 text-center text-md-left">
     <h4 class="font-size-lg font-w700 text-uppercase mb-15">Many Many More..</h4>
     <a class="btn btn-hero btn-sm btn-rounded btn-alt-primary" href="be_pages_dashboard.html">
      <i class="fa fa-external-link-square mr-5"></i> Explore Codebase
    </a>
  </div>
</div>
</div>
</div>
</div>
<!-- END Features -->

<!-- Call to Action -->
<div class="bg-white">
 <div class="content content-full text-center overflow-hidden">
  <div class="py-100">
   <h3 class="font-w700 mb-10">
    Crafted with <i class="fa fa-heart text-danger"></i> by <a class="link-effect" href="http://goo.gl/vNS3I">pixelcave</a>
  </h3>
  <h4 class="font-w400 text-muted mb-30">Passionate web design and development since 2009.</h4>
  <a class="btn btn-hero btn-lg btn-noborder btn-rounded btn-alt-success mb-10 invisible" data-toggle="appear" data-class="animated zoomIn" href="https://goo.gl/po9Usv">
    <i class="fa fa-shopping-bag mr-10"></i> Purchase Codebase
  </a>
</div>
</div>
</div>
<!-- END Call to Action -->
</main>
<!-- END Main Container -->
</div>
<!-- END Page Container -->

<!-- Codebase Core JS -->
<script src="{{ asset('build/js/core-admin.js') }}"></script>


</body>
</html>