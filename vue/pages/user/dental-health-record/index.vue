<!-- <template>
    <div class="mx-auto mt-16 max-w-7xl">
        <div class="flex flex-wrap">
            <NuxtLink
                class="rounded-md border border-black bg-[#a6a6a6] px-4 py-2 font-bold text-black hover:bg-[#d9d9d9]"
                to="medical-health-record"
                >Medical Health Record</NuxtLink
            >
            <NuxtLink
                class="rounded-md border border-black bg-[#a6a6a6] px-4 py-2 font-bold text-black hover:bg-[#d9d9d9]"
                to="medical-health-record/health-history"
                >Health History</NuxtLink
            >
            <NuxtLink
                class="rounded-md border border-black bg-[#a6a6a6] px-4 py-2 font-bold text-black hover:bg-[#d9d9d9]"
                to="#"
                >Physical Examination</NuxtLink
            >
            <NuxtLink
                class="rounded-md border border-black bg-[#a6a6a6] px-4 py-2 font-bold text-black hover:bg-[#d9d9d9]"
                to="#"
                >Consultation Record</NuxtLink
            >
        </div>
        <div>
            <div>
                <form class="grid gap-4 bg-[#d9d9d9] px-4 py-8">
                    <div class="flex flex-col items-center justify-center">
                        <img src="/tua-logo.png" alt="logo" />
                        <h1 class="text-2xl uppercase">
                            Trinity University of Asia
                        </h1>
                        <p>Medical and Dental Unit</p>
                    </div>
                    <h2 class="bg-[#a6a6a6] text-center font-bold">
                        MEDICAL HEATH RECORD
                    </h2>
                    <div class="border border-black bg-[#a6a6a6] p-3">
                        <div class="-mx-3 flex flex-wrap">
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-3/5">
                                <label class="block font-normal" for="id"
                                    >ID Number:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="id"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal"
                                    for="department"
                                    >Department:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="department"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal"
                                    for="responsibilities"
                                    >Responsibilities:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="responsibilities"
                                />
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label class="block font-normal" for="lastname"
                                    >Lastname:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="lastname"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label class="block font-normal" for="firstname"
                                    >First Name:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="firstname"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label
                                    class="block font-normal"
                                    for="middleName"
                                    >M.I:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="middleName"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label class="block font-normal" for="age"
                                    >Age:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="age"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label class="block font-normal" for="datebirth"
                                    >Date of Birth:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="date"
                                    id="datebirth"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label class="block font-normal" for="gender"
                                    >Gender:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="gender"
                                />
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-3/5">
                                <label class="block font-normal" for="address"
                                    >Address:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="address"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label class="block font-normal" for="contact"
                                    >Contact Number:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="contact"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal"
                                    for="nationality"
                                    >Nationality:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="nationality"
                                />
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-3/5">
                                <label
                                    class="block font-normal"
                                    for="contactPerson"
                                    >Contact Person:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="contactPerson"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal"
                                    for="contactPersonNumber"
                                    >Contact Number:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="contactPersonNumber"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label class="block font-normal" for="relation"
                                    >Relation:</label
                                >
                                <input
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="relation"
                                />
                            </div>
                        </div>
                    </div>
                    <button
                        class="bg-emerald-800 py-2 text-white hover:bg-emerald-900"
                    >
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
definePageMeta({
    layout: "user",
});
</script> -->

<template>
    <div class="grid gap-5 py-6">
        <h1 class="text-xl font-bold sm:text-5xl">Dental Health Record</h1>
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
                                :to="`/user/dental-health-record/${item.id}`"
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
  { id: 6, classification: "Faculty", fullname: "Emily Chen" },
  { id: 7, classification: "Employee", fullname: "David Lee" },
  { id: 8, classification: "Student", fullname: "Sarah Taylor" },
  { id: 9, classification: "Faculty", fullname: "Kevin White" },
  { id: 10, classification: "Employee", fullname: "Lisa Nguyen" },
]);
</script>
