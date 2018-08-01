<?php

namespace App\Http\Controllers;

use App\Entities\Patient;
use App\Http\Requests\CreatePatientRequest;
use App\Repositories\PatientRepository;
use Illuminate\Http\Request;
use \DataTables;
use Yajra\DataTables\Html\Builder;

class PatientController extends Controller
{

    protected $repository = null;

    protected $builder = null;

    public function __construct(PatientRepository $repository, Builder $builder)
    {
        $this->repository = $repository;
        $this->builder = $builder;
    }

    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Patient::query())->toJson();
        }

        $html = $this->builder->columns($this->repository->getBuilderColumns());

        return view('patient.index', compact('html'));
    }

    /**
     * Create view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store patient
     * @param CreatePatientRequest $request
     */
    public function store(CreatePatientRequest $request)
    {
        $data = $request->all();
        try {
            $patient = $this->repository->create($data);
            if ($patient) {
                return redirect()
                    ->route('patient.index')
                    ->with('success', 'Patient created successfully');
            }
        }
        catch(\Exception $e)
        {
            return redirect()->back()
                ->withErrors($e->getMessage())
                ->withInput();
        }

    }

}
