{{--@if ($paginator->lastPage() > 1)--}}
{{--    <nav aria-label="Page navigation example">--}}
{{--        <ul class="pagination mt-2">--}}
{{--            <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">--}}
{{--                <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="Previous">--}}
{{--                    <span aria-hidden="true">&laquo;</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            @for ($i = 1; $i <= $paginator->lastPage(); $i++)--}}
{{--                <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">--}}
{{--                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>--}}
{{--                </li>--}}
{{--            @endfor--}}
{{--            <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">--}}
{{--                <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}" aria-label="Next">--}}
{{--                    <span aria-hidden="true">&raquo;</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </nav>--}}
{{--@endif--}}


<style>
    .pagination>.active>a{
        background-color: #dc3545 !important;
        border-color: #dc3545 !important;
    }
</style>
<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
    <ul class="pagination" style="  display: flex !important;
    justify-content: center !important;
    border-radius: 4px;
    padding-bottom: 30px !important;">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}"> <<< </a>
        </li>
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage()-1) }}"> < </a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
                $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}"> > </a>
        </li>

        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->lastPage()) }}"> >>> </a>
        </li>
    </ul>
@endif
