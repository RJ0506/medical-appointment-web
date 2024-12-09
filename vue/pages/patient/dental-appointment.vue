<template>
    <div class="grid">
        <div class="mt-10">
            <h1 class="text-2xl font-bold sm:text-4xl">
                Schedule an Appointment
            </h1>
            <form
                @submit.prevent="handleSubmit"
                class="mx-auto mt-8 flex max-w-3xl flex-col gap-2 bg-[#d9d9d9] p-4"
            >
                <h2 class="font-bold">
                    Select the service you want to get the appointment for:
                </h2>
                <div v-if="isLoading" class="text-center"><Spinner /></div>
                <div
                    v-if="!isLoading"
                    class="mt-2 flex flex-wrap justify-center gap-2"
                >
                    <div v-for="(service, index) in service_types" :key="index">
                        <input
                            class="peer hidden"
                            type="radio"
                            :id="service.id"
                            name="appointment"
                            :value="service.id"
                            @change="fetchSchedule()"
                            v-model="formData.service_type_id"
                        />
                        <label
                            class="inline-flex cursor-pointer rounded bg-[#2abb49] px-10 py-1 font-semibold text-white hover:bg-emerald-600 peer-checked:bg-emerald-800"
                            :for="service.id"
                        >
                            {{ service.name }}
                        </label>
                    </div>
                </div>
                <div class="mx-auto">
                    <div v-if="formData.service_type_id">
                        <label class="block font-semibold" for="date"
                            >Date:</label
                        >
                        <input
                            class="w-full rounded px-4 py-1"
                            type="date"
                            id="date"
                            name="date"
                            @change="fetchSchedule()"
                            :min="currentDate"
                            v-model="formData.date"
                        />
                    </div>
                    <div v-if="isFetchingTime">
                        <div class="text-center"><Spinner /></div>
                    </div>
                    <div v-if="!isFetchingTime">
                        <div v-if="formData.date" class="mt-3">
                            <div
                                v-if="available_schedule.length === 0"
                                class="col-span-2 text-center text-red-500"
                            >
                                No schedules available.
                            </div>
                            <div v-else>
                                <h2 class="font-semibold">Time</h2>
                                <div class="grid grid-cols-2 gap-2">
                                    <div
                                        v-for="(
                                            schedule, index
                                        ) in available_schedule"
                                        :key="index"
                                    >
                                        <input
                                            class="peer hidden"
                                            type="radio"
                                            :id="schedule.start_time"
                                            name="time"
                                            :value="schedule.start_time"
                                            v-model="formData.time"
                                        />
                                        <label
                                            class="inline-flex w-full cursor-pointer rounded bg-[#2abb49] px-7 py-1 font-semibold text-white hover:bg-emerald-600 peer-checked:bg-emerald-800"
                                            :for="schedule.start_time"
                                        >
                                            {{ convertTo12HourFormat(schedule.start_time) }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button
                    v-if="formData.time"
                    class="mt-5 w-fit self-center rounded bg-[#1e3d2c] px-10 py-1 text-white hover:bg-emerald-800"
                >
                    Submit
                </button>
            </form>
        </div>
        <!-- DIALOG -->
        <dialog
            ref="dialogRef"
            class="w-full max-w-3xl rounded-md border border-[#000000] p-6 text-center shadow-lg"
        >
            <h1 class="mb-4 text-lg font-bold">Thank you!</h1>
            <p class="font-bold">
                Your appointment has been successfully scheduled, and we look
                forward to seeing you!
            </p>

            <button
                @click="closeDialog"
                class="mt-4 rounded bg-[#347956] px-4 py-2 font-bold text-white"
            >
                OK
            </button>
        </dialog>
    </div>
</template>

<script setup>
import axios from "axios";
import { useAuthStore } from "~/stores/auth";

definePageMeta({
    layout: "patient",
});

const dialogRef = ref(null);

const authStore = useAuthStore();
const currentDate = ref("");
const isLoading = ref(true);
const isFetchingTime = ref(false);
const service_types = ref([]);
const formData = ref({
    service_type_id: "",
    date: "",
    time: "",
});



const convertTo12HourFormat = (time) => {
    let [hours, minutes] = time.split(":");
    hours = parseInt(hours);
    const amPm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12;
    hours = hours === 0 ? 12 : hours;
    return `${hours}:${minutes} ${amPm}`;
};

const handleSubmit = async () => {
    try {
        const result = await axios.post(
            `${useRuntimeConfig().public.laravelURL}patient/appointments`,
            formData.value,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        dialogRef.value?.showModal();
    } catch (error) {
        console.log("Error Creating appointment");
    }
};

const current_service_category_id = ref("2");
const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, "0");
const day = String(today.getDate()).padStart(2, "0");
const available_schedule = ref([]);
currentDate.value = `${year}-${month}-${day}`;

const fetchServiceTypes = async () => {
    isLoading.value = true;
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}patient/appointments/service-types/${current_service_category_id.value}`,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        service_types.value = response.data;
    } catch (error) {
        console.log("Failed to fetch service types");
    } finally {
        isLoading.value = false;
    }
};

const fetchSchedule = async () => {
    if (!formData.value.service_type_id || !formData.value.date) return;
    isFetchingTime.value = true;
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}patient/appointments/schedules`,
            {
                params: {
                    service_type_id: formData.value.service_type_id,
                    date: formData.value.date,
                },
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        available_schedule.value = response.data;
    } catch (error) {
        console.log("Failed to fetch schedules", error);
    } finally {
        isFetchingTime.value = false;
    }
};

fetchServiceTypes();

const closeDialog = () => {
    dialogRef.value?.close();
    navigateTo("/patient/history");
};
</script>

<style scoped>
::backdrop {
    backdrop-filter: blur(5px);
    background-color: rgba(0, 0, 0, 0.4);
}
</style>
