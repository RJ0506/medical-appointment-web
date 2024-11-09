<template>
    <div class="mt-16 grid text-center">
        <h1 class="text-3xl font-bold">Registered successfully!</h1>
        <p class="mt-5 text-lg">
            You can now appoint your schedule in Medical and Dental Unit, LOGIN
            now using your Email and Password.
        </p>
        <NuxtLink
            to="/"
            class="mx-auto mt-10 rounded-md bg-[#347956] px-10 py-2 font-bold text-white hover:bg-emerald-900"
            >OK</NuxtLink
        >
    </div>
</template>

<script setup lang="ts">
definePageMeta({
    layout: "selection",
});
</script>
