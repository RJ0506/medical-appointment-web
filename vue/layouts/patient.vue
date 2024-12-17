<template>
    <div>
        <!-- SIDEBAR -->
        <div
            :class="{
                'w-72': isSidebarCollapsed,
                'w-0 md:w-24': !isSidebarCollapsed,
            }"
            class="fixed z-50 flex h-full flex-col overflow-hidden bg-gradient-to-b from-[#4b896a] to-slate-300 pt-6 transition-all"
        >
            <button
                :class="{
                    'mr-3 self-end lg:hidden': isSidebarCollapsed,
                    'self-center md:hidden': !isSidebarCollapsed,
                }"
                class="flex items-center justify-center rounded border px-2 py-1"
                @click="toggleSidebar"
            >
                <Icon
                    name="ic:baseline-menu"
                    style="color: white; font-size: 2rem"
                />
            </button>
            <!-- LOGO -->
            <div>
                <div class="flex justify-center">
                    <div class="flex gap-4">
                        <img
                            src="/tua-logo.png"
                            alt="tuaLogo"
                            class="h-auto max-w-16"
                        />
                        <img
                            src="/mdu-logo.png"
                            alt="mduLogo"
                            :class="{
                                block: isSidebarCollapsed,
                                hidden: !isSidebarCollapsed,
                            }"
                            class="h-auto max-w-16"
                        />
                    </div>
                </div>
                <div
                    :class="{
                        block: isSidebarCollapsed,
                        hidden: !isSidebarCollapsed,
                    }"
                    class="text-center text-white"
                >
                    <h1 class="text-xl font-bold">
                        Trinity University of Asia
                    </h1>
                    <p class="text-md font-bold">Medical and Dental Unit</p>
                </div>
            </div>

            <!-- NAVLINKS -->
            <div class="mt-24 flex flex-grow flex-col text-white">
                <NuxtLink to="/patient">
                    <div
                        :class="{
                            'justify-start': isSidebarCollapsed,
                            'justify-center': !isSidebarCollapsed,
                        }"
                        class="flex items-center gap-3 px-4 py-5 text-xl font-bold hover:bg-[#1e3d2c]"
                    >
                        <Icon
                            name="ep:calendar"
                            style="color: white; font-size: 2rem"
                        />
                        <span
                            :class="{
                                block: isSidebarCollapsed,
                                hidden: !isSidebarCollapsed,
                            }"
                        >
                            Appointment
                        </span>
                    </div>
                </NuxtLink>
                <NuxtLink to="/patient/history">
                    <div
                        :class="{
                            'justify-start': isSidebarCollapsed,
                            'justify-center': !isSidebarCollapsed,
                        }"
                        class="flex items-center gap-3 px-4 py-5 text-xl font-bold hover:bg-[#1e3d2c]"
                    >
                        <Icon
                            name="ep:histogram"
                            style="color: white; font-size: 2rem"
                        />
                        <span
                            :class="{
                                block: isSidebarCollapsed,
                                hidden: !isSidebarCollapsed,
                            }"
                        >
                            History
                        </span>
                    </div>
                </NuxtLink>
                <NuxtLink to="/patient/profile">
                    <div
                        :class="{
                            'justify-start': isSidebarCollapsed,
                            'justify-center': !isSidebarCollapsed,
                        }"
                        class="flex items-center gap-3 px-4 py-5 text-xl font-bold hover:bg-[#1e3d2c]"
                    >
                        <Icon
                            name="i-material-symbols-light-account-circle"
                            style="color: white; font-size: 2rem"
                        />
                        <span
                            :class="{
                                block: isSidebarCollapsed,
                                hidden: !isSidebarCollapsed,
                            }"
                        >
                            Account
                        </span>
                    </div>
                </NuxtLink>
            </div>
            <button
                @click="logout()"
                :class="[
                    {
                        'justify-between': isSidebarCollapsed,
                        'justify-center': !isSidebarCollapsed,
                    },
                ]"
                class="flex cursor-pointer items-center gap-3 px-4 py-5 text-xl font-bold hover:bg-red-500"
            >
                <div class="flex items-center gap-2">
                    <Icon
                        name="i-material-symbols-light-power-settings-new-outline"
                        style="color: white; font-size: 2rem"
                    />
                    <span
                        class="text-white"
                        :class="{
                            block: isSidebarCollapsed,
                            hidden: !isSidebarCollapsed,
                        }"
                    >
                        Logout
                    </span>
                </div>
            </button>
        </div>

        <!-- CONTENT -->
        <div
            :class="{
                'md:pl-24 lg:pl-80': isSidebarCollapsed,
                'md:pl-24': !isSidebarCollapsed,
            }"
            class="py-5 transition-all"
        >
            <div class="px-5">
                <header
                    class="flex flex-wrap items-center justify-between gap-2 rounded-md bg-[#1e3d2c] px-5 py-2"
                >
                    <button
                        class="group flex items-center justify-center rounded border px-2 py-1 transition-all hover:bg-white"
                        @click="toggleSidebar"
                    >
                        <Icon
                            class="group-hover:bg-[#1e3d2c]"
                            name="ic:baseline-menu"
                            style="color: white; font-size: 2rem"
                        />
                    </button>

                    <div class="relative flex items-center gap-2 text-white">
                        {{ role }}
                        <button
                            class="transition-transform ease-out hover:scale-110"
                            @click="toggleUserProfileDialog()"
                        >
                            <div
                                class="flex items-center justify-center rounded-full bg-[#d9d9d9] p-1 font-bold text-black"
                            >
                                {{ current_user.valueOf().patient.first_name[0]
                                }}{{ current_user.valueOf().patient.last_name[0] }}
                            </div>
                        </button>

                        <!-- USER PROFILE DIALOG -->
                        <div
                            v-if="isUserProfileDialogOpen"
                            class="absolute right-0 top-10 z-20 w-72 rounded border bg-white px-4 pb-2 pt-5 text-black shadow-lg"
                        >
                            <h3 class="text-xs font-semibold">ACCOUNT</h3>
                            <div class="mt-3 flex items-center gap-4">
                                <div
                                    class="flex items-center justify-center rounded-full bg-[#d9d9d9] p-1 font-bold text-black"
                                >
                                    {{
                                        current_user.valueOf().patient
                                            .first_name[0]
                                    }}{{
                                        current_user.valueOf().patient.last_name[0]
                                    }}
                                </div>
                                <div class="flex flex-col justify-center">
                                    <p class="text-lg">
                                        {{
                                            current_user.valueOf().patient
                                                .first_name
                                        }}
                                        {{
                                            current_user.valueOf().patient
                                                .last_name
                                        }}
                                    </p>
                                    <span class="text-sm">{{ current_user.valueOf().patient.email }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div
                                    class="border-b border-[#AAAAAA] py-1"
                                ></div>
                                <button
                                    class="mt-2 max-w-[5rem] self-end rounded-md bg-red-500 px-2 py-1 text-red-100 hover:bg-red-700"
                                    @click="logout()"
                                >
                                    Sign out
                                </button>
                            </div>
                        </div>
                    </div>                </header>
                <!-- MAIN CONTENT -->
                <slot />
            </div>
        </div>
        <dialog ref="dialogRef" class="w-96 rounded-lg bg-white p-6 shadow-lg">
            <h2 class="mb-4 text-xl font-bold text-gray-800">
                Logout Confirmation
            </h2>
            <p class="mb-6 text-gray-600">Are you sure you want to logout?</p>
            <div class="flex flex-wrap justify-center gap-4 sm:justify-end">
                <button
                    @click="closeDialog"
                    class="rounded bg-gray-200 px-4 py-2 text-gray-800 hover:bg-gray-300"
                >
                    Cancel
                </button>
                <button
                    @click="confirmLogout"
                    class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600"
                >
                    Logout
                </button>
            </div>
        </dialog>
    </div>
</template>

<script setup>
import { useAuthStore } from "~/stores/auth";
import axios from "axios";

const isSidebarCollapsed = ref(true);
const authStore = useAuthStore();
const isUserProfileDialogOpen = ref(false);
const dialogRef = ref(null);
const role = ref("");
const current_user = useCookie("current_user");

const toggleSidebar = () => {
    isSidebarCollapsed.value = !isSidebarCollapsed.value;
};

const toggleUserProfileDialog = () => {
    isUserProfileDialogOpen.value = !isUserProfileDialogOpen.value;
};

const logout = async () => {
    dialogRef.value?.showModal();
};

const confirmLogout = async () => {
    await axios.post(
        `${useRuntimeConfig().public.laravelURL}patient/logout`,
        {},
        {
            headers: {
                Authorization: `Bearer ${authStore.token}`,
            },
        },
    );
    authStore.logout();
    navigateTo("/");
    dialogRef.value?.close();
};

const closeDialog = () => {
    dialogRef.value?.close();
};

const fetchRole = async () => {
    role.value = authStore.role;
};

onMounted(async () => {
    await fetchRole();
});
</script>

<style scoped>
::backdrop {
    backdrop-filter: blur(5px);
    background-color: rgba(0, 0, 0, 0.4);
}
</style>
