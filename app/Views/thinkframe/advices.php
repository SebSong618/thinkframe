<?= $this->extend('metronic/template') ?>

<?= $this->section("base_href") ?>
<base href="../">
<?= $this->endSection() ?>

<?= $this->section('aside_menu') ?>
<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
            <div class="menu-item">
                <a class="menu-link active" href="#">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>
            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Apps</span>
                </div>
            </div>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotone/General/Shield-protected.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
                                    <path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="#000000" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">User Management</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Users</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="users/list">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Users List</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="apps/user-management/users/view.html">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View User</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Roles</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="apps/user-management/roles/list.html">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Roles List</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="apps/user-management/roles/view.html">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View Role</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="apps/user-management/permissions.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Permissions</span>
                        </a>
                    </div>
                </div>
            </div>

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotone/Communication/Group-chat.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                                <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">ThinkFrame</span>
                </span>
                <?= $menu; ?>
            </div>
        </div>
        <!--end::Menu-->
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('aside_footer') ?>
<?= $this->endSection() ?>

<?= $this->section('container') ?>
<!--begin::Container-->
<div class="container-fluid d-flex align-items-stretch justify-content-between">
<!--begin::Aside mobile toggle-->
<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
    <div class="btn btn-icon btn-active-light-primary" id="kt_aside_mobile_toggle">
        <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
        <span class="svg-icon svg-icon-2x mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                    <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
</div>
<!--end::Aside mobile toggle-->

