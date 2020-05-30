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
            <h1>{{ trans('dashboard.edit_company')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ trans('dashboard.home')}}</a></li>
              <li class="breadcrumb-item active">{{ trans('dashboard.edit_company')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <!-- Input addon -->
        <form action="{{ route('companies.update',[app()->getLocale(), $company->id_company]) }}" method="POST" enctype="multipart/form-data">
         @csrf  
         @method('PUT')
               
         <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">{{ trans('dashboard.company')}}</h3>
          </div>
          <div class="card-body">

            <!-- name -->
            <div class="form-group">
              <label for="inputName">{{ trans('dashboard.name')}}</label>
              <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $company->name }}" autofocus>
                @if ($errors->has('name'))
                         <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>{{ $errors->first('name') }}</h5>
                </div>
                    @endif     
 
            </div>

            <!-- email -->
            <label for="inputEmail">{{ trans('dashboard.email')}}</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $company->email }}">
                @if ($errors->has('email'))
                         <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>{{ $errors->first('email') }}</h5>
                </div>
                    @endif   
            </div>

              <!-- logo -->
               <div class="form-group">
                    <label for="inputFile">{{ trans('dashboard.logo')}}</label>
                    <div class="input-group">
                      <div class="col-lg-6">
                      <img src="{{ url('/storage/logos/'. $company->logo) }}"
                         alt="Logo"
                         width="70px;" 
                         height="50px;" 
                         style="opacity: .8">
                      </div>
                      <div class="custom-file col-lg-6">
                        <input type="file" class="custom-file-input" name="logo" value="{{ $company->logo }}">
                        <label class="custom-file-label" for="inputFile">{{ trans('dashboard.select_file')}}</label>
                      </div>
                    </div>
                     @if ($errors->has('logo'))
                         <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>{{ $errors->first('logo') }}</h5>
                </div>
                    @endif  
                  </div>

            <!-- website -->
            <div class="form-group">
              <label for="inputWebsite">{{ trans('dashboard.website')}}</label>
              <input type="text" class="form-control" name="website" placeholder="Enter website" value="{{ $company->website }}">
                   @if ($errors->has('website'))
                         <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>{{ $errors->first('website') }}</h5>
                </div>
                    @endif    
            </div>
            

              <!-- /.form group -->
            <div class="float-right">
               <button style="width: 70px;" type="submit" class="btn btn-block btn-sm btn-outline-success">{{ trans('dashboard.send')}}</button>
            </div>
                                  



            <!-- /input-group -->
          </div>
          <!-- /.card-body -->
        </div>

        <!-- link back -->
        <div class="pull-left mb-3">
          <a style="width: 100px;" class="btn btn-block btn-secondary" href="{{ route('companies.index', ['locale' => app()->getLocale()]) }}">{{ trans('dashboard.return')}}</a>
        </div>

        </form>

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
