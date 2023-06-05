<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Description : General validation with 1 message string
     * Return array validated input...
     */
    protected function validateGeneral(array $inputs, array $rules, array $customMessages = []): array
    {
        $validator = Validator::make($inputs, $rules, $customMessages);

        if ($validator->fails()) {
            $message = $validator->errors()->getMessages();

            $errMessages = "";
            if ($message != null) {
                if (is_array($message)) {
                    foreach ($message as $item) {
                        foreach ($item as $m) {
                            if (str_contains($m, '.'))
                                $errMessages .= $m . ' ';
                            else
                                $errMessages .= $m . '. ';
                        }
                    }
                }
            }

            if ($errMessages != "")
                throw new HttpResponseException(response()->json(['message' => $errMessages], 422));
        }

        return $validator->validated();
    }

    /**
     * Description : Global json response
     * @message = ['SUCCESS', 'FAILED']
     * @status = [200, 201, 404, 400, 500]
     */
    public function jsonResponse(mixed $data = null, int $status = 200, string $message = 'SUCCESS'): JsonResponse
    {
        if ($data == null){
            return new JsonResponse([
                'message' => $message,
            ], $status);
        }
        return new JsonResponse([
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
