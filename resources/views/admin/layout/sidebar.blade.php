
<div class="top-and-side-bar">
    <div class="topbar">
        <div class="justify-content-between d-flex mx-4">
            <div class="ml-4 pl-3">
                <img src="{{ asset('images/21martyrs.webp') }}" style="height: 42px;width: 42px" alt="">
            </div>
            <div class="pt-2 mr-3 pr-2">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle border-0" style="background-color: #fff" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
{{--                        <i class="fal fa-user pr-3"></i>{{$user}}--}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="/logout" class="a-clear a-sidebar text-dark pl-3 d-flex w-100">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="sidebar">
        <div class="inner-sidebar" id="inner">
            <a href="{{route('admins.index')}}"  style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'admins.index',
                    'admins.create',
                    'admins.edit'
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/admin.png') }}" class="sidebar-img" alt=""> Admin
            </a>

            <a href="{{route('list.new_pending_posts')}}"  style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'list.new_pending_posts',
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/admin.png') }}" class="sidebar-img" alt=""> New Pending Posts
            </a>

            <a href="{{route('list.suggested_edit_pending_posts')}}"  style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'list.suggested_edit_pending_posts'
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/admin.png') }}" class="sidebar-img" alt=""> Edit Pending Posts
            </a>

            <a href="#"  style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'admins.index',
                    'admins.create',
                    'admins.edit'
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/admin.png') }}" class="sidebar-img" alt=""> Published Posts
            </a>

            <a href="{{route('list.rejected_pending_posts')}}"  style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'list.rejected_pending_posts',
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/admin.png') }}" class="sidebar-img" alt=""> Rejected Posts
            </a>

            <a href="{{route('stats.index')}}"  style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'stats.index',
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/admin.png') }}" class="sidebar-img" alt=""> Statistic
            </a>


{{--            <button style="" class="fs15 btn-clear btn-collapse  text-left" type="button"--}}
{{--                    data-toggle="collapse" data-target="#cycle"--}}
{{--                    aria-expanded="false" aria-controls="cycle"--}}
{{--            >--}}
{{--                <img src="{{ asset('images/Cycle.png') }}" class="sidebar-img" alt=""> Motor Cycles--}}
{{--            </button>--}}
{{--            <div class="collapse multi-collapse" id="cycle">--}}
{{--                <a href="/brands" class="a-clear a-sidebar cycle--}}
{{--                    {{ $route === 'brands.index' ? 'active-link': ''}}" style="padding-left: 42px">--}}
{{--                     Brands--}}
{{--                </a>--}}
{{--                <a href="/colors" class="a-clear a-sidebar cycle--}}
{{--                    {{ $route === 'colors.index' ? 'active-link': ''}}" style="padding-left: 42px">--}}
{{--                     Colors--}}
{{--                </a>--}}
{{--                <a href="/types" class="a-clear a-sidebar cycle--}}
{{--                     {{ $route === 'types.index' ? 'active-link': ''}}" style="padding-left: 42px">--}}
{{--                     Models--}}
{{--                </a>--}}

{{--                <a href="/serials" class="a-clear a-sidebar cycle--}}
{{--                {{ in_array($route, [--}}
{{--                    'serials.index',--}}
{{--                    'serials.create',--}}
{{--                    'serials.edit'--}}
{{--                    ]) ? 'active-link': ''}}" style="padding-left: 42px">--}}
{{--                    Motor Cycles--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <button style="" class="fs15 btn-clear btn-collapse  text-left" type="button"--}}
{{--                    data-toggle="collapse" data-target="#item"--}}
{{--                    aria-expanded="false" aria-controls="item"--}}
{{--            >--}}
{{--                <img src="{{ asset('images/Cycle.png') }}" class="sidebar-img" alt=""> Items--}}
{{--            </button>--}}
{{--            <div class="collapse multi-collapse" id="item">--}}


{{--                <a href="/items" class="a-clear a-sidebar item--}}
{{--                {{ in_array($route, [--}}
{{--                    'items.index',--}}
{{--                    'items.create',--}}
{{--                    'items.edit'--}}
{{--                    ]) ? 'active-link': ''}}" style="padding-left: 42px">--}}
{{--                    Items--}}
{{--                </a>--}}
{{--                <a href="/item_categories" class="a-clear a-sidebar item--}}
{{--                    {{ $route === 'item_categories.index' ? 'active-link': ''}}" style="padding-left: 42px">--}}
{{--                    Item Categories--}}
{{--                </a>--}}
{{--            </div>--}}



{{--            <button style="" class="fs15 btn-clear btn-collapse text-left" type="button"--}}
{{--                    data-toggle="collapse" data-target="#branch"--}}
{{--                    aria-expanded="false" aria-controls="branch"--}}
{{--            >--}}
{{--                <img src="{{ asset('images/Branch.png') }}" class="sidebar-img" alt=""> Branches--}}
{{--            </button>--}}
{{--            <div class="collapse multi-collapse" id="branch">--}}
{{--                <a href="/branches" class="a-clear a-sidebar branch--}}
{{--                    {{ in_array($route, [--}}
{{--                'branches.index',--}}
{{--                'branches.create',--}}
{{--                'branches.edit'--}}
{{--                ]) ? 'active-link': ''}}" style="padding-left: 42px">--}}
{{--                    Branches--}}
{{--                </a>--}}
{{--                <a href="/branchmanagers" class="a-clear a-sidebar branch--}}
{{--                    {{ in_array($route, [--}}
{{--                'branchmanagers.index',--}}
{{--                'branchmanagers.create',--}}
{{--                'branchmanagers.edit',--}}
{{--                ]) ? 'active-link': ''}}" style="padding-left: 42px">--}}
{{--                    Branch Managers--}}
{{--                </a>--}}

{{--            </div>--}}

{{--            <button style="" class="fs15 btn-clear btn-collapse text-left" type="button"--}}
{{--                    data-toggle="collapse" data-target="#inventory"--}}
{{--                    aria-expanded="false" aria-controls="inventory"--}}
{{--            >--}}
{{--                <img src="{{ asset('images/Branch.png') }}" class="sidebar-img" alt=""> Inventories--}}
{{--            </button>--}}
{{--            <div class="collapse multi-collapse" id="inventory">--}}
{{--                <a href="/inventories" class="a-clear a-sidebar inventory--}}
{{--                    {{ $route === 'inventories.index' ? 'active-link': ''}}" style="padding-left: 42px">--}}
{{--                    Inventories--}}
{{--                </a>--}}
{{--                <a href="/inventorymanagers" class="a-clear a-sidebar inventory--}}
{{--                    {{ $route === 'inventorymanager.index' ? 'active-link': ''}}" style="padding-left: 42px">--}}
{{--                    Inventory Managers--}}
{{--                </a>--}}

{{--            </div>--}}

{{--            <a href="/suppliers" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15--}}
{{--            {{ in_array($route, [--}}
{{--                'suppliers.index',--}}
{{--                'suppliers.create',--}}
{{--                'suppliers.edit'--}}
{{--                ]) ? 'active-link': ''}}">--}}
{{--                <img src="{{ asset('images/supplier.png') }}" class="sidebar-img" alt=""> Suppliers--}}
{{--            </a>--}}
{{--            <a href="/customers" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15--}}
{{--            {{ in_array($route, [--}}
{{--                'customers.index',--}}
{{--                'customers.create',--}}
{{--                'customers.edit'--}}
{{--                ]) ? 'active-link': ''}}">--}}
{{--                <img src="{{ asset('images/supplier.png') }}" class="sidebar-img" alt=""> Customers--}}
{{--            </a>--}}
{{--            <a href="/accounts" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15--}}
{{--            {{ in_array($route, [--}}
{{--                'accounts.index',--}}
{{--                'accounts.show',--}}
{{--                ]) ? 'active-link': ''}}">--}}
{{--                <img src="{{ asset('images/supplier.png') }}" class="sidebar-img" alt=""> Accounts--}}

{{--            </a>--}}
{{--            <a href="#" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15--}}
{{--           ">--}}
{{--                <img src="{{ asset('images/icons8-receipt-dollar-32.png') }}" class="sidebar-img" alt=""> Invoice--}}
{{--            </a>--}}

        </div>
    </div>




</div>

<script type="application/javascript">
    $(document).ready(function ()
    {
        activateDropDowns(
            [
                'cycle',
                'branch',
                'inventory',
                'item',
                'cycle_inventory',
                'item_inventory',
                'log_inventory'
            ]);
    });

    function activateDropDowns(items = [])
    {
        if(items.length)
        {
            items.forEach(function(item)
            {
                if ($("."+item).hasClass("active-link"))
                {
                    $("#"+item).addClass("show");
                }
            });
        }

    }

</script>
