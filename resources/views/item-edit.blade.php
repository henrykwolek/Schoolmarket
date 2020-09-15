<x-home-master>
    @section('post-edit')
    <div class="row w-100 mt-5">
    </div>
    <div class="row mt-5"> 
    </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset($shopItem->post_image)}}" class="img-fluid mx-auto d-block" alt="Cinque Terre">
                    <br>
                    <p class="lead text-center mb-0" style="font-size: 175%">{{$shopItem->title}}</p>
                    <p class="text-center mt-0">{{$shopItem->user->name}}</p>
                    <hr>
                    <blockquote class="blockquote text-justify">
                    <p class="mb-0">{{$shopItem->body}}</p>
                </blockquote>
                <p class="lead"><strong>Utworzono: </strong> {{$shopItem->created_at}}</p>
                <p class="lead">Ostatnia zmiana: {{$shopItem->updated_at->diffForHumans()}}</p>
                </div>
                <div class="col-md-8">
                    @if ($message = Session::get('info'))
                <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
                </div>
            @endif
                <p class="lead" style="font-size: 150%">Szczegóły ogłoszenia</p>
                <hr>
                <form method="post" action="{{route('item-update', $shopItem)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Tytuł</label>
                        <input type="text" value="{{$shopItem->title}}" name="title" id="title" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <label for="postImage">Nowe zdjęcie</label>
                    <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="post_image" name="post_image" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="post_image">Wybierz plik</label>
                                </div>
                            </div>
                    </div>
                    <p class="text-primary" id="avatar-filename"></p>
                          <script>
                            var input = document.getElementById( 'post_image' );
                            var infoArea = document.getElementById( 'avatar-filename' );
                            input.addEventListener( 'change', showFileName );
    
                            function showFileName( event ) {
      
                              // the change event gives us the input it occurred in 
                              var input = event.srcElement;
      
                              // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
                              var fileName = input.files[0].name;
      
                              // use fileName however fits your app best, i.e. add it into a div
                              infoArea.textContent = 'Wybrany plik: ' + fileName + ' zostanie przycięty do rozdzielczości 1400x800 px.';
                            }
                          </script>
                    <label for="post_price">Cena</label>
                    <div class="input-group mb-3">
                        <input type="text" value="{{$shopItem->post_price}}" name="post_price" id="post_price" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <span class="input-group-text">PLN</span>
                        </div>
                    </div>
        
                    <label for="status">Status ogłoszenia</label>
                    <select class="custom-select mb-2" name="status" id="status">
                        @if ($shopItem->status == 'active')
                            <option value="active">Aktywne</option>
                            <option value="sold">Sprzedane</option>
                        @else
                            <option value="sold">Sprzedane</option>
                            <option value="active">Aktywne</option>  
                        @endif
                    </select>
        
                    <div class="form-group">
                        <label for="body">Opis ogłoszenia</label>
                        <textarea name="body" rows="10" id="body" class="form-control" aria-label="With textarea">{{$shopItem->body}}
                        </textarea>
                    </div>
        
        
                    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                    </form>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="lead" style="font-size: 150%">Usuwanie ogłoszenia</p>
                                <hr>
                                <form method="post" action="{{route('item-destroy', $shopItem)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <p class="lead">Tego nie można cofnąć.</p>
                                    <button type="submit" class="btn btn-danger">Usuń to ogłoszenie</button> 
                                    <p class="text-danger">Uwaga! ta czynność jest nieodwracalna.</p>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
            </div>
        </div>
    <hr>
    @endsection
</x-home-master>