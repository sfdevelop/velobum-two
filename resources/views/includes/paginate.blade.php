@if ($paginator->lastPage() > 1)
    <nav class="woocommerce-pagination">
        <div class="edgtf-woocommerce-pagination-inner">
        @if($paginator->currentPage() == 1)
        @else
            <a class="prev page-numbers" href="{{ $paginator->url(1) }}">&lt;</a>
        @endif
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            @if (($paginator->currentPage() == $i))
                <span class="page-numbers current">{{$i}}</span>
            @else
                <a class="page-numbers" href="{{ $paginator->url($i) }}">{{$i}}</a>
            @endif
        @endfor
        @if ($paginator->currentPage() == $paginator->lastPage())
        @else
            <a class="next page-numbers" href="{{ $paginator->url($paginator->currentPage()+1) }}">&gt;</a>
        @endif
        </div>
    </nav>
    <br>
@endif
