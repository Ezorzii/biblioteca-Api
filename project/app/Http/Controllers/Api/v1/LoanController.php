<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $loans = Loan::where('user_id', $userId)->paginate(10);

        return response()->json($loans);
    }

    public function show(Loan $loan)
    {
        return response()->json($loan);
    }

    public function devolution(Loan $loan)
    {
        $loan->devolution = true;
        $loan->save();

        return response()->json($loan);
    }

    public function loan(Request $request)
    {
        $bookId = $request->get('book_id');
        $userId = auth()->user()->id;
        $returnDate = Carbon::now()->addDays(7);
        Loan::create([

            'user_id' => $userId,
            'book_id' => $bookId,
            'return_date' => $returnDate,

        ]);
    }


}
