<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;



class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('company.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.modal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $company = new Company();
            $company = $company->create([
                'name' => $request->input('name'),
            ]);

            DB::commit();
            return redirect()->route('company.index')->with('message', 'Company created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid)
    {
        try {
            $company = Company::whereUuid($uuid)->first();
            if (empty($company)) {
                throw new \Exception('Record not found.', 404);
            }

            return view('company.modal', compact('company'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdateRequest $request, $uuid)
    {
        try {
            DB::beginTransaction();
            $company = Company::whereUuid($uuid)->first();
            $company = $company->update([
                'name' => $request->input('name'),
            ]);

            DB::commit();
            return redirect()->route('company.index')->with('message', 'Company update successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {
        $company = Company::whereUuid($uuid)->first();
        if (empty($company)) throw new \Exception('Record not found', 404);

        $company->delete();
        return $this->jsonResponse(['message' => 'Company removed successfully.']);
    }

    public function dataTable(Request $request)
    {
        $company = Company::get();
        $dt = DataTables::of($company);

        $dt->addColumn('name', function ($record) {
                return $record->name;
        });

        $dt->addColumn('action', function ($row) {

            $updateBtn = '
                <li>
                    <a href="' .  route('company.edit', $row->uuid) . '" ajax-modal>
                        <em class="icon ni ni-edit"></em>
                        <span>Update</span>
                    </a>
                </li>';

            $deleteBtn = '
                <li>
                    <a href="' . route('company.destroy', $row->uuid) . '" class="text-danger delete" delete-btn data-datatable="#company-dt">
                        <em class="icon ni ni-trash"></em>
                        <span>Delete</span>
                    </a>
                </li>';

            return '
                <ul class="nk-tb-actions gx-1">
                    <li>
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown">
                                <em class="icon ni ni-more-h"></em>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="link-list-opt no-bdr">
                                    ' . $updateBtn . '
                                    ' . $deleteBtn . '
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            ';
        });
        $dt->addIndexColumn();
        $dt->rawColumns(['action', 'name']);

        return $dt->make(true);
    }
}
