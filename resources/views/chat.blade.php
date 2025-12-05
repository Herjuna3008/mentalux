<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Room - MentalUX</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="icon" href="{{ asset('/logo.png') }}" type="image/x-icon">


</head>

<body>

    <div class="chat-header">
        <div class="doctor-info">
            <a href="{{ url('/') }}" class="text-dark me-2"><i class="fas fa-arrow-left"></i></a>

            <img src="https://ui-avatars.com/api/?name={{ urlencode($doctorName) }}&background=random" class="doctor-avatar" alt="Dokter">

            <div>
                <h6 class="fw-bold m-0">{{ $doctorName }}</h6>
                <div class="status-badge">
                    <span class="status-dot"></span> Online
                </div>
            </div>
        </div>

        <a href="{{ url('/') }}" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-bold" onclick="return confirm('Akhiri sesi konsultasi?')">
            End Session
        </a>
    </div>

    <div class="chat-area" id="chatBox">

        <div class="text-center mb-3">
            <small class="badge bg-light text-secondary rounded-pill px-3 py-1">Hari ini</small>
        </div>

        <div class="message-bubble message-in">
            Halo, selamat siang! 👋 <br>
            Saya {{ $doctorName }}. Bagaimana perasaan Anda hari ini? Ada yang bisa saya bantu?
            <span class="message-time">14:02</span>
        </div>

    </div>

    <div class="chat-input-area">
        <button class="btn-attach"><i class="fas fa-paperclip"></i></button>

        <input type="text" id="messageInput" class="chat-input" placeholder="Tulis pesan Anda..." autocomplete="off">

        <button class="btn-send" onclick="sendMessage()">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>

    <script>
        const chatBox = document.getElementById('chatBox');
        const messageInput = document.getElementById('messageInput');

        // Fungsi Kirim Pesan
        function sendMessage() {
            const text = messageInput.value;

            if (text.trim() === "") return; // Jangan kirim kalau kosong

            // Munculkan Chat (User)
            addMessage(text, 'out');
            messageInput.value = ""; // Kosongkan input
            scrollToBottom();

            // Simulasi Dokter Mengetik & Balas (Auto Reply)
            setTimeout(() => {
                // Jawaban random dokter (masih dummy)
                const replies = [
                    "Baik, bisa ceritakan lebih detail mengenai hal tersebut?",
                    "Saya mengerti perasaan Anda. Sejak kapan hal ini mulai dirasakan?",
                    "Apakah hal itu mengganggu aktivitas tidur atau makan Anda?",
                    "Tarik napas perlahan... mari kita bahas pelan-pelan ya."
                ];
                const randomReply = replies[Math.floor(Math.random() * replies.length)];

                addMessage(randomReply, 'in');
                scrollToBottom();
            }, 1500); // Balas setelah 1.5 detik
        }

        // Fungsi Render HTML Chat Bubble
        function addMessage(text, type) {
            const time = new Date().toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });

            const div = document.createElement('div');
            // Tentukan class berdasarkan tipe (in/out)
            div.className = `message-bubble message-${type}`;
            div.innerHTML = `
                ${text}
                <span class="message-time">${time}</span>
            `;

            chatBox.appendChild(div);
        }

        // Biar scroll selalu di paling bawah
        function scrollToBottom() {
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        // Kirim pakai tombol ENTER
        messageInput.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                sendMessage();
            }
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/script.js"></script>
</body>

</html>