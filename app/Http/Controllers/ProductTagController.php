<?php

namespace App\Http\Controllers;

use App\Models\ProductTag;
use Illuminate\Http\Request;

/**
 * Class ProductTagController
 * @package App\Http\Controllers
 */
class ProductTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTags = ProductTag::paginate();

        return view('product-tag.index', compact('productTags'))
            ->with('i', (request()->input('page', 1) - 1) * $productTags->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTag = new ProductTag();
        return view('product-tag.create', compact('productTag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductTag::$rules);

        $productTag = ProductTag::create($request->all());

        return redirect()->route('product-tags.index')
            ->with('success', 'ProductTag created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productTag = ProductTag::find($id);

        return view('product-tag.show', compact('productTag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productTag = ProductTag::find($id);

        return view('product-tag.edit', compact('productTag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductTag $productTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductTag $productTag)
    {
        request()->validate(ProductTag::$rules);

        $productTag->update($request->all());

        return redirect()->route('product-tags.index')
            ->with('success', 'ProductTag updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productTag = ProductTag::find($id)->delete();

        return redirect()->route('product-tags.index')
            ->with('success', 'ProductTag deleted successfully');
    }
}
