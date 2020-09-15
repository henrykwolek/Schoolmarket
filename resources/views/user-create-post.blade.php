<x-home-master>
  @section('user-create-post')
  <div class="container">
    <div class="row"><hr /></div>
    @if($message = Session::get('success'))
    <br />
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row"></div>
    <div class="row">
      <div class="col-md-4">
        <h3 class="my-4">Uwaga!</h3>
        <ul class="list-group">
          <li
            class="list-group-item d-flex justify-content-baseline align-items-center"
          >
            <span class="badge badge-primary badge-pill mr-2">1</span>
            Dokładnie opisz swoje ogłoszenie. To bardzo ważne, aby każdy
            wiedział co masz na myśli.
          </li>
          <li
            class="list-group-item d-flex justify-content-baseline align-items-center"
          >
            <span class="badge badge-primary badge-pill mr-2">2</span>
            Nie publikuj treści kontrowersyjnych, obrażających i niestosownych.
          </li>
          <li
            class="list-group-item d-flex justify-content-baseline align-items-center"
          >
            <span class="badge badge-primary badge-pill mr-2">3</span>
            W razie pytań proszę kontaktować się z administratorem.
          </li>
        </ul>
      </div>

      <div class="col-md-8">
        <h3 class="my-4">Nowe ogłoszenie</h3>
        <form
          method="post"
          action="{{ route('shop-store-items') }}"
          enctype="multipart/form-data"
        >
          @csrf
          <div class="input-group mb-3">
            <div class="input-group-prepend" style="width: 150px;">
              <span
                class="input-group-text"
                style="width: 150px;"
                id="basic-addon1"
                >Tytuł ogłoszenia</span
              >
            </div>
            <input
              type="text"
              name="title"
              id="title"
              class="form-control"
              placeholder=""
              aria-label=""
              aria-describedby="basic-addon1"
            />
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend" style="width: 150px;">
              <label
                class="input-group-text"
                style="width: 150px;"
                for="category"
                >Kategoria</label
              >
            </div>
            <select class="custom-select" id="category" name="category">
              <option value="trade">Sprzedaż/kupno</option>
              <option value="books">Podręczniki/książki</option>
              <option value="korepetycje">Korepetycje</option>
            </select>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend" style="width: 150px;">
                <span
                  class="input-group-text"
                  style="width: 150px;"
                  id="post_image_span"
                  >Dodaj zdjęcie</span
                >
              </div>
              <div class="custom-file">
                <input
                  type="file"
                  class="custom-file-input"
                  id="post_image"
                  name="post_image"
                  aria-describedby="inputGroupFileAddon01"
                />
                <label class="custom-file-label" for="post_image"
                  >Choose file</label
                >
              </div>
            </div>
          </div>
          <p class="text-primary" id="avatar-filename"></p>
          <script>
            var input = document.getElementById("post_image");
            var infoArea = document.getElementById("avatar-filename");
            input.addEventListener("change", showFileName);

            function showFileName(event) {
              // the change event gives us the input it occurred in
              var input = event.srcElement;

              // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
              var fileName = input.files[0].name;

              // use fileName however fits your app best, i.e. add it into a div
              infoArea.textContent =
                "Wybrany plik: " +
                fileName +
                " zostanie przycięty do rozdzielczości 1400x800 px.";
            }
          </script>

          <div class="input-group mb-3">
            <div class="input-group-prepend" style="width: 150px;">
              <span
                class="input-group-text"
                style="width: 150px;"
                id="basic-addon1"
                >Cena</span
              >
            </div>
            <input
              type="text"
              name="post_price"
              id="post_price"
              class="form-control"
              placeholder=""
              aria-label=""
              aria-describedby="basic-addon1"
            />
            <div class="input-group-append">
              <span class="input-group-text">PLN</span>
            </div>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend" style="width: 150px;">
              <span class="input-group-text" style="width: 150px;"
                >Opis ogłoszenia</span
              >
            </div>
            <textarea
              name="body"
              id="body"
              class="form-control"
              aria-label="With textarea"
            ></textarea>
          </div>

          <button type="submit" class="btn btn-primary">
            Zapisz post
          </button>
        </form>
      </div>
    </div>
    <hr />
  </div>
  @endsection
</x-home-master>
