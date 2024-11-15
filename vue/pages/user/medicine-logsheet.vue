<template>
    <div>
        <!-- TITLE AND SEARCH -->
        <div class="mt-7 flex items-center justify-between">
            <h1 class="text-xl font-bold sm:text-5xl">Medicine Log Sheet</h1>
        </div>

        <!-- ADD INVENTORY -->
        <div
            class="mx-auto mt-10 max-w-4xl rounded-lg bg-[#d9d9d9] p-6 shadow-md"
        >
            <form @submit.prevent="handleSubmit" class="space-y-4 rounded p-2">
                <div>
                    <h2 class="font-bold">
                        Time and Date: {{ new Date().toLocaleString() }}
                    </h2>
                </div>

                <div class="-mx-3 flex w-full flex-wrap">
                    <!-- Full Name -->
                    <div class="w-full px-3 md:w-2/3">
                        <label
                            for="fullname"
                            class="block text-sm font-medium text-gray-700"
                            >Full Name</label
                        >
                        <select
                            class="mt-1 block w-full border-gray-300 px-2 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                            name="fullname"
                            id="fullname"
                            v-model="formData.patient_id"
                            @change="getDepartment()"
                        >
                            <option
                                v-for="(item, index) in users"
                                :key="index"
                                :value="item.id"
                            >
                                {{ item.first_name }} {{ item.last_name }}
                            </option>
                        </select>
                    </div>

                    <!-- Course -->
                    <div class="w-full px-3 md:w-1/3">
                        <label
                            for="department"
                            class="block text-sm font-medium text-gray-700"
                            >College / Department</label
                        >
                        <div
                            type="text"
                            id="department"
                            name="department"
                            class="mt-1 block w-full cursor-not-allowed border-gray-300 bg-gray-200 px-2 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                        >
                            {{ formData.department }}
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex w-full flex-wrap">
                    <!-- Chief Complaint -->
                    <div class="w-full px-3 md:w-1/3">
                        <label
                            for="chief_complain"
                            class="block text-sm font-medium text-gray-700"
                            >Chief Complaint</label
                        >
                        <textarea
                            id="chief_complain"
                            name="chief_complain"
                            rows="3"
                            class="mt-1 block w-full border-gray-300 px-2 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                            placeholder="Describe the chief complaint"
                            v-model="formData.chief_complaint"
                        ></textarea>
                    </div>

                    <!-- Medicine Given -->
                    <div class="w-full px-3 md:w-1/3">
                        <label
                            for="medicine"
                            class="block text-sm font-medium text-gray-700"
                            >Medicine Given</label
                        >
                        <select
                            class="mt-1 block w-full border-gray-300 px-2 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                            name="medicine"
                            id="medicine"
                            v-model="formData.medicine_id"
                        >
                            <option
                                v-for="(item, index) in medicines"
                                :key="index"
                                :value="item.id"
                            >
                                {{ item.brand_name }}
                            </option>
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="w-full px-3 md:w-1/3">
                        <label
                            for="quantity"
                            class="block text-sm font-medium text-gray-700"
                            >Quantity</label
                        >
                        <input
                            required
                            type="number"
                            id="quantity"
                            name="quantity"
                            class="mt-1 block w-full border-gray-300 px-2 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                            placeholder="Quantity"
                            v-model="formData.quantity"
                        />
                        <p
                            class="text-red-500"
                            v-if="
                                submitErrorMessages &&
                                submitErrorMessages.medicine_id
                            "
                        >
                            {{ submitErrorMessages.medicine_id[0] }}
                        </p>
                    </div>
                </div>
                <!-- Nurse on Duty -->
                <div class="-mx-3 flex w-full flex-wrap">
                    <div class="w-full px-3">
                        <label
                            for="nurse"
                            class="block text-sm font-medium text-gray-700"
                            >Nurse on Duty</label
                        >
                        <input
                            required
                            type="text"
                            id="nurse"
                            name="nurse"
                            class="mt-1 block w-full border-gray-300 px-2 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                            placeholder="Nurse on Duty"
                            v-model="formData.nurse_on_duty"
                        />
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        :disabled="isAdding"
                        type="submit"
                        class="w-fit bg-[#1e3d2c] px-4 py-2 text-white hover:bg-emerald-600"
                    >
                        {{ isAdding ? "Adding" : "Save Data" }}
                    </button>
                </div>
            </form>
        </div>

        <!-- SEARCH -->
        <div class="relative mt-7">
            <input
                required
                type="text"
                class="search-input required rounded-md border border-gray-300 py-2 pl-10 pr-4 focus:outline-none focus:ring-2"
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
        </div>
        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-left">
                <thead class="text-white">
                    <tr class="bg-[#1e3d2c]">
                        <th class="whitespace-nowrap p-5">Time/Date</th>
                        <th class="whitespace-nowrap p-5">Full Name</th>
                        <th class="whitespace-nowrap p-5">
                            College / Department
                        </th>
                        <th class="whitespace-nowrap p-5">Chief Complain</th>
                        <th class="whitespace-nowrap p-5">Medicine Given</th>
                        <th class="whitespace-nowrap p-5">Quantity</th>
                        <th class="whitespace-nowrap p-5">Nurse on Duty</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    <tr v-for="(item, index) in medicine_logsheet" :key="index">
                        <td class="p-5 font-medium">{{ item.created_at }}</td>
                        <td class="p-5 font-medium">{{ item.patient_id }}</td>
                        <td class="p-5 font-medium">{{ item.patient_id }}</td>
                        <td class="p-5 font-medium">
                            {{ item.chief_complaint }}
                        </td>
                        <td class="p-5 font-medium">{{ item.medicine.brand_name }}</td>
                        <td class="p-5 font-medium">{{ item.quantity }}</td>
                        <td class="p-5 font-medium">
                            {{ item.nurse_on_duty }}
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

