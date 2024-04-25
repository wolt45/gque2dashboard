<div id="DontPrint" class="topbar d-flex align-items-center justify-content-between position-sticky top-0 border-bottom" id="DontPrint" ng-controller="ngcontroller">
    <div class="container-fluid d-flex">
        <button class="btn btn-theme-dark rounded px-3" ng-click="toggleMenu()">
            <i class="fa-regular fa-bars text-white"></i>
        </button>
    </div>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end">
            <div class="profile dropdown-toggle">
                <button class="btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../../../../dump_px/{{info.foto}}" alt="profile" onerror="this.onerror=null;this.src='favicon.png'">
                    <span class="ms-2">{{info.shortname}} </span>
                    <i class="fa-solid fa-angle-down"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="user-box">
                        <img src="../../../../dump_px/{{info.foto}}" alt="profile" onerror="this.onerror=null;this.src='favicon.png'">
                        <div class="ms-2">
                            <div class="fw-bold mb-0">{{info.fullname}}</div>
                            <small>{{info.ut_n}}</small>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item" type="button" ng-click="logout_user()">
                        <i class="fa-solid fa-arrow-right-from-bracket me-3"></i>
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>