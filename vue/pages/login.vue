<template>
    <div
        class="grid min-h-screen place-content-center bg-gradient-to-br from-green-700 to-slate-50"
    >
        <div
            class="max-w-xl space-y-6 rounded-md bg-white px-2 py-10 sm:px-7 md:px-14"
        >
            <div class="flex justify-center gap-4">
                <div>
                    <img
                        src="/mdu-logo.png"
                        alt="mduLogo"
                        class="h-auto max-w-full"
                    />
                </div>
                <div>
                    <img
                        src="/tua-logo.png"
                        alt="tuaLogo"
                        class="h-auto max-w-full"
                    />
                </div>
            </div>
            <form class="flex flex-col space-y-8">
                <div class="space-y-4">
                    <input
                        class="w-full rounded-md border border-black px-6 py-3 focus:outline-emerald-900"
                        type="text"
                        placeholder="Username"
                    />
                    <input
                        class="w-full rounded-md border border-black px-6 py-3 focus:outline-emerald-900"
                        type="password"
                        placeholder="Password"
                    />
                </div>
                <div class="sm:px-12">
                    <button
                        class="w-full rounded-md bg-[#1E3D2C] py-2 font-bold text-white hover:bg-emerald-900"
                    >
                        LOGIN
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
