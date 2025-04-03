<?php

namespace App\Http\Controllers;

use App\Models\FinanceCategory;
use App\Http\Requests\StoreFinanceCategoryRequest;
use App\Http\Requests\UpdateFinanceCategoryRequest;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FinanceCategoryController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FinanceCategory::all();
        return view('finance_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('finance_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        FinanceCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => 'Ingresos',
            'icon' => 'shopping-cart',
            'color' => 'dark',
        ]);

        return redirect()->route('finance-categories.index')->with('success', __('Categoría financiera creada exitosamente.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(FinanceCategory $financeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinanceCategory $financeCategory)
    {
        return view('finance_categories.edit', compact('financeCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinanceCategory $financeCategory)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
        $financeCategory->update($request->only(['name', 'description']));

        return redirect()->route('finance-categories.index')->with('success', __('Categoría financiera actualizada exitosamente.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinanceCategory $financeCategory)
    {
        $financeCategory->delete();

        return redirect()->route('finance-categories.index')->with('success', __('Categoría financiera eliminada exitosamente.'));
    }
}
