<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teacher\TeacherTugasDoneComponent as TeacherTeacherTugasDoneComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\Admin\AdminAddBabComponent;
use App\Http\Livewire\Admin\AdminAddKelasComponent;
use App\Http\Livewire\Admin\AdminAddMapelComponent;
use App\Http\Livewire\Admin\AdminAddMateriComponent;
use App\Http\Livewire\Admin\AdminAddStudentComponent;
use App\Http\Livewire\Admin\AdminAddSubKelasComponent;
use App\Http\Livewire\Admin\AdminAddTeacherComponent;
use App\Http\Livewire\Admin\AdminAddTugasComponent;
use App\Http\Livewire\Admin\AdminBabComponent;
use App\Http\Livewire\Admin\AdminComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminDeletedDataKelasComponent;
use App\Http\Livewire\Admin\AdminDeletedDataMapelComponent;
use App\Http\Livewire\Admin\AdminDeletedDataStudentComponent;
use App\Http\Livewire\Admin\AdminDeletedDataSubKelasComponent;
use App\Http\Livewire\Admin\AdminDeletedDataTeacherComponent;
use App\Http\Livewire\Admin\AdminEditBabComponent;
use App\Http\Livewire\Admin\AdminEditJadwalComponent;
use App\Http\Livewire\Admin\AdminEditJadwalIsiComponent;
use App\Http\Livewire\Admin\AdminEditKelasComponent;
use App\Http\Livewire\Admin\AdminEditMapelComponent;
use App\Http\Livewire\Admin\AdminEditMateriComponent;
use App\Http\Livewire\Admin\AdminEditStudentComponent;
use App\Http\Livewire\Admin\AdminEditSubKelasComponent;
use App\Http\Livewire\Admin\AdminEditTeacherComponent;
use App\Http\Livewire\Admin\AdminEditTugasComponent;
use App\Http\Livewire\Admin\AdminJadwalComponent;
use App\Http\Livewire\Admin\AdminJamComponent;
use App\Http\Livewire\Admin\AdminKelasComponent;
use App\Http\Livewire\Admin\AdminMapelComponent;
use App\Http\Livewire\Admin\AdminMateriComponent;
use App\Http\Livewire\Admin\AdminPreviewComponent;
use App\Http\Livewire\Admin\AdminResetPasswordStudent;
use App\Http\Livewire\Admin\AdminResetPasswordTeacher;
use App\Http\Livewire\Admin\AdminStudentComponent;
use App\Http\Livewire\Admin\AdminSubKelasComponent;
use App\Http\Livewire\Admin\AdminTeacherComponent;
use App\Http\Livewire\Admin\AdminTestingComponent;
use App\Http\Livewire\Admin\AdminTugasComponent;
use App\Http\Livewire\BabByMateriComponent;
use App\Http\Livewire\BabComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\HomeController;
use App\Http\Livewire\MateriComponent;
use App\Http\Livewire\ServiceComponent;
use App\Http\Livewire\ShowBabComponent;
use App\Http\Livewire\Student\StudentCheckTugasComponent;
use App\Http\Livewire\Student\StudentDashboardComponent;
use App\Http\Livewire\Student\StudentJawabanTugasComponent;
use App\Http\Livewire\Student\StudentPreviewComponent;
use App\Http\Livewire\Student\StudentShowTugasComponent;
use App\Http\Livewire\Student\StudentTugasComponent;
use App\Http\Livewire\Teacher\TeacherAddBabComponent;
use App\Http\Livewire\Teacher\TeacherAddMateriComponent;
use App\Http\Livewire\Teacher\TeacherAddTugasComponent;
use App\Http\Livewire\Teacher\TeacherBabComponent;
use App\Http\Livewire\Teacher\TeacherEditBabComponent;
use App\Http\Livewire\Teacher\TeacherEditMateriComponent;
use App\Http\Livewire\Teacher\TeacherEditTugasComponent;
use App\Http\Livewire\Teacher\TeacherMateriComponent;
use App\Http\Livewire\Teacher\TeacherPreviewComponent;
use App\Http\Livewire\Teacher\TeacherTugasComponent;
use App\Http\Livewire\Teacher\TeacherTugasDoneComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('/tentang', AboutComponent::class)->name('about');

Route::get('/pelayanan', ServiceComponent::class)->name('service');

Route::get('/review', ContactComponent::class)->name('contact');

Route::get('/materi', MateriComponent::class)->name('materi');

Route::get('/bab', BabComponent::class)->name('bab');

Route::get('/materi/{materi_id}/bab', BabByMateriComponent::class)->name('materi.bab');

