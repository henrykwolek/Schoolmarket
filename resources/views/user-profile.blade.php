<x-home-master>
    @section('user-profile-content')
    <div class="container">
        <div class="row"><hr></div>
        <div class="row d-flex align-items-start">
          <div class="col-md-4">
             @if ($user->avatar == NULL)
                <img height="300" width="300" src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/512x512/plain/user.png" class="rounded-circle mx-auto d-block" alt="">
              @else
                <img src="{{asset($user->avatar)}}" class="rounded-circle mx-auto d-block shadow-lg align-middle" alt="">
             @endif
          </div>
          <div class="col-md-8">
            <h5 class="my-4"><strong>Imię i nazwisko: </strong>{{$user->name}}</h5>
            <h5 class="my-4"><strong>Nazwa użytkownika: </strong>{{$user->username}}</h5>
            @if(Auth::check())
              @if (Auth::user()->id == $user->id)
                <h5 class="my-4"><strong>Adres email: </strong>{{$user->email}}</h5>
              @endif
            @endif
            <blockquote class="blockquote text-justify">
              <p class="mb-1">{{$user->about}}</p>
              <footer class="blockquote-footer">{{$user->name}}, <cite title="Source Title">Mój biogram</cite></footer>
            </blockquote>
            @if ($user->url !== NULL)
              <p class="mb-1"><a href="{{$user->url}}">{{$user->url}}</a></p>
            @endif

            @if (Auth::check())
              @if (Auth::user()->id == $user->id)
              <h5 class="my-4"><a href="{{route('user.show.detail.profile', $user)}}">Edytuj swój profil</a> | <a href="{{route('shop-item-create')}}">Nowe ogłoszenie</a></h5>
              @endif
            @endif
          </div>
        </div>
        <hr>
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
            </div>
        @endif
          </div>
          <div class="row mx-auto mb-3">
            @if (Auth::check())
              @if (Auth::user()->id == $user->id)
                @if (count($shopItems) == 0)
                  <h4 class="align-bottom">Nie dodałeś/aś jeszcze żadnej oferty.</h4>
                @else
                  <h4 class="align-bottom">Twoje oferty:</h4>
                @endif
              @endif
            @else
              @if (count($shopItems) == 0)
                <h4 class="align-bottom">Ten użytkownik nie dodał jeszcze żadnej oferty.</h4>
              @else
                <h4 class="align-bottom">Oferty użytkownika {{$user->username}}</h4>
              @endif
            @endif
          </div>
    <div class="row">
      @foreach ($shopItems as $shopItem)
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 shadow-lg hover">
              <a href="{{route('shop-item-show', $shopItem)}}"><img class="card-img-top" src="{{asset($shopItem->post_image)}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="{{route('shop-item-show', $shopItem)}}">{{$shopItem->title}}</a>
                </h4>
                <h5>PLN {{$shopItem->post_price}}</h5>
                <p class="card-text">{{Str::limit($shopItem->body, '50', '...')}}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted"><a href="{{route('user-show-profile', $shopItem->user->id)}}">{{$shopItem->user->name}}</a> {{$shopItem->created_at->diffForHumans()}}</small>
              </div>
            </div>
          </div>
          @endforeach
    </div>
    <div class="row mx-auto">
      <div class="mx-auto">{{ $shopItems->links() }}</div>
    </div>
    @endsection
</x-home-master>