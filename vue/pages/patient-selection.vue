<template>
    <div class="min-h-screen">
        <div class="mx-auto mt-32 grid max-w-md gap-1 p-2 md:mt-60">
            <h1 class="text-center text-3xl font-bold">Are you a?</h1>
            <NuxtLink
                to="student-registration"
                class="text-xl mt-5 flex items-center justify-center bg-[#347956] py-6 font-semibold text-white hover:bg-emerald-900"
            >
                Student
            </NuxtLink>
            <div class="flex items-center">
                <div class="flex-grow border-2 border-t border-black"></div>
                <span class="px-4 font-bold text-black">Or</span>
                <div class="flex-grow border-2 border-t border-black"></div>
            </div>
            <NuxtLink
                to="employee-registration"
                class="text-xl flex items-center justify-center border-2 border-[#347956] py-6 font-semibold text-[#347956] hover:bg-[#347956] hover:text-white"
            >
                Employee
            </NuxtLink>
        </div>
    </div>
</template>
<script setup lang="ts">
definePageMeta({
    layout: "selection",
});
</script>
