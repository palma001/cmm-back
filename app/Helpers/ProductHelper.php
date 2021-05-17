<?php
namespace App\Helpers;

use App\Models\BillElectronicDetail;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\DevolutionDetail;

class ProductHelper
{
    public static function getStock(Product $product)
    {
        return $product
            ->warehouses()
            ->distinct()
            ->get()
            ->map(function(Warehouse $warehouse) use ($product) {
                $product_sale = self::billProduct($product, $warehouse);
                $devolution = self::devolutionProduct($product, $warehouse);
                $warehouseProductEntry = self::inventory($product, 'entry');
                $warehouseProductExit = self::inventory($product, 'exit');

                return [
                    'warehouse_id' => $warehouse->id,
                    'branch_office_id' => $warehouse->branch_office_id,
                    'warehouse_name' => "{$warehouse->description} - {$warehouse->branchOffice->name}",
                    'purchase_price' => $warehouse->purchaseDetails->last()->purchase_price,
                    'sale_price' => $warehouse->purchaseDetails->last()->sale_price,
                    'stock_product' => ($warehouse->purchaseDetails->sum('amount') + $warehouseProductEntry + $devolution) - ($product_sale + $warehouseProductExit)
                ];
            });
    }

    private static function inventory(Product $product, $movement_type)
    {
        return $product->inventories
            ->sum(function ($inventory) use($movement_type) {
                if ($inventory->movement_type === $movement_type) {
                    return $inventory->amount;
                }
            });
    }

    private static function billProduct(Product $product, Warehouse $warehouse)
    {
        return $product->billElectronicDetails
            ->sum(function (BillElectronicDetail $billElectronicDetail) use($warehouse) {
                if (isset($billElectronicDetail->billElectronic->branch_office_id) && $billElectronicDetail->billElectronic->branch_office_id === $warehouse->branch_office_id) {
                    return $billElectronicDetail->amount;
                }
            });
    }

    private static function devolutionProduct(Product $product, Warehouse $warehouse)
    {
        return $product->devolutionDetails
            ->sum(function (DevolutionDetail $devolutionDetail) use($warehouse) {
                if (isset($devolutionDetail->devolution->branch_office_id) && $devolutionDetail->devolution->branch_office_id === $warehouse->branch_office_id) {
                    return $devolutionDetail->amount;
                }
            });
    }
}