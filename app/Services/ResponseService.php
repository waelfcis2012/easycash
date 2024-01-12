<?php

namespace App\Services;

class ResponseService 
{
    /**
     * Gets a response object with success status and the data returned to clients
     *
     * @param mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSuccessResponse($data = "", $extraInfo = null) {
        $result = array('status' => 1, 'result' => $data);
        if (!is_null($extraInfo)) {
            $result['extra_info'] = $extraInfo;
        }
        return response()->json($result);
    }

    /**
     * Gets a response object for any error that occurs through out the application
     *
     * @param string $msg
     * @param array $validationErrors
     * @return Illuminate\Http\Response
     */
    public function getErrorResponse($responseCode, $msg = null, $validationErrors = null) {
        $result = array('status' => 0, 'msg' => $msg);
        if (is_array($validationErrors)) {
            $result['validation'] = $validationErrors;
        }
        return response()->json($result, $responseCode);
    }
}