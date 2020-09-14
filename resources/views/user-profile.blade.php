<x-home-master>
    @section('user-profile-content')
    <div class="container">
        <div class="row"><hr></div>
        <div class="row d-flex align-items-start">
          <div class="col-md-4">
             @if (Auth::user()->avatar == NULL)
                <img height="300" width="300" src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/512x512/plain/user.png" class="rounded-circle mx-auto d-block" alt="">
              @else
                <img src="{{asset($user->avatar)}}" class="rounded-circle mx-auto d-block" alt="">
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
            @if (Auth::check())
              @if (Auth::user()->id == $user->id)
              <h5 class="my-4"><a href="{{route('user.show.detail.profile', $user)}}">Edytuj swój profil</a> | <a href="#">Nowe ogłoszenie</a></h5>
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
    @endsection
</x-home-master>