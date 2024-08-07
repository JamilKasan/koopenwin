@include('app')
<body class="bg-gradient-to-b from-[#00b7f0] to-[#00205e] w-full">
<div id="modal" class="z-10 bg-black/40 h-full w-full hidden fixed">
    <div class="justify-center flex">
        <div class="fixed backdrop-blur-sm bottom-1/2 rounded-lg p-10 bg-white/10 shadow-2xl">
            <h1 class="pb-5 flex justify-center text-xl text-white">
                Oops
            </h1>
            <p class="text-white">
                Invalid promo code
            </p>
            <div class="flex justify-center pt-5">
                <button onclick="hideModal()" class="py-1 px-3 bg-[#00b7f0] rounded text-gray-100 transition duration-150 ease-in-out">
                    Try again
                </button>
            </div>
        </div>
    </div>
</div>
@php
    $fields =
[
    ['name' => '']
];
@endphp
<div class="flex justify-center w-full">
    <img class="w-full md:w-1/4" src="{{asset('TP_Koop_en_Win_KopText.png')}}" alt="">
</div>
<div class="w-full flex justify-center">
    <div class="w-full px-4 pb-5  lg:w-1/2">
        <form method="post" action="{{route('code.store')}}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="pb-4 w-full">
                <label class="text-white text-sm" for="">
                    Promo Code
                </label>
                <div class="p-2">

                </div>
                <input name="code" type="file" class="py-2 px-3 bg-black/10 focus:bg-gradient-to-r focus:from-transparent focus:to-white/5   w-full outline-none rounded text-gray-100 transition ease-in-out delay-100 shadow-inner">
            </div>

            <br>
            <div class="pb-4">
                <button class="py-3 rounded bg-white/10 hover:bg-white/20 active:bg-white/20 w-full font-bold text-white ring-0 border-0 ">
                    Submit
                </button>
            </div>
        </form>
    </div>
    <script>
        function showModal()
        {
            document.getElementById('modal').classList.remove('hidden')
        }
        function hideModal()
        {
            document.getElementById('modal').classList.add('hidden')
        }
    </script>
</div>
</body>
