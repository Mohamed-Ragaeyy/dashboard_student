@extends("layouts.admin")
@section('content')
<div>
    <div class="card-body pt-5">

        <a class="btn btn-xs btn-success" href="{{ route('admin.queue.create') }}">
            اضافه
         </a>

        <div class="table-responsive p-2">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Slider">
                <thead>
                    <tr>
                        <th width="10">
                         المسلسل
                        </th>
                        <th>
                         الطالب
                        </th>
                        <th>
                          سبب الراحه
                        </th>
                        <th>
                             النوع
                        </th>
                        <th>
                            الدرجات المخصومه
                       </th>
                        <th>
                            التحكم
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($queues as $key => $queue)
                        <tr data-entry-id="{{ $queue->id }}">
                            <td>
                                {{$queue->id ?? '' }}
                            </td>
                            <?php $student =  \App\models\Students::where('id' , '=', $queue->id_student)->first() ?>
                            <td>
                                {{$student->name ?? '' }}
                            </td>
                            <td>
                                {{$queue->reason ?? '' }}
                            </td>
                            <td>
                                {{($queue->type) ?? '' }}
                            </td>
                            <td>
                                {{($queue->class_discount) ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.queue.edit', $queue->id) }}">
                                   تعديل
                                </a>

                                    <form action="{{ route('admin.queue.destroy', $queue->id) }}" method="POST" onsubmit="return confirm('{{' متاكد من حذف هذا العنصر ؟'}}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="حذف">
                                    </form>

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
