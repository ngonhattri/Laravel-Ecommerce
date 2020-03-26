<!DOCTYPE HTML>
<html>
<head>
<title>@yield('title')</title>
<base href="{{asset('')}}">
<link rel="shortcut icon" href="client/images/favicon.ico" type="image/x-icon" >
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- SEO Facebook-->
<meta property="og:title" content="@yield('title')"/> 
<meta property="og:url" content="@yield('url')"/> 
<meta property="og:site_name" content="@yield('title')"/> 
<meta property="og:image" content="@yield('image')"/> 
<meta property="og:type" content="website"/> 
<meta property="og:description" content="@yield('meta_description')"/>
<!-- SEO Classic -->
<meta name="keywords" content="@yield('meta_keyword')"/>
<meta name="description" content="@yield('meta_description')"/>
<!-- Library -->
<link href="client/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="client/css/style.css" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="client/css/fwslider.css">
<link rel="stylesheet" href="client/css/etalage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
	<div class="header">
		@include('client.layouts.header')		
	</div>
		@yield('content')
	<div class="footer">
		@include('client.layouts.footer')
	</div>
	{{-- Template --}}
	<script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
	<script src="client/js/jquery.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="client/js/jquery.etalage.min.js"></script>
	<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});
				// This is for the dropdown list example:
				$('.dropdownlist').change(function(){
					etalage_show( $(this).find('option:selected').attr('class') );
				});

		});
	</script>
	<script src="client/js/jquery-ui.min.js"></script>
	<script src="client/js/fwslider.js"></script>
	<script type="text/javascript" src="client/js/responsive-nav.js"></script>
	{{-- AngularJS --}}
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="client/js/ng-ckeditor.min.js"></script>
	<script src="client/js/ng-file-upload-shim.min.js"></script>
	<script src="client/js/ng-file-upload.min.js"></script>
	<script src="client/js/angular-ui-router.min.js"></script>
	{{-- Service --}}
	<script src="app/shared/modules/customer.common.js"></script>
	<script src="app/shared/services/apiService.js"></script>
	<script src="app/shared/services/notificationService.js"></script>
	{{-- Module --}}
	<script src="app/components/users/users.module.js"></script>
	<script src="app/components/products/products.module.js"></script>
	<script src="app/app.js"></script>
	{{-- User --}}
	<script src="app/components/users/userListController.js"></script>
	<script src="app/components/users/userEditController.js"></script>
	<script src="app/components/users/userAvatarController.js"></script>
	<script src="app/components/users/userPasswordController.js"></script>
	{{-- Product --}}
	<script src="app/components/products/productListController.js"></script>
	<script src="app/components/products/productEditController.js"></script>
	<script src="app/components/products/productAddController.js"></script>
	<script src="app/components/products/productImageController.js"></script>
</body>	
</html>