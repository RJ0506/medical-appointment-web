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
            <div class="mt-12 flex flex-grow flex-col text-white">
                <div
                    :class="[
                        {
                            'justify-between': isSidebarCollapsed,
                            'justify-center': !isSidebarCollapsed,
                        },
                    ]"
                    class="flex cursor-pointer items-center gap-3 px-4 py-5 text-xl font-bold hover:bg-[#1e3d2c]"
                >
                    <NuxtLink to="/user" class="flex items-center gap-2">
                        <svg
                            width="40"
                            height="40"
                            viewBox="0 0 40 40"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                        >
                            <rect
                                width="40"
                                height="40"
                                fill="url(#pattern0_699_267)"
                            />
                            <defs>
                                <pattern
                                    id="pattern0_699_267"
                                    patternContentUnits="objectBoundingBox"
                                    width="1"
                                    height="1"
                                >
                                    <use
                                        xlink:href="#image0_699_267"
                                        transform="scale(0.002)"
                                    />
                                </pattern>
                                <image
                                    id="image0_699_267"
                                    width="500"
                                    height="500"
                                    xlink:href="data:image/png;base64,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"
                                />
                            </defs>
                        </svg>
                        <span
                            :class="{
                                block: isSidebarCollapsed,
                                hidden: !isSidebarCollapsed,
                            }"
                        >
                            Emergency Case
                        </span>
                    </NuxtLink>
                </div>
                <div
                    v-for="(item, index) in filteredSidebarLinks"
                    :key="index"
                    @click="toggleSubLinks(index)"
                >
                    <div
                        :class="[
                            {
                                'justify-between': isSidebarCollapsed,
                                'justify-center': !isSidebarCollapsed,
                            },
                        ]"
                        class="flex cursor-pointer items-center gap-3 px-4 py-5 text-xl font-bold hover:bg-[#1e3d2c]"
                    >
                        <div class="flex items-center gap-2">
                            <Icon
                                :name="item.icon"
                                style="color: white; font-size: 2rem"
                            />
                            <span
                                :class="{
                                    block: isSidebarCollapsed,
                                    hidden: !isSidebarCollapsed,
                                }"
                            >
                                {{ item.label }}
                            </span>
                        </div>
                        <svg
                            class="transition-all duration-300 ease-out"
                            :class="[
                                {
                                    block: isSidebarCollapsed,
                                    hidden: !isSidebarCollapsed,
                                },
                                { 'rotate-180': activeLink === index },
                            ]"
                            style="color: white; font-size: 2rem"
                            width="16"
                            height="16"
                            viewBox="0 0 20 20"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                        >
                            <rect
                                width="20"
                                height="20"
                                fill="url(#pattern0_20_854)"
                            />
                            <defs>
                                <pattern
                                    id="pattern0_20_854"
                                    patternContentUnits="objectBoundingBox"
                                    width="1"
                                    height="1"
                                >
                                    <use
                                        xlink:href="#image0_20_854"
                                        transform="scale(0.002)"
                                    />
                                </pattern>
                                <image
                                    id="image0_20_854"
                                    width="500"
                                    height="500"
                                    xlink:href="data:image/png;base64,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"
                                />
                            </defs>
                        </svg>
                    </div>
                    <template v-if="activeLink === index">
                        <div
                            class="flex flex-col"
                            v-for="(child, index) in item.subLinks"
                            :key="index"
                        >
                            <NuxtLink
                                :class="[
                                    {
                                        'pl-14': isSidebarCollapsed,
                                        'text-center': !isSidebarCollapsed,
                                    },
                                ]"
                                class="w-full cursor-pointer px-4 py-5 font-bold hover:bg-[#1e3d2c]"
                                :to="child.link"
                            >
                                <span>
                                    {{ child.label }}
                                </span>
                            </NuxtLink>
                        </div>
                    </template>
                </div>
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
                    <div class="flex items-center gap-2 text-white">
                        {{ role }}
                        <div
                            class="flex items-center justify-center rounded-full bg-[#d9d9d9] p-1 font-bold text-black"
                        >
                            {{ current_user.valueOf().user.last_name[0]
                            }}{{ current_user.valueOf().user.first_name[0] }}
                        </div>
                    </div>
                </header>
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
const authStore = useAuthStore();
const isSidebarCollapsed = ref(false);
const activeLink = ref(null);
const dialogRef = ref(null);
const isDoctor = ref(authStore.isDoctor);
const role = ref("");
const current_user = useCookie("current_user");
const sidebarLinks = ref([
    {
        label: "Medical",
        icon: "i-material-symbols-light-medical-services-outline-sharp",
        subLinks: [
            { label: "Schedule", link: "/user/medical-appointment" },
            { label: "Record", link: "/user/medical-record" },
        ],
    },
    {
        label: "Dental",
        icon: "i-material-symbols-light-medical-mask-outline-sharp",
        subLinks: [
            { label: "Schedule", link: "/user/dental-appointment" },
            { label: "Record", link: "/user/dental-record" },
        ],
    },
    {
        label: "Schedule",
        icon: "i-ep-calendar",
        subLinks: [{ label: "Manage Schedule", link: "/user/manage-schedule" }],
    },
    {
        label: "Inventory",
        icon: "i-material-symbols-light-inventory-2-outline-sharp",
        subLinks: [
            { label: "Medicine Record", link: "/user/medicine-inventory" },
            { label: "Medicine Log Sheet", link: "/user/medicine-logsheet" },
        ],
    },
    {
        label: "Patient Record",
        icon: "i-material-symbols-light-drive-folder-upload-outline",
        subLinks: [
            {
                label: "Medical Health Record",
                link: "/user/medical-health-record",
            },
            {
                label: "Dental Health Record",
                link: "/user/dental-health-record",
            },
        ],
    },
]);

const filteredSidebarLinks = computed(() =>
  isDoctor.value
    ? sidebarLinks.value.filter((link) => link.label === "Patient Record")
    : sidebarLinks.value
);

const toggleSidebar = () => {
    isSidebarCollapsed.value = !isSidebarCollapsed.value;
};

const toggleSubLinks = (index) => {
    if (activeLink.value === index) {
        activeLink.value = null; // Hide if the same link is clicked
    } else {
        activeLink.value = index; // Show sublinks for the clicked link
    }
};

const logout = async () => {
    dialogRef.value?.showModal();
};

const confirmLogout = async () => {
    await axios.post(
        `${useRuntimeConfig().public.laravelURL}user/logout`,
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
