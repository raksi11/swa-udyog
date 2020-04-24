<?php

namespace App\Http\Requests;

use App\Proposal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProposalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('proposal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'job_id'        => [
                'required',
                'integer'],
            'freelancer_id' => [
                'required',
                'integer'],
            'proposal_text' => [
                'required'],
            'delivery_time' => [
                'required',
                'date_format:' . config('panel.date_format')],
        ];

    }
}
