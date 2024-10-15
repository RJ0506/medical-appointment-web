<template>
    <div>
        <!-- TITLE AND SEARCH -->
        <div class="mt-7 flex items-center justify-between">
            <h1 class="text-xl font-bold sm:text-5xl">Medicine Inventory</h1>
        </div>

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
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    <tr v-for="(item, index) in filteredRecords" :key="index">
                        <td class="p-5 font-medium">{{ item.category }}</td>
                        <td class="p-5 font-medium">{{ item.genericName }}</td>
                        <td class="p-5 font-medium">
                            {{ item.brandName }}
                        </td>
                        <td class="p-5 font-medium">{{ item.dosage }}</td>
                        <td class="p-5 font-medium">{{ item.quantity }}</td>
                        <td class="p-5 font-medium">
                            {{ item.expirationDate }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";

definePageMeta({
    layout: "user",
});

const searchTerm = ref("");
const records = ref([
    {
        category: "Antibiotic",
        genericName: "Amoxicillin",
        brandName: "Amoxil",
        dosage: "500mg",
        quantity: 20,
        expirationDate: "2024-12-31",
    },
    {
        category: "Pain Reliever",
        genericName: "Ibuprofen",
        brandName: "Advil",
        dosage: "200mg",
        quantity: 50,
        expirationDate: "2025-06-30",
    },
    {
        category: "Antihistamine",
        genericName: "Cetirizine",
        brandName: "Zyrtec",
        dosage: "10mg",
        quantity: 30,
        expirationDate: "2026-03-15",
    },
]);

const filteredRecords = computed(() => {
    if (!searchTerm.value) {
        return records.value;
    }
    return records.value.filter((item) => {
        return (
            item.brandName
                .toLowerCase()
                .includes(searchTerm.value.toLowerCase()) ||
            item.genericName
                .toLowerCase()
                .includes(searchTerm.value.toLowerCase())
        );
    });
});
</script>
