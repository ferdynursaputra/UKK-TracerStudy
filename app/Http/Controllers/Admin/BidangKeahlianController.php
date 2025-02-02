<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangKeahlian;
use Illuminate\Http\Request;

class BidangKeahlianController extends Controller
{
    public function index()
    {
        $data = BidangKeahlian::all();
        return view('admin.bidang-keahlian.index', compact('data'));
    }

    public function create()
    {
        return view('admin.bidang-keahlian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|max:10',
            'bidang_keahlian' => 'required|max:100',
        ]);

        BidangKeahlian::create($request->all());
        return redirect()->route('bidang-keahlian.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(BidangKeahlian $bidangKeahlian)
    {
        return view('admin.bidang-keahlian.edit', compact('bidangKeahlian'));
    }

    public function update(Request $request, BidangKeahlian $bidangKeahlian)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|max:10',
            'bidang_keahlian' => 'required|max:100',
        ]);

        $bidangKeahlian->update($request->all());
        return redirect()->route('bidang-keahlian.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(BidangKeahlian $bidangKeahlian)
    {
        $bidangKeahlian->delete();
        return redirect()->route('bidang-keahlian.index')->with('success', 'Data berhasil dihapus');
    }
}

