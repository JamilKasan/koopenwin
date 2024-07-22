<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Winner Picker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .winner {
            font-size: 24px;
            margin-top: 20px;
            color: #2c3e50;
        }
        .btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        #confetti {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
</head>
<body>
<div class="container">
{{--    <h1>Lottery Winner Picker</h1>--}}
{{--    <textarea id="participants" rows="10" cols="30" placeholder="Enter participants, one per line"></textarea><br><br>--}}
    <button class="btn" onclick="pickWinner()">Pick a Winner</button>
    <div id="winner" class="winner"></div>
    <canvas id="confetti"></canvas>
    <audio id="cheer-sound" src="{{asset('cheering-and-clapping-crowd-1-5995.mp3')}}" preload="auto"></audio>
</div>

<script>
    function pickWinner() {
        // const participantsText = document.getElementById('participants').value;
        @php($parts = \App\Models\PromoEntry::query()->get())
        const participants = @js($parts);
        if (participants.length === 0) {
            document.getElementById('winner').innerText = 'No participants entered!';
            return;
        }
        const winner = participants[Math.floor(Math.random() * participants.length)];
        document.getElementById('winner').innerText = `The winner is: ${winner.code} ${winner.firstname} ${winner.name}`;
        animateWinner();
        launchConfetti();
        playCheerSound();
    }

    function animateWinner() {
        const winnerDiv = document.getElementById('winner');
        winnerDiv.style.animation = 'none';
        winnerDiv.offsetHeight; // Trigger reflow
        winnerDiv.style.animation = 'pulse 1s ease-out';
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
    }
</script>

<style>
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
</style>
</body>
</html>
