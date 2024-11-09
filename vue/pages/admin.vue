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
            <form
                @submit.prevent="handleSubmit"
                class="flex flex-col space-y-8"
            >
                <div class="space-y-4">
                    <input
                        class="w-full rounded-md border border-black px-6 py-3 focus:outline-emerald-900"
                        type="email"
                        v-model="formData.email"
                        placeholder="Email"
                    />
                    <div class="relative">
                        <input
                            class="w-full rounded-md border border-black py-3 pl-6 pr-11 focus:outline-emerald-900"
                            :type="isPasswordVisible ? 'text' : 'password'"
                            v-model="formData.password"
                            placeholder="Password"
                        />
                        <div
                            @click="togglePasswordVisibility"
                            class="absolute right-2 top-1/2 grid -translate-y-1/2 cursor-pointer place-content-center"
                        >
                            <Icon
                                v-if="isPasswordVisible"
                                class="text-3xl text-slate-600"
                                name="i-material-symbols-light-visibility-rounded"
                            />
                            <Icon
                                v-else
                                class="text-3xl text-slate-600"
                                name="i-material-symbols-light-visibility-off-outline-rounded"
                            />
                        </div>
                    </div>
                    <p
                        class="text-center text-red-500"
                        v-if="submitErrorMessages"
                    >
                        {{ submitErrorMessages }}
                    </p>
                </div>
                <div class="grid gap-3 sm:px-12">
                    <button
                        type="submit"
                        class="w-full rounded-md bg-[#1E3D2C] py-2 font-bold text-white hover:bg-emerald-900"
                    >
                        <span v-if="!isLoading"> LOGIN </span>
                        <div v-if="isLoading" class="mx-auto w-1/4 lg:w-1/6">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 300 150"
                            >
                                <path
                                    fill="none"
                                    stroke="#347956"
                                    stroke-width="15"
                                    stroke-linecap="round"
                                    stroke-dasharray="300 385"
                                    stroke-dashoffset="0"
                                    d="M275 75c0 31-27 50-50 50-58 0-92-100-150-100-28 0-50 22-50 50s23 50 50 50c58 0 92-100 150-100 24 0 50 19 50 50Z"
                                >
                                    <animate
                                        attributeName="stroke-dashoffset"
                                        calcMode="spline"
                                        dur="2"
                                        values="685;-685"
                                        keySplines="0 0 1 1"
                                        repeatCount="indefinite"
                                    ></animate>
                                </path>
                            </svg>
                        </div>
                    </button>
                    <span class="text-center">
                        Don't have an account yet?
                        <NuxtLink
                            class="font-bold text-[#347956] hover:text-emerald-900"
                            to="patient-selection"
                        >
                            Register now.</NuxtLink
                        >
                    </span>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useAuthStore } from "@/store/auth";
import axios from "axios";
const authStore = useAuthStore();
const isPasswordVisible = ref(false);
const isLoading = ref(false);
const submitErrorMessages = ref("");
const formData = ref({
    email: "",
    password: "",
});

const togglePasswordVisibility = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
};

const handleSubmit = async () => {
    isLoading.value = true;
    try {
        const response = await axios.post(
            `${useRuntimeConfig().public.laravelURL}user/login`,
            formData.value,
        );

        isLoading.value = false;
        const token = response.data;

        if (token) {
            authStore.setToken(token);
            if (token.patient) {
                navigateTo("/patient");
                return;
            }
            navigateTo("/user");
        } else {
            submitErrorMessages.value = "Login failed";
        }
    } catch (error) {
        isLoading.value = false;
        submitErrorMessages.value = "The provided credentials are incorrect";
        console.log(
            "Login failed:",
            error.response ? error.response.data : error.message,
        );
    }
};
</script>
