<div class="categories__post__item">
    <div class="categories__post__item__pic small__item set-bg"
         data-setbg="{{ url('storage/' . $recipes[$i]->image) }}">
        <div class="post__meta">
            <h4>{{ date('d', strtotime($recipes[$i]->created_at)) }}</h4>
            <span>{{ date('m', strtotime($recipes[$i]->created_at)) }}</span>
        </div>
    </div>
    <div class="categories__post__item__text">
        <span class="post__label">{{ $recipes[$i]->category_title }}</span>
        <h3><a href="{{ route('recipe', $recipes[$i]->slug) }}">{{ $recipes[$i]->title }}</a></h3>
        <p>{{ explode('.', $recipes[$i]->subtitle)[0] }}...</p>
        <ul class="post__widget">
            <li><span class="comment_num">{{ $recipes[$i]->comment_count }}</span> комментариев</li>
        </ul>
    </div>
</div>
