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
                    <div class="relative">
                        <input
                            class="w-full rounded-md border border-black pl-6 pr-11 py-3 focus:outline-emerald-900"
                            :type="isPasswordVisible ? 'text' : 'password'"
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

<script setup lang="ts">
const isPasswordVisible = ref(false);

const togglePasswordVisibility = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
};
</script>
