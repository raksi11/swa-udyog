@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.proposal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proposals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.id') }}
                        </th>
                        <td>
                            {{ $proposal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.job') }}
                        </th>
                        <td>
                            {{ $proposal->job->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.freelancer') }}
                        </th>
                        <td>
                            {{ $proposal->freelancer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.proposal_text') }}
                        </th>
                        <td>
                            {{ $proposal->proposal_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.budget') }}
                        </th>
                        <td>
                            {{ $proposal->budget }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.delivery_time') }}
                        </th>
                        <td>
                            {{ $proposal->delivery_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($proposal->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proposals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection