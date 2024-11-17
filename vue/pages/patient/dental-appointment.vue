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
                <div class="mt-2 flex flex-wrap justify-center gap-2">
                    <div v-for="(service, index) in service_types" :key="index">
                        <input
                            class="peer hidden"
                            type="radio"
                            :id="service.id"
                            name="appointment"
                            :value="service.id"
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
                    <div>
                        <label class="block font-semibold" for="date"
                            >Date:</label
                        >
                        <input
                            class="w-full rounded px-4 py-1"
                            type="date"
                            id="date"
                            name="date"
                            :min="currentDate"
                            v-model="formData.date"
                        />
                    </div>
                    <div class="mt-3">
                        <h2 class="font-semibold">Time</h2>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <input
                                    class="peer hidden"
                                    type="radio"
                                    id="12:00"
                                    name="time"
                                    value="12:00PM"
                                    v-model="formData.time"
                                />
                                <label
                                    class="inline-flex w-full cursor-pointer rounded bg-[#2abb49] px-7 py-1 font-semibold text-white hover:bg-emerald-600 peer-checked:bg-emerald-800"
                                    for="12:00"
                                >
                                    12:00 PM
                                </label>
                            </div>
                            <div>
                                <input
                                    class="peer hidden"
                                    type="radio"
                                    id="12:20"
                                    name="time"
                                    value="12:20PM"
                                    v-model="formData.time"
                                />
                                <label
                                    class="inline-flex w-full cursor-pointer rounded bg-[#2abb49] px-7 py-1 font-semibold text-white hover:bg-emerald-600 peer-checked:bg-emerald-800"
                                    for="12:20"
                                >
                                    12:20 PM
                                </label>
                            </div>
                            <div>
                                <input
                                    class="peer hidden"
                                    type="radio"
                                    id="12:40"
                                    name="time"
                                    value="12:40PM"
                                    v-model="formData.time"
                                />
                                <label
                                    class="inline-flex w-full cursor-pointer rounded bg-[#2abb49] px-7 py-1 font-semibold text-white hover:bg-emerald-600 peer-checked:bg-emerald-800"
                                    for="12:40"
                                >
                                    12:40 PM
                                </label>
                            </div>
                            <div>
                                <input
                                    class="peer hidden"
                                    type="radio"
                                    id="01:00"
                                    name="time"
                                    value="01:00PM"
                                    v-model="formData.time"
                                />
                                <label
                                    class="inline-flex w-full cursor-pointer rounded bg-[#2abb49] px-7 py-1 font-semibold text-white hover:bg-emerald-600 peer-checked:bg-emerald-800"
                                    for="01:00"
                                >
                                    1:00 PM
                                </label>
                            </div>
                            <div>
                                <input
                                    class="peer hidden"
                                    type="radio"
                                    id="01:20"
                                    name="time"
                                    value="01:20PM"
                                    v-model="formData.time"
                                />
                                <label
                                    class="inline-flex w-full cursor-pointer rounded bg-[#2abb49] px-7 py-1 font-semibold text-white hover:bg-emerald-600 peer-checked:bg-emerald-800"
                                    for="01:20"
                                >
                                    1:20 PM
                                </label>
                            </div>
                            <div>
                                <input
                                    class="peer hidden"
                                    type="radio"
                                    id="01:40"
                                    name="time"
                                    value="01:40PM"
                                    v-model="formData.time"
                                />
                                <label
                                    class="inline-flex w-full cursor-pointer rounded bg-[#2abb49] px-7 py-1 font-semibold text-white hover:bg-emerald-600 peer-checked:bg-emerald-800"
                                    for="01:40"
                                >
                                    1:40 PM
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <button
                    class="mt-5 w-fit self-center rounded bg-[#1e3d2c] px-10 py-1 text-white hover:bg-emerald-800"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { useAuthStore } from "~/stores/auth";

definePageMeta({
    layout: "patient",
});

const authStore = useAuthStore();
const currentDate = ref("");
const service_types = ref([]);
const formData = ref({
    service_type_id: "",
    date: "",
    time: "",
});

const handleSubmit = async () => {
    console.log(formData.value);
    try {
        const result = await axios.post(
            `${useRuntimeConfig().public.laravelURL}patient/appointment`,
            formData.value,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        console.log("resukt: ", result);
    } catch (error) {
        console.log("Error Creating appointment");
    }
};

const current_service_category_id = ref("2");
const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, "0");
const day = String(today.getDate()).padStart(2, "0");
currentDate.value = `${year}-${month}-${day}`;

const fetchServiceTypes = async () => {
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}patient/appointment/service-types/${current_service_category_id.value}`,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        service_types.value = response.data;
    } catch (error) {
        console.log("Failed to fetch service types");
    }
};

// HAVING ERROR WHEN FETCHING
// const fetchSchedule = async () => {
//     try {
//         const response = await axios.get(
//             `${useRuntimeConfig().public.laravelURL}patient/appointment/schedules`,
//             {
//                 headers: {
//                     Authorization: `Bearer ${authStore.token}`,
//                 },
//             },
//         );
//         console.log("schedules", response);
//     } catch (error) {
//         console.log("Failed to Schedules");
//     }
// };

fetchServiceTypes();
// fetchSchedule();
</script>
