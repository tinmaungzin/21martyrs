
<style>
    .empty-data{
        width: 100%;
        height: 100%;
        padding: 2rem;
        transform: translate(10px,10px)
    }
</style>


<div class="empty-data">
    <div style="margin: auto; text-align: center;">
        <img style="width: 300px; height: 300px;" src="{{ $icon_url ?? asset('images/icons/no-data.svg') }}"
        alt="Icon representing no data"/>
        <p style="text-align: center;">Coming Soon</p>
    </div>
</div>