Route::get('/materi/bab/tampil{bab_id}', ShowBabComponent::class)->name('materi.bab.show');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/guru', AdminTeacherComponent::class)->name('admin.teacher');
    Route::get('/admin/guru/tambah', AdminAddTeacherComponent::class)->name('admin.teacher.add');
    Route::get('/admin/guru/edit/{teacher_id}', AdminEditTeacherComponent::class)->name('admin.teacher.edit');
    Route::get('/admin/guru/atur-ulang-password/{user_id}', AdminResetPasswordTeacher::class)->name('admin.teacher.reset-password');
    Route::get('/admin/mata-pelajaran', AdminMapelComponent::class)->name('admin.mapel');
    Route::get('/admin/mata-pelajaran/tambah', AdminAddMapelComponent::class)->name('admin.mapel.add');
    Route::get('/admin/mata-pelajaran/edit/{mapel_id}', AdminEditMapelComponent::class)->name('admin.mapel.edit');
    Route::get('/admin/murid', AdminStudentComponent::class)->name('admin.student');
    Route::get('/admin/murid/tambah', AdminAddStudentComponent::class)->name('admin.student.add');
    Route::get('/admin/murid/edit/{student_id}', AdminEditStudentComponent::class)->name('admin.student.edit');
    Route::get('/admin/murid/atur-ulang-password/{user_id}', AdminResetPasswordStudent::class)->name('admin.student.reset-password');
    Route::get('/admin/kelas', AdminKelasComponent::class)->name('admin.kelas');
    Route::get('/admin/kelas/tambah', AdminAddKelasComponent::class)->name('admin.kelas.add');
    Route::get('/admin/kelas/edit/{kelas_id}', AdminEditKelasComponent::class)->name('admin.kelas.edit');
    Route::get('/admin/subkelas', AdminSubKelasComponent::class)->name('admin.subkelas');
    Route::get('/admin/subkelas/tambah', AdminAddSubKelasComponent::class)->name('admin.subkelas.add');
    Route::get('/admin/subkelas/edit/{subkelas_id}', AdminEditSubKelasComponent::class)->name('admin.subkelas.edit');
    Route::get('/admin/kelas/dihapus', AdminDeletedDataKelasComponent::class)->name('admin.deleted.kelas');
    Route::get('/admin/mapel/dihapus', AdminDeletedDataMapelComponent::class)->name('admin.deleted.mapel');
    Route::get('/admin/subkelas/dihapus', AdminDeletedDataSubKelasComponent::class)->name('admin.deleted.subkelas');
    Route::get('/admin/teacher/dihapus', AdminDeletedDataTeacherComponent::class)->name('admin.deleted.teacher');
    Route::get('/admin/student/dihapus', AdminDeletedDataStudentComponent::class)->name('admin.deleted.student');
    Route::get('/admin/review', AdminPreviewComponent::class)->name('admin.preview');
    Route::get('/admin/jam', AdminJamComponent::class)->name('admin.jam');
    Route::get('/admin/jadwal', AdminJadwalComponent::class)->name('admin.jadwal');
    Route::get('/admin/jadwal/edit/{kelas_id}/{subkelas_id}', AdminEditJadwalComponent::class)->name('admin.jadwal.edit');
});

Route::middleware(['auth:sanctum', 'verified', 'authteacher'])->group(function(){
    Route::get('/teacher/materi', TeacherMateriComponent::class)->name('teacher.materi');
    Route::get('/teacher/materi/tambah', TeacherAddMateriComponent::class)->name('teacher.materi.add');
    Route::get('/teacher/materi/edit/{materi_id}', TeacherEditMateriComponent::class)->name('teacher.materi.edit');
    Route::get('/teacher/bab', TeacherBabComponent::class)->name('teacher.bab');
    Route::get('/teacher/bab/tambah', TeacherAddBabComponent::class)->name('teacher.bab.add');
    Route::get('/teacher/bab/edit/{bab_id}', TeacherEditBabComponent::class)->name('teacher.bab.edit');
    Route::get('/teacher/tugas', TeacherTugasComponent::class)->name('teacher.tugas');
    Route::get('/teacher/tugas/tambah', TeacherAddTugasComponent::class)->name('teacher.tugas.add');
    Route::get('/teacher/tugas/edit/{tugas_id}', TeacherEditTugasComponent::class)->name('teacher.tugas.edit');
    Route::get('/teacher/preview', TeacherPreviewComponent::class)->name('teacher.preview');
    Route::get('/teacher/tugas/selesai/{tugas_id}', [TeacherTeacherTugasDoneComponent::class,'index'])->name('teacher.tugas.done');
});

Route::middleware(['auth:sanctum', 'verified', 'authstudent'])->group(function(){
    Route::get('/student/dashboard', StudentDashboardComponent::class)->name('student.dashboard');
    Route::get('/student/tugas', StudentTugasComponent::class)->name('student.tugas');
    Route::get('/student/check/tugas', StudentCheckTugasComponent::class)->name('student.check.tugas');
    Route::get('/student/tampil/tugas/{tugas_id}', StudentShowTugasComponent::class)->name('student.show.tugas');
    Route::get('student/tugas/jawaban/{tugas_id}', StudentJawabanTugasComponent::class)->name('student.tugas.jawaban');
    Route::get('student/preview', StudentPreviewComponent::class)->name('student.preview');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
