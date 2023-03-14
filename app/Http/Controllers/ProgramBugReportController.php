<?php

namespace App\Http\Controllers;
use App\Enums\BugReportStatus;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Http\Requests\StoreProgramBugReportRequest;

class ProgramBugReportController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramBugReportRequest $request, int $programId)
    {
        $data = $request->validated();

        $data['status'] =  BugReportStatus::NEW->value;

        $program = Program::findOrFail($programId);
        
        $report = $program->bugReports()->create($data);

        return $report;
    }
}
