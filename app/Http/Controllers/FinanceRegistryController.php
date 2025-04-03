<?php

namespace App\Http\Controllers;

use App\Models\FinanceRegistry;
use App\Models\FinanceCategory;
use Illuminate\Http\Request;

class FinanceRegistryController extends Controller
{
    public function index()
    {

        $financeRegistries = FinanceRegistry::with('financeCategory')->get();
        $totalIngresos = FinanceRegistry::where('type', 'Ingreso')->sum('amount');
        $totalEgresos = FinanceRegistry::where('type', 'Egreso')->sum('amount');
        $balance = $totalIngresos - $totalEgresos;

        return view('finance_registries.index', compact('financeRegistries', 'balance'));
    }

    public function create()
    {
        $categories = FinanceCategory::all();
        return view('finance_registries.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'type' => 'required|string|in:Ingreso,Egreso',
            'amount' => 'required|numeric',
            'finance_category_id' => 'required|exists:finance_categories,id',
        ]);

        FinanceRegistry::create($request->all());
        return redirect()->route('finance-registries.index')->with('success', 'Finance registry created successfully.');
    }

    public function show(FinanceRegistry $financeRegistry)
    {
        return view('finance_registries.show', compact('financeRegistry'));
    }

    public function edit(FinanceRegistry $financeRegistry)
    {
        $categories = FinanceCategory::all();
        return view('finance_registries.edit', compact('financeRegistry', 'categories'));
    }

    public function update(Request $request, FinanceRegistry $financeRegistry)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'type' => 'required|string|in:Ingreso,Egreso',
            'amount' => 'required|numeric',
            'finance_category_id' => 'required|exists:finance_categories,id',
        ]);

        $financeRegistry->update($request->all());
        return redirect()->route('finance_registries.index')->with('success', 'Finance registry updated successfully.');
    }

    public function destroy(FinanceRegistry $financeRegistry)
    {
        $financeRegistry->delete();
        return redirect()->route('finance_registries.index')->with('success', 'Finance registry deleted successfully.');
    }
}
