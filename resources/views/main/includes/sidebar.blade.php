<div class="col-lg-4 col-md-4">
    <div class="sidebar__item">
        <div class="sidebar__item__categories">
            <div class="sidebar__item__title">
                <h6>Категории рецептов</h6>
            </div>
            @php
                $allRecipesCount = \Illuminate\Support\Facades\DB::table('recipes')->whereNull('deleted_at')->count()
            @endphp
            <ul>
                <li>
                    <a href="{{ route('recipes') }}">Все рецепты <span>{{ $allRecipesCount }}</span></a>
                </li>
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('recipes.category', $category->slug) }}">{{$category->title}} <span>{{ $category->recipe_count }}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar__subscribe__item" id="newsletter">
            <div class="sidebar__item__title">
                <h6>Подписаться</h6>
            </div>
            <p>Подпишитесь на нашу рассылку и получайте наши самые свежие новости прямо на свой почтовый ящик.</p>

            @include('main.includes.errors')

            <form action="{{ route('newsletter') }}" method="POST">
                @csrf
                <input required name="email" type="email" class="email-input" placeholder="Ваш E-mail">
                <button type="submit" class="site-btn">Подписаться</button>
            </form>
        </div>
    </div>
</div>
