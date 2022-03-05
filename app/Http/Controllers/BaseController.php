<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message = null, $status = 200, $status_msg = 'success')
    {
        $response = [
            "status_code" => $status,
            'status' => $status_msg,
            'data'    => $result,
        ];

        if($message !== null){
            $response['message'] = $message;
        }
        return response()->json($response, $status == 204 ? 200 : $status);
    }

    


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'status' => 'Error',
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