<!--begin::Wrapper-->
<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
    <!--begin::Navbar-->
    <div class="d-flex align-items-stretch" id="kt_header_nav">
        <!--begin::Menu wrapper-->
        <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
            <!--begin::Menu-->
            <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
                <div class="menu-item me-lg-1">
                    <span class="title-heading advice-title">Advice</span>
                    <button type="button" id="add_new_advice" class="btn btn-lg btn-primary">
                        <i class="fas fa-plus"></i>&nbsp;ADD NEW ADVICE
                    </button> 
                </div>

                <div class="menu-item me-lg-1">
                    <button type="button" id="bt_all_zero" class="btn btn-lg btn-primary">
                        &nbsp;SET ALL BLANKS TO 0 
                    </button>
                </div>

                <div class="menu-item me-lg-1">
                    <select class="form-select scopes-select" aria-label="Default select example">
                      <option selected value="<?= DEFAULT_SCOPE_ID; ?>">Select Scope</option>
                      <?php foreach($scopes as $scope):?>
                        <option value="<?= $scope['scope_id']; ?>"><?= $scope['scope_name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                </div>

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::Navbar-->
    <!--begin::Topbar-->
    <div class="d-flex align-items-stretch flex-shrink-0">
        <!--begin::Toolbar wrapper-->
        <div class="d-flex align-items-stretch flex-shrink-0">
            <!--begin::Search-->
            <div class="d-flex align-items-stretch ms-1 ms-lg-3">
                <!--begin::Search-->
                <div id="kt_header_search" class="d-flex align-items-stretch" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-menu-trigger="auto" data-kt-menu-overflow="false" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                    <!--begin::Menu-->
                    <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown p-7 w-325px w-md-375px">
                        <!--begin::Wrapper-->
                        <div data-kt-search-element="wrapper">
                            <!--begin::Form-->
                            <form data-kt-search-element="form" class="w-100 position-relative mb-3" autocomplete="off">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 translate-middle-y ms-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-flush ps-10" name="search" value="" placeholder="Search..." data-kt-search-element="input" />
                                <!--end::Input-->
                                <!--begin::Spinner-->
                                <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-1" data-kt-search-element="spinner">
                                    <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                                </span>
                                <!--end::Spinner-->
                                <!--begin::Reset-->
                                <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none" data-kt-search-element="clear">
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <!--end::Reset-->
                                <!--begin::Toolbar-->
                                <div class="position-absolute top-50 end-0 translate-middle-y" data-kt-search-element="toolbar">
                                    <!--begin::Preferences toggle-->
                                    <div data-kt-search-element="preferences-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-1" data-bs-toggle="tooltip" title="Show search preferences">
                                        <!--begin::Svg Icon | path: icons/duotone/Code/Settings4.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Preferences toggle-->
                                    <!--begin::Advanced search toggle-->
                                    <div data-kt-search-element="advanced-options-form-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary" data-bs-toggle="tooltip" title="Show more search options">
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Advanced search toggle-->
                                </div>
                                <!--end::Toolbar-->
                            </form>
                          
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Preferences-->
                        <form data-kt-search-element="advanced-options-form" class="pt-1 d-none">
                           
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-white fw-bolder btn-active-light-primary me-2" data-kt-search-element="advanced-options-form-cancel">Cancel</button>
                                <a href="pages/search/horizontal.html" class="btn btn-sm fw-bolder btn-primary" data-kt-search-element="advanced-options-form-search">Search</a>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Preferences-->
                        <!--begin::Preferences-->
                        <form data-kt-search-element="preferences" class="pt-1 d-none">
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end pt-7">
                                <button type="reset" class="btn btn-sm btn-white fw-bolder btn-active-light-primary me-2" data-kt-search-element="preferences-dismiss">Cancel</button>
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save Changes</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Preferences-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Search-->
            </div>
            <!--end::Search-->
            
            <!--begin::User-->
            <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                <!--begin::Menu wrapper-->
                <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                    <img src="assets/media/avatars/150-2.jpg" alt="metronic" />
                </div>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px me-5">
                                <img alt="Logo" src="assets/media/avatars/150-2.jpg" />
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Username-->
                            <div class="d-flex flex-column">
                                <div class="fw-bolder d-flex align-items-center fs-5">Max Smith
                                <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span></div>
                                <a href="#" class="fw-bold text-muted text-hover-primary fs-7">max@kt.com</a>
                            </div>
                            <!--end::Username-->
                        </div>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <div class="separator my-2"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <a href="account/overview.html" class="menu-link px-5">My Profile</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5 my-1">
                        <a href="account/settings.html" class="menu-link px-5">Account Settings</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <a href="/logout" class="menu-link px-5">Sign Out</a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
                <!--end::Menu wrapper-->
            </div>
            <!--end::User -->
            <!--begin::Heaeder menu toggle-->
            <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                <div class="btn btn-icon btn-active-light-primary" id="kt_header_menu_mobile_toggle">
                    <!--begin::Svg Icon | path: icons/duotone/Text/Toggle-Right.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 11.5C22 12.3284 21.3284 13 20.5 13H3.5C2.6716 13 2 12.3284 2 11.5C2 10.6716 2.6716 10 3.5 10H20.5C21.3284 10 22 10.6716 22 11.5Z" fill="black" />
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M14.5 20C15.3284 20 16 19.3284 16 18.5C16 17.6716 15.3284 17 14.5 17H3.5C2.6716 17 2 17.6716 2 18.5C2 19.3284 2.6716 20 3.5 20H14.5ZM8.5 6C9.3284 6 10 5.32843 10 4.5C10 3.67157 9.3284 3 8.5 3H3.5C2.6716 3 2 3.67157 2 4.5C2 5.32843 2.6716 6 3.5 6H8.5Z" fill="black" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
            </div>
            <!--end::Heaeder menu toggle-->
        </div>
        <!--end::Toolbar wrapper-->
    </div>
    <!--end::Topbar-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Container-->
<?= $this->endSection() ?>

<?= $this->section('post') ?>
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!-- ajax ring effect -->
        <div class="lds-dual-ring"></div>
        <!--begin::Card-->
        <div class="card advice-page">
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="advice-container">
                </div>

                <div class="modal fade" id="kt_confirm_delete" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y">
                                <!--begin::Wrapper-->
                                <div class="mx-auto">
                                    <!--begin::Heading-->
                                    <div class="text-center">
                                        <!--begin::Title-->
                                        <h1 class="mb-3 delete-question">Do you really want to delete this combo?</h1>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Heading-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger btn-delete">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
  
</div>
<?= $this->endSection() ?>


<?= $this->section('custom_script') ?>
<?= $this->section('script') ?>
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<script src="assets/js/custom/apps/user-management/users/list/table.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/modals/create-app.js"></script>
<script src="assets/js/custom/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/custom-thinkframe.js"></script>

<script src="assets/js/custom/jquery-te-1.4.0.min.js"></script>
<link rel="stylesheet" href="assets/css/jquery-te-1.4.0.css">
<link rel="stylesheet" href="assets/css/custom-thinkframe.css">


<script>

    /**
     *  This prototype function is for adding div custom templates to its container dynamically.
     */
    String.prototype.compose = (function (){
        var re = /\{{(.+?)\}}/g;
        return function (o){
                return this.replace(re, function (_, k){
                    return typeof o[k] != 'undefined' ? o[k] : '';
                });
            }
    }());

    var new_advice_id = 0;
    var new_combo_advice_max_id = 0;
    $last_saved_state = [];

    var selectedScope = sessionStorage.getItem("SelectedScope");  
    $('.scopes-select').val(selectedScope);

    $.post('/getdatainjson/advice_max_id', function(rs){
        new_advice_id = parseInt(rs);

        $.post('/getdatainjson/advices', {scope_id : $('.scopes-select').val()}, function(result){
         
            var rs = JSON.parse(result);

            for(var i in rs){
                
                $('.advice-container').append(
                    advice_box.compose({
                        'advice_id'   : rs[i].advice_id,
                        'scope_id'    : rs[i].scope_id,
                    })
                );

                $('#advice_box_' + rs[i].advice_id).append(
                    advice_editor.compose({
                        advice_content : rs[i].advice_content
                    })
                );

                $('#advice_box_' + rs[i].advice_id).find('.rich-editor').jqte();

                $('#advice_box_' + rs[i].advice_id).append(
                    relevance_editbox.compose({
                        advice_id : rs[i].advice_id,
                        relevance : (rs[i].relevance == null)? "" : rs[i].relevance,
                    })
                );

                var list = rs[i].list;
                var is_expand_bt_added = false;

                var count_zero_powers = 0;
                for(var n in list){
                    
                    if(list[n].hasOwnProperty('combo_id')){
                        $('#advice_box_' + rs[i].advice_id).append(
                        advice_combo_box.compose({
                                'combo_id'   : parseInt(list[n].combo_id),
                                'combo_name' : list[n].combo_name,
                                'combo_advice_id' : list[n].combo_advice_id,
                                'combo_target_level' : (list[n].combo_target_level == null)? "" : list[n].combo_target_level,
                                'combo_power' : (list[n].combo_power == null) ? "" : list[n].combo_power,
                                'range_show' : (list[n].combo_power == null) ? 'hidden' : 'visible'
                            })
                        );

                        if(parseInt(list[n].combo_power) == 0){
                            $('div[combo_advice_id="' + list[n].combo_advice_id +'"]').addClass('hide_zero_powers');
                            is_expand_bt_added = true;
                            count_zero_powers++;
                        }

                        $last_saved_state.push({
                            'id'       : parseInt(list[n].combo_advice_id),
                            'power'    : (list[n].combo_power == null) ? "" : list[n].combo_power
                        });

                        if(list[n].combo_power == null){
                            $('div[combo_advice_id="'+ list[n].combo_advice_id +'"]').
                            find('.advice-combo-name').addClass('option-content-alert');
                        }
                    }
                    else{

                        $('#advice_box_' +  rs[i].advice_id).append(
                            advice_hyp_box.compose({
                                'hyp_id'   : parseInt(list[n].hyp_id),
                                'hyp_content' : list[n].hyp_content,
                                'advice_hyp_id' : list[n].advice_hyp_id,
                                'hyp_target_level' : (list[n].hyp_target_level == null)? "" : list[n].hyp_target_level,
                                'hyp_power' : (list[n].hyp_power == null) ? "" : list[n].hyp_power,
                                'range_show' : (list[n].hyp_power == null) ? 'hidden' : 'visible',
                                'strength' : list[n].strength == null ? -1 : list[n].strength,
                                'label_m_100' : (list[n].label_m_100 == null) ? "": list[n].label_m_100,
                                'label_m_50' : (list[n].label_m_50 == null) ? "" : list[n].label_m_50,
                                'label_0' : (list[n].label_0 == null) ? "" : list[n].label_0,
                                'label_p_50' : (list[n].label_p_50 == null) ? "" : list[n].label_p_50,
                                'label_p_100' : (list[n].label_p_100 == null) ? "" : list[n].label_p_100

                            })
                        );

                        if(list[n].strength == null) {
                            $('#strength_link_' + list[n].advice_hyp_id).val(-1);
                            $('#strength_link_' + list[n].advice_hyp_id).prev().prev().css('visibility','hidden');
                        }
                        else{
                            $('#strength_link_' + list[n].advice_hyp_id).val(list[n].strength);
                        }

                        if(list[n].strength == -1 || list[n].strength == 1000){
                            $('#strength_link_' + list[n].advice_hyp_id).prev().prev().css('visibility','hidden');
                        }

                        $('#advice_hyp_box_' + list[n].advice_hyp_id).find('select').find('option[value='+list[n].strength+']').attr("selected",true);

                        if(parseInt(list[n].strength) == 1000){ // NONE relation between H and A
                            $('div[advice_hyp_id="' + list[n].advice_hyp_id +'"]').addClass('hide_zero_powers');
                            is_expand_bt_added = true;
                            count_zero_powers++;
                        }

                        $last_saved_state.push({
                            'id'       : parseInt(list[n].advice_hyp_id),
                            'power'    : (list[n].hyp_power == null) ? "" : list[n].hyp_power
                        });
                       
                        if(list[n].strength == null || list[n].strength == -1){
                           $('div[advice_hyp_id="'+ list[n].advice_hyp_id +'"]').
                           find('.advice-hyp-name').addClass('option-content-alert');
                        } 
                    }

                }

                if(is_expand_bt_added){
                    $('#advice_box_' + rs[i].advice_id).append(
                        expand_shrink_button.compose({
                            'count_zero_powers' : count_zero_powers,
                            'advice_id' : rs[i].advice_id
                        })
                    );
                }

                $('#advice_box_' + rs[i].advice_id).append(
                    save_cancel_advice.compose({
                        advice_id : rs[i].advice_id
                    })
                );

            }

        });
    });

    $(document).on('change', '.strength-list', function(e){
        var strength = $(e.target).val();
        if(strength == -1 || strength == 1000){ // This means "?" or NONE
            $(e.target).prev().removeClass().addClass('advice-hyp-range slider-1000');
            $(e.target).prev().prev().css('visibility','hidden');
        }
        else{
            $(e.target).prev().removeClass().addClass('advice-hyp-range slider-' + strength); 
            $(e.target).prev().css('visibility','visible');
            $(e.target).prev().prev().css('visibility','visible');
        }
        

        $advice_hyp_id = $(e.target).parent().attr('advice_hyp_id');

        $.post('/getdatainjson/update_advice_strength',{
            advice_hyp_id    : $advice_hyp_id, 
            strength : strength 
            }, function(res,status){
                if(strength > -1){ // NONE relation
                    $(e.target).next().next().next().removeClass('option-content-alert');
                }
        });
    });

    $('#add_new_advice').click(function(e){
        new_advice_id++;
        $scope_id = $('.scopes-select').val();

        $.post('/getdatainjson/advice_combo_hyp', {advice_id : new_advice_id, scope_id : $scope_id}, function(response){

            if(JSON.parse(response) == false){
                create_advice_without_h_c($scope_id, new_advice_id);
                return;
            } 

            $.post('/getdatainjson/combos_hyps', {advice_id : new_advice_id, scope_id : $scope_id}, function(result) {
                var rs = JSON.parse(result);
                
                $('.advice-container').prepend(
                    advice_box.compose({
                        'advice_id'   : new_advice_id,
                        'scope_id'    : $scope_id,
                    })
                );

                $('#advice_box_' + new_advice_id).append(
                    advice_editor.compose({
                        advice_content : ""
                    })
                );

                $('#advice_box_' + new_advice_id).find('.rich-editor').jqte();

                $('#advice_box_' + new_advice_id).find('.jqte_editor').focus(); // set focus on new added advice textbox

                $('#advice_box_' + new_advice_id).append(
                    relevance_editbox.compose({
                        advice_id : new_advice_id,
                        relevance : "",
                    })
                );

                var combos = rs.combos;
                var hyps   = rs.hyps;

                for(var i in combos){
                   
                    $('#advice_box_' + new_advice_id).append(
                        advice_combo_box.compose({
                            'combo_id'   : parseInt(combos[i].combo_id),
                            'combo_name' : combos[i].combo_name,
                            'combo_advice_id' : combos[i].combo_advice_id,
                        })
                    );

                    $last_saved_state.push({
                        'id'       : parseInt(combos[i].combo_advice_id),
                        'power'    : ""
                    });
                }

                for(var i in hyps){
                    $('#advice_box_' + new_advice_id).append(
                        advice_hyp_box.compose({
                            'hyp_id'   : parseInt(hyps[i].hyp_id),
                            'hyp_content' : hyps[i].hyp_content,
                            'advice_hyp_id' : hyps[i].advice_hyp_id,
                            'strength' : 8,
                            'label_m_100' : (hyps[i].label_m_100 == null) ? "": hyps[i].label_m_100,
                            'label_m_50' : (hyps[i].label_m_50 == null) ? "" : hyps[i].label_m_50,
                            'label_0' : (hyps[i].label_0 == null) ? "" : hyps[i].label_0,
                            'label_p_50' : (hyps[i].label_p_50 == null) ? "" : hyps[i].label_p_50,
                            'label_p_100' : (hyps[i].label_p_100 == null) ? "" : hyps[i].label_p_100
                        })
                    );

                    $last_saved_state.push({
                        'id'       : parseInt(hyps[i].advice_hyp_id),
                        'power'    : ""
                    });
                }

                $('#advice_box_' + new_advice_id).find('.advice-combo-name').addClass('option-content-alert');
                $('#advice_box_' + new_advice_id).find('.advice-hyp-name').addClass('option-content-alert');

                $('#advice_box_' + new_advice_id).append(
                    save_cancel_advice.compose({
                        advice_id : new_advice_id
                    })
                );

               

            });

        });


    });

    /**
     * Show/Hide powers with 0 values
     */
    $(document).on('click', '.bt-expand-shrink', function(e){
        
        $advice_id = $(this).parent().attr('advice_id');
        $counts    = $(this).parent().attr('counts');
        $content   = $(this).text();
       
        if($content.includes('expand')){
            $('div[advice_id="' + $advice_id + '"]').children('div').removeClass('hide_zero_powers');
            $(this).html('Shrink NONE');
        }
        else{
            $(this).html('...plus ' + $counts + ' other options with NONE HYPOTHESIS [expand]');

            ($('div[advice_id="' + $advice_id + '"]').children('div.hyp-box')).each(function(i,item){
                if(parseInt($(item).find('select').val()) == 1000){ // 1000 means NONE relation between H and A
                    $(item).addClass('hide_zero_powers');
                }
            });

            ($('div[advice_id="' + $advice_id + '"]').children('div.combo-box')).each(function(i,item){
                if(parseInt($(item).find('select').val()) == 1000){
                    $(item).addClass('hide_zero_powers');
                }
            });
        }
    });

    new_hyp_id = 0;
    new_advice_hyp_id = 0;

    function create_advice_without_h_c($scope_id, $new_advice_id){

        $.post('/getdatainjson/getMaxIds', function(result){
            rs = JSON.parse(result);
            new_hyp_id = rs.hyp_last_id;
            new_advice_hyp_id = rs.advice_hyp_last_id;

            $('.advice-container').prepend(
                advice_box.compose({
                    'advice_id'   : $new_advice_id,
                    'scope_id'    : $scope_id,
                })
            );

            $('#advice_box_' + $new_advice_id).append(
                advice_editor.compose({
                    advice_content : ""
                })
            );

            $('#advice_box_' + $new_advice_id).find('.rich-editor').jqte();

            $('#advice_box_' + new_advice_id).append(
                relevance_editbox.compose({
                    advice_id : $new_advice_id,
                    relevance : "",
                })
            );

            $('#advice_box_' + $new_advice_id).append('<div style="float:left; margin-left:5px; width:100%;  margin-top:2px;"><button id="new_hyp_add">Add New Hyp</button></div>');

            $('#advice_box_' + $new_advice_id).append(
                save_cancel_advice.compose({
                    advice_id : $new_advice_id
                })
            );
        });

    }

    $(document).on('click', '#new_hyp_add', function(e){
        new_hyp_id++;
        new_advice_hyp_id++;
        $('#advice_box_' + new_advice_id).append(
            advice_hyp_box_editable.compose({
                'hyp_id'   : parseInt(new_hyp_id),
                'hyp_content' : "",
                'advice_hyp_id' : new_advice_hyp_id,
            })
        );

        $last_saved_state.push({
            'id'       : parseInt(new_advice_hyp_id),
            'power'    : ""
        });

    });

    $(document).on('change', '.hyp-content', function(e){
        $hyp_content = $(e.target).val();
        $hyp_id = $(e.target).parent().attr('hyp_id');
        $scope_id = $('.scopes-select').val();

        $(e.target).addClass('input_ajax_started');  // ajax waiting effect started
       
        $.post('/getdatainjson/add_hyp_advice',{
                hyp_id : $hyp_id,
                hyp_content : $hyp_content,
                scope_id : $scope_id,
                advice_id : $(e.target).parent().parent().attr('advice_id'),
                advice_hyp_id : $(e.target).parent().attr('advice_hyp_id')
            }, function(res,status){
                if(status == 'success'){
                    $(e.target).removeClass('input_ajax_started').addClass('green_tick_started');
                    setTimeout(function() {
                      $(e.target).removeClass('green_tick_started'); // ajax waiting effect ended
                    }, 1000);
                }
        });
    });


    $advice_id = -1;
    $object_delete = null;
    $trash_object = null;

    $(document).on('click', '.remove-advice', function(e){

        $advice_id = $(e.target).parent().parent().attr('advice_id');
        $object_delete = $(e.target).parent().parent();
        $trash_object = $(e.target);

        $advice_name = $(e.target).parent().parent().find('.jqte_editor').html();

        $('.delete-question').html("<span style='color:red;'>Do you really want to delete advice : </span><br/>" + $advice_name);
        $(e.target).addClass('rotate-trash');
        $('#kt_confirm_delete').modal('show');

    });

    $('#kt_confirm_delete .btn-delete').click(function(e) {
        $.post('/getdatainjson/delete_advice',{
                advice_id   : $advice_id,
            }, function(res,status){
                if(status == 'success'){
                    $object_delete.remove(); // Combo will be removed from UI.
                    $('#kt_confirm_delete').modal('toggle');
                }
        }); 
    });

    $('#kt_confirm_delete .btn-cancel').click(function(e){
        $trash_object.removeClass('rotate-trash');
    })

    $(document).on('blur', '.jqte_editor', function(e){
        $advice_content = $(e.target).html();

        $advice_id = $(e.target).parent().parent().attr('advice_id');
        $scope_id  = $(e.target).parent().parent().attr('scope_id');
        $(e.target).addClass('input_ajax_started');  // ajax waiting effect started

        $.post('/getdatainjson/add_advice',{
                advice_id : $advice_id,
                advice_content : $advice_content,
                scope_id : $scope_id,
            }, function(res,status){
                if(status == 'success'){
                    $(e.target).removeClass('input_ajax_started').addClass('green_tick_started');
                    setTimeout(function() {
                      $(e.target).removeClass('green_tick_started'); // ajax waiting effect ended
                    }, 1000);
                   
                }
        });

    });

    $(document).on('click', '.combo-power', function(e){
        if($(e.target).val() == ""){
            $(e.target).next().css('visibility','visible');
            $(e.target).next().val(0);
        }
    });

    $(document).on('change', '.combo-power', function(e){
        $combo_id  = $(e.target).parent().attr('combo_id');
        $advice_id = $(e.target).parent().parent().attr('advice_id');
        $('#advice_box_' + $advice_id).find('.save-cancel-advice-block').show();

        $combo_power = $(e.target).val();
        $combo_advice_id = $(e.target).parent().attr('combo_advice_id');

        $currentVal = parseInt($(this).val());
        $previous_value = parseInt($(e.target).next().val());
        
        $(e.target).next().val($(this).val());


        $combo_target_level = $(e.target).next().next().val();
        $(e.target).next().next().next().removeClass('option-content-alert'); 

        $.post('/getdatainjson/add_combo_advice', {
            combo_id : $combo_id,
            advice_id : $advice_id,
            combo_power : $combo_power,
            combo_advice_id : $combo_advice_id,
            combo_target_level : $combo_target_level,
        }, function(ev){
           
        });

    });


    $(document).on('change', '.combo-target-level', function(e){
        $combo_id  = $(e.target).parent().attr('combo_id');
        $advice_id = $(e.target).parent().parent().attr('advice_id');

        $combo_target_level = $(e.target).val();
        $combo_advice_id = $(e.target).parent().attr('combo_advice_id');

        $combo_power = $(e.target).prev().val();

        $(e.target).addClass('input_ajax_started'); // ajax waiting effect started.

        $.post('/getdatainjson/add_combo_advice', {
            combo_id : $combo_id,
            advice_id : $advice_id,
            combo_power : $combo_power,
            combo_advice_id : $combo_advice_id,
            combo_target_level : $combo_target_level,
        }, function(rs){
            $(e.target).removeClass('input_ajax_started').addClass('green_tick_started');
                    setTimeout(function() {
                      $(e.target).removeClass('green_tick_started'); // ajax waiting effect ended
                    }, 1000);
        });

    });

    $(document).on('click', '.hyp-power', function(e){
        if($(e.target).val() == ""){
            $(e.target).next().css('visibility','visible');
            $(e.target).next().val(0);
        }
    });


    $(document).on('change', '.hyp-power', function(e){
        $hyp_id  = $(e.target).parent().attr('hyp_id');
        $advice_id = $(e.target).parent().parent().attr('advice_id');
        $advice_hyp_id = $(e.target).parent().attr('advice_hyp_id');
        $('#advice_box_' + $advice_id).find('.save-cancel-advice-block').show();

        $hyp_power = $(e.target).val();

        $currentVal = parseInt($(this).val());
        $previous_value = parseInt($(e.target).next().val());

        $(e.target).next().val($(this).val());
        $(e.target).next().attr('value',$(this).val());
        $(this).attr('value', $(this).val());
        
        $hyp_target_level = $(e.target).next().next().val();
        $(e.target).next().next().next().next().removeClass('option-content-alert'); 

        $.post('/getdatainjson/add_advice_hyp', {
            hyp_id : $hyp_id,
            advice_id : $advice_id,
            hyp_power : $hyp_power,
            advice_hyp_id : $advice_hyp_id,
            hyp_target_level : $hyp_target_level,
        }, function(ev){
              
        });

    });

    $(document).on('change', '.hyp-target-level', function(e){
        $hyp_id  = $(e.target).parent().attr('hyp_id');
        $advice_id = $(e.target).parent().parent().attr('advice_id');

        $hyp_target_level = $(e.target).val();
        $advice_hyp_id = $(e.target).parent().attr('advice_hyp_id');

        $hyp_power = $(e.target).prev().prev().val();

        $(e.target).addClass('input_ajax_started'); // ajax waiting effect started.

        $.post('/getdatainjson/add_advice_hyp', {
            hyp_id : $hyp_id,
            advice_id : $advice_id,
            hyp_power : $hyp_power,
            advice_hyp_id : $advice_hyp_id,
            hyp_target_level : $hyp_target_level,
        }, function(ev){
            $(e.target).removeClass('input_ajax_started').addClass('green_tick_started');
            setTimeout(function() {
              $(e.target).removeClass('green_tick_started'); // ajax waiting effect ended
            }, 1000);
        });

    });

    /**
     * Display range slider each time power editbos is focused.
     * 
     */

    $(document).on('input', 'input.advice-combo-range, input.advice-hyp-range', function(ev){
        
        $currentVal = $(ev.target).val();
        $(ev.target).prev().val($currentVal);
        $advice_id = $(ev.target).parent().parent().attr('advice_id');

        var combos = [];
        var hyps = [];


        $('#advice_box_' + $advice_id).find('.combo-box').each(function(){
            
            if($(this).find('.combo-power').val() != ""){
                $combo_power = {
                    combo_advice_id : $(this).attr('combo_advice_id'),
                    combo_power : $(this).find('.combo-power').val(),
                };

                $index_found = $last_saved_state.findIndex(node => node.id === parseInt($(this).attr('combo_advice_id')));
                $last_saved_state[$index_found]['power'] = $(this).find('.combo-power').val();
                
                combos.push($combo_power);
            }
            
        });


        $('#advice_box_' + $advice_id).find('.hyp-box').each(function(){
            
            if($(this).find('.hyp-power').val() != ""){
                $hyp_power = {
                    advice_hyp_id : $(this).attr('advice_hyp_id'),
                    hyp_power : $(this).find('.hyp-power').val(),
                    advice_id : $advice_id,
                    hyp_id : $(this).attr('hyp_id'),
                    hyp_target_level : ($(this).find('.hyp-target-level').val() == "")? null : $(this).find('.hyp-target-level').val()
                };
               
                $index_found = $last_saved_state.findIndex(node => node.id === parseInt($(this).attr('advice_hyp_id')));
                $last_saved_state[$index_found]['power'] = $(this).find('.hyp-power').val();
               
                hyps.push($hyp_power);
            }
            
        });

        var advice_combo_hyp_array = {
            'combos' : combos,
            'hyps'   : hyps,
        };

        $.post('/getdatainjson/update_combo_hyp_powers', {normalization_array : JSON.stringify(advice_combo_hyp_array)}, function(res){
        });

    });

    $(document).on('click', '.bt-cancel-normalization', function(e){
        $advice_id = $(e.target).parent().attr('advice_id');
        var ranges = $('#advice_box_' + $advice_id).find('input[type=range]');
        
        $('#advice_box_' + $advice_id).find('input[type=range]').each(function(i){
            $index_found = $last_saved_state.findIndex(node => node.id === parseInt($(this).prev().attr('id')));
            if($index_found > -1){
                $(this).prev().val($last_saved_state[$index_found]['power']);
                $(this).val($last_saved_state[$index_found]['power']);
            }
            
        });
    });
      

    /**
     * This click handler sets all blank fields to zero.
     */

    $('#bt_all_zero').click(function(e){
        
        $('.lds-dual-ring').css('visibility','visible');

        $(".combo-power").each(function (index, element) {
            if($(this).val() == ""){
                $(this).val(0);
                $(this).next().next().next().removeClass('option-content-alert');
            }
        });

        $(".hyp-power").each(function (index, element) {
            if($(this).val() == ""){
                $(this).val(0);
                $(this).next().next().next().removeClass('option-content-alert');
            }
        });

        $.post('/getdatainjson/set_zeros_on_blanks', {table_selection : "advice_hyp_combo"}, function(rs){
            $('.lds-dual-ring').css('visibility','hidden');
        });
    });

    /**
     * This handler is for limiting typing to only numbers regards on combo power 
     * This code is perfect, I think
     */ 
    $(document).on('keypress', 'input.combo-power', function(e){
    
        var charCode = (e.which) ? e.which : event.keyCode    

        if (String.fromCharCode(charCode).match(/[^0-9]/g))    

            return false;                        

    }); 

    $(document).on('change', '.relevance-editbox', function(e) {
        $relevance = $(e.target).val();
        $advice_id = $(e.target).parent().parent().attr('advice_id');

        $(e.target).addClass('input_ajax_started'); // ajax waiting effect started

        $.post('/getdatainjson/update_relevance', {advice_id: $advice_id, relevance : $relevance}, function(rs){
            
            $(e.target).removeClass('input_ajax_started').addClass('green_tick_started');

            setTimeout(function() {
              $(e.target).removeClass('green_tick_started'); // ajax waiting effect ended
            }, 1000);
        });

    });


    $('.scopes-select').change(function(e){
        $scope_id = $(e.target).val();
        sessionStorage.setItem("SelectedScope", $scope_id);
        
        $('.advice-container').empty();
        $last_saved_state = [];

        // ajax waiting effect started.
        $('.lds-dual-ring').css('visibility','visible');

        $.post('/getdatainjson/advices', {scope_id : $scope_id}, function(result){

            var rs = JSON.parse(result);
            
            for(var i in rs){
                
                $('.advice-container').append(
                    advice_box.compose({
                        'advice_id'   : rs[i].advice_id,
                        'scope_id'    : rs[i].scope_id,
                    })
                );

                 $('#advice_box_' + rs[i].advice_id).append(
                    advice_editor.compose({
                        advice_content : rs[i].advice_content
                    })
                );

                $('#advice_box_' + rs[i].advice_id).find('.rich-editor').jqte();

                $('#advice_box_' + rs[i].advice_id).append(
                    relevance_editbox.compose({
                        advice_id : rs[i].advice_id,
                        relevance : (rs[i].relevance == null)? "" : rs[i].relevance,
                    })
                );
            
                var list = rs[i].list;
                var is_expand_bt_added = false;
                var count_zero_powers = 0;

                for(var n in list){
                    if(list[n].hasOwnProperty('combo_id')){
                        $('#advice_box_' + rs[i].advice_id).append(
                        advice_combo_box.compose({
                                'combo_id'   : parseInt(list[n].combo_id),
                                'combo_name' : list[n].combo_name,
                                'combo_advice_id' : list[n].combo_advice_id,
                                'combo_target_level' : (list[n].combo_target_level == null)? "" : list[n].combo_target_level,
                                'combo_power' : (list[n].combo_power == null) ? "" : list[n].combo_power,
                                'range_show' : (list[n].combo_power == null) ? 'hidden' : 'visible'

                            })
                        );

                        if(parseInt(list[n].combo_power) == 0){
                            $('div[combo_advice_id="' + list[n].combo_advice_id +'"]').addClass('hide_zero_powers');
                            is_expand_bt_added = true;
                            count_zero_powers++;
                        }

                        $last_saved_state.push({
                            'id'       : parseInt(list[n].combo_advice_id),
                            'power'    : (list[n].combo_power == null) ? "" : list[n].combo_power
                        });

                        if(list[n].combo_power == null){
                            $('div[combo_advice_id="'+ list[n].combo_advice_id +'"]').
                            find('.advice-combo-name').addClass('option-content-alert');
                        }
                    }
                    else{
                        $('#advice_box_' +  rs[i].advice_id).append(
                            advice_hyp_box.compose({
                                'hyp_id'   : parseInt(list[n].hyp_id),
                                'hyp_content' : list[n].hyp_content,
                                'advice_hyp_id' : list[n].advice_hyp_id,
                                'hyp_target_level' : (list[n].hyp_target_level == null)? "" : list[n].hyp_target_level,
                                'hyp_power' : (list[n].hyp_power == null) ? "" : list[n].hyp_power,
                                'range_show' : (list[n].hyp_power == null) ? 'hidden' : 'visible',
                                'strength' : list[n].strength == null ? -1 : list[n].strength,
                                'label_m_100' : (list[n].label_m_100 == null) ? "": list[n].label_m_100,
                                'label_m_50' : (list[n].label_m_50 == null) ? "" : list[n].label_m_50,
                                'label_0' : (list[n].label_0 == null) ? "" : list[n].label_0,
                                'label_p_50' : (list[n].label_p_50 == null) ? "" : list[n].label_p_50,
                                'label_p_100' : (list[n].label_p_100 == null) ? "" : list[n].label_p_100

                            })
                        );

                        if(list[n].strength == null) {
                            $('#strength_link_' + list[n].advice_hyp_id).val(-1);
                            $('#strength_link_' + list[n].advice_hyp_id).prev().prev().css('visibility','hidden');
                        }
                        else{
                            $('#strength_link_' + list[n].advice_hyp_id).val(list[n].strength);
                        }

                        if(list[n].strength == -1 || list[n].strength == 1000){
                            $('#strength_link_' + list[n].advice_hyp_id).prev().prev().css('visibility','hidden');
                        }


                        // if power is 0, hide div.
                        if(parseInt(list[n].strength) == 1000){
                            $('div[advice_hyp_id="' + list[n].advice_hyp_id +'"]').addClass('hide_zero_powers');
                            is_expand_bt_added = true;
                            count_zero_powers++;
                        }

                        $last_saved_state.push({
                            'id'       : parseInt(list[n].advice_hyp_id),
                            'power'    : (list[n].hyp_power == null) ? "" : list[n].hyp_power
                        });

                        if(list[n].strength == null || list[n].strength == -1){
                           $('div[advice_hyp_id="'+ list[n].advice_hyp_id +'"]').
                           find('.advice-hyp-name').addClass('option-content-alert');
                        } 
                    }
                }

                if(is_expand_bt_added){
                    $('#advice_box_' + rs[i].advice_id).append(
                        expand_shrink_button.compose({
                            'count_zero_powers' : count_zero_powers,
                            'advice_id' : rs[i].advice_id
                        })
                    );
                }

                $('#advice_box_' + rs[i].advice_id).append(
                    save_cancel_advice.compose({
                        advice_id : rs[i].advice_id
                    })
                );

            }

            // ajax waiting effect ended.
            $('.lds-dual-ring').css('visibility','hidden');

        });
    });


    
</script>

<?= $this->endSection() ?>
<?= $this->endSection() ?>