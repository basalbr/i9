<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>Crown - premium responsive admin template for backend systems</title>
        {{ HTML::style(public_path().'css/admin/main.css')}}

        {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js')}}
        {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js')}}
        {{ HTML::script(public_path().'js/plugins/forms/uniform.js')}}
        {{ HTML::script(public_path().'js/plugins/forms/jquery.validationEngine-en.js')}}
        {{ HTML::script(public_path().'js/plugins/forms/jquery.validationEngine.js')}}
        {{ HTML::script(public_path().'js/admin/login.js')}}

    </head>

    <body class="nobg loginPage">

        <!-- Main content wrapper -->
        <div class="loginWrapper">
            <div class="loginLogo">{{ HTML::image(public_path().'images/admin/loginLogo.png')}}</div>
              @yield('content')
            
        </div>    

        <!-- Footer line -->
        <div id="footer">
            <div class="wrapper">As usually all rights reserved. And as usually brought to you by <a href="http://themeforest.net/user/Kopyov?ref=kopyov" title="">Eugene Kopyov</a></div>
        </div>

    </body>
@include('admin.layouts.dialog-layout')
</html>