<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Product;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Normal user sees only his tickets
        $tickets = Ticket::where('employee_id', Auth::id())->get();
        return view('tickets.index', data: compact('tickets'));
    }

    public function adminIndex()
    {
        // Admin sees all
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }
    public function create()
    {
        $products = Product::all(); // for product dropdown
        return view('tickets.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'product_id' => 'required|exists:products,id',
            'priority' => 'required|in:low,medium,high,critical',
            'page_url' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
            'problem_start' => 'nullable|string|max:255',
            'problem_details' => 'nullable|string',
            'error_message_exists' => 'nullable|boolean',
            'error_message_text' => 'nullable|string',
            'tried_steps' => 'nullable|string',
            'affect_scope' => 'nullable|in:only_me,multiple_users',
            'affected_users' => 'nullable|string',
            'frequency' => 'nullable|in:always,sometimes',
            'frequency_details' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $ticketData = $request->all();
        $ticketData['employee_id'] = auth()->id();

        // Handle file upload
        if ($request->hasFile('file_path')) {
            $ticketData['file_path'] = $request->file('file_path')->store('tickets', 'public');
        }

        $ticket = Ticket::create($ticketData);

        return redirect()->route('tickets.show', $ticket->id)
            ->with('success', 'تم إنشاء التذكرة بنجاح!');
    }


    public function show(Ticket $ticket)
    {
        // Make sure normal users can only see their tickets

        if (auth()->id() !== $ticket->employee_id && !auth()->user()->isAdmin()) {
            abort(403);
        }

        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        // admin can see all fields but can only edit certain ones
        $users = \App\Models\User::all(); // for assigned_to & escalated_to dropdown
        return view('tickets.edit', compact('ticket', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'status' => 'required|in:open,in progress,closed,escalated',
            'priority' => 'required|in:low,medium,high,critical',
            'assigned_to' => 'nullable|exists:users,id',
            'escalated_to' => 'nullable|exists:users,id',
        ]);

        $ticket->update($data);

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
