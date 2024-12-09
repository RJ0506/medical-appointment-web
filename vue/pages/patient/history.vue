<template>
    <div>
        <h1 class="mt-10 text-2xl font-bold sm:text-4xl">History</h1>
        <!-- TABLE -->
        <div class="mt-8 overflow-x-auto">
            <table class="w-full table-auto text-left">
                <thead class="text-white">
                    <tr class="bg-[#1e3d2c]">
                        <th class="p-5">Date</th>
                        <th class="p-5">Time</th>
                        <th class="p-5">Doctor</th>
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
                        <template v-if="historyList.length > 0">
                            <tr
                                v-for="(item, index) in historyList"
                                :key="index"
                            >
                                <td class="p-5 font-medium">
                                    {{ item.scheduled_date }}
                                </td>
                                <td class="p-5 font-medium">
                                    {{ convertTo12HourFormat(item.schedule.start_time) }}
                                </td>
                                <td class="p-5 font-medium">
                                    {{ item.schedule.doctor.first_name }}
                                    {{ item.schedule.doctor.last_name }}
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
    layout: "patient",
});

const isLoading = ref(true);
const historyList = ref([]);
const authStore = useAuthStore();

const convertTo12HourFormat = (time) => {
    let [hours, minutes] = time.split(":");
    hours = parseInt(hours);
    const amPm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12;
    hours = hours === 0 ? 12 : hours;
    return `${hours}:${minutes} ${amPm}`;
};

const fetchHistory = async () => {
    isLoading.value = true;
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}patient/appointments`,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        historyList.value = response.data;
    } catch (error) {
        console.log("error fetching history");
    } finally {
        isLoading.value = false;
    }
};

fetchHistory();
</script>
