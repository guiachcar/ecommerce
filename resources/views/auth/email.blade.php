<!DOCTYPE html>
<html>
<head>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!--Fonts Aesowe -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    
    <!-- Bootstrap Core Css -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../css/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/all-themes.css" rel="stylesheet" />


    <title>Combra - SPALOG </title>
</head>
 <body class="signup-page">
<section class="mbr-after-navbar" id="gallery1-4">
    <div class="signup-box">
        <div class="logo">
            <a href="/">spaLog<b>COMBRA</b></a>
            <small>Recuperar senha</small>
        </div>
        <div class="card">
            <div class="body">


                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Enviar senha 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
      </div>
      </div>
</section>

   <script src="../js/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="/js/bootstrap.js"></script>
    <!-- Select Plugin Js -->
    <script src="/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="/js/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="/js/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="/js/jquery.dataTables.js"></script>
    <script src="/js/dataTables.bootstrap.js"></script>
    <script src="/js/dataTables.buttons.min.js"></script>
    <script src="/js/buttons.flash.min.js"></script>
    <script src="/js/jszip.min.js"></script>
    <script src="/js/pdfmake.min.js"></script>
    <script src="/js/vfs_fonts.js"></script>
    <script src="/js/buttons.html5.min.js"></script>
    <script src="/js/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="/js/jquery-datatable.js"></script>

    <!-- Custom Js -->
    <script src="/js/demo.js"></script>
      <!-- Validation Plugin Js -->
    <script src="/js/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="/js/sign-up.js"></script>


</body>
</html>
