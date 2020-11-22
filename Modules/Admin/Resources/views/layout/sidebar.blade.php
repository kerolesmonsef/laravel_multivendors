<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Noble<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>
            <?php $language_active_class = active_class_r(['admin.language.index', 'admin.language.create']); ?>
            <li class="nav-item {{ $language_active_class }}">
                <a class="nav-link" data-toggle="collapse" href="#email" role="button"
                   aria-expanded="{{ is_active_route(['email/*']) }}" aria-controls="email">
                    <i class="fas fa-language"></i>
                    <span class="link-title">لغات الموقع <span
                            class="badge badge-danger">{{ \App\Models\Language::count() }}</span></span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ $language_active_class == 'active' ?'show':"" }}" id="email">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.language.index') }}"
                               class="nav-link {{ active_class_r(['admin.language.index']) }}">
                                عرض كل اللغات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.language.create') }}"
                               class="nav-link {{ active_class_r(['admin.language.create']) }}">
                                اضافة لغة جديدة
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <?php $main_category_active_class = active_class_r(['admin.main_category.index', 'admin.main_category.create']); ?>
            <li class="nav-item {{ $main_category_active_class }}">
                <a class="nav-link" data-toggle="collapse" href="#cat_comp" role="button"
                   aria-expanded="{{ $main_category_active_class == "active" ? "true" : "" }}"
                   aria-controls="cat_comp">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">الاقسام الرئيسية</span>
                    <span class="badge badge-danger">{{ \App\Models\MainCategory::count() }}</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ $main_category_active_class == 'active' ?'show':""  }}" id="cat_comp">
                    <ul class="nav sub-menu">

                        <li class="nav-item">
                            <a href="{{ route('admin.main_category.index') }}"
                               class="nav-link {{ active_class_r(['admin.main_category.index']) }}">عرض كل الاقسام</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.main_category.create') }}"
                               class="nav-link {{ active_class_r(['admin.main_category.create']) }}">اضافة قسم جديد</a>
                        </li>
                    </ul>
                </div>
            </li>

            <?php $merchant_active_class = active_class_r(['admin.merchant.index', 'admin.merchant.create']); ?>
            <li class="nav-item {{ $merchant_active_class }}">
                <a class="nav-link" data-toggle="collapse" href="#merchant_comp" role="button"
                   aria-expanded="{{ $merchant_active_class == "active" ? "true" : "" }}"
                   aria-controls="merchant_comp">
                    <i class="fas fa-users" ></i>
                    <span class="link-title">التجار</span>
                    <span class="badge badge-danger">{{ \Modules\Merchant\Entities\Merchant::count() }}</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ $merchant_active_class == 'active' ?'show':""  }}" id="merchant_comp">
                    <ul class="nav sub-menu">

                        <li class="nav-item">
                            <a href="{{ route('admin.merchant.index') }}"
                               class="nav-link {{ active_class_r(['admin.merchant.index']) }}">عرض كل التجار</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.merchant.create') }}"
                               class="nav-link {{ active_class_r(['admin.merchant.create']) }}">اضافة تاجر جديد</a>
                        </li>
                    </ul>
                </div>
            </li>


        </ul>
    </div>
</nav>
