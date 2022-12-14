<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function showAll()
    {
        return Quote::select('id', 'quote', 'author')->get();
    }

    public function showSingleQuote($id)
    {
        return Quote::select('id', 'quote', 'author')->where('id', $id)->get();
    }

    public function search($search)
    {
        return Quote::select('id', 'quote', 'author')
            ->where('quote', 'like', '%' . $search . '%')
            ->orWhere('author', 'like', '%' . $search . '%')
            ->get();
    }

    public function newQuote(Request $request)
    {
        $request->validate([
            'quote' => 'required',
        ]);
        Quote::create($request->all());
        return response([
            "message" => "New quote added!!",
            "quote" => $request->all(),
        ]);
    }

    public function updateQuote(Request $request, $id)
    {
        $request->validate([
            'quote' => 'required',
        ]);

        $quote = Quote::find($id);

        $quote->update($request->all());

        return $quote;
    }

    public function removeQuote($id)
    {
        if (Quote::destroy($id)) {
            return "Quote removed!!";
        }
        return "Quote not found!!";
    }

}
