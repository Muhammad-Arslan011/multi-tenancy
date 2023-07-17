<?php

namespace App\Http\Helpers;

use Illuminate\Http\Exceptions\HttpResponseException;

class Helper {

    public static function validationError($message, $errors = [], $code = 401)
    {
        $response = ['success' => false, 'message' => $message];

        if (!empty($errors)) {
            $response['data'] = $errors;
        }

        throw new HttpResponseException(response()->json($response, $code));
    }

    public static function successMessage($message, $data = null, $code = 200)
    {
       $response = ['success' => true, 'message' => $message, 'data' => $data];

       return response()->json([$response], $code);
    }
}

?>