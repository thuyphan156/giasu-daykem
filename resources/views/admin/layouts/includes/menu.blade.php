@if (Auth::guard('admin')->user()->role == 0)
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Route::is('classes.list') || Route::is('classes.add') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
            aria-controls="collapseOne">
            <i class="fas fa-fw fa-table"></i>
            <span>Lớp học</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('classes.list') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('classes.add') }}">Thêm mới</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Route::is('subject.list') || Route::is('subject.add') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Môn học</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('subject.list') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('subject.add') }}">Thêm mới</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Route::is('staff.list') || Route::is('staff.add') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-fw fa-table"></i>
            <span>Nhân viên</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('staff.list') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('staff.add') }}">Thêm mới</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Route::is('contact.list') || Route::is('post.add') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('contact.list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Liên hệ</span>
        </a>
    </li>
    <li class="nav-item {{ Route::is('post.list') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('post.list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Bài đăng</span>
        </a>
    </li>
    <li class="nav-item {{ Route::is('register-teacher.list') || Route::is('register-teacher.show') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('register-teacher.list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Duyệt đăng ký gia sư</span>
        </a>
    </li>
    <li class="nav-item {{ Route::is('register-class.list') || Route::is('register-class.show') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('register-class.list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Duyệt đăng ký nhận lớp</span>
        </a>
    </li>
    <li class="nav-item {{ Route::is('assign-tutor.list') || Route::is('assign-tutor.show') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('assign-tutor.list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Thông tin tìm gia sư</span>
        </a>
    </li>
@else 
    <li class="nav-item {{ Route::is('register-teacher.list') || Route::is('register-teacher.show') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('register-teacher.list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Duyệt đăng ký gia sư</span>
        </a>
    </li>
    <li class="nav-item {{ Route::is('register-class.list') || Route::is('register-class.show') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('register-class.list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Duyệt đăng ký nhận lớp</span>
        </a>
    </li>
@endif
