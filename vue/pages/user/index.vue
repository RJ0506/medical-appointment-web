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
                    placeholder="Search name or service..."
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
                    <template v-if="isLoading">
                        <tr>
                            <td colspan="6" class="text-center"><Spinner /></td>
                        </tr>
                    </template>
                    <template v-else>
                        <template v-if="filteredRecords.length > 0">
                            <tr
                                v-for="(item, index) in filteredRecords"
                                :key="index"
                            >
                                <td class="p-5 font-medium">
                                    {{ item.scheduled_date }}
                                </td>
                                <td class="p-5 font-medium">
                                    {{ item.schedule.start_time }}
                                </td>
                                <td class="p-5 font-medium">
                                    {{ item.patient.nationality }}
                                </td>
                                <td class="p-5 font-medium">
                                    {{ item.patient.first_name }}
                                    {{
                                        item.patient.middle_initial
                                            ? item.patient.middle_initial + ", "
                                            : ""
                                    }}
                                    {{ item.patient.last_name }}
                                </td>
                                <td class="p-5 font-medium">
                                    {{ item.schedule.service_type.name }}
                                </td>
                                <td>
                                    <div class="flex gap-2">
                                        <button
                                            @click="checkIn(item.id)"
                                            class="rounded-md bg-[#2abb49] p-2 font-bold text-white hover:bg-emerald-700"
                                        >
                                            Checked In
                                        </button>
                                        <button
                                            @click="cancel(item.id)"
                                            class="rounded-md bg-[#ff0000] p-2 font-bold text-white hover:bg-red-700"
                                        >
                                            Cancelled
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                        <template v-else>
                            <td colspan="6" class="text-center">
                                No Records Found
                            </td>
                        </template>
                    </template>
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

const current_service_category_id = ref("1");
const appointmentSchedule = ref([]);
const authStore = useAuthStore();
const searchTerm = ref("");
const isLoading = ref(true);

const filteredRecords = computed(() => {
    if (!searchTerm.value) {
        return appointmentSchedule.value;
    }
    return appointmentSchedule.value.filter((item) => {
        return (
            item.patient.first_name
                .toLowerCase()
                .includes(searchTerm.value.toLowerCase()) ||
            item.patient.last_name
                .toLowerCase()
                .includes(searchTerm.value.toLowerCase()) ||
            item.schedule.service_type.name
                .toLowerCase()
                .includes(searchTerm.value.toLowerCase())
        );
    });
});

const fetchAppointments = async () => {
    isLoading.value = true;
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}user/appointments/${current_service_category_id.value}`,
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
    } finally {
        isLoading.value = false;
    }
};

fetchAppointments();

const checkIn = async (id) => {
    try {
        const response = await axios.patch(
            `${useRuntimeConfig().public.laravelURL}user/appointments/status/${id}`,
            { action: "Checked in" },
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        fetchAppointments();
    } catch (error) {
        console.log("Error Checking In Appointment");
    }
};

const cancel = async (id) => {
    try {
        const response = await axios.patch(
            `${useRuntimeConfig().public.laravelURL}user/appointments/status/${id}`,
            { action: "Cancelled" },
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        fetchAppointments();
    } catch (error) {
        console.log("Error Cancelling Appointment");
    }
};
</script>
