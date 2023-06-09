<style>
.side-logo {
      background-color: #ffffff;
  }
</style>
<div id="sidebarMain" class="d-none">
    <aside class="aside-back js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container text-capitalize">
            <div class="navbar-vertical-footer-offset">
                <div class="navbar-brand-wrapper justify-content-between nav-brand-back side-logo">
                    <!-- Logo -->
                    @php($shop_logo=\App\Models\BusinessSetting::where(['key'=>'shop_logo'])->first()->value)
                    <a class="navbar-brand" href="{{route('admin.dashboard')}}" aria-label="Front">
                        <img class="navbar-brand-logo"
                             onerror="this.src='{{asset('assets/admin/img/160x160/img2.jpg')}}'"
                             src="{{asset('storage/shop')}}/{{ $shop_logo }}"
                             alt="{{\App\CPU\translate('logo')}}">
                    </a>
                    <!-- End Logo -->
                    <!-- Navbar Vertical Toggle -->
                    <button type="button"
                            class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->
                </div>

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <!-- Dashboards -->

                        @foreach (json_decode(Auth('staff')->user()->permission) as $per)
                            @if($per=='checkin')

                        <li class="nav-item">
                            <small
                                class="nav-subtitle">{{\App\CPU\translate('dashboard_section')}}</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu {{Request::is('admin')?'show':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('checkin.member')}}" title="{{\App\CPU\translate('Check In')}}">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{\App\CPU\translate('Check In')}}
                                </span>
                            </a>
                        </li>

                        <li class="navbar-vertical-aside-has-menu {{Request::is('admin')?'show':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('checkin')}}" title="{{\App\CPU\translate('Check In')}}">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{\App\CPU\translate('New Member')}}
                                </span>
                            </a>
                        </li>
                            @endif
                        @endforeach


                        @foreach (json_decode(Auth('staff')->user()->permission) as $per)
                        @if($per=='pos')
                            <!-- End Dashboards -->
                            <li class="nav-item">
                                <small
                                    class="nav-subtitle">{{\App\CPU\translate('pos_section')}}</small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <!-- Pos Pages -->
                            @php($orders = \App\Models\Order::get()->count())
                            <li class="navbar-vertical-aside-has-menu {{Request::is('admin/pos*')?'active':''}}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                                >
                                    <i class="tio-shopping nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{\App\CPU\translate('POS')}}</span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{Request::is('admin/pos*')?'d-block':''}}">
                                    <li class="nav-item {{Request::is('admin/pos/')?'active':''}}">
                                        <a class="nav-link " href="{{route('admin.pos.index')}}"
                                           title="{{\App\CPU\translate('POS')}}" target="_blank">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">{{\App\CPU\translate('pos')}}</span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{Request::is('admin/pos/orders')?'active':''}}">
                                        <a class="nav-link " href="{{route('admin.pos.orders')}}"
                                           title="{{\App\CPU\translate('orders')}}">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">{{\App\CPU\translate('orders')}}
                                                <span class="badge badge-success ml-2">{{ $orders }} </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endforeach


                @foreach (json_decode(Auth('staff')->user()->permission) as $per)
                @if($per=='member')
                <li class="nav-item">
                    <small
                        class="nav-subtitle">{{\App\CPU\translate('Member List')}}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <!-- Customer Pages -->
                <li class="navbar-vertical-aside-has-menu {{Request::is('member/*')?'active':''}}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                    >
                        <i class="tio-poi-user nav-icon"></i>
                        <span
                            class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{\App\CPU\translate('Member')}}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{Request::is('member/*')?'d-block':''}}">
                        {{-- <li class="nav-item {{Request::is('admin/customer/add')?'active':''}}">
                            <a class="nav-link " href="{{route('member.add')}}"
                               title="{{\App\CPU\translate('add_new_customer')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{\App\CPU\translate('add_customer')}}</span>
                            </a>
                        </li> --}}

                        <li class="nav-item {{Request::is('member/active')?'active':''}}">
                            <a class="nav-link " href="{{route('member.active')}}"
                               title="Member List">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{\App\CPU\translate('Active Member')}}</span>
                            </a>
                        </li>

                        <li class="nav-item {{Request::is('member/expire')?'active':''}}">
                            <a class="nav-link " href="{{route('member.expire')}}"
                               title="Member List">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{\App\CPU\translate('Expired Member')}}</span>
                            </a>
                        </li>


                        <li class="nav-item {{Request::is('member/guest')?'active':''}}">
                            <a class="nav-link " href="{{route('member.guest')}}"
                               title="Member List">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{\App\CPU\translate('Guest')}}</span>
                            </a>
                        </li>

                        <li class="nav-item {{Request::is('member/list')?'active':''}}">
                            <a class="nav-link " href="{{route('member.list')}}"
                               title="Member List">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{\App\CPU\translate('Member List')}}</span>
                            </a>
                        </li>


                    </ul>
                </li>
                @endif
            @endforeach

            @foreach (json_decode(Auth('staff')->user()->permission) as $per)
            @if($per=='staff')
            <li class="nav-item">
                <small
                    class="nav-subtitle">{{\App\CPU\translate('Staff')}}</small>
                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
            </li>
            <li class="navbar-vertical-aside-has-menu {{Request::is('staff.list')?'show':''}}">
                <a class="js-navbar-vertical-aside-menu-link nav-link"
                   href="{{route('staff.list')}}" title="{{\App\CPU\translate('Staff List')}}">
                    <i class="tio-home-vs-1-outlined nav-icon"></i>
                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                        {{\App\CPU\translate('Staff List')}}
                    </span>
                </a>
            </li>
            @endif
        @endforeach



        @foreach (json_decode(Auth('staff')->user()->permission) as $per)
        @if($per=='setup')
                          <!-- Pos End Pages -->
            <li class="nav-item">
                <small
                    class="nav-subtitle">{{\App\CPU\translate('Setup')}}</small>
                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
            </li>
            <!-- category Pages -->

            <li class="navbar-vertical-aside-has-menu {{Request::is('admin/category*')?'active':''}}">
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                >
                    <i class="tio-category nav-icon"></i>
                    <span
                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{\App\CPU\translate('Setup')}}</span>
                </a>
                <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{Request::is('admin/category*')?'d-block':''}}">




                    <!-- Pos Pages -->

                    <li class="navbar-vertical-aside-has-menu {{Request::is('admin/psd')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                        >
                            <i class="tio-shopping nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{\App\CPU\translate('Category')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{Request::is('admin/pos*')?'d-block':''}}">










                            <li class="nav-item {{Request::is('admin/category/add')?'active':''}}">
                                <a class="nav-link " href="{{route('admin.category.add')}}"
                                   title="{{\App\CPU\translate('add_new_category')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{\App\CPU\translate('category')}}</span>
                                </a>
                            </li>

                            <li class="nav-item {{Request::is('admin/category/add-sub-category')?'active':''}}">
                                <a class="nav-link " href="{{route('admin.category.add-sub-category')}}"
                                   title="{{\App\CPU\translate('add_new_sub_category')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{\App\CPU\translate('sub_category')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>




                    @foreach (json_decode(Auth('staff')->user()->permission) as $per)
                    @if($per=='staff')

                    <li class="navbar-vertical-aside-has-menu {{Request::is('staff.list.2')?'show':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                           href="{{route('staff.list.2')}}" title="{{\App\CPU\translate('Staff List')}}">
                            <i class="tio-home-vs-1-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{\App\CPU\translate('Staff ')}}
                            </span>
                        </a>
                    </li>
                    @endif
                @endforeach


                    <li class="navbar-vertical-aside-has-menu {{Request::is('admin/unit*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                           href="{{route('admin.unit.index')}}"
                        >
                            <i class="tio-calculator nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{\App\CPU\translate('unit')}}
                            </span>
                        </a>
                    </li>

                    <li class="navbar-vertical-aside-has-menu {{Request::is('admin/brand*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                           href="{{route('admin.brand.add')}}"
                        >
                            <i class="tio-star nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{\App\CPU\translate('brand')}}
                            </span>
                        </a>
                    </li>


                    <li class="navbar-vertical-aside-has-menu {{Request::is('admin/psd')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                        >
                            <i class="tio-shopping nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{\App\CPU\translate('Product')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{Request::is('admin/pos*')?'d-block':''}}">

                            <li class="nav-item {{Request::is('admin/product/add')?'active':''}}">
                                <a class="nav-link " href="{{route('admin.product.add')}}"
                                   title="{{\App\CPU\translate('add_new_product')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{\App\CPU\translate('add_new')}}</span>
                                </a>
                            </li>

                            <li class="nav-item {{Request::is('admin/product/list')?'active':''}}">
                                <a class="nav-link " href="{{route('admin.product.list')}}"
                                   title="{{\App\CPU\translate('list_of_products')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{\App\CPU\translate('list')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="navbar-vertical-aside-has-menu {{Request::is('admin/psd')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                        >
                            <i class="tio-shopping nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{\App\CPU\translate('Cash & Bank')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{Request::is('admin/pfh*')?'d-block':''}}">

                            <li class="nav-item {{Request::is('admin/account/add')?'active':''}}">
                                <a class="nav-link " href="{{route('admin.account.add')}}"
                                   title="{{\App\CPU\translate('add_new_account')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{\App\CPU\translate('add_new_account')}}</span>
                                </a>
                            </li>

                            <li class="nav-item {{Request::is('admin/account/list')?'active':''}}">
                                <a class="nav-link " href="{{route('admin.account.list')}}"
                                   title="{{\App\CPU\translate('account_list')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{\App\CPU\translate('accounts')}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('admin/account/add-expense')?'active':''}}">
                                <a class="nav-link " href="{{route('admin.account.add-expense')}}"
                                   title="{{\App\CPU\translate('add_new_expense')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{\App\CPU\translate('new_expense')}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('admin/account/add-income')?'active':''}}">
                                <a class="nav-link " href="{{route('admin.account.add-income')}}"
                                   title="{{\App\CPU\translate('add_new_income')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{\App\CPU\translate('new_income')}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('admin/account/add-transfer')?'active':''}}">
                                <a class="nav-link " href="{{route('admin.account.add-transfer')}}"
                                   title="{{\App\CPU\translate('add_new_transfer')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{\App\CPU\translate('new_transfer')}}</span>
                                </a>
                            </li>

                            <li class="nav-item {{Request::is('admin/account/list-transection')?'active':''}}">
                                <a class="nav-link " href="{{route('admin.account.list-transection')}}"
                                   title="{{\App\CPU\translate('list_of_transection')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{\App\CPU\translate('transection_list')}}</span>
                                </a>
                            </li>

                        </ul>
                    </li>




                    <li class="nav-item {{Request::is('admin/supplier/add')?'active':''}}">
                        <a class="nav-link " href="{{route('admin.supplier.add')}}"
                           title="{{\App\CPU\translate('add_new_supplier')}}">
                            <span class="tio-circle nav-indicator-icon"></span>
                            <span class="text-truncate">{{\App\CPU\translate('add_supplier')}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{Request::is('/section/list*')?'active':''}}">
                        <a class="nav-link " href="{{route('section.list')}}"
                           title="{{\App\CPU\translate('Section List')}}">
                            <span class="tio-circle nav-indicator-icon"></span>
                            <span class="text-truncate">{{\App\CPU\translate('Section List')}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{Request::is('/ptrainer/list*')?'active':''}}">
                        <a class="nav-link " href="{{route('ptrainer.list')}}"
                           title="{{\App\CPU\translate('Trainer Section List')}}">
                            <span class="tio-circle nav-indicator-icon"></span>
                            <span class="text-truncate">{{\App\CPU\translate('Trainer Section List')}}</span>
                        </a>
                    </li>


                </ul>
            </li>
        @endif
    @endforeach


        <li class="nav-item">
            <small
                class="nav-subtitle">{{\App\CPU\translate('Report')}}</small>
            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
        </li>
        <li class="navbar-vertical-aside-has-menu {{Request::is('purchase/section/list')?'show':''}}">
            <a class="js-navbar-vertical-aside-menu-link nav-link"
               href="/purchase/section/list" title="{{\App\CPU\translate('Sale Section List')}}">
                <i class="tio-home-vs-1-outlined nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                    {{\App\CPU\translate('Sale Section List')}}
                </span>
            </a>
        </li>

        <li class="navbar-vertical-aside-has-menu {{Request::is(route('checkin.list'))?'show':''}}">
            <a class="js-navbar-vertical-aside-menu-link nav-link"
               href="{{route('checkin.list')}}" title="{{\App\CPU\translate('Checkin List')}}">
                <i class="tio-home-vs-1-outlined nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                    {{\App\CPU\translate('Checkin List')}}
                </span>
            </a>
        </li>




                        {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('admin/unit*')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('admin.unit.index')}}"
                            >
                                <i class="tio-calculator nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{\App\CPU\translate('unit')}}
                                </span>
                            </a>
                        </li>
                         --}}
                        <!-- category End Pages -->
                        <!-- Brand -->
                        {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('admin/brand*')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('admin.brand.add')}}"
                            >
                                <i class="tio-star nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{\App\CPU\translate('brand')}}
                                </span>
                            </a>
                        </li> --}}
                        <!--Brand end -->
                        <!-- unit -->
                        {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('admin/unit*')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('admin.unit.index')}}"
                            >
                                <i class="tio-calculator nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{\App\CPU\translate('unit')}}
                                </span>
                            </a>
                        </li> --}}
                        <!--unit end -->

                        <!-- Product Pages -->

                        {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('admin/product*')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                            >
                                <i class="tio-premium-outlined nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{\App\CPU\translate('product')}}</span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{Request::is('admin/product*')?'d-block':''}}"> --}}
                                {{-- <li class="nav-item {{Request::is('admin/product/add')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.product.add')}}"
                                       title="{{\App\CPU\translate('add_new_product')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('add_new')}}</span>
                                    </a>
                                </li>

                                <li class="nav-item {{Request::is('admin/product/list')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.product.list')}}"
                                       title="{{\App\CPU\translate('list_of_products')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('list')}}</span>
                                    </a>
                                </li> --}}
                                {{-- <li class="nav-item {{Request::is('admin/product/bulk-import')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.product.bulk-import')}}"
                                       title="{{\App\CPU\translate('bulk_import')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('bulk_import')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item {{Request::is('admin/product/bulk-export')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.product.bulk-export')}}"
                                       title="{{\App\CPU\translate('bulk_export')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('bulk_export')}}</span>
                                    </a>
                                </li> --}}
                            {{-- </ul>
                        </li> --}}
                        {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('admin/stock*')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('admin.stock.stock-limit')}}"
                            >
                                <i class="tio-warning nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{\App\CPU\translate('stock_limit_products')}}
                                </span>
                            </a>
                        </li> --}}
                        <!-- Product End Pages -->

                        <!-- Coupon End Pages -->
                        {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('admin/coupon*')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('admin.coupon.add-new')}}">
                                <i class="tio-gift nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{\App\CPU\translate('coupons')}}</span>
                            </a>
                        </li> --}}
                        <!-- Coupon End Pages -->

                        <!-- Account start pages -->
                        {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('admin/account*')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                            >
                                <i class="tio-wallet nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{\App\CPU\translate('account_management')}}</span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{Request::is('admin/account*')?'d-block':''}}">
                                <li class="nav-item {{Request::is('admin/account/add')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.account.add')}}"
                                       title="{{\App\CPU\translate('add_new_account')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('add_new_account')}}</span>
                                    </a>
                                </li>

                                <li class="nav-item {{Request::is('admin/account/list')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.account.list')}}"
                                       title="{{\App\CPU\translate('account_list')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('accounts')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item {{Request::is('admin/account/add-expense')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.account.add-expense')}}"
                                       title="{{\App\CPU\translate('add_new_expense')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('new_expense')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item {{Request::is('admin/account/add-income')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.account.add-income')}}"
                                       title="{{\App\CPU\translate('add_new_income')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('new_income')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item {{Request::is('admin/account/add-transfer')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.account.add-transfer')}}"
                                       title="{{\App\CPU\translate('add_new_transfer')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('new_transfer')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item {{Request::is('admin/account/add-payable')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.account.add-payable')}}"
                                       title="add new category">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('add_new_payable')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item {{Request::is('admin/account/add-receivable')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.account.add-receivable')}}"
                                       title="add new category">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('add_new_receivable')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item {{Request::is('admin/account/list-transection')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.account.list-transection')}}"
                                       title="{{\App\CPU\translate('list_of_transection')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('transection_list')}}</span>
                                    </a>
                                </li>

                            </ul>
                        </li> --}}
                        <!-- Account End pages -->



                        {{-- <!-- Customer end Pages -->
                        <li class="nav-item">
                            <small
                                class="nav-subtitle">{{\App\CPU\translate('supplier_section')}}</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <!-- Supplier Pages -->
                        <li class="navbar-vertical-aside-has-menu {{Request::is('admin/supplier*')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                            >
                                <i class="tio-users-switch nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{\App\CPU\translate('supplier')}}</span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{Request::is('admin/supplier*')?'d-block':''}}">
                                <li class="nav-item {{Request::is('admin/supplier/add')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.supplier.add')}}"
                                       title="{{\App\CPU\translate('add_new_supplier')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('add_supplier')}}</span>
                                    </a>
                                </li>

                                <li class="nav-item {{Request::is('admin/supplier/list')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.supplier.list')}}"
                                       title="{{\App\CPU\translate('list_of_suppliers')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{\App\CPU\translate('supplier_list')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        <!-- Supplier end Pages -->
                        <li class="nav-item">
                            <small
                                class="nav-subtitle">{{\App\CPU\translate('shop_setting_section')}}</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <!-- Settings Start Pages -->
                        {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('admin/business-settings*')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                            >
                                <i class="tio-settings nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{\App\CPU\translate('settings')}}</span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{Request::is('admin/business-settings*')?'d-block':''}}">
                                <li class="nav-item {{Request::is('admin/business-settings/shop-setup')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.business-settings.shop-setup')}}"
                                    >
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span
                                            class="text-truncate">{{\App\CPU\translate('shop')}} {{\App\CPU\translate('setup')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        <!-- Settings End Pages -->
                        <li class="nav-item pt-8">

                        </li>
                    </ul>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </aside>
</div>
