<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeStructure;

class FeeStructureController extends Controller
{
    public function index()
    {
        $tuitionFees = FeeStructure::getTuitionFees();
        $uniformFees = FeeStructure::getUniformFees();
        $mtnPayment = FeeStructure::getMtnPayment();
        $airtelPayment = FeeStructure::getAirtelPayment();
        
        return view('admin.fee-structure.index', compact('tuitionFees', 'uniformFees', 'mtnPayment', 'airtelPayment'));
    }

    public function edit($type)
    {
        if (!in_array($type, ['tuition', 'uniform', 'mtn_payment', 'airtel_payment'])) {
            return redirect()->route('admin.fee-structure.index')
                ->with('error', 'Invalid fee structure type.');
        }

        $feeStructure = FeeStructure::where('type', $type)->first();
        
        if (!$feeStructure) {
            // Create default record if doesn't exist
            $defaultData = [
                'tuition' => [
                    'title' => 'Tuition Fees',
                    'image_path' => 'img/tuition_fees.png',
                    'description' => 'Complete breakdown of tuition fees for all classes'
                ],
                'uniform' => [
                    'title' => 'Other Fees (Uniforms & More)',
                    'image_path' => 'img/school_uniform_fees.png',
                    'description' => 'School uniforms, books, and other miscellaneous fees'
                ],
                'mtn_payment' => [
                    'title' => 'MTN Mobile Money',
                    'image_path' => 'img/mtn.png',
                    'description' => 'MTN mobile money payment instructions'
                ],
                'airtel_payment' => [
                    'title' => 'Airtel Money',
                    'image_path' => 'img/airtel.png',
                    'description' => 'Airtel money payment instructions'
                ]
            ];
            
            $feeStructure = FeeStructure::createOrUpdate($type, $defaultData[$type]);
        }
        
        return view('admin.fee-structure.edit', compact('feeStructure'));
    }

    public function update(Request $request, $type)
    {
        if (!in_array($type, ['tuition', 'uniform', 'mtn_payment', 'airtel_payment'])) {
            return redirect()->route('admin.fee-structure.index')
                ->with('error', 'Invalid fee structure type.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $feeStructure = FeeStructure::where('type', $type)->first();
        $data = $request->only(['title', 'description']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($feeStructure && $feeStructure->image_path && file_exists(public_path($feeStructure->image_path))) {
                unlink(public_path($feeStructure->image_path));
            }
            
            $image = $request->file('image');
            $imageName = $type . '_fees_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $data['image_path'] = 'img/' . $imageName;
        }

        FeeStructure::createOrUpdate($type, $data);

        return redirect()->route('admin.fee-structure.index')
            ->with('success', ucfirst($type) . ' fee structure updated successfully!');
    }

    public function destroy($type)
    {
        if (!in_array($type, ['tuition', 'uniform', 'mtn_payment', 'airtel_payment'])) {
            return redirect()->route('admin.fee-structure.index')
                ->with('error', 'Invalid fee structure type.');
        }

        $feeStructure = FeeStructure::where('type', $type)->first();
        
        if ($feeStructure) {
            // Delete image file if exists
            if ($feeStructure->image_path && file_exists(public_path($feeStructure->image_path))) {
                unlink(public_path($feeStructure->image_path));
            }
            
            $feeStructure->delete();
        }

        return redirect()->route('admin.fee-structure.index')
            ->with('success', ucfirst($type) . ' fee structure deleted successfully!');
    }
}
