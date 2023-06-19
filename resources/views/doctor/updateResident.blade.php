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
            <form  action="{{ url('editResident', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-container">
                <div class="form-column">
                    <div class="form-group">
                        <label class="form-label" for="surname">Фамилия:</label>
                        <input class="form-control" type="text"  name="surname" id="title" value="{{ $data->surname }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Имя:</label>
                        <input class="form-control" type="text" name="name" id="title" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="name">Отчество:</label>
                        <input class="form-control" type="text" name="patronymic" id="title" value="{{ $data->patronymic }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="name">Почта:</label>
                        <input class="form-control" type="text" name="email" id="title" value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                        <label for="gender" class="form-label">Пол</label>
                        <select name="gender" id="gender" class="form-control">
                            @foreach ($gender as $gender)
                            <option value="{{ $gender->gender }}" {{ $data->gender== $gender->id ? 'selected' : '' }}>
                                {{ $gender->gender }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-column">
                    <div class="form-group">
                        <label for="status" class="form-label">Социальный статус</label>
                        <select name="status" id="status"  class="form-control">
                            @foreach ($status as $status)
                            <option value="{{ $status->statusName }}" {{ $data->status == $status->statusName ? 'selected' : '' }}>
                                {{ $status->statusName }}
                            </option>
                        @endforeach
                        </select> </div>
                    <div class="form-group">
                        <label for="datepicker" class="form-label">Дата рождения</label>
                    <input type="date" id="datepicker" name="date" id="title" value="{{ $data->date }}"class="form-control">
               </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Адрес:</label>
                        <input class="form-control" type="text" name="address" id="title" value="{{ $data->address }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Телефон:</label>
                        <input class="form-control" type="text" name="phone" id="title" value="{{ $data->phone }}">
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label class="block mb-2">Документ</label>
                    <input class="form-control" type="text"  name="document" id="title" value="{{ $data->document }}" >
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

