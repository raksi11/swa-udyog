<?php

namespace App\Http\Requests;

use App\Job;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreJobRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('job_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'client_id'   => [
                'required',
                'integer'],
            'title'       => [
                'required'],
            'description' => [
                'required'],
            'budget'      => [
                'required'],
            'due_date'    => [
                'required',
                'date_format:' . config('panel.date_format')],
            'language'    => [
                'required'],
        ];

    }
}
