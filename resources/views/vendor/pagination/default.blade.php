<nav class="pagination-wrapper" >
@if ($paginator->hasPages())
    <ul class="pagination justify-content-end">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span>@lang('exam.Previous')</span></li>
        @else
            <li><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('exam.Previous')</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span>{{ $page }}</span></li>
                    @else
                        <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('exam.Next')</a></li>
        @else
            <li class="page-item disabled"><span>Next</span></li>
        @endif
    </ul>
@endif
</nav>