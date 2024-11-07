<template>
    <div class="grid gap-5 py-6">
        <h1 class="text-xl font-bold sm:text-5xl">Medical Health Record</h1>
        <!-- SEARCH -->
        <div class="relative mx-auto mt-7 flex w-fit items-center gap-2">
            <h2 class="font-semibold">Search:</h2>
            <input
                type="text"
                v-model="searchTerm"
                class="search-input rounded-md border border-gray-300 pl-4 pr-10 focus:outline-none focus:ring-2"
                placeholder="ID Number"
            />
            <svg
                class="absolute right-3 top-1/2 h-5 w-5 -translate-y-1/2 transform text-gray-400"
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
                        <th class="whitespace-nowrap p-5">ID Number</th>
                        <th class="whitespace-nowrap p-5">Classification</th>
                        <th class="whitespace-nowrap p-5">Full Name</th>
                        <th class="whitespace-nowrap p-5">Action</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    <tr v-for="(item, index) in filteredRecords" :key="index">
                        <td class="p-5 font-medium">{{ item.id }}</td>
                        <td class="p-5 font-medium">
                            {{ item.classification }}
                        </td>
                        <td class="p-5 font-medium">
                            {{ item.fullname }}
                        </td>
                        <td class="flex gap-2 p-5 font-medium">
                            <NuxtLink
                                :to="`/user/medical-health-record/${item.id}`"
                                class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
                            >
                                Edit
                            </NuxtLink>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup lang="ts">
definePageMeta({
    layout: "user",
});

const searchTerm = ref("");

const filteredRecords = computed(() => {
    if (!searchTerm.value) {
        return records.value;
    }
    return records.value.filter((item: any) => {
        return (
            item.id.toString().includes(searchTerm.value.toLowerCase()) ||
            item.fullname.toLowerCase().includes(searchTerm.value.toLowerCase())
        );
    });
});

const records = ref([
    { id: 1, classification: "Student", fullname: "John Doe" },
    { id: 2, classification: "Employee", fullname: "Jane Smith" },
    { id: 3, classification: "Student", fullname: "Bob Johnson" },
    { id: 4, classification: "Employee", fullname: "Alice Brown" },
    { id: 5, classification: "Student", fullname: "Mike Davis" },
]);
</script>
