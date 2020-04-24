<?php

namespace App\Http\Requests;

use App\Proposal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProposalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('proposal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:proposals,id',
        ];

    }
}
