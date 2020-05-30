<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
 @include('admin.layouts.head') 

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.layouts.navbar') 
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('admin.layouts.sidebar') 
<!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ trans('dashboard.show_company')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ trans('dashboard.show_company')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <!-- Input addon -->
        @csrf  

         <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">{{ trans('dashboard.company')}}</h3>
          </div>
          <div class="card-body">

            <!-- name -->
            <div class="form-group">
              <label for="inputName">{{ trans('dashboard.name')}}</label>
              <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $company->name }}" disabled>
         
            </div>

            <!-- email -->
            <label for="inputEmail">{{ trans('dashboard.email')}}</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $company->email }}" disabled>
               
            </div>

              <!-- logo -->
                  <div class="form-group">
                    <label for="inputFile">{{ trans('dashboard.logo')}}</label>
                    <div class="input-group">

                     <img alt="{{$company->name}}" class="table-avatar" src="{{ url('/storage/logos/'. $company->logo) }}" width="150px;" height="70px;" alt="{{ $company->logo }}">
                    </div>
                  </div>

            <!-- website -->
            <div class="form-group">
              <label for="inputWebsite">{{ trans('dashboard.website')}}</label>
              <input type="text" class="form-control" name="website" placeholder="Enter website" value="{{ $company->website }}" disabled>
                
            </div>
            

              <!-- /.form group -->

 


            <!-- /input-group -->
          </div>
          <!-- /.card-body -->
        </div>
   
        <!-- link back -->
        <div class="pull-left mb-3">
          <a style="width: 100px;" class="btn btn-block btn-secondary" href="{{ route('companies.index', ['locale' => app()->getLocale()]) }}">{{ trans('dashboard.return')}}</a>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http:///adminlte.io">/adminlte.io</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
 @include('admin.layouts.footer') 



</body>
</html>
