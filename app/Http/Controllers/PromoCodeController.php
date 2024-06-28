<?php

namespace App\Http\Controllers;

use App\Imports\PromoCodes2Import;
use App\Imports\PromoCodesImport;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;
class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Form.CodeUploadView');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        return $request->file('code')
        // Store the uploaded file in the storage/app/public directory
        $path = $request->file('code')->store('public');

        // Get the full path to the stored file
        $filePath = storage_path('app/' . $path);

        // Read the CSV file and process the first column
        $firstColumnValues = [];
        if (($handle = fopen($filePath, 'r')) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                $code = $data[0]; // Assuming the first column is index 0

                if (!PromoCode::query()->where('code', $code)->exists())
                {
                    $code2 = new PromoCode();
                    $code2->code = $code;
                    $code2->save();
                }
            }
            fclose($handle);
        } else {
            throw ValidationException::withMessages(['file' => 'Error reading the file.']);
        }

        return redirect(route('code.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PromoCode $promoCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PromoCode $promoCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PromoCode $promoCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromoCode $promoCode)
    {
        //
    }
}
