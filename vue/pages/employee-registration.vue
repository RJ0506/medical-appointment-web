<template>
    <div class="px-2 py-12">
        <div class="text-center">
            <h1 class="mx-auto max-w-2xl text-xl font-bold sm:text-4xl">
                Welcome to Medical and Dental Unit of Trinity University of
                Asia!
            </h1>
            <p class="mt-3 text-sm text-[#928F8F] sm:text-lg">
                Register to create your account and gain access to exclusive
                resources, including appointment scheduling for medical and
                dental services!
            </p>
        </div>

        <div class="mx-auto mt-12 grid max-w-5xl">
            <p class="text-xl">
                Please fill out the form below to get started:
            </p>
            <form class="mt-5 grid">
                <div class="grid gap-4 bg-[#d9d9d9] px-4 py-8">
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
                </div>
                <div
                    class="mt-5 grid gap-4 bg-[#d9d9d9] px-4 py-2 md:grid-cols-2 md:divide-x-2 md:divide-black"
                >
                    <div class="px-4 md:px-6">
                        <div>
                            <label class="font-bold" for="email">Email</label>
                            <div
                                class="mb-2 flex w-full items-center gap-3 md:mb-0"
                            >
                                <input
                                    type="email"
                                    id="email"
                                    class="w-full rounded-md border border-black"
                                />
                                <p>@tua.edu.ph</p>
                            </div>
                        </div>
                        <div>
                            <label class="font-bold" for="re-enter-email"
                                >Re-enter Email</label
                            >
                            <div
                                class="mb-2 flex w-full items-center gap-3 md:mb-0"
                            >
                                <input
                                    type="email"
                                    id="re-enter-email"
                                    class="w-full rounded-md border border-black"
                                />
                                <p>@tua.edu.ph</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-2 md:px-10">
                        <div class="mb-2 md:mb-0">
                            <label class="block font-bold" for="password"
                                >Password</label
                            >
                            <input
                                class="w-full rounded-md border border-black"
                                type="password"
                                id="password"
                            />
                        </div>
                        <div class="mb-2 md:mb-0">
                            <label class="block font-bold" for="confirmPassword"
                                >Confirm Password</label
                            >
                            <input
                                class="w-full rounded-md border border-black"
                                type="password"
                                id="confirmPassword"
                            />
                        </div>
                    </div>
                </div>
                <button
                    class="mt-16 rounded-md bg-[#347956] py-3 text-xl font-bold text-white hover:bg-emerald-900"
                    type="submit"
                >
                    Register
                </button>
            </form>
        </div>
    </div>
</template>
<script setup lang="ts">
definePageMeta({
    layout: "selection",
});
</script>
