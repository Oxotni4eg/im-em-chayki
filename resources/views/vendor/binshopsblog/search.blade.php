@extends("layouts.app",['title'=>$title])
@section("content")

    <div class='row'>
        <div class='col-sm-12'>
            <div class="row">
                <div class="col-md-9 search">
                    <h2>Результаты поиска для {{$query}}</h2>

                    @php $search_count = 0;@endphp
                    @forelse($search_results as $result)
                        @if(isset($result->indexable))
                            @php $search_count += $search_count + 1; @endphp
                            <?php $post = $result->indexable; ?>
                            @if($post && is_a($post,\BinshopsBlog\Models\BinshopsPostTranslation::class))
                                <h2>Результат поиска #{{$search_count}}</h2>
                                @include("binshopsblog::partials.index_loop")
                            @else

                                <div class='alert alert-danger'>Невозможно показать этот результат поиска - неизвестный тип</div>
                            @endif
                        @endif
                    @empty
                        <div class='alert alert-danger'>Извините, но результатов не было!</div>
                    @endforelse
                </div>
                <div class="col-md-3">
                    <h6>Категории:</h6>
                    <ul class="binshops-cat-hierarchy">
                        @if($categories)
                            @include("binshopsblog::partials._category_partial", [
    'category_tree' => $categories,
    'name_chain' => $nameChain = ""
    ])
                        @else
                            <span>Нет категорий</span>
                        @endif
                    </ul>
                </div>
            </div>

            @if (config('binshopsblog.search.search_enabled') )
                @include('binshopsblog::sitewide.search_form')
            @endif

        </div>
    </div>


@endsection
