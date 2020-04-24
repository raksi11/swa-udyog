@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.proposal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.proposals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="job_id">{{ trans('cruds.proposal.fields.job') }}</label>
                <select class="form-control select2 {{ $errors->has('job') ? 'is-invalid' : '' }}" name="job_id" id="job_id" required>
                    @foreach($jobs as $id => $job)
                        <option value="{{ $id }}" {{ old('job_id') == $id ? 'selected' : '' }}>{{ $job }}</option>
                    @endforeach
                </select>
                @if($errors->has('job'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.job_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="freelancer_id">{{ trans('cruds.proposal.fields.freelancer') }}</label>
                <select class="form-control select2 {{ $errors->has('freelancer') ? 'is-invalid' : '' }}" name="freelancer_id" id="freelancer_id" required>
                    @foreach($freelancers as $id => $freelancer)
                        <option value="{{ $id }}" {{ old('freelancer_id') == $id ? 'selected' : '' }}>{{ $freelancer }}</option>
                    @endforeach
                </select>
                @if($errors->has('freelancer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('freelancer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.freelancer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="proposal_text">{{ trans('cruds.proposal.fields.proposal_text') }}</label>
                <textarea class="form-control {{ $errors->has('proposal_text') ? 'is-invalid' : '' }}" name="proposal_text" id="proposal_text" required>{{ old('proposal_text') }}</textarea>
                @if($errors->has('proposal_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('proposal_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.proposal_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="budget">{{ trans('cruds.proposal.fields.budget') }}</label>
                <input class="form-control {{ $errors->has('budget') ? 'is-invalid' : '' }}" type="text" name="budget" id="budget" value="{{ old('budget', '') }}">
                @if($errors->has('budget'))
                    <div class="invalid-feedback">
                        {{ $errors->first('budget') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.budget_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="delivery_time">{{ trans('cruds.proposal.fields.delivery_time') }}</label>
                <input class="form-control date {{ $errors->has('delivery_time') ? 'is-invalid' : '' }}" type="text" name="delivery_time" id="delivery_time" value="{{ old('delivery_time') }}" required>
                @if($errors->has('delivery_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.delivery_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attachments">{{ trans('cruds.proposal.fields.attachments') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
                </div>
                @if($errors->has('attachments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attachments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.attachments_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('admin.proposals.storeMedia') }}',
    maxFilesize: 3, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($proposal) && $proposal->attachments)
          var files =
            {!! json_encode($proposal->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection