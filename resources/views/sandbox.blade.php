<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sandbox</title>
        <link rel="stylesheet" type="text/css" href=" {{ asset('css/app.css')}}">
    </head>
    <body>
        <div class="app std-box cent" id="Form">
            <h2 class="text-center">Форма для загрузки файлов в базу данных</h2>
            <div class="main-box">
              <form
              name="Form" 
              method="post"
              action="/check"
              autocomplete="off"
              enctype="multipart/form-data" class="add-form">
                  @csrf
                  <div class="form-box">
                      <input type="file" name="Form_fileLoader" oninput="drop(this)"  id="Form_fileLoader">
                      @if($errors->any())
                          @foreach($errors->all() as $error)
                              <p class="error">{{ $error }}</p>
                          @endforeach
                      @endif
                  </div>
                  <input type="submit" name="aS" class="button authSubmit" id="aS" value="Отправить">
              </form>
          </div>
        </div>
        <div id="app">
          <output-ul :dataset="{{ json_encode($dataset) }}"></output-ul>
        </div>
        <script src="./js/app.js"></script>
    </body>
</html>
