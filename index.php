<?php
// Script by Sebastian Wirajaya

session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);

$user = mysql_query("SELECT * FROM user");
$transaksi = mysql_query("SELECT * FROM historyall");
$totaluser = mysql_num_rows($user);
$totaltransaksi = mysql_num_rows($transaksi);
$transaksianda = mysql_query("SELECT * FROM historyall WHERE pembeli = '$username' ORDER BY id DESC");
$totaltransaksianda = mysql_num_rows($transaksianda);

$nama = $get['nama'];
$fbid = $get['fbid'];
$password = $get['password'];
$level = $get['level'];
$saldo = "Rp." . number_format($get['saldo'],0,',','.');
$uplink = $get['uplink'];
?>

<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Panel Berkualitas">
        <meta name="author" content="Renardo Eka Saputra">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Halaman Utama | M-Panel</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="path/to/material-design-iconic-font/css/material-design-iconic-font.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-74137680-1', 'auto');
    ga('send', 'pageview');
</script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.php" class="logo"><span>M<span>-Panel</span></span><i class="zmdi zmdi-layers"></i></a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Page title -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left">
                                    <i class="zmdi zmdi-menu"></i>
                                </button>
                            </li>
                            <li>
                                <h4 class="page-title">Dashboard</h4>
                            </li>
                        </ul>

                        <!-- Right(Notification and Searchbox -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <!-- Notification -->
                                <!-- End Notification bar -->
                            </li>
                        </ul>

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!-- User -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="https://graph.facebook.com/<?php echo $fbid ?>/picture?width=100&height=100" alt="user-img" title="Gambar Ente" class="img-circle img-thumbnail img-responsive">
                            <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                        </div>
                        <h5><a href="#"><?php echo $nama ?></a> </h5>
                        <ul class="list-inline">
                            <li>
                                <a href="#" >
                                    <i class="zmdi zmdi-settings"></i>
                                </a>
                            </li>

                            <li>
                                <a href="logout.php" class="text-custom">
                                    <i class="zmdi zmdi-power"> Logout</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="text-muted menu-title">Navigation</li>

                            <li>
                                <a href="index.php" class="waves-effect active"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-account"></i> <span> User Interface </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;" onclick="buka('panel/history');">History Transactions</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/changepwd');">Edit Info Account</a></li>
                                    <li><a href="javascript:;" onclick="buka('item/chat');">Chat Room</a></li>
                                </ul>
                            </li>



                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-instagram"></i> <span> Social Media </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                	<li><a href="javascript:;" onclick="buka('item/order');">Order All Sosmed</a></li>
                                	<li><a href="javascript:;" onclick="buka('item/likeig');">Instagram Like</a></li>
                                    <li><a href="javascript:;" onclick="buka('price');">Price List</a></li>
                                </ul>
                            </li>
<?php if($level == 'Admin') { ?>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-chart"></i><span> Admin Page </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;" onclick="buka('panel/cekuser');">Cek User</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/cekorder');"">Cek Order</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/cekstockv');">Cek Stok Voucher</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/tambahstockv');">Tambah Stock Voucher</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/gantistatusorder');">Ganti Status Order</a></li>
                                </ul>
                            </li>
<? } else { ?><? } ?>
<?php if($level == 'Admin') { ?>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-account-box"></i><span> Admin Panel </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;" onclick="buka('panel/tambahuser');">Tambah User</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/eventmember');">[Event] Tambah Member</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/hapususer');">Hapus User</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/topupsaldo');">Top Up Saldo</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/upgrademember');">Member To VIP</a></li>
                                </ul>
                            </li>
<? } else if($level == 'Reseller') { ?>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-account-box"></i><span>Reseller Panel </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;" onclick="buka('panel/tambahuser');">Tambah User</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/eventmember');">[Event] Tambah Member</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/hapususer');">Hapus User</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/topupsaldo');">Top Up Saldo</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/upgrademember');">Member To VIP</a></li>
                                </ul>
                            </li>
<? } else if($level == 'MemberVIP') { ?>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-account-box"></i><span>AdminVIP Panel </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;" onclick="buka('panel/tambahuser');">Tambah User</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/eventmember');">[Event] Tambah Member</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/hapususer');">Hapus User</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/topupsaldo');">Top Up Saldo</a></li>
                                    <li><a href="javascript:;" onclick="buka('panel/upgrademember');">Member To VIP</a></li>
                                </ul>
                            </li>
