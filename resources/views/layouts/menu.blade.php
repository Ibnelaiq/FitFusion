<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
      <ul class="menu-inner">
        <!-- Dashboards -->
        <li class="menu-item">
          <a href="{{ route('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboard">Dashboard</div>
          </a>
          {{-- <ul class="menu-sub">
            <li class="menu-item">
              <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
                <div data-i18n="Analytics">Analytics</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="dashboards-crm.html" class="menu-link">
                <i class="menu-icon tf-icons ti ti-3d-cube-sphere"></i>
                <div data-i18n="CRM">CRM</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="dashboards-ecommerce.html" class="menu-link">
                <i class="menu-icon tf-icons ti ti-atom-2"></i>
                <div data-i18n="eCommerce">eCommerce</div>
              </a>
            </li>
          </ul> --}}
        </li>

        <!-- Layouts -->
        <li class="menu-item">
          <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
            <div data-i18n="Products">Products</div>
          </a>

          <ul class="menu-sub">
            <li class="menu-item">
              <a href="{{ route('products.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-menu-2"></i>
                <div data-i18n="View All">View All</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('products.create') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-plus"></i>
                <div data-i18n="Create New.">Create New.</div>
              </a>
            </li>
          </ul>
        </li>

        <!-- Apps -->
        <li class="menu-item">
          <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-users"></i>
            <div data-i18n="Users">Customers</div>
          </a>
          <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('customer.searchDetails') }}" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-search"></i>
                  <div data-i18n="Search">Search.</div>
                </a>
              </li>
            <li class="menu-item">
              <a href="app-email.html" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div data-i18n="Confirm Payment">Confirm Payment</div>
              </a>
            </li>
          </ul>
        </li>

        <!-- Pages -->
        <li class="menu-item">
          <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-file"></i>

            <div data-i18n="Gym Classes">Gym Classes</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="{{ route('classes.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-menu-2"></i>
                <div data-i18n="View All">View All</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('classes.create') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-plus"></i>
                <div data-i18n="Create New.">Create New.</div>
              </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-color-swatch"></i>
                  <div data-i18n="Slots">Slots</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('slots.index') }}" class="menu-link">
                          <div data-i18n="View All">View All</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="{{ route('slots.create') }}" class="menu-link">
                          <div data-i18n="Create New.">Create New.</div>
                        </a>
                      </li>
                </ul>
              </li>
          </ul>
        </li>
         <!-- Apps -->
         <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-map"></i>
              <div data-i18n="Workouts">Workouts</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                  <a href="{{ route('workouts.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-menu-2"></i>
                    <div data-i18n="View All">View All</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('workouts.create') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-search"></i>
                    <div data-i18n="Create">Create.</div>
                  </a>
                </li>
            </ul>
          </li>




        <!-- Forms -->



        <!-- Charts & Maps -->


        <!-- Misc -->
        <li class="menu-item float-right">
          <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-box-multiple"></i>
            <div data-i18n="Misc">Misc</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="{{ route('coupons.index') }}" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                <div data-i18n="Coupons">Coupons</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div data-i18n="Documentation">Documentation</div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </aside>
