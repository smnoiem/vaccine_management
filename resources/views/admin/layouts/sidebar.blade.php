<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="dropdown">
    <a href="./" class="brand-link text-center">
      <large><b>Vaccine - Admin</b></large>
    </a>
  </div>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item dropdown">
          <a href="{{route('admin.index')}}" class="nav-link nav-admin_dashboard">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Centers -->
        <li class="nav-item">
          <a href="#" class="nav-link nav-centers">
            <i class="nav-icon fas fa-building"></i>
            <p>
              Centers
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.centers.create') }}" class="nav-link nav-new_center tree-item">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.centers.index') }}" class="nav-link nav-center_list tree-item">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>List</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Employees -->
        <li class="nav-item">
          <a href="#" class="nav-link nav-users">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Employees
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.users.create') }}" class="nav-link nav-new_user tree-item">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.users.index') }}" class="nav-link nav-user_list tree-item">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>List</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Central Vaccine Stock --}}
        <li class="nav-item">
            <a href="#" class="nav-link nav-central_vaccine_stock">
            <i class="nav-icon fas fa-syringe"></i>
            <p>
                Central Vaccine Stock
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.vaccine-stock.index') }}" class="nav-link nav-central_vaccine_stock_list tree-item">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>List</p>
                </a>
            </li>
            </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>

@push('footer-script')
  <script>
  	$(document).ready(function(){
      var page = '{{$page ?? "home"}}';
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
     
  	})
  </script>
@endpush