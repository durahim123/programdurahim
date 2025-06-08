<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Chat_categorie;
use App\Models\Chat_message;
use App\Models\Prod;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Reservasi;
use App\Models\ReservasiLayanan;
use App\Models\Users;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Carbon\Carbon;
use DB;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class HomesController extends Controller
{
    public function index()
    {   
        $layanan = Layanan::limit(3)->get();
        $product = Product::get();
        $countLayanan = Layanan::select('kategori_layanan', DB::raw('COUNT(kategori_layanan) as total'))
        ->groupBy('kategori_layanan')
        ->get();
    	return view('frontend.home.index', compact('layanan','product'));
    }
    
    public function layanan(Request $request)
    {   
        $query = Layanan::query();
        if ($request->filled('layanan')) {
            $query->where('layanan', 'like', '%' . $request->layanan . '%');
        }
        $layanan = $query->paginate(6);
        $perawatan = Layanan::where('kategori_layanan','=','Perawatan')->count();
        $estetika = Layanan::where('kategori_layanan','=','Estetika')->count();
    	return view('frontend.home.layanan', compact('layanan','perawatan','estetika'));
    }

    public function detailLayanan($id)
    {   
        $layanan = Layanan::where('id', $id)->first();
        $lainya = Layanan::where('id','!=',$id)->limit(3)->get();
    	return view('frontend.home.detailLayanan', compact('layanan','lainya'));
    }

    public function filterByCategory(Request $request)
    {
        $query = Layanan::query();

        // Filter berdasarkan kategori jika ada
        if ($request->filled('kategori')) {
            $query->where('kategori_layanan', $request->kategori); 
        }
        
        if ($request->filled('price_range')) {
            // Pisahkan nilai minimum dan maksimum dari price_range
            $range = explode('-', $request->price_range);
    
            // Periksa apakah range valid dan lakukan filter harga
            if (count($range) == 2) {
                $min_price = (int) $range[0];
                $max_price = (int) $range[1];
                $query->whereBetween('harga', [$min_price, $max_price]);
            }
        }
    
        // Paginate data
        $layanan = $query->paginate(6);
    
        return response()->json([
            'success' => true,
            'data' => $layanan->items(), // Data layanan per halaman
            'pagination' => (string) $layanan->links('pagination::bootstrap-4') // Kirim HTML pagination
        ]);
    }

    public function product(Request $request)
    {   
        $query = Product::query();
        if ($request->filled('nama_produk')) {
            $query->where('nama_produk', 'like', '%' . $request->nama_produk . '%');
        }
        $product = $query->paginate(6);

    	return view('frontend.home.product', compact('product'));
    }

    public function detailProduct($id)
    {   
        $produk = Product::where('id', $id)->first();
        $lainya = Product::where('id','!=',$id)->limit(3)->get();
    	return view('frontend.home.detailProduct', compact('produk','lainya'));
    }

    public function filterProductByCategory(Request $request)
    {
        $query = Product::query();

        if ($request->filled('kategori')) {
            $query->where('kategori_product', $request->kategori); 
        }
        
        if ($request->filled('price_range')) {
            $range = explode('-', $request->price_range);

            if (count($range) == 2) {
                $min_price = (int) $range[0];
                $max_price = (int) $range[1];
                $query->whereBetween('harga', [$min_price, $max_price]);
            }
        }
    
        $layanan = $query->paginate(6);
    
        return response()->json([
            'success' => true,
            'data' => $layanan->items(),
            'pagination' => (string) $layanan->links('pagination::bootstrap-4') // Kirim HTML pagination
        ]);
    }

    public function getCategories()
    {
        $categories = Chat_categorie::all();
        return response()->json($categories);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'category_id' => 'nullable|exists:chat_categories,id',
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = Chat_message::create([
            'category_id' => $request->category_id,
            'user_id' => session('auth_user')['pasien_id'],
            'message' => $request->message,
            'sender_role' => 'user',
        ]);

        // Logika balasan otomatis berdasarkan kategori
        $botResponse = '';
        if ($request->category_id) {
            $category = Chat_categorie::find($request->category_id);
            $botResponse = "Anda memilih kategori: {$category->name}. Apa yang bisa kami bantu?";
        } else {
            $botResponse = "Terima kasih atas pesan Anda. Kami akan segera membalas!";
        }

        Chat_message::create([
            'category_id' => $request->category_id,
            'message' => $botResponse,
            'is_bot' => true,
        ]);

        return response()->json(['message' => $botResponse]);
    }

    public function tentangKami()
    {   
    	return view('frontend.home.tentangKami');
    }

    public function testimoni()
    {   
    	return view('frontend.home.testimoni');
    }

    public function webhook(Request $request)
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        debugCode($telegram);
        $update = $telegram->getWebhookUpdates();
        
        if (!isset($update['message'])) {
            return response()->json(['status' => 'no message']);
        }

        $chatId = $update['message']['chat']['id'];
        $text = strtolower($update['message']['text']);

        //$responseText = $this->generateResponse($text);
        $responseText = $request->pesan;

        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => $responseText
        ]);

        return response()->json(['status' => 'ok']);
    }

    private function generateResponse($text)
    {
        // Logika membalas pesan
        if (strpos($text, 'halo') !== false) {
            return "Halo! Ada yang bisa saya bantu?";
        } elseif (strpos($text, 'konsultasi') !== false) {
            return "Silakan tuliskan pertanyaan Anda, kami akan membantu.";
        } else {
            return "Maaf, saya tidak mengerti. Silakan ajukan pertanyaan yang lebih spesifik.";
        }
    }

}
