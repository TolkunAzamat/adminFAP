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
            <h1 class="text-2xl font-bold mb-2">Создать медкарту</h1>
          </div>
          <div class="form-cardview">
            {{-- Форма для заполнения --}}
    <form action="{{url('upload_card')}}" method="POST" enctype="multipart/form-data">
        @csrf
         <input type="hidden" name="user_id" value="{{ $user_id}}">
    <div class="form-container">
        <div class="form-column">
            <div class="form-group">
                <label class="form-label" for="surname">ФИО</label>
                <select name="fullname">
                    @foreach ($residents as $resident)
                        <option value="{{ $resident->surname.  ' ' . $resident->name.  ' '  . $resident->patronymic}}">{{ $resident->surname }} {{ $resident->name }} {{ $resident->patronymic }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="datepicker" class="form-label">Дата обсервации</label>
            <input type="date" id="datepicker" name="dateOfRegistration" class="form-control">
        </div>
        <div class="form-group">
            <label for="datepicker" class="form-label">Дата снятия с учета</label>
        <input type="date" id="datepicker" name="dateOfDeregistration" class="form-control">
    </div>
        </div>
        <div class="form-column">
            <div class="form-group">
                <label class="form-label" for="email">Номер медкарты:</label>
                <input class="form-control" type="text" name="numberMC" placeholder="Номер" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Причина обсервации:</label>
                <textarea name="reasonForRegistration" class="form-control" ></textarea>
               </div>
            <div class="form-group">
                <label class="form-label" for="email">Причина снятия с учета:</label>
                <textarea name="reasonForDeregistration" class="form-control" ></textarea>
                 </div>
        </div>
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
