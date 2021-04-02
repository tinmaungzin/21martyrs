<div class="top-and-side-bar">
    <div class="topbar">
        <div class="justify-content-between d-flex mx-4">
            <div class="ml-4 pl-3">
                <img src="{{ asset('images/21martyrs.webp') }}" style="height: 42px;width: 42px" alt="">
            </div>
            <div class="pt-2 mr-3 pr-2">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle border-0" style="background-color: #fff" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{--                        <i class="fal fa-user pr-3"></i>{{$user}}--}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="/admin/reset-password" class="a-clear a-sidebar text-dark pl-3 mb-3 d-flex w-100">
                            Reset password
                        </a>
                        <a href="/admin/logout" class="a-clear a-sidebar text-dark pl-3 d-flex w-100">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="inner-sidebar" id="inner">
            <a href="{{route('admins.index')}}" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'admins.index',
                    'admins.create',
                    'admins.edit'
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/admin.png') }}" class="sidebar-img" alt=""> Admins
            </a>
            <a href="{{route('articles.index')}}" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'articles.index',
                    'articles.create',
                    'articles.edit'
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/article.png') }}" class="sidebar-img" alt=""> Articles
            </a>

            <a href="{{route('list.new_pending_posts')}}" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'list.new_pending_posts',
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/pending_post.png') }}" class="sidebar-img" alt=""> New Pending Posts
            </a>

            <a href="{{route('list.suggested_edit_pending_posts')}}" style="color:#1b1e21;padding: 9px 5px 12px 24px"
               class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'list.suggested_edit_pending_posts'
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/edit_pending_post.png') }}" class="sidebar-img" alt=""> Edit Pending Posts
            </a>

            <a href="{{route('list.published_posts')}}" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'list.published_posts',
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/published_post.png') }}" class="sidebar-img" alt=""> Published Posts
            </a>

            <a href="{{route('list.rejected_pending_posts')}}" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'list.rejected_pending_posts',
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/rejected_post.png') }}" class="sidebar-img" alt=""> Rejected Posts
            </a>

            <a href="{{route('stats.index')}}" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'stats.index',
                    'stats.create',
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/stat.png') }}" class="sidebar-img" alt=""> Statistic
            </a>
            <a href="{{route('feedback.index')}}" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15
            {{ in_array($route, [
                    'feedback.index',
                    'feedback.show',
                    ]) ? 'active-link': ''}}">
                <img src="{{ asset('images/feedback.png') }}" class="sidebar-img" alt=""> Feedback
            </a>

            <a href="{{route('admin.logout')}}" style="color:#1b1e21;padding: 9px 5px 12px 24px" class="a-clear d-block w-100 fs15">
                <img src="{{ asset('images/logout.png') }}" class="sidebar-img" alt=""> Logout
            </a>

        </div>
    </div>


</div>

<script type="application/javascript">
    $(document).ready(function () {
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

    function activateDropDowns(items = []) {
        if (items.length) {
            items.forEach(function (item) {
                if ($("." + item).hasClass("active-link")) {
                    $("#" + item).addClass("show");
                }
            });
        }

    }

</script>
