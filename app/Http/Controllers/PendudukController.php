<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Sex;
use App\Models\Agama;
use App\Models\PendidikanKK;
use App\Models\PendidikanSedang;
use App\Models\Pekerjaan;
use App\Models\StatusKawin;
use App\Models\KkLevel;
use App\Models\WargaNegara;
use App\Models\GolonganDarah;
use App\Models\Jamkesnas;
use App\Models\Cacat;
use App\Models\CaraKb;
use App\Models\Hamil;
use App\Models\KtpEl;
use App\Models\StatusRekam;
use App\Models\StatusDasar;
use App\Models\Asuransi;
use App\Utils\ExcelGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Penduduk::with([
            'jenisKelamin', 'agama', 'pendidikanKk', 'pendidikanSedang',
            'pekerjaan', 'statusKawin', 'kkLevel', 'wargaNegara',
            'golonganDarah', 'jamkesnas', 'cacat', 'caraKb',
            'hamil', 'ktpEl', 'statusRekam', 'statusDasar', 'asuransi'
        ]);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%")
                  ->orWhere('no_kk', 'like', "%{$search}%");
            });
        }

        // Filter by jenis kelamin
        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        $penduduk = $query->latest()->paginate(10)->withQueryString();

        return Inertia::render('Penduduk/Index', [
            'penduduk' => $penduduk,
            'filters' => [
                'search' => $request->get('search', ''),
                'jenis_kelamin' => $request->get('jenis_kelamin', ''),
            ]
        ]);
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('FormInputData/Index', [
            'masterData' => $this->getMasterData()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Data Identitas (Required)
            'no_kk' => 'required|string|max:16',
            'nik' => 'required|string|max:16|unique:penduduk,nik',
            'nama_lengkap' => 'required|string|max:100',
            'alamat' => 'required|string',
            'dusun' => 'nullable|string|max:50',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'jenis_kelamin' => 'required|exists:sex,id',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|exists:agama,id',

            // Data Optional dengan foreign key validation
            'pendidikan_kk' => 'nullable|exists:pendidikan_kk,id',
            'pendidikan_sedang' => 'nullable|exists:pendidikan_sedang,id',
            'pekerjaan' => 'nullable|exists:pekerjaan,id',
            'status_menikah' => 'nullable|exists:status_kawin,id',
            'kk_level' => 'nullable|exists:kk_level,id',
            'warga_negara' => 'nullable|exists:warga_negara,id',
            'nik_ayah' => 'nullable|string|max:16',
            'nama_ayah' => 'nullable|string|max:100',
            'nik_ibu' => 'nullable|string|max:16',
            'nama_ibu' => 'nullable|string|max:100',
            'golongan_darah' => 'nullable|exists:golongan_darah,id',
            'akta_lahir' => 'nullable|string|max:50',
            'dokumen_passport' => 'nullable|string|max:50',
            'tanggal_akhir_passport' => 'nullable|date',
            'akta_perkawinan' => 'nullable|string|max:50',
            'tanggal_perkawinan' => 'nullable|date',
            'akta_perceraian' => 'nullable|string|max:50',
            'tanggal_perceraian' => 'nullable|date',
            'dokumen_kitas' => 'nullable|string|max:50',
            'jamkesnas' => 'nullable|exists:jamkesnas,id',
            'cacat' => 'nullable|exists:cacat,id',
            'cara_kb' => 'nullable|exists:cara_kb,id',
            'hamil' => 'nullable|exists:hamil,id',
            'ktp_el' => 'nullable|exists:ktp_el,id',
            'status_rekam' => 'nullable|exists:status_rekam,id',
            'status_dasar' => 'nullable|exists:status_dasar,id',
            'asuransi' => 'nullable|exists:asuransi,id',
        ]);

        Penduduk::create($validated);

        return Redirect::route('penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        $penduduk->load([
            'jenisKelamin', 'agama', 'pendidikanKk', 'pendidikanSedang',
            'pekerjaan', 'statusKawin', 'kkLevel', 'wargaNegara',
            'golonganDarah', 'jamkesnas', 'cacat', 'caraKb',
            'hamil', 'ktpEl', 'statusRekam', 'statusDasar', 'asuransi'
        ]);

        return Inertia::render('Penduduk/Show', [
            'penduduk' => $penduduk
        ]);
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        // Load all relationships untuk mendapatkan data lengkap
        $penduduk->load([
            'jenisKelamin', 'agama', 'pendidikanKk', 'pendidikanSedang',
            'pekerjaan', 'statusKawin', 'kkLevel', 'wargaNegara',
            'golonganDarah', 'jamkesnas', 'cacat', 'caraKb',
            'hamil', 'ktpEl', 'statusRekam', 'statusDasar', 'asuransi'
        ]);

        return Inertia::render('Penduduk/Edit', [
            'penduduk' => $penduduk,
            'masterData' => $this->getMasterData()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $validated = $request->validate([
            // Data Identitas (Required)
            'no_kk' => 'required|string|max:16',
            'nik' => 'required|string|max:16|unique:penduduk,nik,' . $penduduk->id,
            'nama_lengkap' => 'required|string|max:100',
            'alamat' => 'required|string',
            'dusun' => 'nullable|string|max:50',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'jenis_kelamin' => 'required|exists:sex,id',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|exists:agama,id',

            // Data Optional dengan foreign key validation
            'pendidikan_kk' => 'nullable|exists:pendidikan_kk,id',
            'pendidikan_sedang' => 'nullable|exists:pendidikan_sedang,id',
            'pekerjaan' => 'nullable|exists:pekerjaan,id',
            'status_menikah' => 'nullable|exists:status_kawin,id',
            'kk_level' => 'nullable|exists:kk_level,id',
            'warga_negara' => 'nullable|exists:warga_negara,id',
            'nik_ayah' => 'nullable|string|max:16',
            'nama_ayah' => 'nullable|string|max:100',
            'nik_ibu' => 'nullable|string|max:16',
            'nama_ibu' => 'nullable|string|max:100',
            'golongan_darah' => 'nullable|exists:golongan_darah,id',
            'akta_lahir' => 'nullable|string|max:50',
            'dokumen_passport' => 'nullable|string|max:50',
            'tanggal_akhir_passport' => 'nullable|date',
            'akta_perkawinan' => 'nullable|string|max:50',
            'tanggal_perkawinan' => 'nullable|date',
            'akta_perceraian' => 'nullable|string|max:50',
            'tanggal_perceraian' => 'nullable|date',
            'dokumen_kitas' => 'nullable|string|max:50',
            'jamkesnas' => 'nullable|exists:jamkesnas,id',
            'cacat' => 'nullable|exists:cacat,id',
            'cara_kb' => 'nullable|exists:cara_kb,id',
            'hamil' => 'nullable|exists:hamil,id',
            'ktp_el' => 'nullable|exists:ktp_el,id',
            'status_rekam' => 'nullable|exists:status_rekam,id',
            'status_dasar' => 'nullable|exists:status_dasar,id',
            'asuransi' => 'nullable|exists:asuransi,id',
        ]);

        $penduduk->update($validated);

        return Redirect::route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();

        return Redirect::route('penduduk.index')->with('success', 'Data penduduk berhasil dihapus.');
    }

    /**
     * Export penduduk data to Excel
     */
    public function export(Request $request)
    {
        $search = $request->get('search');
        $jenisKelamin = $request->get('jenis_kelamin');

        $query = Penduduk::query();

        // Apply filters if provided
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%")
                  ->orWhere('no_kk', 'like', "%{$search}%");
            });
        }

        if ($jenisKelamin) {
            $query->where('jenis_kelamin', $jenisKelamin);
        }

        $penduduk = $query->orderBy('nama_lengkap')->get();

        // Prepare headers
        $headers = [
            'Alamat',
            'Dusun',
            'RW',
            'RT',
            'Nama Lengkap',
            'No. KK',
            'NIK',
            'Sex',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Agama',
            'Pendidikan KK',
            'Pendidikan Sedang',
            'Pekerjaan',
            'Status Menikah',
            'Hubungan KK',
            'Kewarganegaraan',
            'NIK Ayah',
            'Nama Ayah',
            'NIK Ibu',
            'Nama Ibu',
            'Golongan Darah',
            'Akta Lahir',
            'Dokumen Passport',
            'Tanggal Akhir Passport',
            'Akta Perkawinan',
            'Tanggal Perkawinan',
            'Akta Perceraian',
            'Tanggal Perceraian',
            'Dokumen KITAS',
            'JAMKESNAS',
            'Cacat',
            'Cara KB',
            'Hamil',
            'KTP Elektronik',
            'Status Rekam',
            'Status Dasar',
            'Asuransi',
            'Dibuat Pada',
            'Diperbarui Pada'
        ];

        // Prepare data
        $data = [];
        $no = 1;
        foreach ($penduduk as $item) {
            $data[] = [
                $item->alamat,
                $item->dusun ?: '-',
                (string)($item->rw ?: '-'), // Force string type for RW
                (string)($item->rt ?: '-'), // Force string type for RT
                $item->nama_lengkap,
                $item->no_kk,
                $item->nik,
                (string)$item->jenis_kelamin, // Force string untuk ID jenis kelamin
                $item->tempat_lahir,
                $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d/m/Y') : '',
                $item->agama,
                $item->pendidikan_kk,
                $item->pendidikan_sedang,
                $item->pekerjaan,
                $item->status_menikah,
                $item->kk_level,
                $item->warga_negara,
                $item->nik_ayah,
                $item->nama_ayah,
                $item->nik_ibu,
                $item->nama_ibu,
                $item->golongan_darah,
                $item->akta_lahir,
                $item->dokumen_passport,
                $item->tanggal_akhir_passport ? \Carbon\Carbon::parse($item->tanggal_akhir_passport)->format('d/m/Y') : '',
                $item->akta_perkawinan,
                $item->tanggal_perkawinan ? \Carbon\Carbon::parse($item->tanggal_perkawinan)->format('d/m/Y') : '',
                $item->akta_perceraian,
                $item->tanggal_perceraian ? \Carbon\Carbon::parse($item->tanggal_perceraian)->format('d/m/Y') : '',
                $item->dokumen_kitas,
                $item->jamkesnas ? 'Ya' : 'Tidak',
                $item->cacat ? 'Ya' : 'Tidak',
                $item->cara_kb,
                $item->hamil ? 'Ya' : 'Tidak',
                $item->ktp_el ? 'Ya' : 'Tidak',
                $item->status_rekam,
                $item->status_dasar,
                $item->asuransi,
                $item->created_at ? $item->created_at->format('d/m/Y H:i') : '',
                $item->updated_at ? $item->updated_at->format('d/m/Y H:i') : ''
            ];
        }

        $filename = 'Data-Penduduk-SIPDES-KROCOK-' . date('Y-m-d-H-i-s') . '.xls';

        $excel = new ExcelGenerator($data, $headers, $filename);
        $excel->download();
    }

    /**
     * Get dashboard statistics
     */
    public function getStatistics()
    {
        $stats = [
            // Total Penduduk
            'total_penduduk' => Penduduk::count(),

            // Gender Statistics
            'total_pria' => Penduduk::where('jenis_kelamin', 'L')->count(),
            'total_wanita' => Penduduk::where('jenis_kelamin', 'P')->count(),

            // Age Groups
            'usia_0_5' => Penduduk::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 0 AND 5')->count(),
            'usia_6_12' => Penduduk::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 6 AND 12')->count(),
            'usia_13_18' => Penduduk::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 13 AND 18')->count(),
            'usia_19_35' => Penduduk::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 19 AND 35')->count(),
            'usia_36_60' => Penduduk::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 36 AND 60')->count(),
            'usia_60_plus' => Penduduk::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) > 60')->count(),

            // Family Statistics
            'total_kk' => Penduduk::distinct('no_kk')->count(),
            'total_kepala_keluarga' => Penduduk::where('kk_level', 'Kepala Keluarga')->count(),

            // Religion Statistics
            'agama_stats' => Penduduk::selectRaw('agama, COUNT(*) as total')
                ->whereNotNull('agama')
                ->groupBy('agama')
                ->pluck('total', 'agama')
                ->toArray(),

            // Education Statistics
            'pendidikan_stats' => Penduduk::selectRaw('pendidikan_kk, COUNT(*) as total')
                ->whereNotNull('pendidikan_kk')
                ->groupBy('pendidikan_kk')
                ->pluck('total', 'pendidikan_kk')
                ->toArray(),

            // Marital Status
            'status_kawin' => Penduduk::selectRaw('status_menikah, COUNT(*) as total')
                ->whereNotNull('status_menikah')
                ->groupBy('status_menikah')
                ->pluck('total', 'status_menikah')
                ->toArray(),

            // Work Status
            'pekerjaan_stats' => Penduduk::selectRaw('pekerjaan, COUNT(*) as total')
                ->whereNotNull('pekerjaan')
                ->groupBy('pekerjaan')
                ->pluck('total', 'pekerjaan')
                ->toArray(),

            // Health Statistics
            'total_jamkesnas' => Penduduk::where('jamkesnas', true)->count(),
            'total_cacat' => Penduduk::where('cacat', true)->count(),
            'total_ktp_el' => Penduduk::where('ktp_el', true)->count(),

            // Citizenship
            'warga_negara_stats' => Penduduk::selectRaw('warga_negara, COUNT(*) as total')
                ->whereNotNull('warga_negara')
                ->groupBy('warga_negara')
                ->pluck('total', 'warga_negara')
                ->toArray(),
        ];

        return $stats;
    }

    /**
     * Get all master data for dropdowns
     */
    private function getMasterData()
    {
        return [
            'sex' => Sex::all(['id', 'name']),
            'agama' => Agama::all(['id', 'name']),
            'pendidikan_kk' => PendidikanKK::all(['id', 'name']),
            'pendidikan_sedang' => PendidikanSedang::all(['id', 'name']),
            'pekerjaan' => Pekerjaan::all(['id', 'name']),
            'status_kawin' => StatusKawin::all(['id', 'name']),
            'kk_level' => KkLevel::all(['id', 'name']),
            'warga_negara' => WargaNegara::all(['id', 'name']),
            'golongan_darah' => GolonganDarah::all(['id', 'name']),
            'jamkesnas' => Jamkesnas::all(['id', 'name']),
            'cacat' => Cacat::all(['id', 'name']),
            'cara_kb' => CaraKb::all(['id', 'name']),
            'hamil' => Hamil::all(['id', 'name']),
            'ktp_el' => KtpEl::all(['id', 'name']),
            'status_rekam' => StatusRekam::all(['id', 'name']),
            'status_dasar' => StatusDasar::all(['id', 'name']),
            'asuransi' => Asuransi::all(['id', 'name']),
        ];
    }
}
