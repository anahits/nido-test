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
            <h1>{{ trans('dashboard.employees')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ trans('dashboard.home')}}</a></li>
              <li class="breadcrumb-item active">{{ trans('dashboard.employees')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  @if ($message = Session::get('success'))
        <div class="row justify-content-center">
            <div class="col-md-8">
             <div class="alert alert-info alert-dismissible col-sm-6 text-center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> {{ $message }}</h5>
              </div>
            </div>
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <!-- Input addon -->
     

 
            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('employees.create', app()->getLocale()) }}">{{ trans('dashboard.create_new_employee')}}</a>

            </div>

  

   <div class="card-body p-0">
          <table id="example2" class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 8%" class="text-center">
                          #
                      </th>
                      <th style="width: 1%">
                          {{ trans('dashboard.first_name')}}
                      </th>
                      <th style="width: 1%">
                           {{ trans('dashboard.last_name')}}
                      </th>
                      <th style="width: 20%">
                           {{ trans('dashboard.email')}}
                      </th>
                      <th style="width: 30%">
                           {{ trans('dashboard.phone')}}
                      </th>
                      <th>
                           {{ trans('dashboard.company')}}
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                        @foreach ($employees as $employee)

                <tr>
                      <td class="project-state">
                          <span class="badge badge-success">{{ ++$i }} </span>
                      </td>
                      <td>
                          <a>
                              {{ $employee->first_name }}
                          </a>
                      </td>
                      <td>
                          <a>
                              {{ $employee->last_name }}
                          </a>
                      </td>
                      <td>
                          <small>
                              {{ $employee->email }}
                          </small>
                      </td>
                      <td>
                          <a>
                              {{ $employee->phone }}
                          </a>
                      </td>
                      <td>
                          <small>
                             {{ $companies[$employee->company_id] }}
                          </small>
                      </td>
                      <td class="project-actions text-right">
                       <form action="{{ route('employees.destroy',[app()->getLocale(), $employee->id_employee]) }}" method="POST">
                          <a class="btn btn-primary btn-sm" href="{{ route('employees.show', [app()->getLocale(), $employee->id_employee]) }}">
                              <i class="fas fa-folder">
                              </i>
                               {{ trans('dashboard.view')}}
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ route('employees.edit', [app()->getLocale(), $employee->id_employee]) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                               {{ trans('dashboard.edit')}}
                          </a>             
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                              </i>  {{ trans('dashboard.delete')}}</button>
                          </form>
                      </td>
                  </tr>
                          @endforeach

              </tbody>
          </table>
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