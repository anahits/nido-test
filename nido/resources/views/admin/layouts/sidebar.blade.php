
      <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ url('/storage/adminlte/img/AdminLTELogo.png') }}"
           alt="Nido Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Nido') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('/storage/adminlte/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               <li class="nav-item has-treeview">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Tables
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-edit"></i>
                      <p>{{ __('Companies') }}
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ URL::to(app()->getLocale().'/companies') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Mostrar</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ URL::to(app()->getLocale().'/companies/create') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Create</p>
                        </a>
                      </li>
                    </ul>
                  </li>



                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-edit"></i>
                      <p>{{ __('Employees') }}
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ URL::to(app()->getLocale().'/employees') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Mostrar</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ URL::to(app()->getLocale().'/employees/create') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Create</p>
                        </a>
                      </li>
                    </ul>
                  </li>                </ul>
              </li>
               



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          
              <!-- lang -->
    <ul class="">

    
          <li class="nav-header">IDIOMAS</li>
            @foreach (config('app.available_locales') as $locale)
              <li class="nav-item"><a class="nav-link"
               href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), [$locale, isset(\Illuminate\Support\Facades\Route::current()->originalParameters()['company']) ? \Illuminate\Support\Facades\Route::current()->originalParameters()['company']: (isset(\Illuminate\Support\Facades\Route::current()->originalParameters()['employee']) ? \Illuminate\Support\Facades\Route::current()->originalParameters()['employee'] : '')]) }}"
                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>
                    <i class="nav-icon far fa-circle text-warning"></i>
                    <p class="text">{{ strtoupper($locale) }}</p>
                  </a>
                </li>
            @endforeach
</ul>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
