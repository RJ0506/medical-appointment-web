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
                                    {{ item.schedule.start_time }}
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
                                        name="i-material-symbols-light-check-circle-rounded"
                                        style="color: green; font-size: 2rem"
                                    />
                                    <Icon
                                        v-if="item.status === 'Pending'"
                                        name="i-material-symbols-light-pending"
                                        style="color: green; font-size: 2rem"
                                    />
                                    <Icon
                                        v-if="item.status === 'Cancelled'"
                                        name="i-material-symbols-light-cancel"
                                        style="color: red; font-size: 2rem"
                                    />
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
    layout: "patient",
});

const isLoading = ref(true);
const historyList = ref([]);
const authStore = useAuthStore();

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
