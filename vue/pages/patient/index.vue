<template>
    <div class="grid min-h-screen place-content-center">
        <div class="flex gap-4 px-2 sm:gap-10">
            <NuxtLink
                to="patient/medical-appointment"
                class="grid h-[300px] max-w-64 cursor-pointer place-content-center rounded-md bg-[#aac7b8] p-1 text-center shadow-md transition-all duration-500 ease-out hover:-translate-y-3 hover:bg-emerald-400 sm:h-[484px]"
            >
                <p class="text-lg font-bold text-white sm:text-xl">
                    Book an Appointment for Medical
                </p>
            </NuxtLink>
            <NuxtLink
                to="patient/dental-appointment"
                class="grid h-[300px] max-w-64 cursor-pointer place-content-center rounded-md bg-[#aac7b8] p-1 text-center shadow-md transition-all duration-500 ease-out hover:-translate-y-3 hover:bg-emerald-400 sm:h-[484px]"
            >
                <p class="text-lg font-bold text-white sm:text-xl">
                    Book an Appointment for Dental
                </p>
            </NuxtLink>
            <NuxtLink
                v-if="authStore.role === 'Employee'"
                to="patient/physical-appointment"
                class="grid h-[300px] max-w-64 cursor-pointer place-content-center rounded-md bg-[#aac7b8] p-1 text-center shadow-md transition-all duration-500 ease-out hover:-translate-y-3 hover:bg-emerald-400 sm:h-[484px]"
            >
                <p class="text-lg font-bold text-white sm:text-xl">
                    Request a Physical Examination
                </p>
            </NuxtLink>
        </div>
    </div>
</template>

<script setup>
import { useAuthStore } from "~/stores/auth";

definePageMeta({
    layout: "patient",
});

const authStore = useAuthStore();
</script>
