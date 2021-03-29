
<a href="{{$url}}"
   class="{{
    in_array(url()->current(),
    $possible_urls) ? 'active': ""
}}"
>
    {{$text}}
</a>
