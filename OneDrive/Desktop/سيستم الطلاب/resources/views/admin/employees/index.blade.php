@extends("layouts.admin")
@section('content')
<div>

    <div class="card-body pt-5">
     <div class="d-flex align-items-center justify-content-between mb-3">
      <div class="search-box search-box-select">
        <form action="{{ route('admin.employee.search') }}" method="post" enctype="multipart/form">
             @csrf
             <input  class="b-2" type="search" name="search" placeholder="بحث...">
             <button type="submit" class="btn btn-secondary">بحث</button>
         </form>
        </div>
        <a class="btn btn-success " href="{{ route('admin.employee.create')}}">
            اضافه طالب جديد
        </a>
     </div>

        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Slider">
                <thead>
                    <tr>
                        <th>
                            رقم الطالب
                           </th>
                        <th>
                         الاسم
                        </th>
                        <th>
                         الرقم القومى
                        </th>
                        <th>
                             الكليه
                        </th>
                        <th>
                            القسم
                       </th>
                       <th>
                        المجموع
                       </th>
                       <th>
                        الموبيل
                       </th>
                       <th>
                        العنوان
                       </th>
                        <th>
                            التحكم
                        </th>
                        <th>
                            بيانات اضافيه
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $key => $employee)
                        <tr data-entry-id="{{ $employee->id }}">
                            <td>
                                {{$employee->number ?? '' }}
                            </td>
                            <td>
                                {{$employee->name ?? '' }}
                            </td>
                            <td>
                                {{$employee->national_number ?? '' }}
                            </td>

                            <td>
                                {{($employee->college) ?? '' }}
                            </td>
                            <td>
                                {{($employee->section) ?? '' }}
                            </td>
                            <td>
                                {{($employee->total) ?? '' }}
                            </td>
                            <td>
                                {{($employee->phone) ?? '' }}
                            </td>
                            <td>
                                {{($employee->address) ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.employee.edit', $employee->id) }}">
                                   تعديل
                                </a>

                                    <form action="{{ route('admin.employee.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('{{' متاكد من حذف هذا الطالب ؟'}}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="حذف">
                                    </form>

                            </td>
                            <td>
                                <a class="btn btn-xs btn-danger" href="{{ route('admin.comfort.index', $employee->id) }}">
                                   الراحات
                                </a>
                                <a class="btn btn-xs btn-dark" href="{{ route('admin.disciplinary.index', $employee->id) }}">
                                    الحاله الانضباطيه
                                 </a>
                                 <a class="btn btn-xs btn-secondary" href="{{ route('admin.queue.index', $employee->id) }}">
                                     حضور الطابور
                                 </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

{{-- <script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
   @can('slider_delete')
   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sliders.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
  @endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Slider:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

  })

</script> --}}
