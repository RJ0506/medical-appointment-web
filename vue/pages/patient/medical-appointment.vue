<template>
    <div class="grid">
        <div class="mt-10">
            <h1 class="text-2xl font-bold sm:text-4xl">
                Schedule an Appointment
            </h1>
            <form
                class="mx-auto mt-8 flex max-w-3xl flex-col gap-6 bg-[#d9d9d9] p-4"
                @submit.prevent="handleSubmit"
            >
                <div>
                    <h2 class="font-bold">
                        Select the service you want to get the appointment for:
                    </h2>
                    <div class="mt-2 flex flex-wrap justify-center gap-2">
                        <div
                            v-for="(service, index) in service_types"
                            :key="index"
                        >
                            <input
                                class="peer hidden"
                                type="radio"
                                :id="service.id"
                                name="appointment"
                                :value="service.id"
                                v-model="formData.appointment"
                            />
                            <label
                                class="inline-flex cursor-pointer rounded bg-[#2abb49] px-10 py-1 font-semibold text-white hover:bg-emerald-600 peer-checked:bg-emerald-800"
                                :for="service.id"
                            >
                                {{ service.name }}
                            </label>
                        </div>
                    </div>
                </div>

                <div v-if="formData.appointment === 'vaccine'">
                    <h2 class="font-bold">
                        Please select the vaccine you would like to receive from
                        the list below.
                    </h2>
                    <div class="mx-auto my-2 w-fit">
                        <div>
                            <input
                                type="radio"
                                id="vaccineType1"
                                value="Measles-Containing Vaccine (MCV)"
                                v-model="formData.vaccineType"
                            />
                            <label class="ml-2 font-bold" for="vaccineType1"
                                >Measles-Containing Vaccine (MCV)</label
                            >
                        </div>
                        <div>
                            <input
                                type="radio"
                                id="vaccineType2"
                                value="Tetanus-Diphtheria (Td) Vaccine"
                                v-model="formData.vaccineType"
                            />
                            <label class="ml-2 font-bold" for="vaccineType2"
                                >Tetanus-Diphtheria (Td) Vaccine</label
                            >
                        </div>
                        <div>
                            <input
                                type="radio"
                                id="vaccineType3"
                                value="Measles-Rubella (MR) Vaccine"
                                v-model="formData.vaccineType"
                            />
                            <label class="ml-2 font-bold" for="vaccineType3"
                                >Measles-Rubella (MR) Vaccine</label
                            >
                        </div>
                        <div>
                            <input
                                type="radio"
                                id="vaccineType4"
                                value="Human Papillomavirus (HPV) Vaccine"
                                v-model="formData.vaccineType"
                            />
                            <label class="ml-2 font-bold" for="vaccineType4"
                                >Human Papillomavirus (HPV) Vaccine</label
                            >
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="font-bold">
                        What date would you like to schedule your appointment
                        for?
                    </h2>
                    <div class="mx-auto w-fit">
                        <input
                            required
                            class="w-full rounded px-4 py-1"
                            type="date"
                            id="date"
                            name="date"
                            :min="currentDate"
                            v-model="formData.date"
                        />
                    </div>
                </div>
                <div>
                    <h2 class="font-bold">
                        What time would you like your appointment?
                    </h2>
                    <div class="mx-auto mt-3 w-fit">
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
                    Submit Appointment
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
const current_service_category_id = ref("1");
const service_types = ref([]);
const formData = ref({
    appointment: "",
    date: "",
    vaccineType: "",
    time: "",
});

watch(
    () => formData.value.appointment,
    (newVal) => {
        if (newVal !== "vaccine") {
            formData.value.vaccineType = "";
        }
    },
);

const handleSubmit = () => {
    console.log(formData.value);
};

const getCurrentDate = () => {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, "0");
    const day = String(today.getDate()).padStart(2, "0");
    return `${year}-${month}-${day}`;
};

currentDate.value = getCurrentDate();

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

fetchServiceTypes();
</script>
