<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('doctor.css')
    <style>
        .top-right-link {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('doctor.sidebar')
      @include('doctor.navbar')
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <a href="{{ route('export.report') }}" class="top-right-link">
                        <span class="mdi mdi-file-download"></span>
                      </a>
                      <h1 class="text-2xl font-bold mb-2">Хронические болезни</h1>
                      <table class="min-w-full border-collapse mx-auto">
                        <thead>
                          <tr>
                            <th class="py-1 px-4 border-b">Диагноз</th>
                            <th class="py-1 px-4 border-b">Количество</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($reportData as $row)
                          <tr>
                            <td class="py-2 px-1 border-b">{{ $row[0] }}</td>
                            <td class="py-2 px-1 border-b">{{ $row[1] }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  
                </div>


                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <a href="{{ route('export.report2') }}" class="top-right-link">
                            <span class="mdi mdi-file-download"></span>
                          </a>
                          <h1 class="text-2xl font-bold mb-2">Инфекционные болезни</h1>
                          <table class="min-w-full border-collapse mx-auto">
                            <thead>
                              <tr>
                                <th class="py-1 px-2 border-b">Диагноз</th>
                                <th class="py-1 px-2 border-b">Количество</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $row)
                              <tr>
                                <td class="py-2 px-1 border-b">{{ $row[0] }}</td>
                                <td class="py-2 px-1 border-b">{{ $row[1] }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
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
