<div class="empty-data" style="width: 100%; height: 100%; padding: 2rem;">
    <div style="margin: auto; text-align: center;">
        <img style="width: 300px; height: 300px;" src="{{ $icon_url ?? asset('images/icons/no-data.svg') }}"
             alt="Icon representing no data"/>
        <p style="text-align: center;">{{ $no_data_text ?? __('ui.no_data') }}</p>
    </div>
</div>
