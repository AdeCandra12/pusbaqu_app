<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Faq;
use App\Models\News;
use App\Models\Tutor;
use App\Models\Slider;
use App\Models\Schedule;
use App\Models\StudyProgram;
use App\Models\TestCategory;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\ServiceCategory;
use App\Models\TestRegistration;
use App\Models\CourseRegistration;
use App\Models\TranslationCategory;
use Illuminate\Support\Facades\Auth;
use App\Models\TranslationRegistration;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index', [
            'sliders' => Slider::latest()->get(),
            'categories' => ServiceCategory::take(5)->get(),
            'news' => News::latest()->take(5)->get(),
            'tutors' => Tutor::latest()->get(),
            'faqs' => Faq::latest()->get(),
        ]);
    }

    public function form($slug)
    {
        $category = ServiceCategory::where('slug', $slug)->firstOrFail();
        $testCategories = TestCategory::all();
        $courseCategories = CourseCategory::all();
        $translationCategories = TranslationCategory::all();
        $studyPrograms = StudyProgram::all();

        $schedules = Schedule::all()->map(function ($sched) {
            $sched->formatted_date = Carbon::parse($sched->test_date)
                ->locale('id')
                ->translatedFormat('l, d F Y');
            return $sched;
        });

        return match ($slug) {
            'tes-kemampuan-bahasa-inggris' => view('front.forms.test', compact('category', 'testCategories', 'schedules', 'studyPrograms')),
            'kursus-bahasa-asing' => view('front.forms.course', compact('category', 'courseCategories', 'studyPrograms')),
            'penerjemahan-dokumen' => view('front.forms.translate', compact('category', 'translationCategories')),
            default => abort(404)
        };
    }

    public function submit(Request $request, $slug)
    {
        $category = ServiceCategory::where('slug', $slug)->firstOrFail();

        if ($slug === 'tes-kemampuan-bahasa-inggris') {
            $data = $request->validate([
                'test_category_id' => 'required|exists:test_categories,id',
                'study_program_id' => 'required|exists:study_programs,id',
                'schedule_id' => 'required|exists:schedules,id',
                'purpose' => 'required|string',
            ]);
            $data['user_id'] = Auth::id();
            $data['status'] = 'Menunggu Pembayaran';
            TestRegistration::create($data);
        } elseif ($slug === 'kursus-bahasa-asing') {
            $data = $request->validate([
                'course_category_id' => 'required|exists:course_categories,id',
                'study_program_id' => 'required|exists:study_programs,id',
            ]);
            $data['user_id'] = Auth::id();
            $data['status'] = 'Menunggu Pembayaran';
            CourseRegistration::create($data);
        } elseif ($slug === 'penerjemahan-dokumen') {
            $data = $request->validate([
                'translation_category_id' => 'required|exists:translation_categories,id',
                'document_file' => 'required|file|mimes:jpeg,png,pdf,doc,docx|max:2048',
            ]);
            $data['user_id'] = Auth::id();
            $data['status'] = 'Menunggu Pembayaran';
            $data['document_file'] = $request->file('document_file')->store('document_files', 'public');
            TranslationRegistration::create($data);
        } else {
            abort(404);
        }
        return redirect()->route('front.history')->with('success', 'Pendaftaran berhasil!');
    }

    public function history()
    {
        $userId = Auth::id();

        $testRegistrations = TestRegistration::where('user_id', $userId)->with(['testCategory', 'studyProgram', 'schedule'])->get();
        $courseRegistrations = CourseRegistration::where('user_id', $userId)->with(['courseCategory', 'studyProgram'])->get();
        $translationRegistrations = TranslationRegistration::where('user_id', $userId)->with('translationCategory')->get();

        return view('front.history', compact('testRegistrations', 'courseRegistrations', 'translationRegistrations'));
    }

    public function detail($slug, $id)
    {
        if ($slug === 'tes-kemampuan-bahasa-inggris') {
            $registration = TestRegistration::with(['registrant', 'testCategory', 'studyProgram', 'schedule'])->findOrFail($id);
        } elseif ($slug === 'kursus-bahasa-asing') {
            $registration = CourseRegistration::with(['registrant', 'courseCategory', 'studyProgram'])->findOrFail($id);
        } elseif ($slug === 'penerjemahan-dokumen') {
            $registration = TranslationRegistration::with(['registrant', 'translationCategory'])->findOrFail($id);
        } else {
            abort(404);
        }

        return view('front.detail', compact('registration', 'slug'));
    }

    public function showPayproof($slug, $id)
    {
        if ($slug === 'tes-kemampuan-bahasa-inggris') {
            $registration = TestRegistration::with(['registrant', 'testCategory', 'studyProgram', 'schedule'])->findOrFail($id);
        } elseif ($slug === 'kursus-bahasa-asing') {
            $registration = CourseRegistration::with(['registrant', 'courseCategory', 'studyProgram'])->findOrFail($id);
        } elseif ($slug === 'penerjemahan-dokumen') {
            $registration = TranslationRegistration::with(['registrant', 'translationCategory'])->findOrFail($id);
        } else {
            abort(404);
        }

        return view('front.payproof', compact('registration', 'slug'));
    }

    public function uploadPaymentProof(Request $request, $slug, $id)
    {
        $request->validate([
            'payment_proof' => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        // Ambil data pendaftaran berdasarkan slug layanan
        if ($slug === 'tes-kemampuan-bahasa-inggris') {
            $registration = TestRegistration::findOrFail($id);
        } elseif ($slug === 'kursus-bahasa-asing') {
            $registration = CourseRegistration::findOrFail($id);
        } elseif ($slug === 'penerjemahan-dokumen') {
            $registration = TranslationRegistration::findOrFail($id);
        } else {
            abort(404);
        }

        // Simpan file bukti pembayaran
        if ($request->hasFile('payment_proof')) {
            $filePath = $request->file('payment_proof')->store('payment_proofs', 'public');

            // Update bukti bayar dan status pendaftaran
            $registration->update([
                'payment_proof' => $filePath,
                'status' => 'Menunggu Konfirmasi',
            ]);
        }

        return redirect()->route('front.history')->with('success', 'Bukti bayar berhasil diunggah! Status Anda telah diperbarui menjadi "Menunggu Konfirmasi".');
    }
}
