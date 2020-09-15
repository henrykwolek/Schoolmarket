<x-home-master>
    @section('shop-item')
    <div class="container">
        <div class="row mb-4"></div>
        @if ($shopItem->status == 'sold')
        <div class="alert alert-warning alert-block">
            Sprzedawca oznaczył ten przedmiot jako <strong>sprzedany.</strong>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">Shop Name</h1>
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
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
                <div class="card mt-4 shadow">
                    <img
                        class="card-img-top img-fluid"
                        src="{{asset($shopItem->post_image)}}"
                        alt=""
                    />
                    <span class="border-bottom"></span>
                    <div class="card-body">
                        <h3 class="card-title">{{$shopItem->title}}</h3>
                        <h4>PLN {{$shopItem->post_price}}</h4>
                        <p class="card-text lead" style="text-align: justify">
                            {{$shopItem->body}}
                        </p>
                        <p class="card-text">
                            Sprzedjący:
                            <a
                                href="{{route('user-show-profile', $shopItem->user->id)}}"
                                >{{$shopItem->user->name}}</a
                            >
                            | {{$shopItem->created_at->diffForHumans()}}
                        </p>
                    </div>
                </div>
                <!-- /.card -->

                <div class="card card-outline-secondary my-4 shadow p-2">
                    <div class="card-header">
                        Komentarze
                    </div>
                    <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() {
                            // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement("script");
                            s.src = "https://schoolmarket.disqus.com/embed.js";
                            s.setAttribute("data-timestamp", +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript
                        >Please enable JavaScript to view the
                        <a href="https://disqus.com/?ref_noscript"
                            >comments powered by Disqus.</a
                        ></noscript
                    >
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-lg-9 -->
        </div>
    </div>
    @endsection
</x-home-master>
