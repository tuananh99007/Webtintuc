<section id="artNavbar" class="section_navbar">
    <div class="container">
        <div class="box-main-nav">
            <ul class="nav text-uppercase tmp-nav">
                <li class="nav-item"><a class="nav-link" href="{{route('users.home.index')}}"><img
                            src="{{ asset('assets/users/images/icon-home.svg') }}" alt=""></a></li>
                @foreach ($categorysList as $index => $categoryList)
                    <li class="nav-item"><a class="nav-link "
                                            href="{{ route('users.home.categoryDetail', ['category_id' => $categoryList->id]) }}">
                            {{ $categoryList->name }}
                        </a></li>
                @endforeach
            </ul>

        </div>
    </div>
</section>
