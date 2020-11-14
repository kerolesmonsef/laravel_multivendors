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
                <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button"
                   aria-expanded="{{ $main_category_active_class == "active" ? "true" : "" }}"
                   aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">الاقسام الرئيسية</span>
                    <span class="badge badge-danger">{{ \App\Models\MainCategory::count() }}</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ $main_category_active_class == 'active' ?'show':""  }}" id="uiComponents">
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
                <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button"
                   aria-expanded="{{ $merchant_active_class == "active" ? "true" : "" }}"
                   aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">التجار</span>
                    <span class="badge badge-danger">{{ \Modules\Merchant\Entities\Merchant::count() }}</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ $merchant_active_class == 'active' ?'show':""  }}" id="uiComponents">
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

            <li class="nav-item {{ active_class(['forms/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#forms" role="button"
                   aria-expanded="{{ is_active_route(['forms/*']) }}" aria-controls="forms">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">Forms</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['forms/*']) }}" id="forms">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/forms/basic-elements') }}"
                               class="nav-link {{ active_class(['forms/basic-elements']) }}">Basic Elements</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/forms/advanced-elements') }}"
                               class="nav-link {{ active_class(['forms/advanced-elements']) }}">Advanced Elements</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/forms/editors') }}"
                               class="nav-link {{ active_class(['forms/editors']) }}">Editors</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/forms/wizard') }}" class="nav-link {{ active_class(['forms/wizard']) }}">Wizard</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['charts/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#charts" role="button"
                   aria-expanded="{{ is_active_route(['charts/*']) }}" aria-controls="charts">
                    <i class="link-icon" data-feather="pie-chart"></i>
                    <span class="link-title">Charts</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['charts/*']) }}" id="charts">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/charts/apex') }}" class="nav-link {{ active_class(['charts/apex']) }}">Apex</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/charts/chartjs') }}"
                               class="nav-link {{ active_class(['charts/chartjs']) }}">ChartJs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/charts/flot') }}" class="nav-link {{ active_class(['charts/flot']) }}">Flot</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/charts/morrisjs') }}"
                               class="nav-link {{ active_class(['charts/morrisjs']) }}">MorrisJs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/charts/peity') }}" class="nav-link {{ active_class(['charts/peity']) }}">Peity</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/charts/sparkline') }}"
                               class="nav-link {{ active_class(['charts/sparkline']) }}">Sparkline</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['tables/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#tables" role="button"
                   aria-expanded="{{ is_active_route(['tables/*']) }}" aria-controls="tables">
                    <i class="link-icon" data-feather="layout"></i>
                    <span class="link-title">Tables</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['tables/*']) }}" id="tables">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/tables/basic-tables') }}"
                               class="nav-link {{ active_class(['tables/basic-tables']) }}">Basic Tables</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/tables/data-table') }}"
                               class="nav-link {{ active_class(['tables/data-table']) }}">Data Table</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['icons/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#icons" role="button"
                   aria-expanded="{{ is_active_route(['icons/*']) }}" aria-controls="icons">
                    <i class="link-icon" data-feather="smile"></i>
                    <span class="link-title">Icons</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['icons/*']) }}" id="icons">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/icons/feather-icons') }}"
                               class="nav-link {{ active_class(['icons/feather-icons']) }}">Feather Icons</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/icons/flag-icons') }}"
                               class="nav-link {{ active_class(['icons/flag-icons']) }}">Flag Icons</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/icons/mdi-icons') }}"
                               class="nav-link {{ active_class(['icons/mdi-icons']) }}">Mdi Icons</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Pages</li>
            <li class="nav-item {{ active_class(['general/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#general" role="button"
                   aria-expanded="{{ is_active_route(['general/*']) }}" aria-controls="general">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Special Pages</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['general/*']) }}" id="general">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/general/blank-page') }}"
                               class="nav-link {{ active_class(['general/blank-page']) }}">Blank page</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/general/faq') }}"
                               class="nav-link {{ active_class(['general/faq']) }}">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/general/invoice') }}"
                               class="nav-link {{ active_class(['general/invoice']) }}">Invoice</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/general/profile') }}"
                               class="nav-link {{ active_class(['general/profile']) }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/general/pricing') }}"
                               class="nav-link {{ active_class(['general/pricing']) }}">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/general/timeline') }}"
                               class="nav-link {{ active_class(['general/timeline']) }}">Timeline</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['auth/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#auth" role="button"
                   aria-expanded="{{ is_active_route(['auth/*']) }}" aria-controls="auth">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Authentication</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['auth/*']) }}" id="auth">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/auth/login') }}"
                               class="nav-link {{ active_class(['auth/login']) }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/auth/register') }}"
                               class="nav-link {{ active_class(['auth/register']) }}">Register</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['error/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#error" role="button"
                   aria-expanded="{{ is_active_route(['error/*']) }}" aria-controls="error">
                    <i class="link-icon" data-feather="cloud-off"></i>
                    <span class="link-title">Error</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['error/*']) }}" id="error">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/error/404') }}" class="nav-link {{ active_class(['error/404']) }}">404</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/error/500') }}" class="nav-link {{ active_class(['error/500']) }}">500</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/laravel/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
