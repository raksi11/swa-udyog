<?php

namespace App\Http\Requests;

use App\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'from_id' => [
                'required',
                'integer'],
            'to_id'   => [
                'required',
                'integer'],
            'amount'  => [
                'required'],
            'job_id'  => [
                'required',
                'integer'],
        ];

    }
}
