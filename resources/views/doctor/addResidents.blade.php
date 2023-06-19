<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $(function() {
      $("#datepicker").datepicker();
    });
  </script>
    <meta charset="utf-8">
 @include('doctor.css')
</head>
  <body>
<div class="container-scroller">
  @include('doctor.sidebar')
@include('doctor.navbar')
<div class="container-fluid page-body-wrapper">
    <div class="container mx-auto">
        <div class="main-panel">
            <div class="content-wrapper">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
        <div class="flex justify-center items-center">
            <h1 class="text-2xl font-bold mb-2">Регистрация жителя</h1>
          </div>
          <div class="form-cardview">
    <form action="{{url('upload_residents')}}" method="POST" enctype="multipart/form-data">
        @csrf
         <input type="hidden" name="user_id" value="{{ $user_id  }}">
    <div class="form-container">
        <div class="form-column">
            <div class="form-group">
                <label class="form-label" for="surname">Фамилия:</label>
                <input class="form-control" type="text"  name="surname" placeholder="Фамилия" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Имя:</label>
                <input class="form-control" type="text" name="name" placeholder="Имя" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="name">Отчество:</label>
                <input class="form-control" type="text" name="patronymic" placeholder="Отчество" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="name">Почта:</label>
                <input class="form-control" type="text" name="email" placeholder="Почта" required>
            </div>
            <div class="form-group">
                <label for="gender" class="form-label">Пол</label>
                <select name="gender" id="gender" class="form-control">
                    @foreach ($gender as $id => $gender)
                        <option value="{{ $gender }}">{{ $gender }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-column">
            <div class="form-group">
                <label for="status" class="form-label">Социальный статус</label>
                <select name="status" id="status"  class="form-control">
                    @foreach ($status as $id => $statusName)
                        <option value="{{ $statusName }}">{{ $statusName }}</option>
                    @endforeach
                </select> </div>
            <div class="form-group">
                <label for="datepicker" class="form-label">Дата рождение</label>
            <input type="date" id="datepicker" name="date" class="form-control">
       </div>
            <div class="form-group">
                <label class="form-label" for="email">Адрес:</label>
                <input class="form-control" type="text" name="address" placeholder="Адрес"  required>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Телефон:</label>
                <input class="form-control" type="text" name="phone" placeholder="Телефон"required>
            </div>
        </div>
    </div>
        <div class="form-group">
            <label class="block mb-2">Документ</label>
            <input class="form-control" type="text"  name="document" placeholder="Документ" class="border border-gray-300 rounded px-4 py-2" required>
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
@include('doctor.script')

</body>
</html>
