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
 @if (session('success'))
 <script>
     alert('{{ session('success') }}');
 </script>
@endif
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
    <form action="{{url('upload_plains')}}" method="POST" enctype="multipart/form-data">
        @csrf
         <input type="hidden" name="user_id" value="{{ $user_id  }}">
    <div class="form-container">
        <div class="form-column">
            <div class="form-group">
                <label for="datepicker" class="form-label">Дата прививки:</label>
            <input type="date" id="datepicker" name="datevaccine" class="form-control">
       </div>
            <div class="form-group">
                <label class="form-label" for="email">Название прививки:</label>
                <input class="form-control" type="text" name="name" placeholder="Название прививки"  required>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Возраст:</label>
                <input class="form-control" type="number" name="age" placeholder="Возраст"required>
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
