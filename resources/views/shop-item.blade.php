<x-home-master>
    @section('shop-item')
    <div class="container">

        <div class="row">
    
          <div class="col-lg-3">
            <h1 class="my-4">Shop Name</h1>
            <div class="list-group shadow mb-3">
              <a href="{{route('shop-item-category', 'trade')}}" class="list-group-item">Sprzedaż/kupno</a>
              <a href="{{route('shop-item-category', 'books')}}" class="list-group-item">Podręczniki/książki</a>
              <a href="{{route('shop-item-category', 'korepetycje')}}" class="list-group-item">Korepetycje</a>
              <a href="{{route('home')}}" class="list-group-item">Wszystkie ogłoszenia</a>
            </div>
          </div>
          <!-- /.col-lg-3 -->
    
          <div class="col-lg-9">
    
            <div class="card mt-4 shadow">
              <img class="card-img-top img-fluid" src="{{asset($shopItem->post_image)}}" alt="">
              <span class="border-bottom"></span>
              <div class="card-body">
                <h3 class="card-title">{{$shopItem->title}}</h3>
                <h4>PLN {{$shopItem->post_price}}</h4>
                <p class="card-text lead" style="text-align: justify">{{$shopItem->body}}</p>
                <p class="card-text">Sprzedjący: <a href="{{route('user-show-profile', $shopItem->user->id)}}">{{$shopItem->user->name}}</a> | {{$shopItem->created_at->diffForHumans()}}</p>
              </div>
            </div>
            <!-- /.card -->
    
            <div class="card card-outline-secondary my-4 shadow">
              <div class="card-header">
                Product Reviews
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <a href="#" class="btn btn-success">Leave a Review</a>
              </div>
            </div>
            <!-- /.card -->
    
          </div>
          <!-- /.col-lg-9 -->
    
        </div>
    
      </div>
    @endsection
</x-home-master>