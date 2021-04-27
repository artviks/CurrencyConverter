<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CurrencyController extends Controller
{
    public function index(): View
    {
        return view('index', [
            'currencies' => Currency::all(),
            'conversion' => session()->pull('conversion')
        ]);

    }

    public function convert(Request $request): RedirectResponse
    {
        $request->validate([
            'rate' => 'required|numeric',
            'amount' => 'required|numeric'
        ]);

        $conversion = $request->get('amount') / $request->get('rate');

        session(['conversion' => $conversion]);

        return redirect('/');
    }
}
