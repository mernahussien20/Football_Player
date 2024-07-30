


<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{url('public/backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">لوحة التحكم</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
       
       
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-directions'></i>
                </div>
                <div class="menu-title">الفروع</div>
            </a>
            <ul>
                <li> <a href="{{ route('branches.index') }}"><i class='bx bx-radio-circle'></i> جميع الفروع</a>
                </li>
                <li> <a href="{{ route('branches.create') }}"><i class='bx bx-radio-circle'></i> اضافه فرع  </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-calendar'></i>
                </div>
                <div class="menu-title">المواعيد</div>
            </a>
            <ul>
                <li> <a href="{{ route('dates.index') }}"><i class='bx bx-radio-circle'></i> جميع المواعيد</a>
                </li>
                <li> <a href="{{ route('dates.create') }}"><i class='bx bx-radio-circle'></i> اضافه موعد  </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-clipboard'></i>
                </div>
                <div class="menu-title">الاختبارات</div>
            </a>
            <ul>
                <li> <a href="{{ route('exams.index') }}"><i class='bx bx-radio-circle'></i>جميع الاختبارات </a>
                </li>
                <li> <a href="{{ route('exams.create') }}"><i class='bx bx-radio-circle'></i>إضافة اختبار</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-street-view'></i>
                </div>
                <div class="menu-title">مراكز الاعبين   </div>
            </a>
            <ul>
                <li> <a href="{{ route('roles.index') }}"><i class='bx bx-radio-circle'></i> جميع المراكز</a>
                </li>
                <li> <a href="{{ route('roles.create') }}"><i class='bx bx-radio-circle'></i> اضافه مركز  </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-run'></i>
                </div>
                <div class="menu-title">اللاعبين  </div>
            </a>
            <ul>
                <li> <a href="{{ route('players.index') }}"><i class='bx bx-radio-circle'></i>جميع اللاعبين</a>
                </li>
                
            </ul>
        </li>


  

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-group'></i>
                </div>
                <div class="menu-title">اللاعبين الراسبين</div>
            </a>
            <ul>
                <li> <a href="{{ route('failPlayers') }}"><i class='bx bx-radio-circle'></i>الارشيف</a>
                </li>
               
            </ul>
        </li>

        {{-- <li> 
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">فئات الكتب</div>
            </a>
            <ul>
                <li> <a href="{{ route('bookcategory.index') }}"><i class='bx bx-radio-circle'></i>جميع الفئات</a>
                </li>
                <li> <a href="{{ route('bookcategory.create') }}"><i class='bx bx-radio-circle'></i>إضافة فئة</a>
                </li>
            </ul>
        </li> --}}
    
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
