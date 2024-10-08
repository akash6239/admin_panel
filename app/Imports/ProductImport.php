<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Log the row data for debugging
        Log::info('Import Row Data:', $row);
        
        // Validate and handle missing or null values
        $productCategory = isset($row[0]) ? trim($row[0]) : null;
        $productName = isset($row[1]) ? trim($row[1]) : null;
        $productComposition = isset($row[2]) ? trim($row[2]) : null;
        $productPackaging = isset($row[3]) ? trim($row[3]) : null;

        // Check if product_name is not null or empty
        if (empty($productName)) {
            Log::warning('Row skipped due to missing or empty product_name:', $row);
            return null; // Skip this row
        }

        $productSlug = Str::slug($productName);

        // Check if a product with the same combination of fields already exists
        $existingProduct = Product::where('product_name', $productName)
            ->where('product_slug', $productSlug)
            ->where('product_composition', $productComposition)
            ->where('product_packaging', $productPackaging)
            ->first();

        if ($existingProduct) {
            Log::info('Row skipped due to existing product:', $row);
            return null; // Skip this row
        }

        // Create the product
        $product = Product::create([
            'product_name'        => $productName,
            'product_slug'        => $productSlug,
            'product_composition' => $productComposition,
            'product_packaging'   => $productPackaging,
        ]);

        // Create product category association if available
        if (!empty($productCategory) && is_numeric($productCategory)) {
            // Convert the category_id to an integer
            $categoryId = (int) $productCategory;
        
            ProductCategory::create([
                'product_id' => $product->id,
                'category_id' => $categoryId,
            ]);
        } else {
            // Log or handle the error for invalid category ID
            Log::warning('Invalid category ID provided:', ['category' => $productCategory]);
        }   

        // Return the product instance
        return $product;
    }
}
