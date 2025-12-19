<!DOCTYPE html>

<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name')}}| @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dashboard/dist/css/adminlte.min.css')}}">
</head>

<div class="wrapper">

  <!-- Navbar -->
 @include('layouts.sections.header')
  <!-- /.navbar -->


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      
        
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              @yield('breadcrumb')
            </ol>
          </div><!-- /.col -->
      
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<div  class="content">
  @yield('content')

</div>
    <!-- /.content -->
  </div>

</div>


<!-- jQuery -->


</html>