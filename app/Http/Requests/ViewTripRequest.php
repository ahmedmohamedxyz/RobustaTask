<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViewTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function all($keys = null)
    {
        
        $request = parent::all($keys);
        $request['tripId'] =  $this->route('trip_id');

        return $request;    
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'tripId'=>'required|exists:trips,id'
        ];
    }
}
