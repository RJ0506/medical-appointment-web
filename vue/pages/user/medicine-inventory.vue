<template>
    <div>
        <!-- TITLE AND SEARCH -->
        <div class="mt-7 flex items-center justify-between">
            <h1 class="text-xl font-bold sm:text-5xl">Medicine Inventory</h1>
        </div>

        <!-- ADD INVENTORY -->
        <form
            @submit.prevent="handleSubmit"
            class="mt-5 flex flex-wrap bg-[#e0dcdc] p-8"
        >
            <div class="-mx-3 flex w-full flex-wrap">
                <div class="w-full px-3 md:w-1/4">
                    <label class="block text-lg font-bold" for="category"
                        >Category:</label
                    >
                    <select
                        class="mt-2 w-full rounded border-2 border-black focus:outline-emerald-800"
                        name="category"
                        id="category"
                        v-model="formData.medicine_category"
                    >
                        <option value="Tablet">Tablet</option>
                        <option value="Capsule">Capsule</option>
                        <option value="Syrup">Syrup</option>
                        <option value="Liquid">Liquid</option>
                    </select>
                    <p
                        v-if="
                            submitErrorMessages &&
                            submitErrorMessages.medicine_category
                        "
                        class="text-red-500"
                    >
                        {{ submitErrorMessages.medicine_category[0] }}
                    </p>
                </div>
            </div>

            <div class="-mx-3 flex w-full flex-wrap">
                <div class="w-full px-3 md:w-1/2">
                    <label class="block text-lg font-bold" for="genericName"
                        >Generic Name:</label
                    >
                    <input
                        class="w-full rounded border-2 border-black focus:outline-emerald-800"
                        type="text"
                        name="genericName"
                        id="genericName"
                        v-model="formData.generic_name"
                    />
                    <p
                        v-if="
                            submitErrorMessages &&
                            submitErrorMessages.generic_name
                        "
                        class="text-red-500"
                    >
                        {{ submitErrorMessages.generic_name[0] }}
                    </p>
                </div>
                <div class="w-full px-3 md:w-1/2">
                    <label class="block text-lg font-bold" for="brandName"
                        >Brand Name:</label
                    >
                    <input
                        class="w-full rounded border-2 border-black focus:outline-emerald-800"
                        type="text"
                        name="brandName"
                        id="brandName"
                        v-model="formData.brand_name"
                    />
                    <p
                        v-if="
                            submitErrorMessages &&
                            submitErrorMessages.brand_name
                        "
                        class="text-red-500"
                    >
                        {{ submitErrorMessages.brand_name[0] }}
                    </p>
                </div>
            </div>
            <div class="-mx-3 flex w-full flex-wrap items-center">
                <div class="w-full px-3 md:w-1/3">
                    <label class="block text-lg font-bold" for="dosage"
                        >Dosage:</label
                    >
                    <select
                        class="w-full rounded border-2 border-black focus:outline-emerald-800"
                        name="dosage"
                        id="dosage"
                        v-model="formData.dosage"
                    >
                        <option value="1mg">1 mg</option>
                        <option value="5mg">5 mg</option>
                        <option value="10mg">10 mg</option>
                        <option value="25mg">25 mg</option>
                        <option value="50mg">50 mg</option>
                        <option value="100mg">100 mg</option>
                        <option value="200mg">200 mg</option>
                        <option value="500mg">500 mg</option>
                        <option value="1mL">1 mL</option>
                        <option value="5mL">5 mL</option>
                        <option value="10mL">10 mL</option>
                        <option value="1tablet">1 Tablet</option>
                        <option value="2tablets">2 Tablets</option>
                        <option value="1puff">1 Puff</option>
                    </select>
                    <p
                        v-if="submitErrorMessages && submitErrorMessages.dosage"
                        class="text-red-500"
                    >
                        {{ submitErrorMessages.dosage[0] }}
                    </p>
                </div>
                <div class="w-full px-3 md:w-1/3">
                    <label class="block text-lg font-bold" for="quantity"
                        >Quantity:</label
                    >
                    <input
                        class="w-full rounded border-2 border-black focus:outline-emerald-800"
                        type="number"
                        name="quantity"
                        id="quantity"
                        v-model="formData.quantity"
                    />
                    <p
                        v-if="
                            submitErrorMessages && submitErrorMessages.quantity
                        "
                        class="text-red-500"
                    >
                        {{ submitErrorMessages.quantity[0] }}
                    </p>
                </div>
                <div class="w-full px-3 md:w-1/3">
                    <label class="block text-lg font-bold" for="expirationDate"
                        >Expiration Date:</label
                    >
                    <input
                        class="w-full rounded border-2 border-black px-4 py-1 focus:outline-emerald-800"
                        type="date"
                        id="expirationDate"
                        name="expirationDate"
                        :min="currentDate"
                        v-model="formData.expiration_date"
                    />
                    <p
                        v-if="
                            submitErrorMessages &&
                            submitErrorMessages.expiration_date
                        "
                        class="text-red-500"
                    >
                        {{ submitErrorMessages.expiration_date[0] }}
                    </p>
                </div>
            </div>

            <button
                :disabled="isAdding"
                type="submit"
                class="mx-auto mt-5 rounded-md bg-[#1E3D2C] px-6 py-2 font-semibold text-white hover:bg-emerald-900 sm:px-12"
            >
                {{ isAdding ? "ADDING..." : "ADD TO INVENTORY" }}
            </button>
        </form>

        <!-- SEARCH -->
        <div class="relative mt-7">
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
        </div>
        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-left">
                <thead class="text-white">
                    <tr class="bg-[#1e3d2c]">
                        <th class="whitespace-nowrap p-5">Category</th>
                        <th class="whitespace-nowrap p-5">Generic Name</th>
                        <th class="whitespace-nowrap p-5">Brand Name</th>
                        <th class="whitespace-nowrap p-5">Dosage</th>
                        <th class="whitespace-nowrap p-5">Quantity</th>
                        <th class="whitespace-nowrap p-5">Exp. Date</th>
                        <th class="whitespace-nowrap p-5">Action</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    <template v-if="filteredRecords.length > 0">
                        <tr
                            v-for="(item, index) in filteredRecords"
                            :key="index"
                        >
                            <td class="p-5 font-medium">
                                {{ item.medicine_category }}
                            </td>
                            <td class="p-5 font-medium">
                                {{ item.generic_name }}
                            </td>
                            <td class="p-5 font-medium">
                                {{ item.brand_name }}
                            </td>
                            <td class="p-5 font-medium">{{ item.dosage }}</td>
                            <td class="p-5 font-medium">{{ item.quantity }}</td>
                            <td class="p-5 font-medium">
                                {{ item.expiration_date }}
                            </td>
                            <td class="pl-7">
                                <button @click="deleteMedicine(item.id)">
                                    <Icon
                                        class="text-red-500 hover:text-red-900"
                                        name="i-material-symbols-light-delete-outline-sharp"
                                        style="font-size: 2rem"
                                    />
                                </button>
                            </td>
                        </tr>
                    </template>
                    <template v-else>
                        <tr>
                            <td
                                colspan="7"
                                class="p-5 text-center text-gray-500"
                            >
                                No data available
                            </td>
                        </tr>
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
const authStore = useAuthStore();
const searchTerm = ref("");
const currentDate = ref("");
const submitErrorMessages = ref("");
const isAdding = ref(false);
const medicineList = ref([]);