const users = ref([]);
const medicine_logsheet = ref([]);
const medicines = ref([]);
const submitErrorMessages = ref();
const isAdding = ref(false);
const authStore = useAuthStore();

const currentDateAndTime = new Date().toLocaleString();

const formData = ref({
    patient_id: "",
    department: "",
    chief_complaint: "",
    medicine_id: "",
    quantity: "",
    nurse_on_duty: "",
});

const fetchUser = async () => {
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}user/patients`,
            {
                headers: {
                    Authorization: `Bearer ${JSON.parse(authStore.token).token}`,
                },
            },
        );
        users.value = response.data;
    } catch (error) {
        console.log("error fetching Users");
    }
};

const fetchMedicines = async () => {
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}user/medicines`,
            {
                headers: {
                    Authorization: `Bearer ${JSON.parse(authStore.token).token}`,
                },
            },
        );
        medicines.value = response.data;
    } catch (error) {
        console.log("error fetching Medicines");
    }
};

const fetchMedicineLogSheet = async () => {
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}user/medicine-log-sheets`,
            {
                headers: {
                    Authorization: `Bearer ${JSON.parse(authStore.token).token}`,
                },
            },
        );
        medicine_logsheet.value = response.data;
    } catch (error) {
        console.log("error fetching Medicines");
    }
};

const getDepartment = () => {
    const department = users.value.find(
        (user) => user.id === formData.value.patient_id,
    );
    formData.value.department = department.id_number;
};

fetchUser();
fetchMedicineLogSheet();
fetchMedicines();

const handleSubmit = async () => {
    isAdding.value = true;
    try {
        await axios.post(
            `${useRuntimeConfig().public.laravelURL}user/medicine-log-sheets`,
            formData.value,
            {
                headers: {
                    Authorization: `Bearer ${JSON.parse(authStore.token).token}`,
                },
            },
        );
        isAdding.value = false;
        submitErrorMessages.value = "";
        fetchMedicineLogSheet();
    } catch (error) {
        isAdding.value = false;
        submitErrorMessages.value = error.response.data.errors;
        console.log(submitErrorMessages.value);
    }
};
</script>
