<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LegalDocumentController extends Controller
{
    /**
     * Peta dokumen resmi Destinara.
     */
    protected array $documents = [
        'tos' => [
            'title_id' => 'Syarat & Ketentuan Layanan',
            'title_en' => 'Terms of Service',
            'filename' => 'Destinara-ToS-v1.0-Final.pdf',
            'version'  => '1.0 (Final)',
            'updated'  => 'September 2026',
        ],
        'privacy-id' => [
            'title_id' => 'Kebijakan Privasi',
            'title_en' => 'Privacy Policy (Bahasa Indonesia)',
            'filename' => 'Destinara-KebijakanPrivasi-v1.0.pdf',
            'version'  => '1.0',
            'updated'  => 'September 2026',
        ],
        'privacy-en' => [
            'title_id' => 'Privacy Policy',
            'title_en' => 'Privacy Policy (English Version)',
            'filename' => 'Destinara-PrivacyPolicy-v1.0.pdf',
            'version'  => '1.0',
            'updated'  => 'September 2026',
        ],
    ];

    /**
     * Halaman Syarat & Ketentuan (Terms of Service).
     */
    public function terms()
    {
        $doc = $this->documents['tos'];

        return view('legal.terms', [
            'doc' => $doc,
            'streamUrl' => route('legal.stream', 'tos'),
            'downloadUrl' => route('legal.download', 'tos'),
        ]);
    }

    /**
     * Halaman Kebijakan Privasi (Bahasa Indonesia).
     */
    public function privacyId()
    {
        $doc = $this->documents['privacy-id'];

        return view('legal.privacy', [
            'doc' => $doc,
            'lang' => 'id',
            'streamUrl' => route('legal.stream', 'privacy-id'),
            'downloadUrl' => route('legal.download', 'privacy-id'),
        ]);
    }

    /**
     * Halaman Privacy Policy (English Version).
     */
    public function privacyEn()
    {
        $doc = $this->documents['privacy-en'];

        return view('legal.privacy', [
            'doc' => $doc,
            'lang' => 'en',
            'streamUrl' => route('legal.stream', 'privacy-en'),
            'downloadUrl' => route('legal.download', 'privacy-en'),
        ]);
    }

    /**
     * Halaman Kebijakan Privasi (Privacy Policy) dengan pemilih bahasa ID / EN query param.
     */
    public function privacy(Request $request)
    {
        $lang = $request->query('lang', 'id');
        if (!in_array($lang, ['id', 'en'])) {
            $lang = 'id';
        }

        return $lang === 'en' ? $this->privacyEn() : $this->privacyId();
    }

    /**
     * Stream file PDF ke browser dengan header Content-Disposition: inline (tidak auto-download).
     */
    public function stream(string $type): BinaryFileResponse
    {
        $path = $this->resolveFilePath($type);
        $doc = $this->documents[$type];

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $doc['filename'] . '"',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }

    /**
     * Download file PDF secara langsung.
     */
    public function download(string $type): BinaryFileResponse
    {
        $path = $this->resolveFilePath($type);
        $doc = $this->documents[$type];

        return response()->download($path, $doc['filename'], [
            'Content-Type' => 'application/pdf',
        ]);
    }

    /**
     * Mencari path file fisik dokumen.
     */
    protected function resolveFilePath(string $type): string
    {
        if (!array_key_exists($type, $this->documents)) {
            abort(404, 'Dokumen resmi tidak ditemukan.');
        }

        $filename = $this->documents[$type]['filename'];

        // Cek public/documents terlebih dahulu, lalu fallback ke document/ di root
        $candidates = [
            public_path('documents/' . $filename),
            base_path('document/' . $filename),
        ];

        foreach ($candidates as $candidate) {
            if (file_exists($candidate)) {
                return $candidate;
            }
        }

        abort(404, 'Berkas fisik PDF dokumen belum diunggah ke server.');
    }
}
