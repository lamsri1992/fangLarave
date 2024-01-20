<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky" style="padding-top:2rem!important">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('order.all') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('department') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    จัดการข้อมูลฝ่ายงาน
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('officer') }}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    จัดการข้อมูลเจ้าหน้าที่เปล
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users" class="align-text-bottom"></span>
                    จัดการข้อมูลผู้ใช้งานระบบ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    ระบบรายงาน
                </a>
            </li>
        </ul>
    </div>
</nav>
