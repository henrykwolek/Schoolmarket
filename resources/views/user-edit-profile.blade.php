<x-home-master>
    @section('user-editing-profile')
    <div class="container">
        <div class="row"><hr></div>
        @if($message = Session::get('success'))
  <br>
  <div class="alert alert-success alert-block">
  
      <button type="button" class="close" data-dismiss="alert">×</button>    
  
      <strong>{{ $message }}</strong>
  
  </div>
  @endif
        <div class="row">
          <div class="col-md-4">
            @if (Auth::user()->avatar == NULL)
              <img height="300" width="300" src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/512x512/plain/user.png" class="rounded-circle mx-auto d-block" alt="">
            @else
              <img src="{{asset($user->avatar)}}" class="rounded-circle mx-auto d-block" alt="">
            @endif
             <br>
             <p class="lead text-center mb-0" style="font-size: 175%">{{$user->name}}</p>
             <p class="text-center mt-0">{{$user->username}}</p>
             <hr>
             <blockquote class="blockquote text-justify">
              <p class="mb-0">{{$user->about}}</p>
              <footer class="blockquote-footer">{{$user->name}}, <cite title="Source Title">Mój biogram</cite></footer>
            </blockquote>
            <p class="lead"><strong>Data dołączenia:</strong> {{$user->created_at}}</p>
            <p class="lead">Ostatnia zmiana: {{$user->updated_at->diffForHumans()}}</p>
          </div>
          <div class="col-md-8">
            <p class="lead" style="font-size: 150%">Podstawowe informacje</p>
            <hr>
            <form method="post" action="{{route('update.profile', $user)}}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                          <label for="username">Nazwa użytkownika</label>
                          <input type="text" placeholder="Podaj nazwę użytkownika" class="form-control" value="{{$user->username}}" name="username" id="username">
                      </div>
                      @error('username')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                      <div class="form-group">
                          <label for="name">Imię i nazwisko</label>
                          <input type="text" placeholder="Podaj swoje imię i nazwisko" class="form-control" value="{{$user->name}}" name="name" id="name">
                      </div>
                      @error('name')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                      <div class="form-group">
                          <label for="email">Adres email</label>
                          <input type="text" placeholder="Podaj swój adres email" class="form-control" value="{{$user->email}}" name="email" id="email">
                      </div>
                      @error('email')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                      <label for="profilePicturue">Nowe zdjęcie profilowe</label>
                      <div class="input-group mb-3">
                          <div class="custom-file">
                              <input type="file" name="avatar" class="custom-file-input" id="avatar" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="avatar">Wybierz plik</label>
                          </div>
                          @error('avatar')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="about">Biogram</label>
                          <textarea class="form-control" name="about" id="about" cols="30" placeholder="Opowiedz o sobie" rows="4">{{$user->about}}</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                  </form>
                  <br>
                  <p class="lead" style="font-size: 150%">Zmiana hasła</p>
                  <hr>
  
  
                  <form method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="password">Hasło • Wymagane dla potwierdzenia</label>
                      <input type="password" placeholder="Nowe hasło" class="form-control" value="" name="password" id="password">
                  </div>
                  @error('password')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <div class="form-group">
                      <label for="password-confirm">Powtórz hasło • Wymagane dla potwierdzenia</label>
                      <input type="password" placeholder="Powtórz hasło" class="form-control" value="" name="password_confirmation" id="password_confirmation">
                  </div>
                  @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <button type="submit" class="btn btn-primary">Zmień hasło</button>
                  </form>
                  <br>
                  <p class="lead" style="font-size: 150%">Usuwanie konta</p>
                  <hr>
                  <form method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Usuń swoje konto</button> 
                    <p class="text-danger">Uwaga! ta czynność jest nieodwracalna.</p>
                  </form>
          </div>
        </div>
        <hr>
    </div>
    @endsection
</x-home-master>