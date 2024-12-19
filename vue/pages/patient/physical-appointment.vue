<template>
    <div class="grid">
        <div class="mt-10">
            <h1 class="text-2xl font-bold sm:text-4xl">Physical Examination Request</h1>
            <form
                @submit.prevent="handleSubmit"
                class="mx-auto mt-8 flex max-w-3xl flex-col gap-2 bg-[#d9d9d9] px-8 py-4"
            >
                <h2 class="text-center text-xl font-bold">
                    Examination Details
                </h2>
                <div>
                    <div class="font-bold">
                        <h3 for="purpose">Purpose of Examination</h3>
                        <div class="mt-2">
                            <input
                                type="radio"
                                id="Employment"
                                name="purpose"
                                value="Employment"
                                v-model="formData.purpose"
                            />
                            <label for="Employment">Employment</label>
                        </div>
                        <div>
                            <input
                                type="radio"
                                id="School"
                                name="purpose"
                                value="School Requirement"
                                v-model="formData.purpose"
                            />
                            <label for="School">School Requirement</label>
                        </div>
                        <div>
                            <input
                                type="radio"
                                id="Sport"
                                name="purpose"
                                value="Sport Activity"
                                v-model="formData.purpose"
                            />
                            <label for="Sport">Sports Activity</label>
                        </div>
                        <div>
                            <input
                                type="radio"
                                id="others"
                                name="purpose"
                                value="others"
                                v-model="formData.purpose"
                            />
                            <label for="others">Others (Please Specify)</label>
                        </div>
                        <p
                            v-if="
                                submitErrorMessages &&
                                submitErrorMessages.purpose
                            "
                            class="text-red-500"
                        >
                            {{ submitErrorMessages.purpose[0] }}
                        </p>
                    </div>
                    <div class="mt-5 flex flex-col">
                        <label class="font-bold" for="preffered_date"
                            >Preffered Date of Examination</label
                        >
                        <input
                            class="mx-auto mt-2 sm:w-1/3"
                            type="date"
                            v-model="formData.scheduled_date"
                            :min="currentDate"
                        />
                        <p
                            v-if="
                                submitErrorMessages &&
                                submitErrorMessages.scheduled_date
                            "
                            class="text-red-500"
                        >
                            {{ submitErrorMessages.scheduled_date[0] }}
                        </p>
                    </div>
                    <div class="mt-5 font-bold">
                        <h3 class="font-bold">Preferred Time Slot</h3>
                        <div>
                            <input
                                type="radio"
                                id="Morning"
                                name="preffered_time_slot"
                                value="Morning"
                                v-model="formData.time_slot"
                            />
                            <label for="Morning">Morning</label>
                        </div>
                        <div>
                            <input
                                type="radio"
                                id="Afternoon"
                                name="preffered_time_slot"
                                value="Afternoon"
                                v-model="formData.time_slot"
                            />
                            <label for="Afternoon">Morning</label>
                        </div>
                        <div>
                            <input
                                type="radio"
                                id="Evening"
                                name="preffered_time_slot"
                                value="Evening"
                                v-model="formData.time_slot"
                            />
                            <label for="Evening">Evening</label>
                        </div>
                        <p
                            v-if="
                                submitErrorMessages &&
                                submitErrorMessages.time_slot
                            "
                            class="text-red-500"
                        >
                            {{ submitErrorMessages.time_slot[0] }}
                        </p>
                    </div>
                    <div class="mt-2 text-center font-bold">
                        <p class="mt-2 text-xl">Authorization</p>
                        <span
                            >I, the undersigned, hereby request a physical
                            examination and authorize the healthcare provider to
                            perform the necessary examination and provide a
                            report
                        </span>
                    </div>
                    <button
                        class="mt-5 w-fit self-center rounded bg-[#1e3d2c] px-10 py-1 text-white hover:bg-emerald-800"
                    >
                        Submit
                    </button>
                </div>
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
    middleware: [
        function (to, from) {
            const authStore = useAuthStore();
            const role = authStore.role;

            if (role !== "Employee") {
                return navigateTo("/patient");
            }
        },
    ],
});

const currentDate = ref("");
const isAdding = ref(false);
const submitErrorMessages = ref();
const authStore = useAuthStore();

const initialFormData = ref({
    isAuthorized: false,
    purpose: "",
    scheduled_date: "",
    time_slot: "",
});

const formData = ref({
    isAuthorized: false,
    purpose: "",
    scheduled_date: "",
    time_slot: "",
});

const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, "0");
const day = String(today.getDate()).padStart(2, "0");
currentDate.value = `${year}-${month}-${day}`;

const handleSubmit = async () => {
    isAdding.value = true;
    submitErrorMessages.value = "";
    try {
        const result = await axios.post(
            `${useRuntimeConfig().public.laravelURL}patient/physical-exams`,
            formData.value,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        submitErrorMessages.value = "";
        formData.value = { ...initialFormData.value };
        // dialogRef.value?.showModal();
        isAdding.value = false;
    } catch (error) {
        isAdding.value = false;
        submitErrorMessages.value = error.response.data.errors;
        console.log("Error Creating appointment");
    }
};
</script>
