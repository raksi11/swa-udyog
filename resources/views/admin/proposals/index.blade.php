@extends('layouts.admin')
@section('content')
@can('proposal_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.proposals.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.proposal.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.proposal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Proposal">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.job') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.freelancer') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.proposal_text') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.budget') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.delivery_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.attachments') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proposals as $key => $proposal)
                        <tr data-entry-id="{{ $proposal->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $proposal->id ?? '' }}
                            </td>
                            <td>
                                {{ $proposal->job->title ?? '' }}
                            </td>
                            <td>
                                {{ $proposal->freelancer->name ?? '' }}
                            </td>
                            <td>
                                {{ $proposal->proposal_text ?? '' }}
                            </td>
                            <td>
                                {{ $proposal->budget ?? '' }}
                            </td>
                            <td>
                                {{ $proposal->delivery_time ?? '' }}
                            </td>
                            <td>
                                @foreach($proposal->attachments as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('proposal_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.proposals.show', $proposal->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('proposal_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.proposals.edit', $proposal->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('proposal_delete')
                                    <form action="{{ route('admin.proposals.destroy', $proposal->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('proposal_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.proposals.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Proposal:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection