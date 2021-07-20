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
                    <span class="title-heading hyp-title">HYPOTHESIS</span>
                    <button type="button" id="add_new_hyp" class="btn btn-lg btn-primary">
                        <i class="fas fa-plus"></i>&nbsp;ADD NEW HYPOTHESIS 
                    </button> 
                </div>

                <div class="menu-item me-lg-1">
                    <button type="button" id="bt_all_zero" class="btn btn-lg btn-primary">
                        &nbsp;SET ALL BLANKS TO 0 
                    </button>
                </div>

                <div class="menu-item me-lg-1">
                    <select class="form-select scopes-select" aria-label="Default select example">
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
                    <div class="menu-item px-5">
                        <a href="pages/projects/list.html" class="menu-link px-5">
                            <span class="menu-text">My Projects</span>
                            <span class="menu-badge">
                                <span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
                            </span>
                        </a>
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
        <div class="card hyp-page">
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="hyp-container">
                 
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

    /**
     * Returns a random integer between min (inclusive) and max (inclusive).
     * The value is no lower than min (or the next integer greater than min
     * if min isn't an integer) and no greater than max (or the next integer
     * lower than max if max isn't an integer).
     * Using Math.round() will give you a non-uniform distribution!
     */
    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    var new_hyp_id = 0;
    var new_option_hyp_id = 0;
    var option_hyp_ids = [];
    var links_notyet = [];

    $last_saved_state = [];

    var selectedScope = sessionStorage.getItem("SelectedScope");  
    $('.scopes-select').val(selectedScope);

    $.post('/getdatainjson/getMaxIds', function(result){
        rs = JSON.parse(result);
        option_hyp_ids = rs.option_hyp_ids;
        new_hyp_id = rs.hyp_last_id;

        $.post('/getdatainjson/allhyps', {scope_id : $('.scopes-select').val() }, function(result){
            var rs = JSON.parse(result);
            for(var i in rs) {
                
                $('.hyp-container').append(
                    new_hyp_block.compose({
                        'hyp_id' : rs[i].hyp_id,
                        'hyp_content' : rs[i].hyp_content
                    })
                );

                $('#hyp_block_' + rs[i].hyp_id).append(
                    save_cancel_hyp.compose({
                        'hyp_id' : rs[i].hyp_id
                    })
                );

                var questions = rs[i].questions;
                var is_expand_bt_added = false;
                var count_zero_powers = 0;
               
                for(var k in questions){
                    $('#hyp_block_' + rs[i].hyp_id).append(
                        question_in_hyp.compose({
                            'question_id' : questions[k].question_id,
                            'question_content' : questions[k].question_content 
                        })
                    );

                    var options = questions[k].options;
                    

                    for(var n in options){

                        $('#hyp_block_' + rs[i].hyp_id).append(
                            option_in_hyp.compose({
                                'question_id' : questions[k].question_id,
                                'option_id'  : options[n].option_id,
                                'option_content' : (options[n].option_content == null)? "" : options[n].option_content,
                                'option_hyp_id' : options[n].option_hyp_id, 
                                'option_hyp_point' : options[n].option_hyp_point == null ? "" :  options[n].option_hyp_point,
                                'range_show' : options[n].option_hyp_point == null ? 'hidden' : 'visible'
                            })
                        );

                        if(parseInt(options[n].option_hyp_point) == 0){
                            $('#' + options[n].option_hyp_id).parent().addClass('hide_zero_powers');
                            is_expand_bt_added = true;
                            count_zero_powers++;
                        }

                        $last_saved_state.push({
                            'option_hyp_id' : options[n].option_hyp_id,
                            'power'         : options[n].option_hyp_point == null ? "" :  options[n].option_hyp_point
                        });
                        
                        if(options[n].option_hyp_point == null){
                            $('#'+options[n].option_hyp_id).parent().find('.option-content').addClass('option-content-alert');
                        }
                        
                    }


                }

                if(is_expand_bt_added){
                    $('#hyp_block_' + rs[i].hyp_id).append(
                        hyp_expand_shrink_button.compose({
                            'count_zero_powers' : count_zero_powers,
                            'hyp_id' : rs[i].hyp_id
                        })
                    );
                }

            }
        });
    });

     /**
     * Show/Hide powers with 0 values
     */
    $(document).on('click', '.bt-expand-shrink', function(e){
        
        $hyp_id = $(this).parent().attr('hyp_id');
        $counts    = $(this).parent().attr('counts');
        $content   = $(this).text();
       
        if($content.includes('expand')){
            $('div[hyp_id="' + $hyp_id + '"]').children('div').removeClass('hide_zero_powers');
            $(this).html('Shrink 0 powers');
        }
        else{
            $(this).html('...plus ' + $counts + ' other options with power 0  [expand]');

            ($('div[hyp_id="' + $hyp_id + '"]').children('div.option-box')).each(function(i,item){
                if(parseInt($(item).children().eq(0).val()) == 0){
                    $(item).addClass('hide_zero_powers');
                }
            });
         
        }
    });

    /**
     * This click handler sets all blank fields to zero.
     */

    $('#bt_all_zero').click(function(e){
        
        $('.lds-dual-ring').css('visibility','visible');

        $(".option-point-hyp").each(function (index, element) {
            if($(this).val() == ""){
                $(this).val(0);
                $(this).next().next().next().removeClass('option-content-alert');
            }
        });

        $.post('/getdatainjson/set_zeros_on_blanks', {table_selection : "option_hyp"}, function(rs){
            $('.lds-dual-ring').css('visibility','hidden');
        });
    });


    $('#add_new_hyp').click(function(e){
        new_hyp_id++;
        links_notyet = [];
        $scope_id = $('.scopes-select').val();

        $.post('/getdatainjson/allquestions_', {scope_id : $scope_id},function(result){
        
            var rs = JSON.parse(result);
       
            $('.hyp-container').prepend(
                new_hyp_block.compose({
                    'hyp_id' : new_hyp_id,
                    'scope_id' : $scope_id,
                })
            );

            $('#hyp_block_' + new_hyp_id).find('input').first().focus(); // set focus on new added hyp textbox

            $('#hyp_block_' + new_hyp_id).append(
                save_cancel_hyp.compose({
                    'hyp_id' : new_hyp_id
                })
            );

            for(var i in rs) {
                
                $('#hyp_block_' + new_hyp_id).append(
                    question_in_hyp.compose({
                        'question_id' : rs[i].question_id,
                        'question_content' : rs[i].question_content 
                    })
                );

                var options = rs[i].options;

                for(var k in options){
                    /** I think this is not so good(bad) because it is random number so even 0.1 % 
                     * there exists collision possiblity.
                     */ 
                    var $option_hyp_id = getRandomInt(1,100000);

                    if(!option_hyp_ids.includes($option_hyp_id)){
                        $option_hyp_id = $option_hyp_id;
                    }
                    else{
                        $option_hyp_id = option_hyp_ids[0] + 1;
                    }

                    $('#hyp_block_' + new_hyp_id).append(
                        option_in_hyp.compose({
                            'question_id' : rs[i].question_id,
                            'option_id'  : k,
                            'option_content' : options[k].option_content,
                            'option_hyp_id' : $option_hyp_id, 
                        })
                    );

                    var link = {hyp_id : new_hyp_id, question_id : rs[i].question_id, option_id : k, option_hyp_id : $option_hyp_id};

                    links_notyet.push(link); // unlinked links are being pushed into array.
                }
            }

            $('#hyp_block_' + new_hyp_id).find('.option-content').addClass('option-content-alert');

           
        });

    });

    $(document).on('change', '.option-content',function(ev){
        $option_id   = $(ev.target).parent().attr('option_id');
        $question_id = $(ev.target).parent().attr('question_id');
        $(ev.target).addClass('input_ajax_started'); // ajax effect started.

        $.post('/getdatainjson/addoption',{
                option_id      : $option_id,
                question_id    : $question_id, 
                option_content : $(ev.target).val() 
                }, function(res,status){
                    if(status == 'success'){
                        $(ev.target).removeClass('input_ajax_started').addClass('green_tick_started');
                        setTimeout(function() {
                          $(ev.target).removeClass('green_tick_started'); // ajax waiting effect ended
                        }, 1000);
                    }
        });
    });

    $(document).on('change', '.question-content',function(e){
        $question_id = $(e.target).parent().parent().attr('question_id');

        $scope_id    = $('.scopes-select').val();
        $(e.target).addClass('input_ajax_started');

        $.post('/getdatainjson/addquestion',{
                question_id: parseInt($question_id), 
                question_content : $(e.target).val(),
                scope_id : $scope_id
            }, 
            function(res,status){
                if(status == 'success'){
                    new_question_id = parseInt(res);
                    $(e.target).removeClass('input_ajax_started').addClass('green_tick_started');
                    setTimeout(function() {
                      $(e.target).removeClass('green_tick_started'); // ajax waiting effect ended
                    }, 1000);
                }
        });

    });

    /**
     * If user clicks hypothesis "delete" button,
     * it will delete all matched hyp, powers and links. 
     */

    $hyp_id = -1;
    $object_delete = null;
    $trash_object = null;

    $(document).on('click', '.remove-hyp', function(e){
        $hyp_id = $(e.target).parent().parent().parent().attr('hyp_id');
        $object_delete = $(e.target).parent().parent().parent();
        $trash_object = $(e.target);
      
        $hyp_name = $(e.target).parent().parent().find('.hyp-content').val();

        $('.delete-question').html("<span style='color:red;'>Do you really want to delete hyp : </span><br/>" + $hyp_name + "?");
        $(e.target).addClass('rotate-trash');
        $('#kt_confirm_delete').modal('show');
    });

    $('#kt_confirm_delete .btn-delete').click(function(e) {
        $.post('/getdatainjson/delete_hyp',{
                hyp_id : $hyp_id
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

    
    $(document).on('click', 'input.option-point-hyp', function(e){
        if($(e.target).val() == ""){
            $(e.target).next().css('visibility','visible');
            $(e.target).next().val(0);
        }
    });

    function normalization_by_power_input(power, $hyp_id,$option_hyp_id, $rate){
        $sum = 0.0;

        // get total sum up.
        $('#hyp_block_' + $hyp_id).find('.option-point-hyp').each(function(){
            
            if($(this).val() != ""){
                if($(this).attr('id') != $option_hyp_id){
                    $sum = $sum + parseFloat($(this).val());
                }
            }
            
        });

        $('#hyp_block_' + $hyp_id).find('.option-point-hyp').each(function(){
            
            $normalization_value = null;
            if($(this).attr('id') != $option_hyp_id){

                if($(this).val() == ""){
                    $normalization_value = "";
                }
                else{
                    if($sum != 0){
                       $normalization_value = parseInt($(this).val() *$rate);
                    }
                    else{
                        $normalization_value = 0;
                    }
                }
                
                $(this).val($normalization_value);
                $(this).attr('value', $normalization_value);
                $(this).next().val($normalization_value);
                $(this).next().attr('value', $normalization_value);
            }
           
        });
    }

    /**
     * Each time hyp box's option point content changed, 
     * its content will be added or updated on its matched table in db.
     */


    $(document).on('change', 'input.option-point-hyp', function(e){
        $option_id = $(e.target).parent().attr('option_id');
        $option_hyp_id = $(e.target).attr('id');
        $hyp_id = $(e.target).parent().parent().attr('hyp_id');

        $currentVal = $(this).val();
        $previous_value = $(e.target).next().val();

        $('#hyp_block_' + $hyp_id).find('.save-cancel-block').show();
        

        $(e.target).next().val($(this).val());
        $(e.target).next().attr('value',$(this).val());
        $(this).attr('value', $(this).val());

        if($previous_value != 100){
            $rate = (100 - $currentVal) / (100 - $previous_value);
        }

        normalization_by_power_input($(this).val(), $hyp_id, $option_hyp_id, $rate);
        
        $.post('/getdatainjson/add_option_hyp',{
                option_hyp_id: parseInt($option_hyp_id), 
                option_id :  $option_id,
                hyp_id : $hyp_id,
                option_hyp_point : ($(e.target).val() == '')? null : $(e.target).val(),
            }, function(res,status){
                if(status == 'success'){
                    $(e.target).next().next().next().removeClass('option-content-alert');
                }
        });
    });


    $(document).on('input', 'input[type=range]', function(ev){
        $currentVal = $(ev.target).val();

        $previous_value = $(ev.target).prev().val();
        $(ev.target).parent().find('input.option-point-hyp').val($currentVal);

        $hyp_id = $(ev.target).parent().parent().attr('hyp_id');
        $pointid_on_change = $(ev.target).parent().find('input.option-point-hyp').attr('id');

        $('#hyp_block_' + $hyp_id).find('.save-cancel-block').show();
        
        if($previous_value != 100){
            $rate = (100 - $currentVal) / (100 - $previous_value);
        }
        else{
            var option_length = $('#hyp_block_' + $hyp_id).find('.option-point-hyp').filter(function(index){
                return this.value !== "";
            }).length;

            $('#hyp_block_' + $hyp_id).find('.option-point-hyp').each(function(){
            
                if($(this).val() != ""){
                    if($(this).attr('id') != $pointid_on_change){
                        $common_value = (100 - $currentVal) / (option_length - 1);
                        $(this).val($common_value);
                    }
                }
                
            });
            
            return;
        }

        $sum = 0.0;

        // get total sum up.
        $('#hyp_block_' + $hyp_id).find('.option-point-hyp').each(function(){
            
            if($(this).val() != ""){
                if($(this).attr('id') != $pointid_on_change){
                    $sum = $sum + parseFloat($(this).val());
                }
            }
            
        });

        $('#hyp_block_' + $hyp_id).find('.option-point-hyp').each(function(){
            
            $normalization_value = null;
            if($(this).attr('id') != $pointid_on_change){

                if($(this).val() == ""){
                    $normalization_value = "";
                }
                else{
                    if($sum != 0){
                       $normalization_value = ($(this).val() *$rate).toFixed(2);
                    }
                    else{
                        $normalization_value = 0.00;
                    }
                }
                
                $(this).val($normalization_value);
                $(this).next().val($normalization_value);
            }
           
        });

    });

    $(document).on('click', '.bt-save-normalization', function(e){
        $hyp_id = $(e.target).parent().attr('hyp_id');

        var option_hyp_array = [];
        
        $(e.target).addClass('input_ajax_started');  // ajax waiting effect started

        $('#hyp_block_' + $hyp_id).find('.option-point-hyp').each(function(){
            
            if($(this).val() != ""){
                $option_hyp = {
                    option_hyp_id : $(this).attr('id'),
                    option_hyp_point : $(this).val(),
                };

                $index_found = $last_saved_state.findIndex(node => node.option_hyp_id === $(this).attr('id'));
                if($index_found > -1){
                    $last_saved_state[$index_found]['power'] = $(this).val();
                }
              
                option_hyp_array.push($option_hyp);
            }
            
        });

        $.post('/getdatainjson/update_option_hyp', {normalization_array : JSON.stringify(option_hyp_array)}, function(res){
                $(e.target).removeClass('input_ajax_started').addClass('green_tick_started');
                setTimeout(function() {
                    $(e.target).removeClass('green_tick_started'); // ajax waiting effect ended
                },  1000);
        });
    });

    $(document).on('click', '.bt-cancel-normalization', function(e){
        $hyp_id = $(e.target).parent().attr('hyp_id');

        var ranges = $('#hyp_block_' + $hyp_id).find('input[type=range]');

        $('#hyp_block_' + $hyp_id).find('.option-point-hyp').each(function(i){
            $link_found = $last_saved_state.filter(node => node.option_hyp_id === $(this).attr('id'));
            if($link_found.length > 0){
                $(this).val($link_found[0]['power']);
                $(ranges[i]).val($link_found[0]['power']);
            }
        });
       
    });

    /**
     * This handler is for limiting typing to only numbers regards on option-point-hyp 
     * This code is perfect, I think
     */ 
    $(document).on('keypress', 'input.option-point-hyp', function(e){
    
        var charCode = (e.which) ? e.which : event.keyCode    

        if (String.fromCharCode(charCode).match(/[^0-9]/g))    

            return false;                        

    }); 

    /**
     * Each time hyp content changed, 
     * its content will be added or updated on its matched table in db.
     */

    $(document).on('change', 'input.hyp-content', function(e){
        $hyp_id = $(e.target).parent().parent().attr('hyp_id');
        $scope_id = $('.scopes-select').val();

        $(e.target).addClass('input_ajax_started');  // ajax waiting effect started
       
        $.post('/getdatainjson/add_hyp',{
                hyp_id : $hyp_id,
                hyp_content : $(e.target).val(),
                scope_id : $scope_id,
            }, function(res,status){
                if(status == 'success'){
                    $.post('/getdatainjson/add_links_pending', {links : JSON.stringify(links_notyet)}, function(e){
                    });

                    $(e.target).removeClass('input_ajax_started').addClass('green_tick_started');
                    setTimeout(function() {
                      $(e.target).removeClass('green_tick_started'); // ajax waiting effect ended
                    }, 1000);
                   
                }
        });
    });


    /***
     * 
     * 
     */

    $('.scopes-select').change(function(e){
        $scope_id = $(e.target).val();
        sessionStorage.setItem("SelectedScope", $scope_id);
        
        $last_saved_state = [];
        $('.hyp-container').empty();

         // ajax waiting effect started.
        $('.lds-dual-ring').css('visibility','visible');

        $.post('/getdatainjson/allhyps', {scope_id : $scope_id},  function(result){
            var rs = JSON.parse(result);
            
            for(var i in rs) {

                $('.hyp-container').append(
                    new_hyp_block.compose({
                        'hyp_id' : rs[i].hyp_id,
                        'hyp_content' : rs[i].hyp_content,
                        'scope_id' : rs[i].scope_id
                    })
                );

                $('#hyp_block_' + rs[i].hyp_id).append(
                    save_cancel_hyp.compose({
                        'hyp_id' : rs[i].hyp_id
                    })
                );

                var questions = rs[i].questions;
                var is_expand_bt_added = false;
                var count_zero_powers = 0;
               
                for(var k in questions){
                    $('#hyp_block_' + rs[i].hyp_id).append(
                        question_in_hyp.compose({
                            'question_id' : questions[k].question_id,
                            'question_content' : questions[k].question_content 
                        })
                    );

                    var options = questions[k].options;
                   
                    for(var n in options){

                        $('#hyp_block_' + rs[i].hyp_id).append(
                            option_in_hyp.compose({
                                'question_id' : questions[k].question_id,
                                'option_id'  : options[n].option_id,
                                'option_content' : options[n].option_content,
                                'option_hyp_id' : options[n].option_hyp_id, 
                                'option_hyp_point' : options[n].option_hyp_point == null ? "" :  options[n].option_hyp_point,
                                'range_show' : options[n].option_hyp_point == null ? 'hidden' : 'visible'
                            })
                        );

                        if(parseInt(options[n].option_hyp_point) == 0){
                            $('#' + options[n].option_hyp_id).parent().addClass('hide_zero_powers');
                            is_expand_bt_added = true;
                            count_zero_powers++;
                        }

                        $last_saved_state.push({
                            'option_hyp_id' : options[n].option_hyp_id,
                            'power'         : options[n].option_hyp_point == null ? "" :  options[n].option_hyp_point
                        });
                        
                        if(options[n].option_hyp_point == "null"){
                            $('#'+options[n].option_hyp_id).parent().find('.option-content').addClass('option-content-alert');
                        }
                        
                    }


                }

                if(is_expand_bt_added){
                    $('#hyp_block_' + rs[i].hyp_id).append(
                        hyp_expand_shrink_button.compose({
                            'count_zero_powers' : count_zero_powers,
                            'hyp_id' : rs[i].hyp_id
                        })
                    );
                }

            }

            // ajax waiting effect ended.
            $('.lds-dual-ring').css('visibility','hidden');

        });

    });



</script>

<?= $this->endSection() ?>
<?= $this->endSection() ?>