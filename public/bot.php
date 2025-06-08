<?php

$token = "7729800707:AAH9nlqYFmjwP-g0TFyQ1svs-4H717MyX0g";
$admin_chat_id = "620764396"; 

$update = json_decode(file_get_contents("php://input"), true);

if (!isset($update["message"])) exit;

$message = $update["message"];
$chat_id = $message["chat"]["id"];
$text = $message["text"] ?? "";
$first_name = $message["from"]["first_name"] ?? "";
$username = $message["from"]["username"] ?? "";

// Cek jika user kirim /start [kategori]
if (strpos($text, "/start") === 0) {
    $kategori = trim(str_replace("/start", "", $text));

    // Kirim balasan ke user
    $balasan = "Halo *$first_name*! 👋\n";
    if ($kategori) {
        $balasan .= "Terima kasih telah menghubungi kami untuk konsultasi kategori: *$kategori*.\n";
    } else {
        $balasan .= "Terima kasih telah menghubungi kami.\n";
    }
    $balasan .= "Admin kami akan segera menghubungi Anda secara langsung. 😊";

    kirimPesan($token, $chat_id, $balasan);

    // Kirim notifikasi ke admin
    $pesan_admin = "📩 *Konsultasi Masuk!*\n"
        . "👤 Nama: $first_name\n"
        . "🔗 Username: " . ($username ? "@$username" : "(tidak ada)") . "\n"
        . "🆔 Chat ID: `$chat_id`\n"
        . "📁 Kategori: *$kategori*\n";

    if ($username) {
        $pesan_admin .= "➡️ [Klik untuk chat](https://t.me/$username)";
    }

    kirimPesan($token, $admin_chat_id, $pesan_admin, true);
}

// Fungsi kirim pesan
function kirimPesan($token, $chat_id, $text, $markdown = false) {
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = [
        'chat_id' => $chat_id,
        'text' => $text
    ];
    if ($markdown) {
        $data['parse_mode'] = 'Markdown';
    }
    file_get_contents($url . '?' . http_build_query($data));
}

?>