<? } else { ?>
                          <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-account-box"></i>Member Panel</span> <span class="menu-arrow"></span></a>
                             <ul class="list-unstyled">
                            <li><a href="javascript:;" onclick="buka('panel/maintenance');">Eror Tidak Ada Akses</a></li>
            </ul>
          </li>
<? } ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">

                            <div class="col-md-3">
                                <div class="panel panel-border panel-danger">
                            <div class="panel-heading"><font color="black"><b><center>Total User</center></font></b></div>
                                    <div class="panel-body">
                                    <div class="text-center">
                                        <h3 class="text-danger" data-plugin="counterup"><?php echo $totaluser ?></h3>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel panel-border panel-warning">
                            <div class="panel-heading"><font color="black"><b><center>Total Transaksi</center></font></b></div>
                                    <div class="panel-body">
                                    <div class="text-center">
                                        <h3 class="text-warning" data-plugin="counterup"><?php echo $totaltransaksi ?></h3>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel panel-border panel-primary">
                            <div class="panel-heading"><font color="black"><b><center>My Transaksi</center></font></b></div>
                                    <div class="panel-body">
                                    <div class="text-center">
                                        <h3 class="text-info" data-plugin="counterup"><?php echo $totaltransaksianda ?></h3>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel panel-border panel-success">
                            <div class="panel-heading"><font color="black"><b><center>Saldo</center></font></b></div>
                                    <div class="panel-body">
                                    <div class="text-center">
                                        <h3 class="text-success" data-plugin="counterup"><?php echo $saldo ?></h3>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-lg-12">
<div class="panel panel-color panel-primary" id="konten">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title"><i class="zmdi zmdi-notifications-active"></i> New Informations</h3>
                                    </div> 
                                    <div class="panel-body" style="height: 200px; overflow-y: auto;">
<div class="alert alert-danger"><strong><i class="zmdi zmdi-calendar"></i> 2016-04-30</strong><br><span class="label label-inverse">News</span> Initial Release!</div>                                    </div> 
                                </div>
                            </div><!-- end col -->
                        <!-- end row -->


                        <div class="row">
                            <div class="col-lg-8">
                            	<div class="card-box">

                        			<h4 class="header-title m-t-0 m-b-30">Information Account</h4>
<div class="about-info-p">
                                                <strong>Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $nama ?></p>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>FBID</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $fbid ?></p>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>Username</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $username ?></p>
                                            </div>
                                            <div class="about-info-p m-b-0">
                                                <strong>Level</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $level ?></p>
                                        </div>

								</div>
                            </div><!-- end col -->

                            <div class="col-lg-4">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>

                        			<h4 class="header-title m-t-0 m-b-30">Result Box</h4>
<div id="result" style="height: 210px; overflow-y: auto;">
</div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2016 M-Panel.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

        <!--Morris Chart-->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582ECSaLdwqSpn3fubAs7GmWdwnuBYp8MUEeFh%2feKwyyR2ujryc9qOYcpAkqwsrFxYjP8YEX%2b6qUs7%2fpF0N4%2f2V%2fvEfVdBDQ9bSHldb8ihjqyvVx37CGoCYBWHOuMaS11nyISDv4Hqg72ZDQES%2buvyJAhTXMJVyEf3ppP%2bPYWaXiLHYVs%2fuLi2%2b6Z2CCS8JrZXfYeE7G4AGy9olEJ%2fB7R6WV703yUAhxxKTMG0EYpgrec3q3GbmciEoMOkRXd%2bfpUInLhwJqN15SIsXDRi%2fjqyHiIc2MYYinLCKi22RRf1gmUMSRG%2bj1ROWx3oQvRmDhW3idDS2qZMX%2fjxlPmesdPe8X3eNK6%2blJam%2beUW9g3nAY9vMg%2f67UKfMAyP5PYEn9P%2fLrVE3zstGFbFWvq9FrdoSw9bJYFwRJgMRXmn7KZ5zN%2b4pjrE95NRdFVuqmWFc%2bK%2fVoX6%2b6%2fcWMpnDxYgzl7UiUnvW3AaxupuBaZ73mUjFO4UW1uWevMvp%2bFvbQqLD%2fUXeRb1Y5uqMsDh" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
<script>
// Script by Sebastian Wirajaya

function buka(nama) {
$("#konten").html('<div class="card-box"><h4 class="header-title m-t-0">Loading konten...</h4></div><div class="clearfix"></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: 100%"></div></div></div>');
	$.ajax({
		url	: nama+'.php',
		type	: 'GET',
		dataType: 'html',
		success	: function(isi){
			$("#konten").html(isi);
		},
	});
}

function post(){
    $('#result').html('<div class="progress progress-striped active"><div class="progress-bar progress-bar-inverse" style="width: 100%"></div></div>');
    $("input").attr("disabled", "disabled");
    $("select").attr("disabled", "disabled");
    $("button").attr("disabled", "disabled");
    $("textarea").attr("disabled", "disabled");
}
function hasil(){
    $("input").removeAttr("disabled");
    $("select").removeAttr("disabled");
    $("button").removeAttr("disabled");
    $("textarea").removeAttr("disabled");
}
</script>
</html>