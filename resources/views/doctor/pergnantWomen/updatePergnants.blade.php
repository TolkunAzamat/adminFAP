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
            <form  action="{{ url('editPergnant', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-container">
                <div class="form-column">
                    <div class="form-group">
                        <label class="form-label" for="surname">ФИО:</label>
                        <input class="form-control" type="text"  name="fullname" id="title" value="{{ $data->fullname }}">
                    </div>
                    <div class="form-group">
                        <label for="datepicker" class="form-label">Дата регистрации</label>
                        <input type="date" id="datepicker" name="dateOfRegistration" id="title" value="{{ $data->dateOfRegistration }}"class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="name">Место работы:</label>
                        <input class="form-control" type="text" name="placeOfWork" id="title" value="{{ $data->placeOfWork }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="name">Неделя:</label>
                        <input class="form-control" type="text" name="week" id="title" value="{{ $data->week }}">
                    </div>


                </div>
                <div class="form-column">

                    <div class="form-group">
                        <label class="form-label" for="name">Который род:</label>
                        <input class="form-control" type="text" name="wichKind" id="title" value="{{ $data->wichKind }}">
                     </div>
                     <div class="form-group">
                        <label for="datepicker" class="form-label">Дата визита</label>
                        <input type="date" id="datepicker" name="dateVisiting" id="title" value="{{ $data->dateVisiting }}"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="datepicker" class="form-label">Предварительный день родов</label>
                        <input type="date" id="datepicker" name="whenGaveBirth" id="title" value="{{ $data->whenGaveBirth }}"class="form-control">
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

