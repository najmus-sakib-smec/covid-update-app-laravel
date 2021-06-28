<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SACA Covid-19 Update Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('adminHome')}}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('userView')}}" class="nav-link">User View</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <p>Welcome,{{ Auth::user()->name }}</p>

                </li>


                <!-- Notifications Dropdown Menu -->



                <li class="nav-item">
                    <form id="logout" method="POST" action="{{ route('logout')}}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>

                    </form>
                </li>

            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('adminHome')}}" class="brand-link">
                <img src="{{asset('images\SMEC_LOGO_COLOUR.png')}}" alt="Logo" style="width:250px; padding:10px">
                <h5 class="brand-text font-weight-light">Covid-19 Update Dashboard</h5>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div> -->

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                        <li class="nav-item">
                            <a href="{{route('adminHome')}}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Forms

                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="{{route('contacts')}}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Contacts

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('links')}}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Links

                                </p>
                            </a>
                        </li>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Covid Cases</h1>
                        </div>
                    </div>
                </div>
            </div>

            <hr />
            <!-- /.content-header -->

            <!-- Main content -->


            <section class="content">

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-4">

                            <x-auth-validation-errors class="mb-4 " :errors="$errors" />

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">SACA Cases</h3>
                                </div>

                                <form id="bdcases" method="POST" action="">
                                    @csrf
                                    <div class=" card-body">
                                        <input type="hidden" name="id" value={{$bdcases ? $bdcases->id : ' '}}>

                                        <div class="form-group">
                                            <label for="country_cases">Country:</label>
                                            <select class="form-control" id="country_cases" name="country_cases" onChange="toggleCountryValue()">
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="India">India</option>
                                                <option value="Kazaksthan">Kazaksthan</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Srilanka">Srilanka</option>
                                                <option value="Tajikisthan">Tajikisthan</option>
                                            </select>
                                        </div>
                                        <label for="activeCases">Active Cases</label>
                                        <input class="form-control" id="activeCases" name="activeCases" type="number" placeholder="Active Cases" value="{{$bdcases ? $bdcases->activeCases : ''}}" required>
                                        <br>
                                        <label for="total">Total affected in Bangladesh</label>
                                        <input class="form-control" id="total" name="total" type="number" placeholder="Total affected" value="{{$bdcases ? $bdcases->totalInBD : ''}}" required>
                                        <br>

                                        <label for="detect">Detected in last 24 hour</label>
                                        <input class="form-control" id="detect" name="detect" type="number" placeholder="Detected in last 24 hour" value="{{$bdcases ? $bdcases->detectInlast24hours : ''}}" required>
                                        <br>
                                        <label for="death">Death last 24 hour </label>
                                        <input class="form-control" id="death" name="death" type="number" placeholder="Death last 24 hour" value="{{$bdcases ? $bdcases->deathInlast24hours : ''}}" required>
                                        <br>
                                        <label for="totalDeath">Total Death </label>
                                        <input class="form-control" id="totalDeath" name="totalDeath" type="number" placeholder="Total Death" value="{{$bdcases ? $bdcases->totalDeath : ''}}" required>
                                        <br>
                                        <label for="healed">Healed in last 24 hour </label>
                                        <input class="form-control" id="healed" name="healed" type="number" placeholder="Healed in last 24 hour" value="{{$bdcases ? $bdcases->healedInlast24hours : ''}}" required>
                                        <br>
                                        <label for="TotalHealed">Total Healed</label>
                                        <input class="form-control" id="TotalHealed" name="TotalHealed" type="number" placeholder="Total Healed" value="{{$bdcases ? $bdcases->totalHealed : ''}}" required>
                                        <br>
                                        <div class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="infectionRate" class="col-sm-4 col-form-label">Infection rate (24 hrs)</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" name="infectionRate" id="infectionRate" placeholder="%" value="{{$bdcases ? $bdcases->infectionRate24hours : ''}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="TotalInfectionRate" class="col-sm-4 col-form-label">Infection rate (Total)</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" name="TotalInfectionRate" id="TotalInfectionRate" placeholder="%" value="{{$bdcases ? $bdcases->infectionRateTotal : ''}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="recoveryRate" class="col-sm-4 col-form-label">Recovery rate</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" name="recoveryRate" id="recoveryRate" placeholder="%" value="{{$bdcases ? $bdcases->recoveryRate : ''}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="deathRate" class="col-sm-4 col-form-label">Death rate</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" name="deathRate" id="deathRate" placeholder="%" value="{{$bdcases ? $bdcases->deathRate : ''}}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="bdcases" class="btn btn-primary" onclick="askForSave('bdcases')">Submit</button>
                                        <button type="submit" name="bdupdate" class="btn btn-primary" onclick="askForSubmit('bdcases')">Update</button>


                                    </div>


                                </form>



                                <!-- /.card-body -->
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">SMEC Cases</h3>
                                </div>
                                <form id="smecCases" method="POST" action="">
                                    @csrf
                                    <div class="card-body">
                                        <input type="hidden" name="id" value={{$smec_cases ? $smec_cases->id :' '}}>
                                        <label for="activeCasesSmec">Active Cases in Smec </label>
                                        <input class="form-control" id="activeCasesSmec" name="activeCasesSmec" type="number" placeholder="Active Cases in Smec" value="{{$smec_cases ? $smec_cases->activeCasesSmec : ''}}" required>
                                        <br>
                                        <label for="totalInSmec">Total No. </label>
                                        <input class="form-control" id="totalInSmec" name="totalInSmec" type="number" placeholder="Total No." value="{{$smec_cases ? $smec_cases->totalInSmec : ''}}" required>
                                        <br>
                                        <label for="detectInlast24hours">Detected in last 24 hour </label>
                                        <input class="form-control" id="detectInlast24hours" name="detectInlast24hours" type="number" placeholder="Detected in last 24 hour" value="{{$smec_cases ? $smec_cases->detectInlast24hours : ''}}" required>
                                        <br>
                                        <label for="deathInlast24hours">Death last 24 hour </label>
                                        <input class="form-control" id="deathInlast24hours" name="deathInlast24hours" type="number" placeholder="Death last 24 hour" value="{{$smec_cases ? $smec_cases->deathInlast24hours : ''}}" required>
                                        <br>
                                        <label for="totalDeath">Total Death </label>
                                        <input class="form-control" id="totalDeath" name="totalDeath" type="number" placeholder="Total Death" value="{{$smec_cases ? $smec_cases->totalDeath : ''}}" required>
                                        <br>
                                        <label for="healedInlast24hours">Healed in last 24 hour </label>
                                        <input class="form-control" id="healedInlast24hours" name="healedInlast24hours" type="number" placeholder="Healed in last 24 hour" value="{{$smec_cases ? $smec_cases->healedInlast24hours : ''}}" required>
                                        <br>
                                        <label for="totalHealed">Total Healed </label>
                                        <input class="form-control" id="totalHealed" name="totalHealed" type="number" placeholder="Total Healed" value="{{$smec_cases ? $smec_cases->totalHealed : ''}}" required>
                                        <br>

                                    </div>

                                    <div class="card-footer">
                                        <button name="smecCases" type="submit" class="btn btn-primary" onclick="askForSave('smecCases')">Submit</button>
                                        <button type="submit" name="smecupdate" class="btn btn-primary" onclick="askForSubmit('smecCases')">Update</button>
                                    </div>
                                </form>

                                <!-- /.card-body -->
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Global Cases</h3>
                                </div>

                                <form id="globalcases" method="POST" action="{{ route('storeCases')}}">
                                    @csrf
                                    <div class="card-body">
                                        <input type="hidden" name="id" value={{$global_cases ? $global_cases->id : ''}}>
                                        <label for="totalInWorld">Total Number</label>
                                        <input class="form-control" id="totalInWorld" name="totalInWorld" type="number" placeholder="Total Number" value="{{$global_cases ? $global_cases->totalInWorld : ''}}" required>
                                        <br>
                                        <label for="detectInlast24hours">Detected in last 24 hour</label>
                                        <input class="form-control" id="detectInlast24hours" name="detectInlast24hours" type="number" placeholder="Detected in last 24 hour" value="{{$global_cases ? $global_cases->detectInlast24hours : ''}}" required>
                                        <br>
                                        <label for="deathInlast24hours">Death in last 24 hour</label>
                                        <input class="form-control" id="deathInlast24hours" name="deathInlast24hours" type="number" placeholder="Death in last 24 hour" value="{{$global_cases ? $global_cases->deathInlast24hours : ''}}" required>
                                        <br>
                                        <label for="totalDeath">Total Death</label>
                                        <input class="form-control" id="totalDeath" name="totalDeath" type="number" placeholder="Total Death" value="{{$global_cases ? $global_cases->totalDeath : ''}}" required>
                                        <br>

                                    </div>

                                    <div class="card-footer">
                                        <button name="globalCases" type="submit" class="btn btn-primary" onclick="askForSave('globalcases')">Submit</button>
                                        <button type="submit" name="globalupdate" class="btn btn-primary" onclick="askForSubmit('globalcases')">Update</button>
                                    </div>

                                </form>

                                <!-- /.card-body -->
                            </div>
                        </div>





                    </div>
                </div>
            </section>
            <hr />

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Vaccination Status</h1>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <section class="content">


                <div class="container-fluid">
                    <div class="row justify-content-md-center">

                        <div class="col-md-4">

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Vaccination Status</h3>
                                </div>

                                <form id="vaccination" method="POST" action="{{ route('vaccination')}}">
                                    @csrf
                                    <div class="card-body">
                                        <input type="hidden" name="id" value={{$vaccination ? $vaccination->id : ''}}>
                                        <div class="form-group">
                                            <label for="country">Country:</label>
                                            <select class="form-control" id="country" name="country" onChange="toggleValue()">
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="India">India</option>
                                                <option value="Kazaksthan">Kazaksthan</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Srilanka">Srilanka</option>
                                                <option value="Tajikisthan">Tajikisthan</option>
                                            </select>
                                        </div>
                                        <label for="firstdose">1st Dose Taken</label>
                                        <input class="form-control" id="firstdose" name="firstdose" type="number" placeholder="1st Dose Taken" value="{{$vaccination ? $vaccination->first_dose_taken : ''}}" required>
                                        <br>
                                        <label for="bothdose">Both Dose Taken</label>
                                        <input class="form-control" id="bothdose" name="bothdose" type="number" placeholder="Both Dose Taken" value="{{$vaccination ? $vaccination->both_dose_taken : ''}}" required>
                                        <br>
                                        <label for="above45">Above 45 Years</label>
                                        <input class="form-control" id="above45" name="above45" type="number" placeholder="Above 45 Years" value="{{$vaccination ? $vaccination->above_45 : ''}}" required>
                                        <br>
                                        <label for="below45">Below 45 Years</label>
                                        <input class="form-control" id="below45" name="below45" type="number" placeholder="Below 45 Years" value="{{$vaccination ? $vaccination->below_45 : ''}}" required>
                                        <br>


                                    </div>

                                    <div class="card-footer">
                                        <button name="vaccinationSubmit" type="submit" class="btn btn-info" onclick="askForSaveV('vaccination')">Submit</button>
                                        <button type="submit" name="vaccinationUpdate" class="btn btn-info" onclick="askForSubmitV('vaccination')">Update</button>
                                    </div>

                                </form>

                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>
                </div>


            </section>

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Updates</h1>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Government Updates/SMEC Updates
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="govUpdate" method="POST" action="{{ route('storeCases')}}">
                                        @csrf
                                        <input type="hidden" name="id" value={{$govUpdate ? $govUpdate->id : ' '}}>
                                        <textarea id="summernote" name="summernote">
                                        {{$govUpdate ? $govUpdate->govUpdate : ''}}
                                        </textarea>

                                        <div class="card-footer">
                                            <button name="govUpdate" type="submit" class="btn btn-primary" onclick="askForSave('govUpdate')">Submit</button>
                                            <button type="submit" name="govUpdate_update" class="btn btn-primary" onclick="askForSubmit('govUpdate')">Update</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        News Links
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="smecUpdate" method="POST" action="{{ route('storeCases')}}">
                                        @csrf
                                        <input type="hidden" name="id" value={{$smecUpdate ? $smecUpdate->id : ' '}}>
                                        <textarea id="summernotee" name="summernotee">
                                        {{$smecUpdate ? $smecUpdate->smecUpdatee : ''}}
                                        </textarea>

                                        <div class="card-footer">
                                            <button name="smecUpdate" type="submit" class="btn btn-primary" onclick="askForSave('smecUpdate')">Submit</button>
                                            <button type="submit" name="smecUpdate_update" class="btn btn-primary" onclick="askForSubmit('smecUpdate')">Update</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>
            </section>

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Others</h1>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Contact Info</h3>

                                </div>
                                <div class="card-body">
                                    <form id="contactInfo" method="POST" action="{{ route('storeCases')}}">
                                        @csrf
                                        <div class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label">Name</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" id="name" name="name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-4 col-form-label">Designation</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" id="designation" name="designation" required>
                                                </div>
                                            </div>
                                            <div class=" form-group row">
                                                <label for="inputPassword3" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" id="email" name="email" required>
                                                </div>
                                            </div>
                                            <div class=" form-group row">
                                                <label for="inputPassword3" class="col-sm-4 col-form-label">Phone</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="number" id="phone" name="phone" required>
                                                </div>
                                            </div>
                                            <div class=" form-group row">
                                                <label for="inputPassword3" class="col-sm-4 col-form-label">What's App</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="number" id="whatsapp" name="whatsapp" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" card-footer">
                                            <button type="submit" name="contacts" class="btn btn-success">Submit</button>

                                        </div>
                                    </form>

                                </div>


                                <!-- /.card-body -->
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Important Links</h3>
                                </div>
                                <form id="links" method="POST" action="{{ route('storeCases')}}">
                                    @csrf
                                    <div class="card-body">


                                        <div class="form-horizontal">
                                            <div class="form-group row">

                                                <label for="inputEmail3" class="col-sm-4 col-form-label">Title</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" id="title" name="title">
                                                    <br>
                                                </div>
                                                <br>
                                                <label for="inputEmail3" class="col-sm-4 col-form-label">Link</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" id="link" name="link" required>
                                                </div>


                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="links" class="btn btn-success">Submit</button>

                                        </div>


                                    </div>

                                </form>
                                <!-- /.card-body -->
                            </div>
                        </div>





                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong><a href="#">SMEC Bangladesh</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>


    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
            $('#summernotee').summernote()

            // CodeMirror

        })
    </script>

    <script>
        bdcase = document.getElementById("bdcases");

        function askForSave(xyz) {
            document.getElementById(xyz).action = "{{ route('storeCases')}}";

            document.getElementById(xyz).submit();
        }

        function askForSubmit(xyz) {
            document.getElementById(xyz).action = "{{route('updateCases')}}";
            document.getElementById(xyz).submit();
        }
    </script>

    <script>
        function toggleValue() {
            var x = document.getElementById("country").value;
            // console.log(x);


            $(function() {
                $.ajax({
                    method: "post",
                    url: "check",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "country": x
                    },
                    success: function(response) {
                        console.log(response);
                        $.each(response, function(index, value) {
                            console.log(index);
                            document.getElementById("firstdose").value = value[0] ? value[0]['first_dose_taken'] : '';
                            document.getElementById("bothdose").value = value[0] ? value[0]['both_dose_taken'] : '';
                            document.getElementById("above45").value = value[0] ? value[0]['above_45'] : '';
                            document.getElementById("below45").value = value[0] ? value[0]['below_45'] : '';
                        });

                    }
                });
            });



        }


        function toggleCountryValue() {

            var x = document.getElementById("country_cases").value;
            // console.log(x);


            $(function() {
                $.ajax({
                    method: "post",
                    url: "countryToggle",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "country_cases": x
                    },
                    success: function(response) {
                        console.log(response);
                        $.each(response, function(index, value) {
                            console.log(index);
                            document.getElementById("activeCases").value = value[0] ? value[0]['activeCases'] : '';
                            document.getElementById("total").value = value[0] ? value[0]['totalInBD'] : '';
                            document.getElementById("detect").value = value[0] ? value[0]['detectInlast24hours'] : '';
                            document.getElementById("death").value = value[0] ? value[0]['deathInlast24hours'] : '';
                            document.getElementById("totalDeath").value = value[0] ? value[0]['totalDeath'] : '';
                            document.getElementById("healed").value = value[0] ? value[0]['healedInlast24hours'] : '';
                            document.getElementById("TotalHealed").value = value[0] ? value[0]['totalHealed'] : '';
                            document.getElementById("infectionRate").value = value[0] ? value[0]['infectionRate24hours'] : '';
                            document.getElementById("TotalInfectionRate").value = value[0] ? value[0]['infectionRateTotal'] : '';
                            document.getElementById("recoveryRate").value = value[0] ? value[0]['recoveryRate'] : '';
                            document.getElementById("deathRate").value = value[0] ? value[0]['deathRate'] : '';

                        });

                    }
                });
            });



        }
    </script>


    <script>
        vaccination = document.getElementById("vaccination");

        function askForSaveV(xyz) {
            document.getElementById(xyz).action = "{{ route('vaccination')}}";

            document.getElementById(xyz).submit();
        }

        function askForSubmitV(xyz) {
            document.getElementById(xyz).action = "{{route('updateCases')}}";
            document.getElementById(xyz).submit();
        }
    </script>
</body>

</html>