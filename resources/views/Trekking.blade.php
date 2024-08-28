@include('app')
<head>
    <title>Mr TP Koop en Win</title>
</head>

<body class="bg-gradient-to-b from-[#00b7f0] to-[#00205e] w-full">
<div id="modal" class="z-10 bg-black/40 h-full w-full @if(!session()->has('promo_error')) hidden @endif fixed">
    <div class="justify-center flex">
        <div class="fixed backdrop-blur-sm bottom-1/2 rounded-lg p-10 bg-white/10 shadow-2xl">
            <h1 class="pb-5 flex justify-center text-xl text-white">
                Oops
            </h1>
            <p class="text-white">
                {{ session()->get('promo_error') ?? null }}
            </p>
            <div class="flex justify-center pt-5">
                <button onclick="hideModal()" class="py-1 px-3 bg-[#00b7f0] rounded text-gray-100 transition duration-150 ease-in-out">
                    Try again
                </button>
            </div>
        </div>
    </div>
</div>

<div class="flex justify-center w-full">
    <img class="w-full md:w-1/4" src="{{asset('TP_Koop_en_Win_KopText.png')}}" alt="">
</div>

<div class="w-full flex justify-center">
    <div class="w-full px-4 pb-5">
        <div class="flex justify-center w-full">
            <h1 class="text-white text-2xl font-bold mb-6"></h1>
        </div>

        <!-- Current Winner Display Box -->
        <div id="current-winner" class=" p-4 rounded-lg mb-6 text-white text-lg text-center">
            <h2 id="current-prize" style="font-size: 60px" class="font-bold mb-2"></h2>
            <p id="current-winner-name" style="font-size: 40px" class="text-2xl pt-4"></p>
        </div>

        <button class="py-3 rounded bg-white/10 hover:bg-white/20 active:bg-white/20 w-full font-bold text-white ring-0 border-0 transition duration-150 ease-in-out" onclick="pickNextWinner()">Pick Winner</button>
        <div id="winners" class="winner mt-6 text-white text-lg text-center"></div>
    </div>
</div>

<canvas id="confetti"></canvas>
<audio id="cheer-sound" src="{{ asset('Output 1-2(2).mp3') }}" preload="auto"></audio>

@php
    $participants = \App\Models\PromoEntry::query()->where('valid', true)->get();
    $prices = \App\Models\Price::query()->orderBy('position')->get(); // Assuming you have a Price model
@endphp

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
<script>
    var participants = @js($participants);
    var prices = @js($prices);
    var currentPrizeIndex = 0; // Track which prize we're on

    function pickNextWinner() {
        if (currentPrizeIndex >= prices.length) {
            document.getElementById('winners').innerText = 'All winners have been selected!';
            document.getElementById('current-prize').innerText = 'Current Prize: None';
            document.getElementById('current-winner-name').innerText = 'Current Winner: None';
            return;
        }

        if (participants.length === 0) {
            document.getElementById('winners').innerText = 'No more participants left!';
            return;
        }

        const winner = participants[Math.floor(Math.random() * participants.length)];
        participants = participants.filter(obj => obj.code !== winner.code);

        const prize = prices[currentPrizeIndex];
        var winnerText = document.createElement('div');
        winnerText.innerHTML = `${prize.position}e plaats is: ${winner.code} ${winner.firstname} ${winner.name}`;
        winnerText.className = 'price';

        document.getElementById('winners').appendChild(winnerText);

        // Update current winner and prize display
        document.getElementById('current-prize').innerText = `${prize.position}e plaats: ${winner.code} ${winner.firstname} ${winner.name}`;
        document.getElementById('current-winner-name').innerText = `${prize.reward}`;

        currentPrizeIndex++; // Move to the next prize

        animateWinner();
        launchConfetti();
        playCheerSound();
    }

    function animateWinner() {
        const winnersDiv = document.getElementById('winners');
        winnersDiv.style.animation = 'none';
        winnersDiv.offsetHeight; // Trigger reflow
        winnersDiv.style.animation = 'pulse 1s ease-out';
    }

    function launchConfetti() {
        const duration = 5 * 1000;
        const end = Date.now() + duration;

        (function frame() {
            confetti({
                particleCount: 5,
                angle: 60,
                spread: 55,
                origin: { x: 0 }
            });
            confetti({
                particleCount: 5,
                angle: 120,
                spread: 55,
                origin: { x: 1 }
            });

            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        }());
    }

    function playCheerSound() {
        const cheerSound = document.getElementById('cheer-sound');
        cheerSound.play();


        document.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                // Code to execute when Enter is pressed
                alert('Test');
            }
        });
    }

</script>

<style>
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    .winner div {
        margin-top: 10px;
    }

    #current-winner {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        padding: 16px;
    }
</style>
</body>
