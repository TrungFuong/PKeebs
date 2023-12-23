<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                   aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-toolbox fa-bounce fa-lg" style="color: #a061ff;"></i></div>
                    <span style="color: #8bd450">Manage</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                           data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                           aria-controls="pagesCollapseAuth">
                            <i class="fa-solid fa-keyboard fa-spin" style="color: #8bd450;"></i>
                            <span style="color: #a061ff">&nbspProducts</span>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                             data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin/product/list">Product List</a>
                                <a class="nav-link" href="/admin/category/list ">Category list</a>
                                <a class="nav-link" href="/admin/manufacturer/list ">Manufacturer list</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                           data-bs-target="#pagesCollapseError" aria-expanded="false"
                           aria-controls="pagesCollapseError">
                            <i class="fa-solid fa-users fa-spin" style="color: #8bd450;" ></i>
                            <span style="color: #a061ff">&nbspAccounts</span>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                             data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin/user/list">Account</a>
{{--                                <a class="nav-link" href="admin/account/customer/list">Customer</a>--}}
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="/admin/trash">
                    <div class="sb-nav-link-icon"><i class="fas fa-trash fa-shake" style="color: red"></i>
                    </div>
                    <span class="text-danger">Deleted Products</span>
                </a>
                <a class="nav-link" href="/admin/orders">
                    <div class="sb-nav-link-icon"><i class="fas fa-table" style="color: dodgerblue"></i></div>
                    <span style="color: dodgerblue">Orders</span>
                </a>
            </div>
        </div>
        @auth
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <span>{{Auth::user()->username}}</span>
        </div>
        @endauth
    </nav>
</div>
