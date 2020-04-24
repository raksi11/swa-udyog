<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\Admin\JobResource;
use App\Job;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobResource(Job::with(['client', 'freelancer'])->get());

    }

    public function store(StoreJobRequest $request)
    {
        $job = Job::create($request->all());

        if ($request->input('files', false)) {
            $job->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
        }

        return (new JobResource($job))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Job $job)
    {
        abort_if(Gate::denies('job_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobResource($job->load(['client', 'freelancer']));

    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->all());

        if ($request->input('files', false)) {
            if (!$job->files || $request->input('files') !== $job->files->file_name) {
                $job->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
            }

        } elseif ($job->files) {
            $job->files->delete();
        }

        return (new JobResource($job))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Job $job)
    {
        abort_if(Gate::denies('job_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
