<template>
    <div>
        <!-- SIDEBAR -->
        <div
            :class="{
                'w-72': isSidebarCollapsed,
                'w-0 md:w-24': !isSidebarCollapsed,
            }"
            class="fixed z-50 flex h-full flex-col overflow-hidden bg-gradient-to-b from-[#4b896a] to-slate-300 py-6 transition-all"
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
            <div class="mt-24 flex flex-col text-white">
                <div
                    v-for="(item, index) in sidebarLinks"
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
                        <Icon
                            class="transition-all duration-300 ease-out"
                            :class="[
                                {
                                    block: isSidebarCollapsed,
                                    hidden: !isSidebarCollapsed,
                                },
                                { 'rotate-180': activeLink === index },
                            ]"
                            name="i-material-symbols-arrow-downward-alt"
                            style="color: white; font-size: 2rem"
                        />
                    </div>
                    <div
                        class="flex flex-col"
                        v-if="activeLink === index"
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
                            {{ child.label }}
                        </NuxtLink>
                    </div>
                </div>
            </div>
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
                    class="flex justify-between rounded-md bg-[#1e3d2c] px-5 py-2"
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

                    <div
                        class="w-fit rounded-md bg-[#d9d9d9] p-3 text-xl font-bold text-black"
                    >
                        PP
                    </div>
                </header>
                <!-- MAIN CONTENT -->
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
const isSidebarCollapsed = ref(false);
const activeLink = ref(null);
const sidebarLinks = ref([
    {
        label: "Appointment",
        icon: "ep:calendar",
        subLinks: [
            { label: "Medical", link: "/user" },
            { label: "Dental", link: "/user/dental-appointment" },
        ],
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
            { label: "Medical", link: "#" },
            { label: "Dental", link: "#" },
        ],
    },
]);

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
</script>
