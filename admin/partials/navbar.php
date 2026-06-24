<div class="bg-white shadow h-20 px-8 flex justify-between items-center">

    <div>

        <h2 class="text-2xl font-bold text-slate-700">

            Dashboard Admin

        </h2>

        <p class="text-slate-500">

            Selamat datang kembali 👋

        </p>

    </div>

    <div class="flex items-center gap-5">

        <button>

            <i data-feather="bell"></i>

        </button>

        <div class="flex items-center gap-3">

            <img
                src="../assets/img/user.png"
                class="w-11 h-11 rounded-full">

            <div>

                <h4 class="font-semibold">

                    <?= $_SESSION['admin']; ?>

                </h4>

                <small class="text-slate-500">

                    Administrator

                </small>

            </div>

        </div>

    </div>

</div>