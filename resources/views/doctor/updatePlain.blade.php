<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $(function()
     {
      $("#datepicker").datepicker(); // Привязываем Datepicker к элементу с id "datepicker"
    });
  </script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .centered-div {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Высота по размеру видимой области */
}

</style>
 @include('doctor.css')
</head>
  <body>
    <div class="container-scroller">
    @include('doctor.navbar')
    @include('doctor.sidebar')
    <div class="container-fluid page-body-wrapper">
        <div class="container mx-auto">
            <div class="main-panel">
                <div class="content-wrapper">
                  <div class="row">
                    <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
            <div class="flex justify-center items-center">
                <h1 class="text-2xl font-bold mb-2">Изменить данные</h1>
              </div>
              <div class="form-cardview">
            <form  action="{{ url('editPlain', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-container">
                <div class="form-column">
                    <div class="form-group">
                        <label for="datepicker" class="form-label">Дата рождения</label>
                    <input type="date" id="datepicker" name="datevaccine" id="title" value="{{ $data->datevaccine }}"class="form-control">
               </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Адрес:</label>
                        <input class="form-control" type="text" name="name" id="title" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Телефон:</label>
                        <input class="form-control" type="text" name="age" id="title" value="{{ $data->age }}">
                    </div>
               
                <div>
                    <input type="submit" class="btn btn-success block m-2">
                </div>
            </form>
        </div>
        </div>
            </div>
        </div>
    </div>
</div>
</div>
    @include('doctor.script')

  </body>
</html>

