<?php

namespace App\Http\Controllers;

use App\Models\Importer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Importer\ImporterStoreRequest;
use App\Http\Requests\Importer\ImporterUpdateRequest;
use App\Models\Company;

class ImporterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('importer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = Company::get();
        return view('importer.modal', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImporterStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $importer = new Importer();
            $importer = $importer->create([
                'company_name' => $request->input('company_name'),
                'name' => $request->input('name'),
            ]);

            DB::commit();
            return redirect()->route('importer.index')->with('message', 'Importer created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Importer $importer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid)
    {
        try {
            $company = Company::get();
            $importer = Importer::whereUuid($uuid)->first();
            if (empty($importer)) {
                throw new \Exception('Record not found.', 404);
            }

            return view('importer.modal', compact('importer', 'company'));
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
    public function update(ImporterUpdateRequest $request, $uuid)
    {
        try {
            DB::beginTransaction();
            $importer = Importer::whereUuid($uuid)->first();
            $importer = $importer->update([
                'name' => $request->input('name'),
            ]);

            DB::commit();
            return redirect()->route('importer.index')->with('message', 'importer update successfully.');
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
        $importer = Importer::whereUuid($uuid)->first();
        if (empty($importer)) throw new \Exception('Record not found', 404);

        $importer->delete();
        return $this->jsonResponse(['message' => 'importer removed successfully.']);
    }

    public function dataTable(Request $request)
    {
        $importer = Importer::get();
        $dt = DataTables::of($importer);
        $dt->addColumn('company_name', function ($record) {
            return $record->company_name;
    });

        $dt->addColumn('name', function ($record) {
                return $record->name;
        });

        $dt->addColumn('action', function ($row) {

            $updateBtn = '
                <li>
                    <a href="' .  route('importer.edit', $row->uuid) . '" ajax-modal>
                        <em class="icon ni ni-edit"></em>
                        <span>Update</span>
                    </a>
                </li>';

            $deleteBtn = '
                <li>
                    <a href="' . route('importer.destroy', $row->uuid) . '" class="text-danger delete" delete-btn data-datatable="#importer-dt">
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
