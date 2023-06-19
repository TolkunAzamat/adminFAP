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
                {{-- Форма для заполнения --}}
  <form  action="{{ url('editMedicalCard', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-container">
            <div class="form-column">
               <div class="form-group">
                 <label class="form-label" >ФИО:</label>
                    <span class="form-control"  name="fullname">{{ $data->fullname }}</span>
               </div>
                <div class="form-group">
               <label for="datepicker" class="form-label">Дата обсервации</label>
                <input type="date" id="datepicker" name="dateOfRegistration" class="form-control"
                value="{{ $data->dateOfRegistration }}">
                    </div>
                <div class="form-group">
                <label for="datepicker" class="form-label">Дата снятия с учета</label>
                <input type="date" id="datepicker" name="dateOfDeregistration" class="form-control"  value="{{ $data->dateOfDeregistration }}">
            </div>
                </div>
            <div class="form-column">
                <div class="form-group">
                 <label class="form-label" for="email">Номер медкарты:</label>
                <input class="form-control" type="text" name="numberMC" value="{{ $data->numberMC }}"/>
                </div>
            <div class="form-group">
                 <label class="form-label" for="email">Причина обсервации:</label>
                 <input type="text"  name="reasonForRegistration" class="form-control" value="{{ $data->reasonForRegistration }}" >
                 </div>
            <div class="form-group">
                  <label class="form-label" for="email">Причина снятия с учета:</label>
                  <input type="text" name="reasonForDeregistration" class="form-control"  value="{{ $data->reasonForDeregistration }}" >
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
        </div>
        </div>
    @include('doctor.script')
  </body>
</html>
