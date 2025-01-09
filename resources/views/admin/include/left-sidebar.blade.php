<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="icon-speedometer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-grid2"></i>
                        <span class="hide-menu">Category</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('category.add') }}">Add Category</a></li>
                        <li><a href="{{ route('category.manage') }}">Manage Category</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="bi bi-bounding-box"></i>
                        <span class="hide-menu">Sub Category</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('subcategory.add') }}">Add Sub Category</a></li>
                        <li><a href="{{ route('subcategory.manage') }}">Manage Sub Category</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="bi bi-amd"></i>
                        <span class="hide-menu">Brand Module</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('brand.add') }}">Add Brand</a></li>
                        <li><a href="{{ route('brand.manage') }}">Manage Brand</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-media-right-alt">
                        </i><span class="hide-menu">Unit</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('unit.add') }}">Add Unit</a></li>
                        <li><a href="{{ route('unit.manage') }}">Manage Unit</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-accordion-merged"></i>
                        <span class="hide-menu">Product</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('product.add') }}">Add Product</a></li>
                        <li><a href="{{ route('product.manage') }}">Manage Product</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-settings"></i><span class="hide-menu">Order</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.all-order') }}">Manage Order</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
