<!DOCTYPE html>
<html lang="en">

<head>
    <title>SACA Covid-19 Updates</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">

        <nav class="navbar navbar-expand-sm" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="#">
                <img src="{{asset('images\SJ_SJ_FC_RGB.png')}}" alt="Logo" style="width:200px; padding:10px">
                <img src="{{asset('images\SMEC_LOGO.png')}}" alt="Logo" style="width:200px; padding:10px">


            </a>

            <div style="border-left: 2px dotted black;height: 100px;position: relative;"></div>
            <div class="container" style="margin-left:0px;">
                <h4 style="font-family: 'DM Sans', sans-serif; padding:20px;"><strong>SACA Covid-19 Updates</strong></h4>
            </div>

        </nav>

        <section class="content">

            <div class="p-3 border bg-light">

                <div class="content-header">
                    <div class="col-sm-12">
                        <h4 style="float:right;"> Cases Last updated at : <strong>{{$bdcases ? $bdcases ? $bdcases->updated_at : $bdcases->created_at : 'dd-mm-yy'}}</strong> || Vaccination status Last updated at : <strong>{{$vac ? $vac ? $vac->updated_at : $vac->created_at : 'dd-mm-yy'}}</strong></h4>
                    </div>
                </div>
                <hr />

                <!-- Bangladesh Cases -->


                <div class="jumbotron jumbotron-fluid">




                    <!-- SMEC Cases -->

                    <div class="content-header ">
                        <div class="container-fluid ">

                            <div class="col-sm-12">
                                <h3 class="text-center"><strong>SMEC Cases</strong></h3>
                            </div>


                        </div>
                    </div>

                    <div class="row justify-content-md-center">



                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{$smec_cases ? $smec_cases->detectInlast24hours : ' '}}</h3>

                                    <p><strong>Detected in Last 24 Hours</strong></p>
                                    <h4><strong>{{$smec_cases ? $smec_cases->totalInSmec : ' '}}</strong></h4>
                                    <p>Total Affected in SMEC </p>


                                </div>
                                <div class="icon">
                                    <i class="fas fa-virus"></i>
                                </div>
                                <a href="#" class="small-box-footer">Infected</a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$smec_cases ? $smec_cases->activeCasesSmec : ' '}}</h3>

                                    <h2><strong>Active Cases</strong></h2>
                                    <!-- <h4><strong>----------------------------</strong></h4> -->
                                    <p>Last Updated at : {{$smec_cases ? $smec_cases->created_at : '-'}}</p>


                                </div>
                                <div class="icon">
                                    <i class="fas fa-virus"></i>
                                </div>
                                <a href="#" class="small-box-footer"><strong>Active Cases</strong></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$smec_cases ? $smec_cases->healedInlast24hours : ' '}}</sup></h3>

                                    <p><strong>Healed in Last 24 Hours</strong></p>

                                    <h4><strong>{{$smec_cases ? $smec_cases->totalHealed : ''}}</strong></h4>

                                    <p>Total Healed in SMEC </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-running"></i>
                                </div>
                                <a href="#" class="small-box-footer">Healed</i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$smec_cases ? $smec_cases->deathInlast24hours : ''}}</h3>

                                    <p><strong>Death in Last 24 Hours</strong></p>

                                    <h4><strong>{{$smec_cases ? $smec_cases->totalDeath : ''}}</strong></h4>
                                    <p>Total Death in SMEC</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-skull-crossbones"></i>
                                </div>
                                <a href="#" class="small-box-footer">Rest in Peace </a>
                            </div>
                        </div>







                        <!-- ./col -->

                        <!-- ./col -->
                    </div>

                </div>


                @foreach($bb as $item)

                @if($item[0] || $item[1])
                <div class="content-header ">
                    <div class="container-fluid ">

                        <div class="col-sm-12">
                            <h3 class="text-center"> <strong>{{$item[0] ? $item[0]->country_case_name : $item[1]->country_name}} Cases</strong></h3>
                            <!-- <img src="{{asset('images\bangladesh.png')}}" alt="Logo" style="width:40px;"> -->
                        </div>


                    </div>
                </div>



                <div class="row justify-content-md-center">



                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{$item[0] ? $item[0]->detectInlast24hours : 'Not Provided'}}</h3>

                                <p><strong>Detected in Last 24 Hours</strong></p>
                                <h4><strong>{{$item[0] ? $item[0]->totalInBD : ''}}</strong></h4>
                                <p>Total Affected in {{$item[0] ? $item[0]->country_case_name : ''}}</p>


                            </div>
                            <div class="icon">
                                <i class="fas fa-virus"></i>
                            </div>
                            <a href="#" class="small-box-footer"><strong>Infected</strong></a>
                        </div>
                    </div>


                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$item[0] ? $item[0]->activeCases : 'Not Provided'}}</h3>

                                <h2><strong>Active Cases</strong></h2>
                                <!-- <h4><strong>----------------------------</strong></h4> -->
                                <p>Last Updated at : {{$item[0] ? $item[0]->created_at : '-'}}</p>


                            </div>
                            <div class="icon">
                                <i class="fas fa-virus"></i>
                            </div>
                            <a href="#" class="small-box-footer"><strong>Active Cases</strong></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$item[0] ? $item[0]->healedInlast24hours : 'Not Provided'}}</sup></h3>

                                <p><strong>Healed in Last 24 Hours</strong></p>
                                <h4><strong>{{$item[0] ? $item[0]->totalHealed : ''}}</strong></h4>
                                <p>Total Healed in {{$item[0] ? $item[0]->country_case_name : ''}}</p>


                            </div>
                            <div class="icon">
                                <i class="fas fa-running"></i>
                            </div>
                            <a href="#" class="small-box-footer"><strong>Healed</strong> </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$item[0] ? $item[0]->deathInlast24hours : 'Not Provided'}}</h3>

                                <p><strong>Death in Last 24 Hours</strong></p>
                                <h4><strong>{{$item[0] ? $item[0]->totalDeath : ''}}</strong></h4>
                                <p>Total Death in {{$item[0] ? $item[0]->country_case_name : ''}} </p>

                            </div>
                            <div class="icon">
                                <i class="fas fa-skull-crossbones"></i>
                            </div>
                            <a href="#" class="small-box-footer"><strong> Rest in Peace </strong></a>
                        </div>
                    </div>


                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">


                                <p>1st Dose Taken-<strong>{{$item[1] ? $item[1]->first_dose_taken : 'Not Provided'}}</strong></p>
                                <p>Both Dose Taken-<strong>{{$item[1] ? $item[1]->both_dose_taken : ''}}</strong></p>

                                <p>Above 45 Years-<strong>{{$item[1] ? $item[1]->above_45 : ''}}</strong></p>
                                <p>Below 45 Years-<strong>{{$item[1] ? $item[1]->below_45 : ''}}</strong></p>

                            </div>
                            <div class="icon">
                                <i class="fas fa-syringe"></i>
                            </div>
                            <a href="#" class="small-box-footer">Vaccination Status</a>
                        </div>
                    </div>



                </div>
                @endif
                @endforeach

                <!-- Global Cases -->
                <div class="content-header ">
                    <div class="container-fluid ">

                        <div class="col-sm-12">
                            <h3 class="text-center"><strong>Global Cases</strong></h3>
                        </div>


                    </div>
                </div>

                <div class="row justify-content-md-center">

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$global_cases ? $global_cases->detectInlast24hours : ''}}</h3>
                                <p><strong>Detected in Last 24 Hours</strong></p>

                                <h5>Total Affected in the World - <strong>{{$global_cases ? $global_cases->totalInWorld : ''}}</strong></h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-virus"></i>
                            </div>
                            <a href="#" class="small-box-footer">Infected <i class="fas fa-virus"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$global_cases ? $global_cases->deathInlast24hours : ''}}</h3>

                                <p><strong>Death in Last 24 Hours</strong></p>

                                <h5>Total Death in the World - <strong>{{$global_cases ? $global_cases->totalDeath : ''}}</strong></h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-skull-crossbones"></i>
                            </div>
                            <a href="#" class="small-box-footer">Rest in Peace <i class="fas fa-skull-crossbones"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                </div>




            </div>
        </section>
        <hr />
        <hr />
        <section>

            <div class="content">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center">Guidelines/Announcements</h1>
                        <div class="p-3 border bg-light">
                            <h4>{!! $govUpdate ? $govUpdate->govUpdate : '' !!}</h4>
                        </div>



                    </div>
                    <div class="col">
                        <h1 class="text-center">News Links</h1>
                        <div class="p-3 border bg-light">
                            <p>{!!$smecUpdate ? $smecUpdate->smecUpdatee : ''!!}</p>
                        </div>
                    </div>
                </div>

            </div>




        </section>

        <hr />
        <hr />
        <section>

            <div class="content">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center">Emergency Contacts</h1>
                        <div class="p-3 border bg-light">
                            <table class="table" border="4">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">WhatsApp</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $counter = 1;
                                    @endphp

                                    @foreach($contacts as $item)
                                    <tr>
                                        <th scope="row">{{$counter++}}</th>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->designation}}</td>
                                        <td><a href="mailto:{{$item->email}}">{{$item->email}}</a></td>
                                        <td><a href="tel:{{$item->phone}}">{{$item->phone}}</a></td>
                                        <td>{{$item->whatsapp}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                    </div>
                    <div class=" col">
                        <h1 class="text-center">Useful Links</h1>
                        <div class="p-3 border bg-light">
                            <table class="table" border="4">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Link</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $counter = 1;
                                    @endphp
                                    @foreach($links as $item)
                                    <tr>
                                        <th scope="row">{{$counter++}}</th>
                                        <th>{{$item->title}}</th>

                                        <td><a href={{$item->link}} target="_blank">{{$item->link}}</a></td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>




        </section>
        <hr />
        <footer class="bg-light text-center text-lg-start">

            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2021 Copyright:
                <a class="text-dark" href="#">SMEC Bangladesh</a>
            </div>

        </footer>

    </div>





</body>

</html>