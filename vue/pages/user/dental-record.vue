<template>
    <div>
        <!-- TITLE AND SEARCH -->
        <div class="mt-7 flex items-center justify-between">
            <h1 class="text-xl font-bold sm:text-5xl">Dental Records</h1>
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
                        <th class="p-5">Status</th>
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
                                class="odd:bg-[#D9D9D9] even:bg-white"
                                v-for="(item, index) in filteredRecords"
                                :key="index"
                            >
                                <td class="p-5 font-medium">
                                    {{ item.scheduled_date }}
                                </td>
                                <td class="p-5 font-medium">
                                    {{
                                        convertTo12HourFormat(
                                            item.schedule.start_time,
                                        )
                                    }}
                                </td>
                                <td class="p-5 font-medium">
                                    {{
                                        item.patient.classification ?? "Student"
                                    }}
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
                                <td class="pl-6">
                                    <Icon
                                        v-if="item.status === 'Checked In'"
                                        name="ep:circle-check-filled"
                                        style="color: green; font-size: 2rem"
                                    />
                                    <Icon
                                        v-if="item.status === 'Pending'"
                                        name="ic:baseline-pending"
                                        style="color: #f1c232; font-size: 2rem"
                                    />
                                    <Icon
                                        v-if="item.status === 'Cancelled'"
                                        name="ep:circle-close-filled"
                                        style="color: red; font-size: 2rem"
                                    />
                                </td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr>
                                <td
                                    colspan="6"
                                    class="p-5 text-center text-gray-500"
                                >
                                    No Records Found
                                </td>
                            </tr>
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

const current_service_category_id = ref("2");
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

const convertTo12HourFormat = (time) => {
    let [hours, minutes] = time.split(":");
    hours = parseInt(hours);
    const amPm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12;
    hours = hours === 0 ? 12 : hours;
    return `${hours}:${minutes} ${amPm}`;
};

const fetchAppointments = async () => {
    isLoading.value = true;
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}user/appointments/${current_service_category_id.value}`,
            {
                params: {
                    actions: ["Checked In", "Cancelled"],
                },
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        appointmentSchedule.value = response.data;
    } catch (error) {
        console.log("error fetching appointments");
    } finally {
        isLoading.value = false;
    }
};

fetchAppointments();
</script>
