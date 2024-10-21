<template>
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
</script>
