<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lelang;
use App\Models\Lampiran;
use App\Models\Pemenang;
use App\Models\Perusahaan;
use App\Models\UserLelang;
use App\Models\Kualifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\AdditionalLampiranPengadaan;

class PesertaController extends Controller
{
    public function index($lelang_id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        $user_lelangs = $lelang->users()->paginate(10);
        return view('pages.peserta.index', compact('lelang', 'user_lelangs'));
    }

    public function show($lelang_id, $id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        $user = User::find(Crypt::decrypt($id));
        $lampiran = Lampiran::where('lelang_id', $lelang->id)->where('user_id', $user->id)->first();
        return view('pages.peserta.show', compact('lelang', 'user', 'lampiran'));
    }

    public function pemenang($lelang_id, $id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        $user = User::find(Crypt::decrypt($id));

        $lelang->update([
            'user_id' => Crypt::decrypt($id),
        ]);

        $message = 'Dengan ini memberitahukan kepada Anda bahwa perusahaan Anda, ' . $user->nama_panjang . ', telah terpilih sebagai pemenang dalam proses pengadaan ' . $lelang->nama_lelang . '.';
        $message .= ' Detail Pengadaan :<br> Nama Kode : ' . $lelang->kode_lelang . '.<br> Nama Pengadaan : ' . $lelang->nama_lelang . '.';
        $message .= ' Anda telah mengajukan penawaran yang kompetitif dan memenuhi semua persyaratan yang kami tetapkan. Kami yakin bahwa perusahaan Anda memiliki komitmen untuk memberikan kualitas dan layanan terbaik kepada kami.';
        $message .= ' Proses selanjutnya akan melibatkan negosiasi lebih lanjut terkait kontrak. Tim kami akan segera menghubungi Anda untuk mendiskusikan detail lebih lanjut, termasuk tenggat waktu pelaksanaan, persyaratan teknis, dan persyaratan kontrak.';
        $message .= ' Kami menghargai dedikasi dan kerja keras Anda dalam proses pengadaan ini, dan kami berharap dapat membangun hubungan yang sukses dengan perusahaan Anda dalam proyek ini. Kami juga ingin mengucapkan selamat kepada seluruh tim Anda atas pencapaian ini.';
        $message .= ' Terima kasih atas partisipasi Anda dalam proses pengadaan ini. Kami berharap untuk segera memulai kerja sama yang produktif.';


        $mail_data = [
            'recipient' => $user->email,
            'from_email' => 'saranawisesa@gmail.com',
            'from_nama' => 'SARANAWISESA PROPERINDO',
            'subject' => 'Pemberitahuan Pemenang Pengadaan ' . $lelang->nama_lelang,
            'body' => $message,
        ];

        Mail::send('eproc.email.pemenang', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
            ->from($mail_data['from_email'], $mail_data['from_nama'])
            ->subject($mail_data['subject']);
        });

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.peserta.index', ['lelang_id' => Crypt::encrypt($lelang->id)])->with('success', 'Has appointed '.$lelang->users2->nama_panjang.' company as the winner at '.$lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.peserta.index', ['lelang_id' => Crypt::encrypt($lelang->id)])->with('success', 'Has appointed '.$lelang->users2->nama_panjang.' company as the winner at '.$lelang->created_at);
        }
    }

    public function hapusPemenang($lelang_id, $id){
        $lelang = Lelang::find(Crypt::decrypt($lelang_id));
        $user = User::find(Crypt::decrypt($id));

        $lelang->update([
            'user_id' => null,
        ]);

        $message = 'Detail Pengadaan :<br> Nama Kode : ' . $lelang->kode_lelang . '.<br> Nama Pengadaan : ' . $lelang->nama_lelang . '.';
        $message .= ' Dengan berat hati, kami sampaikan bahwa keputusan telah diambil untuk membatalkan kemenangan. Keputusan ini diambil setelah melalui pertimbangan yang matang dan sesuai dengan ketentuan yang berlaku.';
        $message .= ' Mohon maaf atas ketidaknyamanan yang mungkin timbul akibat pembatalan ini. Kami menghargai partisipasi Anda dalam lelang ini dan berharap untuk dapat bekerja sama dalam kesempatan lain di masa mendatang.';
        $message .= ' Demikian pemberitahuan ini kami sampaikan, dan kami berharap dapat terus menjalin hubungan yang baik di masa yang akan datang.';


        $mail_data = [
            'recipient' => $user->email,
            'from_email' => 'saranawisesa@gmail.com',
            'from_nama' => 'SARANAWISESA PROPERINDO',
            'subject' => 'Pemberitahuan',
            'body' => $message,
        ];

        Mail::send('eproc.email.pemenang', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
            ->from($mail_data['from_email'], $mail_data['from_nama'])
            ->subject($mail_data['subject']);
        });

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.peserta.index', ['lelang_id' => Crypt::encrypt($lelang->id)])->with('success', 'Dengan berat hati, kami sampaikan bahwa keputusan telah diambil untuk membatalkan kemenangan. Keputusan ini diambil setelah melalui pertimbangan yang matang dan sesuai dengan ketentuan yang berlaku.');
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.peserta.index', ['lelang_id' => Crypt::encrypt($lelang->id)])->with('success', 'Dengan berat hati, kami sampaikan bahwa keputusan telah diambil untuk membatalkan kemenangan. Keputusan ini diambil setelah melalui pertimbangan yang matang dan sesuai dengan ketentuan yang berlaku.');
        }
    }
}
