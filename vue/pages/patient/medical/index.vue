<template>
    <div class="grid">
        <div class="mt-10">
            <h1 class="text-2xl font-bold sm:text-4xl">
                Schedule an Appointment
            </h1>
            <form
                class="mx-auto mt-8 flex max-w-3xl flex-col gap-2 bg-[#d9d9d9] p-4"
            >
                <h2 class="font-bold">
                    Select the service you want to get the appointment for:
                </h2>
                <div class="flex flex-wrap justify-center gap-2 mt-2">
                    <div>
                        <input
                            class="peer hidden"
                            type="radio"
                            id="checkup"
                            name="appointment"
                            value="checkup"
                        />
                        <label
                            class="inline-flex cursor-pointer rounded bg-[#2abb49] px-10 py-1 font-semibold text-white hover:bg-emerald-600 peer-checked:bg-emerald-800"
                            for="checkup"
                        >
                            Checkup
                        </label>
                    </div>
                    <div>
                        <input
                            class="peer hidden"
                            type="radio"
                            id="vaccine"
                            name="appointment"
                            value="vaccine"
                        />
                        <label
                            class="inline-flex cursor-pointer rounded bg-[#2abb49] px-7 py-1 font-semibold text-white hover:bg-emerald-600 peer-checked:bg-emerald-800"
                            for="vaccine"
                        >
                            Vaccination
                        </label>
                    </div>
                </div>
                <div class="mx-auto">
                    <div>
                        <label class="block font-semibold" for="date"
                            >Date:</label
                        >
                        <input
                            class="w-full rounded px-4 py-1"
                            type="date"
                            id="date"
                            name="date"
                            :min="currentDate"
                        />
                    </div>
                    <div class="mt-3">
                        <h2 class="font-semibold">Time</h2>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <input
                                    class="peer hidden"
                                    type="radio"
                                    id="12:00"
                                    name="time"
                                    value="12:00PM"
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
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
definePageMeta({
    layout: "patient",
});

const currentDate = ref("");

const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, "0");
const day = String(today.getDate()).padStart(2, "0");
currentDate.value = `${year}-${month}-${day}`;
</script>
