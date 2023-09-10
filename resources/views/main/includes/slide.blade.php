<div class="hero__item">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <a href="{{ route('recipe', $popular_recipes[0 + $index]->slug) }}">
                    <div class="hero__inside__item hero__inside__item--wide set-bg"
                         data-setbg="{{ url('storage/' . $popular_recipes[0 + $index]->image) }}">
                        <div class="hero__inside__item__text">
                            <div class="hero__inside__item--meta post__meta">
                                <span>{{ date('d', strtotime($popular_recipes[0 + $index]->created_at)) }}</span>
                                <p>{{ date('m', strtotime($popular_recipes[0 + $index]->created_at)) }}</p>
                            </div>
                            <div class="hero__inside__item--text">
                                <ul class="label">
                                    <li>{{ $popular_recipes[0 + $index]->category_title }}</li>
                                </ul>
                                <h4>{{ $popular_recipes[0 + $index]->title }}</h4>
                                <ul class="widget">
                                    <li><span class="comment_num">{{ $popular_recipes[0 + $index]->comment_count }}</span> комментариев</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6  p-0">
                <a href="{{ route('recipe', $popular_recipes[1 + $index]->slug) }}">
                    <div class="hero__inside__item hero__inside__item--small set-bg"
                         data-setbg="{{ url('storage/' . $popular_recipes[1 + $index]->image) }}">
                        <div class="hero__inside__item__text">
                            <div class="hero__inside__item--meta post__meta">
                                <span>{{ date('d', strtotime($popular_recipes[1 + $index]->created_at)) }}</span>
                                <p>{{ date('m', strtotime($popular_recipes[1 + $index]->created_at)) }}</p>
                            </div>
                            <div class="hero__inside__item--text">
                                <ul class="label">
                                    <li>{{ $popular_recipes[1 + $index]->category_title }}</li>
                                </ul>
                                <h4>{{ $popular_recipes[1 + $index]->title }}</h4>
                                <ul class="widget">
                                    <li><span class="comment_num">{{ $popular_recipes[1 + $index]->comment_count }}</span> комментариев</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('recipe', $popular_recipes[2 + $index]->slug) }}">
                    <div class="hero__inside__item hero__inside__item--small set-bg"
                         data-setbg="{{ url('storage/' . $popular_recipes[2 + $index]->image) }}">
                        <div class="hero__inside__item__text">
                            <div class="hero__inside__item--meta post__meta">
                                <span>{{ date('d', strtotime($popular_recipes[2 + $index]->created_at)) }}</span>
                                <p>{{ date('m', strtotime($popular_recipes[2 + $index]->created_at)) }}</p>
                            </div>
                            <div class="hero__inside__item--text">
                                <ul class="label">
                                    <li>{{ $popular_recipes[2 + $index]->category_title }}</li>
                                </ul>
                                <h4>{{ $popular_recipes[2 + $index]->title }}</h4>
                                <ul class="widget">
                                    <li><span class="comment_num">{{ $popular_recipes[2 + $index]->comment_count }}</span> комментариев</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6  p-0">
                <a href="{{ route('recipe', $popular_recipes[3 + $index]->slug) }}">
                    <div class="hero__inside__item set-bg" data-setbg="{{ url('storage/' . $popular_recipes[3 + $index]->image) }}">
                        <div class="hero__inside__item__text">
                            <div class="hero__inside__item--meta post__meta">
                                <span>{{ date('d', strtotime($popular_recipes[3 + $index]->created_at)) }}</span>
                                <p>{{ date('m', strtotime($popular_recipes[3 + $index]->created_at)) }}</p>
                            </div>
                            <div class="hero__inside__item--text">
                                <ul class="label">
                                    <li>{{ $popular_recipes[3 + $index]->category_title }}</li>
                                </ul>
                                <h4>{{ $popular_recipes[3 + $index]->title }}</h4>
                                <ul class="widget">
                                    <li><span class="comment_num">{{ $popular_recipes[3 + $index]->comment_count }}</span> комментариев</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
