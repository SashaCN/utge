@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-link-previous disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link-previous" aria-hidden="true"></span>
                </li>
            @else
                <li class="page-link-previous">
                    <a class="page-link-a-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-count disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-count active" aria-current="page"><span class="page-link"></span></li>
                        @else
                            <li class="page-count"><a class="page-link" href="{{ $url }}"><span class="page-link-a"></span></a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-link-next disabled">
                    <a class="page-link-a-next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"></a>
                </li>
            @else
                <li class="page-link-next" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="" aria-hidden="true"></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
