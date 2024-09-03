<?php

namespace App\Imports;

use App\Models\Product;
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
        $productcategory = isset($row[0]) ? trim($row[0]) : null;
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
       $exists = Product::where('product_name', $productName)
       ->where('product_slug', $productSlug)
       ->where('product_category', $productcategory)
       ->where('product_composition', $productComposition)
       ->where('product_packaging', $productPackaging)
       ->exists();

        if ($exists) {
            Log::info('Row skipped due to existing product:', $row);
            return null; // Skip this row
        }
        return new Product([
            'product_name'        => $productName,
            'product_slug'        => $productSlug,
            'product_category' =>  $productcategory,
            'product_composition' => $productComposition,
            'product_packaging'   => $productPackaging,
        ]);
    }
}
