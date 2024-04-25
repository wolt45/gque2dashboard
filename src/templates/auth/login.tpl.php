<div class="vh-100 d-flex align-items-center justify-content-center flex-column">
    <div class="alert alert-danger" role="alert" style="width:320px" ng-if="msg !=''">
        <i class="fa-solid fa-triangle-exclamation ms-2"></i>
        {{msg}}
    </div>
    <div class="login-form">
        <div class="login-title pt-4 mt-2 pb-4">
            <div class="d-flex align-items-center justify-content-center">
                <img src="src/assets/images/glogo_watermark.png" alt="">
                <div class="ms-2">
                    <h5 class="mb-0">GMMR</h5>
                    <div class="sub">G-QUE2</div>
                </div>
            </div>
        </div>
        <form ng-submit="login_user(users)" class="pt-3 pb-4 mb-3 px-4 mx-2">
            <h6 class="text-center fw-semibold py-3 text-dark">-------------------------</h6>
            <div class="input-form-grp mb-3">
                <i class="fa-solid fa-user me-2"></i>
                <input type="text" placeholder="enter username" ng-model="users.username">
            </div>
            <div class="input-form-grp mb-3">
                <i class="fa-solid fa-lock me-2"></i>
                <input type="password" placeholder="enter password" ng-model="users.password">

            </div>
            <div class="d-flex aling-items-center justify-content-start">
                <button class="btn btn-theme-dark px-4">
                    LOGIN
                    <i class="fa-solid fa-arrow-right-to-bracket text-white ms-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>