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
            <h1>{{ trans('dashboard.companies')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ trans('dashboard.home')}}</a></li>
              <li class="breadcrumb-item active">{{ trans('dashboard.companies')}}</li>
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

                <a class="btn btn-success" href="{{ route('companies.create', app()->getLocale()) }}"> {{ trans('dashboard.create_new_company')}}</a>

            </div>

  

   <div class="card-body p-0">
          <table id="example2" class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 8%" class="text-center">
                          #
                      </th>
                      <th style="width: 1%">
                          {{ trans('dashboard.name')}}
                      </th>
                      <th style="width: 20%">
                          {{ trans('dashboard.email')}}
                      </th>
                      <th style="width: 30%">
                          {{ trans('dashboard.logo')}}
                      </th>
                      <th>
                          {{ trans('dashboard.website')}}
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                        @foreach ($companies as $company)

                <tr>
                      <td class="project-state">
                          <span class="badge badge-success">{{ ++$i }} </span>
                      </td>
                      <td>
                          <a>
                              {{ $company->name }}
                          </a>
                      </td>
                      <td>
                          <small>
                              {{ $company->email }}
                          </small>
                      </td>
                      <td>
                        <img src="{{ url('/storage/logos/'. $company->logo) }}"
                         alt="Logo"
                         width="70px;" 
                         height="50px;" 
                         class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                      </td>
                      <td>
                          <small>
                             {{ $company->website }}
                          </small>
                      </td>
                      <td class="project-actions text-right">
                       <form action="{{ route('companies.destroy',[app()->getLocale(), $company->id_company]) }}" method="POST">
                          <a class="btn btn-primary btn-sm" href="{{ route('companies.show', [app()->getLocale(), $company->id_company]) }}">
                              <i class="fas fa-folder">
                              </i>
                              {{ trans('dashboard.view')}}
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ route('companies.edit', [app()->getLocale(), $company->id_company]) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              {{ trans('dashboard.edit')}}
                          </a>             
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                              </i> {{ trans('dashboard.delete')}}</button>
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