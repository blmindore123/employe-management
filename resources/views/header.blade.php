<!DOCTYPE html>
<html lang="en">
<head>
  <title> {{env('APP_NAME')}} </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{url('public/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('/public/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('/public/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('/public/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{url('/public/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('/public/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('/public/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{url('/public/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('/public/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('/public/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('/public/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('/public/css/toastr.min.css')}}">
<!--===============================================================================================-->
<script src="{{url('/public/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendor/proengsoft/laravel-jsvalidation/public/js/jsvalidation.js')}}"></script>

<style>
.new-msg:focus {
  border:1px solid #cccccc !important ;
}

.open_chatview {
   position:fixed!important ;
   bottom:20px;
   width:95%;
}

.myContainer {
  overflow-y:auto;
  height:460px;
}

.fa-trash{ color:red; }

.error-help-block{ color:red; }

.form-control:focus {border-color:#cccccc!important}
</style>
</head>
