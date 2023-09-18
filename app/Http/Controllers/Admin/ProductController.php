<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use App\Models\Category;
    use App\Models\Inventory;

    class ProductController extends Controller
    {
        public function index()
        {
            // Get all products with their categories
            $products = Product::with('category')->get();

            return view('admin.products.index', compact('products'));
        }

        public function create()
        {
            // Get all categories for dropdown
            $categories = Category::all();
            return view('admin.products.create', compact('categories'));
        }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|min:3',
                'description' => 'required',
                'price' => 'required|numeric',
                'sku' => 'required|unique:products,sku',
                'category_id' => 'required|exists:categories,id',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'color' => 'nullable|string',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $imagePath = '/images/' . $imageName;
            } else {
                $imagePath = null;
            }

            // Create a new product
            $product = Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'sku' => $validatedData['sku'],
                'category_id' => $validatedData['category_id'],
                'image' => $imagePath,
                'color' => $validatedData['color'],
            ]);

            // Set the initial status to "In Stock"
            $status = 'in_stock';

            // Check if the status is specified in the request
            if ($request->has('status') && $request->input('status') === 'out_of_stock') {
                $status = 'out_of_stock';
            }

            // Create an inventory record for the new product
            Inventory::create([
                'product_id' => $product->id,
                'status' => $status,
                'quantity' => 0, // Set default quantity to 0
            ]);

            return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
        }

//        public function show($id)
//        {
//            $product = Product::findOrFail($id);
//
//            return view('admin.products.show', compact('product'));
//        }

        public function edit($id)
        {
            $product = Product::findOrFail($id);
            $categories = Category::all();

            return view('admin.products.edit', compact('product', 'categories'));
        }


        public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'name' => 'required|min:3',
                'description' => 'required',
                'price' => 'required|numeric',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'color' => 'nullable|string',
            ]);

            $product = Product::findOrFail($id);
            $product->name = $validatedData['name'];
            $product->description = $validatedData['description'];
            $product->price = $validatedData['price'];
            $product->category_id = $validatedData['category_id'];
            $product->color = $validatedData['color'];

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $product->image = '/images/' . $imageName;
            }

            $product->save();

            // Update the associated inventory record
            $status = 'in_stock';

            // Check if the status is specified in the request
            if ($request->has('status') && $request->input('status') === 'out_of_stock') {
                $status = 'out_of_stock';
            }

            $inventory = Inventory::where('product_id', $product->id)->first();
            $inventory->status = $status;
            $inventory->save();

            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
        }

        public function destroy($id)
        {
            $product = Product::findOrFail($id);

            // Delete associated inventory record
            Inventory::where('product_id', $product->id)->delete();

            // Delete the product
            $product->delete();

            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
        }

    }
