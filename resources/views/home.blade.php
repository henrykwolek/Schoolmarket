<x-home-master>
    @section('shop-content')
    <div class="col-lg-3">
        <h1 class="my-4">Marketplace</h1>
        <hr />
        <p class="lead">Kategorie</p>
        <div class="list-group shadow mb-3">
            <a
                href="{{ route('shop-item-category', 'trade') }}"
                class="list-group-item"
                >Sprzedaż/kupno</a
            >
            <a
                href="{{ route('shop-item-category', 'books') }}"
                class="list-group-item"
                >Podręczniki/książki</a
            >
            <a
                href="{{ route('shop-item-category', 'korepetycje') }}"
                class="list-group-item"
                >Korepetycje</a
            >
            <a href="{{ route('home') }}" class="list-group-item"
                >Wszystkie ogłoszenia</a
            >
        </div>

        @if (Auth::check())
        <div class="row w-100">
            @if (Auth::user()->avatar == NULL)
            <img
                height="200"
                width="200"
                src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/512x512/plain/user.png"
                class="rounded-circle mx-auto d-block"
                alt=""
            />
            @else
            <img
                src="{{asset(Auth::user()->avatar)}}"
                class="rounded-circle mx-auto d-block shadow-lg align-middle"
                alt=""
            />
            @endif
            <br />
            <div class="w-100">
                <p class="lead text-center mb-0" style="font-size: 175%">
                    <a
                        href="{{route('user-show-profile', Auth::user()->id)}}"
                        >{{Auth::user()->name}}</a
                    >
                </p>
            </div>
        </div>
        @endif
    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">
        <div
            id="carouselExampleIndicators"
            class="carousel slide my-4 shadow"
            data-ride="carousel"
        >
            <ol class="carousel-indicators">
                <li
                    data-target="#carouselExampleIndicators"
                    data-slide-to="0"
                    class="active"
                ></li>
                <li
                    data-target="#carouselExampleIndicators"
                    data-slide-to="1"
                ></li>
                <li
                    data-target="#carouselExampleIndicators"
                    data-slide-to="2"
                ></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img
                        class="d-block img-fluid"
                        src="http://placehold.it/900x350"
                        alt="First slide"
                    />
                </div>
                <div class="carousel-item">
                    <img
                        class="d-block img-fluid"
                        src="http://placehold.it/900x350"
                        alt="Second slide"
                    />
                </div>
                <div class="carousel-item">
                    <img
                        class="d-block img-fluid"
                        src="http://placehold.it/900x350"
                        alt="Third slide"
                    />
                </div>
            </div>
            <a
                class="carousel-control-prev"
                href="#carouselExampleIndicators"
                role="button"
                data-slide="prev"
            >
                <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                ></span>
                <span class="sr-only">Previous</span>
            </a>
            <a
                class="carousel-control-next"
                href="#carouselExampleIndicators"
                role="button"
                data-slide="next"
            >
                <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                ></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        @if($message = Session::get('warning'))
        <br />
        <div class="alert alert-warning alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif @if($message = Session::get('danger'))
        <br />
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="row">
            @foreach ($shopItems as $shopItem)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow lg hover">
                    <a href="{{ route('shop-item-show', $shopItem) }}"
                        ><img
                            class="card-img-top"
                            src="{{asset($shopItem->post_image)}}"
                            alt=""
                    /></a>
                    <span class="border-bottom"></span>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a
                                href="{{ route('shop-item-show', $shopItem) }}"
                                >{{$shopItem->title}}</a
                            >
                        </h4>
                        <h5>PLN {{$shopItem->post_price}}</h5>
                        @if ($shopItem->status == 'sold')
                        <strong
                            ><p class="text-danger">
                                Przedmiot sprzedany
                            </p></strong
                        >
                        @else
                        <p class="card-text">
                            {{Str::limit($shopItem->body, '50', '...')}}
                        </p>
                        @endif
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"
                            ><a
                                href="{{route('user-show-profile', $shopItem->user->id)}}"
                                >{{$shopItem->user->name}}</a
                            >
                            {{$shopItem->created_at->diffForHumans()}}</small
                        >
                    </div>
                </div>
            </div>
            @endforeach
            <div class="mx-auto">{{ $shopItems->links() }}</div>
        </div>
        <!-- /.row -->
    </div>

    <!-- /.col-lg-9 -->

    @endsection
</x-home-master>
