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
      <div class="container-fluid page-body-wrapper">
              <div class="main-panel">
                  <div class="content-wrapper">
                    <div class="row">
                      <div class="col-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <div class="card-body">
                        <form method="GET" >

                            <div class="flex space-x-2">
                            <div class="flex space-x-2">
                                <input type="text" name="surname" placeholder="Введите фамилию">
                                <button type="submit" class="btn btn-primary">ser</button>
                                </div>
                                <div style="margin-left: 60%">
                                    <button type="button" class="btn btn-success"> <a href="{{url('addOutpatientscard')}}">Добавить+</a> </button>
                                </div>
                            </div>
                        </form>
                    </div>
</form>
</div>
<table class="min-w-full border-collapse">
<thead>
<tr >
    <th class="py-1 px-2 border-b ">Дата</th>
    <th class="py-1 px-2 border-b ">Название</th>
    <th class="py-1 px-2 border-b ">Возраст</th>
    <th class="py-1 px-2 border-b "></th>
    <th class="py-1 px-2 border-b "></th>
</tr>
</thead>
<tbody id="list">
@if(isset($plain))
@foreach($plain as $plan)
    <tr>
        <td class="py-2 px-1 border-b">{{ $plan->datevaccine }} </td>
        <td class="py-2 px-1 border-b">{{ $plan->name }} </td>
        <td class="py-2 px-1 border-b">{{ $plan->age}}</td>
        <td class="py-2 px-1 border-b">
            <a href="{{ url('updatePlain',$plan->id)}} class="text-blue-500 hover:text-blue-700">
                <edit-icon style="align: center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                  </edit-icon>
            </a>
        </td>
        <td class="py-2 px-1 border-b">
            <a onclick="return confirm('Вы хотите удалить?')" href="{{ url('deletePlain', $plan->id )}}" class="text-blue-500 hover:text-blue-700">
                <edit-icon style="align: center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                  </edit-icon>
            </a>
        </td>
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
        </div>
      </div>
  </div>
@include('doctor.script')

</body>
</html>


