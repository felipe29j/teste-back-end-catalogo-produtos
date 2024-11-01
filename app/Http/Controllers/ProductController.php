<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::query();

    // Busca por nome
    if ($request->has('name') && $request->name != '') {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    // Busca por categoria
    if ($request->has('category') && $request->category != '') {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->category . '%');
        });
    }

    // Busca por ID
    if ($request->has('id') && $request->id != '') {
        $query->where('id', $request->id);
    }

    // Filtro para produtos com ou sem imagem
    if ($request->has('has_image')) {
        if ($request->has_image == '1') {
            $query->whereNotNull('image_url'); // Produtos com imagem
        } elseif ($request->has_image == '0') {
            $query->whereNull('image_url'); // Produtos sem imagem
        }
    }

    $products = $query->get();
    return view('products.index', compact('products'));
}

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:products,name', 
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
        ], [
            'name.unique' => 'O nome do produto já está em uso. Por favor, escolha outro nome.',
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('products.index')->with('status', 'Produto criado com sucesso!');
    }
    

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|unique:products,name,' . $product->id, 
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }

    public function show()
    {
        return view('products.import');
    }
    public function import(Request $request)
    {
        $productId = $request->input('product_id');
    
        $command = $productId ? 'products:import --id=' . $productId : 'products:import';

        Artisan::call($command);

        if ($output) {
            return redirect()->route('products.index')->with('status', 'Produto importado com sucesso');
        } else {
            return redirect()->route('products.index')->with('error', 'Erro ao importar produtos');
        }
    }
    
}

