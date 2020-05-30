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
            <h1>{{ trans('dashboard.create_employee')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ trans('dashboard.create_employee')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <!-- Input addon -->
          <!-- Input addon -->
        <form action="{{url(app()->getLocale(),'employees')}}" method="POST" enctype="multipart/form-data">
          @csrf 
 
               
          <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">{{ trans('dashboard.employee')}}</h3>
          </div>
          <div class="card-body">

            <!-- first name -->
            <div class="form-group">
              <label for="inputName">{{ trans('dashboard.first_name')}}</label>
              <input type="text" class="form-control" name="first_name" placeholder="Enter  name" autofocus>
                   @if ($errors->has('first_name'))
                         <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>{{ $errors->first('first_name') }}</h5>
                </div>
                    @endif        
 
            </div>
            
            <!-- last name -->
            <div class="form-group">
              <label for="inputName">{{ trans('dashboard.last_name')}}</label>
              <input type="text" class="form-control" name="last_name" placeholder="Enter  name"  autofocus>
                   @if ($errors->has('last_name'))
                         <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>{{ $errors->first('last_name') }}</h5>
                </div>
                    @endif        
 
            </div>

            <!-- email -->
            <label for="inputEmail">{{ trans('dashboard.email')}}</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" name="email" class="form-control" placeholder="Email">
                  @if ($errors->has('email'))
                         <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>{{ $errors->first('email') }}</h5>
                </div>
                    @endif  
            </div>

         
              <!-- phone -->
              <div class="form-group">
                <label for="inputPhone">{{ trans('dashboard.phone')}}:</label>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" name="phone"
                         data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                   @if ($errors->has('phone'))
                         <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>{{ $errors->first('phone') }}</h5>
                </div>
                    @endif  

                </div>
                <!-- /.input group -->
              </div>

              <!-- company -->
            <div class="col-md-6">
                <div class="form-group">
                  <label for="inputCompany">{{ trans('dashboard.company')}}</label>
                  <select name="company_id" class="form-control select2" style="width: 100%;">
                    <option value="0" selected="selected" disabled>{{ trans('dashboard.select_company')}}</option>
                    @foreach ($companies as $id_company => $company_name)
                      <option value="{{$id_company}}">{{$company_name}}</option>
                    @endforeach
                  </select>
                </div>
                   @if ($errors->has('company_id'))
                         <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>{{ $errors->first('company_id') }}</h5>
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
          <a style="width: 100px;" class="btn btn-block btn-secondary" href="{{ route('employees.index', ['locale' => app()->getLocale()]) }}">{{ trans('dashboard.return')}}</a>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 @include('admin.layouts.footer') 

</body>
</html>
