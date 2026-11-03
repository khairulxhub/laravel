<nav id="sidebar" class="sidebar js-sidebar">

    <div class="sidebar-content js-simplebar">

        {{-- ========================= --}}
        {{-- BRAND --}}
        {{-- ========================= --}}

        <a class="sidebar-brand" href="/index">

            <span class="align-middle">
                Garments ERP
            </span>

        </a>


        <ul class="sidebar-nav">

            {{-- ========================= --}}
            {{-- DASHBOARD --}}
            {{-- ========================= --}}

            <li class="sidebar-item">
                <a class="sidebar-link" href="/dashboard">

                    <i class="align-middle"
                       data-feather="sliders"></i>

                    <span class="align-middle">
                        Dashboard
                    </span>

                </a>
            </li>


            {{-- ========================= --}}
            {{-- MERCHANDISING --}}
            {{-- ========================= --}}

            <li class="sidebar-header">
                Merchandising
            </li>


            {{-- Buyers --}}

            <li class="sidebar-item">

                <a class="sidebar-link"
                   href="{{ route('buyers.index') }}">

                    <i class="align-middle"
                       data-feather="users"></i>

                    <span class="align-middle">
                        Buyers
                    </span>

                </a>

            </li>


            {{-- Styles --}}

            <li class="sidebar-item">

                <a class="sidebar-link"
                   href="{{ route('styles.index') }}">

                    <i class="align-middle"
                       data-feather="layers"></i>

                    <span class="align-middle">
                        Styles
                    </span>

                </a>

            </li>


            {{-- Orders --}}

            <li class="sidebar-item">

                <a class="sidebar-link"
                   href="{{ route('orders.index') }}">

                    <i class="align-middle"
                       data-feather="shopping-bag"></i>

                    <span class="align-middle">
                        Orders
                    </span>

                </a>

            </li>


            {{-- ========================= --}}
            {{-- PROCUREMENT --}}
            {{-- ========================= --}}

            <li class="sidebar-header">
                Procurement
            </li>


            {{-- Suppliers --}}

            <li class="sidebar-item">

                <a class="sidebar-link"
                   href="{{ route('suppliers.index') }}">

                    <i class="align-middle"
                       data-feather="truck"></i>

                    <span class="align-middle">
                        Suppliers
                    </span>

                </a>

            </li>


            {{-- Purchase Orders --}}

            <li class="sidebar-item">

                <a class="sidebar-link"
                   href="{{ route('purchase-orders.index') }}">

                    <i class="align-middle"
                       data-feather="file-text"></i>

                    <span class="align-middle">
                        Purchase Orders
                    </span>

                </a>

            </li>


            {{-- ========================= --}}
            {{-- INVENTORY --}}
            {{-- ========================= --}}

            <li class="sidebar-header">
                Inventory
            </li>


            {{-- Materials --}}

            <li class="sidebar-item">

                <a class="sidebar-link"
                   href="{{ route('materials.index') }}">

                    <i class="align-middle"
                       data-feather="package"></i>

                    <span class="align-middle">
                        Materials
                    </span>

                </a>

            </li>


            {{-- Stock Movements --}}

            <li class="sidebar-item">

                <a class="sidebar-link"
                   href="{{ route('stock-movements.index') }}">

                    <i class="align-middle"
                       data-feather="repeat"></i>

                    <span class="align-middle">
                        Stock Movements
                    </span>

                </a>

            </li>


            {{-- ========================= --}}
            {{-- PRODUCTION --}}
            {{-- ========================= --}}

            <li class="sidebar-header">
                Production
            </li>


            {{-- Productions --}}

            <li class="sidebar-item">

                <a class="sidebar-link"
                   href="{{ route('productions.index') }}">

                    <i class="align-middle"
                       data-feather="settings"></i>

                    <span class="align-middle">
                        Productions
                    </span>

                </a>

            </li>


            {{-- ========================= --}}
            {{-- SHIPPING --}}
            {{-- ========================= --}}

            <li class="sidebar-header">
                Shipping
            </li>


            {{-- Shipments --}}

            <li class="sidebar-item">

                <a class="sidebar-link"
                   href="{{ route('shipments.index') }}">

                    <i class="align-middle"
                       data-feather="send"></i>

                    <span class="align-middle">
                        Shipments
                    </span>

                </a>

            </li>


            {{-- ========================= --}}
            {{-- ADMINISTRATION --}}
            {{-- ========================= --}}

            <li class="sidebar-header">
                Administration
            </li>


            {{-- Users --}}

            <li class="sidebar-item">

                <a class="sidebar-link"
                   href="{{ route('users.index') }}">

                    <i class="align-middle"
                       data-feather="user"></i>

                    <span class="align-middle">
                        Users
                    </span>

                </a>

            </li>


        </ul>

    </div>

</nav>