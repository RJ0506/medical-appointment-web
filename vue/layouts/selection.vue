<template>
    <div class="grid">
        <div
            class="flex items-center justify-center gap-2 bg-gradient-to-r from-[#4b896a] to-emerald-200 p-2"
        >
            <img src="/tua-logo.png" alt="tuaLogo" class="h-auto max-w-16" />
            <div class="hidden flex-col text-center sm:flex">
                <h1 class="text-4xl font-semibold uppercase">
                    Trinity University of Asia
                </h1>
                <span class="text-xl font-bold">Medical and Dental Unit</span>
            </div>
            <img src="/mdu-logo.png" alt="tuaLogo" class="h-auto max-w-16" />
        </div>
        <slot />
    </div>
</template>

<script></script>
