
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/SellLaptops/admin/index.php" class="brand-link">
      <img src="/SellLaptops/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Nhóm 5</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/SellLaptops/admin/dist/img/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">hello <?php echo Session::get('username') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php if (Session::get('role_id') == 1){?>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fab fa-slideshare"></i>
              <p>
                Quản Lý Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/slideradd.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Slide</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/SellLaptops/admin/sliderlist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Slide</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="/SellLaptops/admin/statistical.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Thống Kế
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fad fa-users-crown"></i>
              <p>
                Quản Lý Người Dùng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/accountadd.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Người Dùng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/SellLaptops/admin/accountlist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Người Dùng</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fab fa-jedi-order"></i>
              <p>
                Quản Lý Đơn Hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/orderlist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Đơn Hàng</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-comments-alt-dollar"></i>
              <p>
                Quản Lý Phản Hồi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/comments_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Phản Hồi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-person-dolly-empty"></i>
              <p>
                Quản Lý Nhân Viên
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/empadd.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Nhân Viên</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/SellLaptops/admin/emplist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Nhân Viên</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fad fa-user-tag"></i>
              <p>
                Quản Lý Quyền
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/rolesadd.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Quyền</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/SellLaptops/admin/roleslist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Quyền</p>
                </a>
              </li>
            </ul>
          </li>


        <?php }else if(Session::get('role_id') == 2){?>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-archive"></i>
              <p>
                Quản Lý Danh Mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/addcate.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Danh Mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/SellLaptops/admin/catelist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Danh Mục</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fal fa-phone-laptop"></i>
              <p>
                Quản Lý Thương Hiệu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/brandadd.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Thương Hiệu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/SellLaptops/admin/brandlist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Thương Hiệu</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fad fa-users-crown"></i>
              <p>
                Quản Lý Người Dùng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/accountadd.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Người Dùng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/SellLaptops/admin/accountlist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Người Dùng</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản Lý Sản Phẩm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/productsadd.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Sản Phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/SellLaptops/admin/productslist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Sản Phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fab fa-jedi-order"></i>
              <p>
                Quản Lý Đơn Hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/orderlist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Đơn Hàng</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-comments-alt-dollar"></i>
              <p>
                Quản Lý Phản Hồi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/SellLaptops/admin/comments_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Phản Hồi</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>