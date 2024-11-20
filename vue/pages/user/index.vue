<template>
    <div>
        <!-- TITLE AND SEARCH -->
        <div class="mt-7 flex items-center justify-between">
            <h1 class="text-xl font-bold sm:text-5xl">Medical Appointment</h1>
            <div class="relative">
                <input
                    type="text"
                    v-model="searchTerm"
                    class="search-input w-full rounded-md border border-gray-300 py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Search name..."
                />
                <svg
                    class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 transform text-gray-400"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 21l-4.35-4.35M17 10a7 7 0 10-14 0 7 7 0 0014 0z"
                    />
                </svg>
            </div>
        </div>

        <!-- TABLE -->
        <div class="mt-7 overflow-x-auto">
            <table class="w-full table-auto text-left">
                <thead class="text-white">
                    <tr class="bg-[#1e3d2c]">
                        <th class="p-5">Date</th>
                        <th class="p-5">Time</th>
                        <th class="p-5">Classification</th>
                        <th class="p-5">Fullname</th>
                        <th class="p-5">Service</th>
                        <th class="p-5">Action</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    <tr v-for="(item, index) in filteredRecords" :key="index">
                        <td class="p-5 font-medium">{{ item.date }}</td>
                        <td class="p-5 font-medium">{{ item.time }}</td>
                        <td class="p-5 font-medium">
                            {{ item.classification }}
                        </td>
                        <td class="p-5 font-medium">{{ item.name }}</td>
                        <td class="p-5 font-medium">{{ item.service }}</td>
                        <td>
                            <div class="flex gap-2">
                                <button
                                    class="rounded-md bg-[#2abb49] p-2 font-bold text-white hover:bg-emerald-700"
                                >
                                    Checked In
                                </button>
                                <button
                                    class="rounded-md bg-[#ff0000] p-2 font-bold text-white hover:bg-red-700"
                                >
                                    Cancelled
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { useAuthStore } from "~/stores/auth";

definePageMeta({
    layout: "user",
});

const appointmentSchedule = ref([]);
const authStore = useAuthStore();
const searchTerm = ref("");
const records = ref([
    {
        date: "10/01/2023",
        time: "12:00PM",
        classification: "Student",
        name: "Alice Johnson",
        service: "Vaccination",
    },
    {
        date: "10/02/2023",
        time: "1:40PM",
        classification: "Faculty",
        name: "Bob Smith",
        service: "Checkup",
    },
    {
        date: "10/03/2023",
        time: "12:20PM",
        classification: "Student",
        name: "Charlie Brown",
        service: "Checkup",
    },
    {
        date: "10/04/2023",
        time: "12:40PM",
        classification: "Faculty",
        name: "Professor Mary Davis",
        service: "Vaccination",
    },
    {
        date: "10/05/2023",
        time: "1:20PM",
        classification: "Student",
        name: "Emma Wilson",
        service: "Vaccination",
    },
]);

const filteredRecords = computed(() => {
    if (!searchTerm.value) {
        return records.value;
    }
    return records.value.filter((item) => {
        return item.name.toLowerCase().includes(searchTerm.value.toLowerCase());
    });
});

const fetchAppointments = async () => {
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}user/medicines`,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        console.log("fetchAppointments ", response.data);
        appointmentSchedule.value = response.data;
    } catch (error) {
        console.log("error fetching appointments");
    }
};

fetchAppointments();
</script>
