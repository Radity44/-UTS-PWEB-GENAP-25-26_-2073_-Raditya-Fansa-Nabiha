<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:100',
            'password' => 'required|string'
        ]);

        session([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'username' => $request->input('username'),
        ]);

        return redirect()->route('beranda');
    }

    public function beranda(Request $request)
    {
        $rencana = session('rencana', []);

        $selesai = collect($rencana)->where('status', 'selesai');
        $pribadi = collect($rencana)->where('kategori', 'PribadiGwej')->where('status', 'belum');
        $team = collect($rencana)->where('kategori', 'TeamGwej')->where('status', 'belum');

        $nama_lengkap = session('nama_lengkap', null);
        $username = session('username', null);

        return view('beranda', compact('nama_lengkap', 'username', 'selesai', 'pribadi', 'team'));
    }

    public function profil()
    {
        $rencana = session('rencana', []);
        $totalPribadi = collect($rencana)->where('kategori', 'PribadiGwej')->count();
        $totalTeam = collect($rencana)->where('kategori', 'TeamGwej')->count();
        $totalSelesai = collect($rencana)->where('status', 'selesai')->count();

        $nama_lengkap = session('nama_lengkap', null);
        $username = session('username', null);

        return view('profil', compact('nama_lengkap', 'username', 'totalPribadi', 'totalTeam', 'totalSelesai'));
    }

    public function myrencanaku(Request $request)
    {
        $rencana = session('rencana', []);
        return view('myrencanaku', compact('rencana'));
    }

    public function addRencana(Request $request)
    {
        $rencana = session('rencana', []);
        $rencana[] = [
            'judul' => $request->input('judul'),
            'kategori' => $request->input('kategori'),
            'status' => 'belum',
        ];
        session(['rencana' => $rencana]);
        return redirect()->route('rencana');
    }

    public function toggleRencana($index)
    {
        $rencana = session('rencana', []);
        if (isset($rencana[$index])) {
            $rencana[$index]['status'] = $rencana[$index]['status'] == 'selesai' ? 'belum' : 'selesai';
            session(['rencana' => $rencana]);
        }
        return back();
    }

    public function deleteRencana($index)
    {
        $rencana = session('rencana', []);
        if (isset($rencana[$index])) {
            unset($rencana[$index]);
            session(['rencana' => array_values($rencana)]);
        }
        return back();
    }
}
