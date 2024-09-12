<section class="fp__dashboard">
    <div class="fp__dashboard_area">
        <div class="fade-in" data-wow-duration="1s">
            <div class="fp__dashboard_menu">


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="nav-link">
                    @csrf
                    <div class="nav flex-column nav-pills palanquin-dark-regular" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">

                        <a href="{{ route('admin.index') }}"" class="nav-link active">
                            <span><i class="fa-solid fa-house"></i></span>
                            HOME
                        </a>
                        <a class="nav-link">
                            <span><i class="fa-solid fa-house"></i></span>
                            MENU
                        </a>
                        <a href="{{ route('admin.category.index') }}" class="nav-link">
                            <span><i class="fa-solid fa-house"></i></span>
                            CATEGORY
                        </a>
                        <a class="nav-link">
                            <span><i class="fa-solid fa-house"></i></span>
                            USER
                        </a>
                        <a class="nav-link">
                            <span><i class="fa-solid fa-house"></i></span>
                            PROCEED
                        </a>
                        <a class="nav-link">
                            <span><i class="fa-solid fa-house"></i></span>
                            LOGOUT
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
