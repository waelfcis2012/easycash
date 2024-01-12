<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class GetTransactionsRequest extends Controller
{
   public function __construct(Request $request)
   {
      $this->validate(
         $request, [
            'provider' => Rule::in(["DataProviderW", "DataProviderX", "DataProviderY"]),
            'statusCode' => Rule::in(["paid", "pending", "reject"]),
            'amounteMin' => 'numeric|min:0',
            'amounteMax' => 'numeric|gte:amounteMin',
            'currency' => Rule::in(["EGP", "USD"]),
         ]
      );

      parent::__construct($request);
   }
}