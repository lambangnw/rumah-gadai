<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display the reports page for supervisor.
     */
    public function index()
    {
        // Data dummy atau logika laporan bisa ditambahkan di sini
        return view('supervisor.reports.index');
    }
} 