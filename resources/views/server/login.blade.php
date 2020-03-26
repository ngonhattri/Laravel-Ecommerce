<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nguyễn Minh Quân</title>
        <base href="{{asset('')}}">
        <link rel="stylesheet" href="server/css/bootstrap.min.css" />
		<link rel="stylesheet" href="server/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="server/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="server/css/ace-skins.min.css" />
		<link rel="stylesheet" href="server/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="server/font-awesome/4.5.0/css/font-awesome.min.css" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    </head>
    <body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <i class="ace-icon fa fa-leaf green"></i>
                                    <span class="blue">Quân </span>
                                    <span class="white" id="id-text2">Nguyễn</span>
                                </h1>
                                <h4 class="blue" id="id-company-text">&copy; Nguyễn Minh Quân</h4>
                            </div>
                
                            <div class="space-6"></div>
                
                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-coffee green"></i>
                                                Nhập thông tin đăng nhập
                                            </h4>
                                            <div class="space-6"></div>
                
                                         
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control" placeholder="Username" id="username" />
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                    </label>
                
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" placeholder="Password" id="password" />
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>
                
                                                    <div class="space"></div>
                
                                                    <div class="clearfix">
                                                        <label class="inline">
                                                            <input type="checkbox" class="ace" name="remember">
                                                            <span class="lbl"> Remember Me</span>
                                                        </label>
                                                        <button id="login" class="width-35 pull-right btn btn-sm btn-primary">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110">Login</span>
                                                        </button>
                                                    </div>
                
                                                    <div class="space-4"></div>
                                                </fieldset>
                                           
                                        </div><!-- /.widget-main -->
                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->
                            </div><!-- /.position-relative -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>        
        
        {{-- Template --}}
		<script src="server/js/ace-extra.min.js"></script>
		<script src="server/js/jquery-2.1.4.min.js"></script> 
		<script src="server/js/bootstrap.min.js"></script>
		<script src="server/js/ace-elements.min.js"></script>
        <script src="server/js/ace.min.js"></script>
        <script src="server/js/bootbox.js"></script>
        <script src="ckeditor/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="server/js/login.js"></script>
    </body>
</html>
