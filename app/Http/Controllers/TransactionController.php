<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\TransactionType;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TransactionController extends Controller
{

    private $userId = 1;
    /**
     * Display a listing of the transaction.
     */
    public function index() : View
    {
        $transactions = Transaction::whereUserId($this->userId)->get();
        return view("transactions.index", ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new transaction.
     */
    public function create()
    {
        return view("transactions.create");
    }

    /**
     * Store a newly created transaction in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required'],
            'amount' => ['required', 'gt:0'],
            'type' => ['required', Rule::enum(TransactionType::class)],
            'date' => ['date', 'nullable'],
            'notes' => ['string', 'nullable'],
        ]);

        $validated['user_id'] = $this->userId;
        $validated['date'] = $validated['date'] ?? now();

        Transaction::create($validated);

        return redirect('/transactions');
    }

    /**
     * Display the specified transaction.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified transaction.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified transaction in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified transaction from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
