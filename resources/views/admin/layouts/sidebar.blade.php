<section class="fp__dashboard">
    <div class="fp__dashboard_area">
        <div class="fade-in" data-wow-duration="1s">
            <div class="fp__dashboard_menu">
                @csrf
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="nav-link">
                    <div class="nav flex-column nav-pills palanquin-dark-regular">
                        @if (request()->is('admin/*'))
                            <a href="{{ route('admin.index') }}"
                                class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}"
                                id="v-pills-home-tab">
                                <span><i class="fa-solid fa-house"></i></span>
                                HOME
                            </a>
                            <a class="nav-link {{ request()->is('admin/menu*') ? 'active' : '' }}">
                                <span><i class="fa-solid fa-utensils"></i></span>
                                MENU
                            </a>
                            <a href="{{ route('admin.category.index') }}"
                                class="nav-link {{ request()->is('admin/category*') ? 'active' : '' }}">
                                <span><i class="fa-solid fa-star"></i></span>
                                CATEGORY
                            </a>
                            <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                                <span><i class="fa-solid fa-users"></i></span>
                                USER
                            </a>
                            <a href="{{ route('admin.voucher.index') }}"
                                class="nav-link {{ request()->is('admin/voucher*') ? 'active' : '' }}">
                                <span><i class="fa-solid fa-ticket"></i></span>
                                VOUCHER
                            </a>
                            <a href="{{ route('admin.proceed.index') }}"
                                class="nav-link {{ request()->is('admin/proceed*') ? 'active' : '' }}">
                                <span><i class="fa-solid fa-forward"></i></span>
                                PROCEED
                            </a>

                            @csrf
                            <button type="submit"
                                class="nav-link">
                                <span><i class="fa-solid fa-sign-out-alt"></i></span>
                                LOGOUT
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script src="{{ asset('admin/js/sidebar_style.js') }}"></script>
@endpush
