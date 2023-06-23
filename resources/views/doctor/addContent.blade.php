
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
 @include('doctor.css')
</head>
  <body>
    <div class="container-scroller">
        @include('doctor.sidebar')
      @include('doctor.navbar')
              <div class="main-panel">
                  <div class="content-wrapper">
                    <div class="row">
                      <div class="col-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <form action="{{ route('addContent.store', $medcard) }}" method="POST">
                         @csrf <!-- Поле для внешнего ключа idmedcard -->
                         <input type="hidden" name="idmedcard" value="{{ $medcard }}">
                          <!-- Поле для даты обращения -->
                          
                          <div class="form-group"> <label for="dateOfVisit">Дата обращения:</label>
                             <input type="date" id="dateOfVisit" name="dateOftheApplication" class="form-control" required>
                            </div> <!-- Поле для диагноза -->
                            <div class="form-group">
                                <label for="diagnosis">Окончательный диагноз:</label>
                                 <input type="text" id="diagnosis" name="finalDiagnosis" class="form-control" required>
                                </div>
                                   <div class="form-group">
                                       <label for="diagnosis">Первичный диагноз:</label>
                                        <input type="text" id="diagnosis" name="firstTimeDiagnosis" class="form-control" required>
                                       </div>
                                        <div class="form-group">
                                            <label for="diagnosis">Жалобы пациента:</label>
                                             <input type="text" id="diagnosis" name="patient_complaints" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="diagnosis">Назначение:</label>
                                                 <input type="text" id="diagnosis" name="appointmet" class="form-control" required>
                                                </div>
                                                <input type="submit" class="btn btn-success block m-2">
                                 </form>
              </div>

                      </div>
                    </div>
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr >
                                <th class="py-1 px-2 border-b ">Дата обращения</th>
                                <th class="py-1 px-2 border-b ">Первичный диагноз</th>
                                <th class="py-1 px-2 border-b ">Жалобы пациента  </th>
                                <th class="py-1 px-2 border-b ">Окончательный диагноз</th>
                                <th class="py-1 px-2 border-b ">Назначение </th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            @if(isset($content))
                            @foreach($content as $contents)
                                <tr>

                                    <td class="py-2 px-1 border-b">{{ $contents->dateOftheApplication }} </td>
                                    <td class="py-2 px-1 border-b">{{ $contents->firstTimeDiagnosis }} </td>
                                    <td class="py-2 px-1 border-b">{{ $contents->patient_complaints }} </td>
                                    <td class="py-2 px-1 border-b">{{ $contents->finalDiagnosis }} </td>
                                    <td class="py-2 px-1 border-b">{{ $contents->appointmet }} </td>


                                </tr>
                            @endforeach

                                @else
                                <tr>
                                    <td colspan="6">Ничего не найдено</td>
                                </tr>
                                @endif
                        </tbody>
                    </table>
                  </div>
              </div>
@include('doctor.script')

</body>
</html>

