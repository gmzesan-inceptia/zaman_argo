@if ($paginator->hasPages())
    <nav aria-label="Page navigation" class="pagination-wrapper">
        <ul class="pagination justify-content-center gap-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">
                        <i class="ri-arrow-left-s-line"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <i class="ri-arrow-left-s-line"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-hidden="true">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link bg-primary border-primary">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">
                        <i class="ri-arrow-right-s-line"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>

    <style>
        .pagination-wrapper {
            margin-top: 2rem;
        }

        .pagination {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .page-item {
            display: inline-block;
            margin: 0 4px;
        }

        .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0;
            text-decoration: none;
            border: 2px solid #ddd;
            border-radius: 6px;
            color: #333;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .page-link:hover:not(.disabled .page-link) {
            border-color: #8B6914!important;
            color: #8B6914!important;
            background-color: #f9f7f2!important;
        }

        .page-item.active .page-link {
            background-color: #8B6914!important;
            border-color: #8B6914!important;
            color: white!important;
        }

        .page-item.disabled .page-link {
            color: #ccc;
            border-color: #e9ecef;
            cursor: not-allowed;
            opacity: 0.6;
        }

        @media (max-width: 768px) {
            .page-link {
                min-width: 36px;
                height: 36px;
                font-size: 14px;
            }

            .page-item {
                margin: 0 2px;
            }
        }
    </style>
@endif
