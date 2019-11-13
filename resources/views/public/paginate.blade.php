<nav class="pagination-wrapper" >
    <ul class="pagination justify-content-end ">
        @if ($exams->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" tabindex="-1">السابق</a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $exams->previousPageUrl() }}" tabindex="-1">السابق</a>
            </li>
        @endif

            @foreach ($exams as $element)
                {{ dd($exams->currentPage()) }}
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $exams->currentPage())
                            <li class="page-item active disabled"><a class="page-link" href="#">{{ $page }}</a></li>
                        @else
                            <li class="page-item "><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach


        @if ($exams->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $exams->nextPageUrl() }}">التالى</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="{{ $exams->nextPageUrl() }}">التالى</a>
            </li>
        @endif

    </ul>
</nav>