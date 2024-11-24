<template>
    <div class="mx-auto max-w-md rounded-lg bg-white p-6 shadow-md">
        <h2 class="mb-4 text-center text-2xl font-bold">Manage Schedule</h2>
        <form @submit.prevent="handleSubmit" class="space-y-4">
            <div>
                <label for="day_of_week" class="block font-medium text-gray-700"
                    >Day of the Week</label
                >
                <select
                    id="day_of_week"
                    v-model="formData.day_of_week"
                    class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-purple-500"
                >
                    <option value="" disabled>Select a day</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
                <p
                    v-if="
                        submitErrorMessages && submitErrorMessages.day_of_week
                    "
                    class="text-red-500"
                >
                    {{ submitErrorMessages.day_of_week[0] }}
                </p>
            </div>

            <div>
                <label for="start_time" class="block font-medium text-gray-700"
                    >Start Time</label
                >
                <input
                    type="time"
                    id="start_time"
                    v-model="formData.start_time"
                    class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-purple-500"
                />
                <p
                    v-if="submitErrorMessages && submitErrorMessages.start_time"
                    class="text-red-500"
                >
                    {{ submitErrorMessages.start_time[0] }}
                </p>
            </div>

            <div>
                <label for="end_time" class="block font-medium text-gray-700"
                    >End Time</label
                >
                <input
                    type="time"
                    id="end_time"
                    v-model="formData.end_time"
                    class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-purple-500"
                />
                <p
                    v-if="submitErrorMessages && submitErrorMessages.end_time"
                    class="text-red-500"
                >
                    {{ submitErrorMessages.end_time[0] }}
                </p>
            </div>

            <!-- <div>
          <label for="doctor_id" class="block text-gray-700 font-medium">Doctor ID</label>
          <input
            type="text"
            id="doctor_id"
            v-model="formData.doctor_id"
            placeholder="Enter Doctor ID"
            class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-purple-500"
          />
        </div> -->

            <div>
                <label
                    for="service_type_id"
                    class="block font-medium text-gray-700"
                    >Service Type</label
                >
                <select
                    id="service_type_id"
                    v-model="formData.service_type_id"
                    class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-purple-500"
                >
                    <option value="" disabled>Select a service type</option>
                    <option value="1">Medical</option>
                    <option value="2">Dental</option>
                </select>
                <p
                    v-if="
                        submitErrorMessages &&
                        submitErrorMessages.service_type_id
                    "
                    class="text-red-500"
                >
                    {{ submitErrorMessages.service_type_id[0] }}
                </p>
            </div>
            <button
                :disabled="isAdding"
                type="submit"
                class="w-full rounded-lg bg-[#1E3D2C] px-4 py-2 text-white hover:bg-emerald-900"
            >
                {{ isAdding ? "Adding..." : "Submit" }}
            </button>
        </form>
    </div>

    <!-- SEARCH -->
    <!-- <div class="relative mt-7">
        <input
            type="text"
            v-model="searchTerm"
            class="search-input rounded-md border border-gray-300 py-2 pl-10 pr-4 focus:outline-none focus:ring-2"
            placeholder="Search brand/generic..."
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
    </div> -->
    <!-- TABLE -->
    <div class="mt-7 overflow-x-auto">
        <table class="w-full table-auto text-left">
            <thead class="text-white">
                <tr class="bg-[#1e3d2c]">
                    <th class="p-5">Day</th>
                    <th class="p-5">Start Time</th>
                    <th class="p-5">End Time</th>
                    <th class="p-5">Service Type</th>
                    <th class="p-5">Doctor</th>
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
                                {{
                                    convertTo12HourFormat(
                                        item.schedule.start_time,
                                    )
                                }}
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
</template>

<script setup>
import axios from "axios";
import { useAuthStore } from "~/stores/auth";

definePageMeta({
    layout: "user",
});

const authStore = useAuthStore();
const submitErrorMessages = ref("");
const searchTerm = ref("");
const appointmentSchedule = ref([]);
const isLoading = ref(true);
const isAdding = ref(false);
const formData = ref({
    day_of_week: "",
    start_time: "",
    end_time: "",
    doctor_id: "4",
    service_type_id: "",
});

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

const fetchSchedule = async () => {
    isLoading.value = true;
    try {
        const result = await axios.get(
            `${useRuntimeConfig().public.laravelURL}user/appointment-schedules`,
            formData.value,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        console.log("fetch Schedule", result.data);
        appointmentSchedule.value = result.data;
    } catch (error) {
        console.log("Error Submitting");
    } finally {
        isLoading.value = false;
    }
};

// const fetchServiceTypes = async () => {
//     // isLoading.value = true;
//     try {
//         const response = await axios.get(
//             `${useRuntimeConfig().public.laravelURL}user/service-categories`,
//             {
//                 headers: {
//                     Authorization: `Bearer ${authStore.token}`,
//                 },
//             },
//         );
//         console.log("service", response.data)
//         // service_types.value = response.data;
//     } catch (error) {
//         console.log("Failed to fetch service types");
//     } finally {
//         // isLoading.value = false;
//     }
// };

// fetchServiceTypes();

const handleSubmit = async () => {
    isAdding.value = true;
    console.log(formData.value);
    try {
        const result = await axios.post(
            `${useRuntimeConfig().public.laravelURL}user/appointment-schedules`,
            formData.value,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        fetchSchedule();
    } catch (error) {
        submitErrorMessages.value = error.response.data.errors;
        console.log("Error Submitting");
    } finally {
        isAdding.value = false;
    }
};

fetchSchedule();
</script>
