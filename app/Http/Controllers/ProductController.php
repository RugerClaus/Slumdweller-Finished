<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function create(Request $request)
    {
        $inputFields = ['name', 'type', 'description', 'qty', 'price'];
        $data = [];
        foreach ($inputFields as $field) {
            $data[$field] = $request->input($field);
        }
        $data['created_at'] = now();

        $hasatts = $request->hasatts;

        $options = [];
        for ($i = 1; $i <= 50; $i++) {
            $option = $request->input("option$i");
            if (!empty($option)) {
                $options[] = $option;
            }
        }

        $product = new Product();
        $imageFields = ['image1', 'image2', 'image3', 'image4', 'image5'];
        $imagePaths = [];
        foreach ($imageFields as $field) {
            $file = $request->file($field);
            if (!empty($file)) {
                $filename = random_int(10000000, 1000000000) . '.' . $file->extension();
                $file->move(public_path('assets/images'), $filename);
                $imagePaths[$field] = 'assets/images/' . $filename;
            } else {
                $imagePaths[$field] = 'no image'; // Set the column value to null if no file is uploaded
            }
        }

        foreach ($data as $column => $value) {
            $product->$column = $value;
        }

        foreach ($imagePaths as $column => $value) {
            $product->$column = $value;
        }

        if ($hasatts === "yes") {
            $itemData = [
                'attributes' => $options
            ];
            $product->item_data = json_encode($itemData);
        }

        $product->save();

        return redirect()->intended('product_manager');
    }

    private function updateProduct($id, $data)
    {
        $product = Product::find($id);
        foreach ($data as $column => $value) {
            $product->$column = $value;
        }
        $product->save();
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $inputFields = ['name', 'type', 'description', 'qty', 'price'];
        $data = [];
        foreach ($inputFields as $field) {
            $data[$field] = $request->input($field);
        }

        $this->updateProduct($id, $data);

        return redirect('/product_manager');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        Product::destroy($id);

        return redirect()->intended('product_manager');
    }
}
