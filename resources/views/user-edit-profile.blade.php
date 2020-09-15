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
                      </div>
                      @error('avatar')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                      <p class="text-primary" id="avatar-filename"></p>
                      <script>
                        var input = document.getElementById( 'avatar' );
                        var infoArea = document.getElementById( 'avatar-filename' );
                        input.addEventListener( 'change', showFileName );

                        function showFileName( event ) {
  
                          // the change event gives us the input it occurred in 
                          var input = event.srcElement;
  
                          // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
                          var fileName = input.files[0].name;
  
                          // use fileName however fits your app best, i.e. add it into a div
                          infoArea.textContent = 'Wybrany plik: ' + fileName + ' zostanie przycięty do rozdzielczości 300x300 px.';
                        }
                      </script>
                      <div class="form-group">
                          <label for="about">Biogram (opcjonalny)</label>
                          <textarea class="form-control" name="about" id="about" cols="30" placeholder="Opowiedz o sobie" rows="4">{{$user->about}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="url">Adres internetowy (opcjonalny)</label>
                        <input type="url" placeholder="Podaj swój adres URL" class="form-control" value="{{$user->url}}" name="url" id="url">
                      </div>
                      @error('url')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                      <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                  </form>
                  <br>
                  <p class="lead" style="font-size: 150%">Zmiana hasła</p>
                  <hr>
  
  
                  <form method="post" action="{{route('user-change-password', $user)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="password">Nowe hasło • Minimalnie 8 znaków</label>
                      <input type="password" placeholder="Nowe hasło" class="form-control" value="" name="password" id="password">
                  </div>
                  @error('password')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <div class="form-group">
                      <label for="password-confirm">Powtórz nowe hasło</label>
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

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    Usuń swoje konto
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Czy na pewno chcesz to zrobić?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Wraz z twoim kontem zostaną usunięte wszystkie oferty i ogłoszenia
                          <p class="text-danger mb-0"><u>Tej czynności nie można cofnąć.</u></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                          <br>
                          <form method="post" action="{{route('user-destroy-profile', $user)}}" enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Usuń swoje konto</button> 
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
          </div>
        </div>
        <hr>
    </div>
    @endsection
</x-home-master>