const initialFormData = ref({
    medicine_category: "",
    generic_name: "",
    brand_name: "",
    dosage: "",
    quantity: "",
    expiration_date: "",
});

const formData = ref({
    medicine_category: "",
    generic_name: "",
    brand_name: "",
    dosage: 2,
    quantity: "",
    expiration_date: "",
});

// const { data } = await useLazyFetch(
//     "https://jsonplaceholder.typicode.com/posts"
// );
// console.log("lazyfetch", data.value);

const fetchMedicines = async () => {
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}user/medicines`,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );

        medicineList.value = response.data;
        submitErrorMessages.value = "";
        formData.value = { ...initialFormData.value };
    } catch (error) {
        console.log("error fetching Medicines");
    }
};

const filteredRecords = computed(() => {
    if (!searchTerm.value) {
        return medicineList.value;
    }
    return medicineList.value.filter((item) => {
        return (
            item.brand_name
                .toLowerCase()
                .includes(searchTerm.value.toLowerCase()) ||
            item.generic_name
                .toLowerCase()
                .includes(searchTerm.value.toLowerCase())
        );
    });
});

const handleSubmit = async () => {
    isAdding.value = true;
    try {
        await axios.post(
            `${useRuntimeConfig().public.laravelURL}user/medicines`,
            formData.value,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        fetchMedicines();
        isAdding.value = false;
    } catch (error) {
        isAdding.value = false;
        submitErrorMessages.value = error.response.data.errors;
        console.log("Error Submitting");
    }
};

const deleteMedicine = async (medicine_id) => {
    try {
        await axios.delete(
            `${useRuntimeConfig().public.laravelURL}user/medicines/${medicine_id}`,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        fetchMedicines();
    } catch (error) {
        console.log("Error Deleting Medicine");
    }
};

fetchMedicines();

const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, "0");
const day = String(today.getDate()).padStart(2, "0");
currentDate.value = `${year}-${month}-${day}`;
</script>
