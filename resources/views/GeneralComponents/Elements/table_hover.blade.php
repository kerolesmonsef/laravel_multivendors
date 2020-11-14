<a href="https://manager.cashlk.com/user_m/17/edit">
    <p tabindex="0" data-html="true" data-toggle="popover" data-trigger="hover" trigger="manual" title="" data-content="
                <div class='popcontent'>
                @foreach($data as $key => $value)
                        <div class=basteq>
                            <strong>{!! $key !!} </strong>
                            <span>{!! $value !!}</span>
                        </div>
                        <br>
                        @endforeach

                </div>" class="text-info" data-original-title="<b>keroles monsef</b>">
        <i class="fa fa-rss"></i>
        {{ $title ?? "Title" }}
    </p>
</a>
