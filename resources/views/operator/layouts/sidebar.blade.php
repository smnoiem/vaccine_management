
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
    <a href="./" class="brand-link text-center">
    <large><b>Vaccine - Center</b></large>
    </a>
    
    </div>
    <div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item dropdown">
            <a href="{{ route('operator.index') }}" class="nav-link nav-operator_dashboard">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p> Center Dashboard </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link nav-registrations">
                <i class="nav-icon fas fa-users"></i>
                <p> Vaccine Registrations<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('operator.registrations.index') }}" class="nav-link nav-registration_list tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>List</p>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link nav-vaccine_stock">
            <i class="nav-icon fas fa-syringe"></i>
            <p>
                Vaccine Stock
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('operator.vaccine-stock.index') }}" class="nav-link nav-vaccine_stock_list tree-item">
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

@push('scripts')
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
