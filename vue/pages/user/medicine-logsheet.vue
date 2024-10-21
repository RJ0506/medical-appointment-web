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
            <form class="space-y-4 rounded p-2">
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
                        <input
                            type="text"
                            id="fullname"
                            name="fullname"
                            class="mt-1 block w-full border-gray-300 px-2 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                            placeholder="Full Name"
                        />
                    </div>

                    <!-- Course -->
                    <div class="w-full px-3 md:w-1/3">
                        <label
                            for="course"
                            class="block text-sm font-medium text-gray-700"
                            >Course</label
                        >
                        <input
                            type="text"
                            id="course"
                            name="course"
                            class="mt-1 block w-full border-gray-300 px-2 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                            placeholder="course"
                        />
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
                        ></textarea>
                    </div>

                    <!-- Medicine Given -->
                    <div class="w-full px-3 md:w-1/3">
                        <label
                            for="medicine"
                            class="block text-sm font-medium text-gray-700"
                            >Medicine Given</label
                        >
                        <input
                            type="text"
                            id="medicine"
                            name="medicine"
                            class="mt-1 block w-full border-gray-300 px-2 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                            placeholder="Medicine Given"
                        />
                    </div>

                    <!-- Quantity -->
                    <div class="w-full px-3 md:w-1/3">
                        <label
                            for="quantity"
                            class="block text-sm font-medium text-gray-700"
                            >Quantity</label
                        >
                        <input
                            type="number"
                            id="quantity"
                            name="quantity"
                            class="mt-1 block w-full border-gray-300 px-2 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                            placeholder="Quantity"
                        />
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
                            type="text"
                            id="nurse"
                            name="nurse"
                            class="mt-1 block w-full border-gray-300 px-2 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                            placeholder="Nurse on Duty"
                        />
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        type="submit"
                        class="w-fit bg-[#1e3d2c] px-4 py-2 text-white hover:bg-emerald-600"
                    >
                        Save Data
                    </button>
                </div>
            </form>
        </div>

        <!-- SEARCH -->
        <div class="relative mt-7">
            <input
                type="text"
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
                        <th class="whitespace-nowrap p-5">Time/Date</th>
                        <th class="whitespace-nowrap p-5">Full Name</th>
                        <th class="whitespace-nowrap p-5">Course</th>
                        <th class="whitespace-nowrap p-5">Chief Complain</th>
                        <th class="whitespace-nowrap p-5">Quantity</th>
                        <th class="whitespace-nowrap p-5">Medicine Given</th>
                        <th class="whitespace-nowrap p-5">Nurse on Duty</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    <tr>
                        <td class="p-5 font-medium">Sample</td>
                        <td class="p-5 font-medium">Sample</td>
                        <td class="p-5 font-medium">Sample</td>
                        <td class="p-5 font-medium">Sample</td>
                        <td class="p-5 font-medium">Sample</td>
                        <td class="p-5 font-medium">Sample</td>
                        <td class="p-5 font-medium">Sample</td>
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

// const currentDate = ref(new Date().toLocaleString());
</script>
