<template>
    <div class="mx-auto mt-16 max-w-7xl">
        <div class="flex flex-wrap">
            <NuxtLink
                class="rounded-md border border-black bg-[#a6a6a6] px-4 py-2 font-bold text-black hover:bg-[#d9d9d9]"
                to="/user/medical-health-record/1"
                >Medical Health Record</NuxtLink
            >
            <NuxtLink
                class="rounded-md border border-black bg-[#a6a6a6] px-4 py-2 font-bold text-black hover:bg-[#d9d9d9]"
                to="/user/medical-health-record/1-health-history"
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
                <div
                    class="grid gap-4 rounded-md border border-black bg-white px-2 py-8 shadow-lg sm:px-10"
                >
                    <div class="flex flex-col items-center justify-center">
                        <img src="/tua-logo.png" alt="logo" />
                        <h1 class="text-2xl uppercase">
                            Trinity University of Asia
                        </h1>
                        <p>Medical and Dental Unit</p>
                    </div>
                    <h2 class="bg-black text-center font-bold text-white">
                        PHYSICAL EXAMINATION
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-black bg-red-500">
                            <thead class="bg-[#e0dcdc]">
                                <tr class="text-center font-bold">
                                    <td class="sr-only border border-black">
                                        Labels
                                    </td>
                                    <td class="border border-black px-5 py-1">
                                        1st Year
                                    </td>
                                    <td class="border border-black px-5 py-1">
                                        2nd Year
                                    </td>
                                    <td class="border border-black px-5 py-1">
                                        3rd Year
                                    </td>
                                    <td class="border border-black px-5 py-1">
                                        4th Year
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="text-center font-bold odd:bg-white even:bg-[#D9D9D9]"
                                    v-for="label in tableLabels"
                                >
                                    <td class="border border-black px-5 py-1">
                                        {{ label }}
                                    </td>
                                    <td class="border border-black px-5 py-1">
                                        s
                                    </td>
                                    <td class="border border-black px-5 py-1">
                                        s
                                    </td>
                                    <td class="border border-black px-5 py-1">
                                        s
                                    </td>
                                    <td class="border border-black px-5 py-1">
                                        s
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    
                </div>
                <div class="mt-8 flex flex-col items-center gap-2">
                        <button
                            :class="{
                                'bg-[#347956] hover:bg-emerald-800': isReadOnly,
                                'bg-red-500 hover:bg-red-700': !isReadOnly,
                            }"
                            class="w-full rounded-md px-14 py-1 font-medium text-white md:w-1/3"
                            type="button"
                            @click="toggleEditMode"
                        >
                            {{ isReadOnly ? "EDIT" : "CANCEL" }}
                        </button>
                        <button
                            v-if="!isReadOnly"
                            class="w-full rounded-md bg-[#347956] px-14 py-1 font-medium text-white hover:bg-emerald-800 md:w-1/3"
                            type="submit"
                        >
                            SAVE INFORMATION
                        </button>
                    </div>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
definePageMeta({
    layout: "user",
});

const isReadOnly = ref(true);

const tableLabels = [
    "Date",
    "Height / Weight",
    "Temperature / BP",
    "HR / PR / RR",
    "Nutritional Status",
    "Visual Acuity",
    "Hearing",
    "Skin / Scalp",
    "Eyes / Ears / Nose",
    "Mouth / Throat / Neck",
    "Lungs / Heart",
    "GIT / GUT",
    "Spine / Extremities",
    "Other Specify",
    "Recommendations",
    "Examined By",
];

const formData = ref({
    isDptOpv: false,
    isHiB: false,
    dptClassified: "",
    hiBClassified: "",
    isMeaslesVaccine: false,
    isMMR: false,
    isHepaA: false,
    hepaAClassified: "",
    isHepaB: false,
    hepaBClassified: "",
    isTyphoid: false,
    isInfluenza: false,
    other: "",
    father: "",
    mother: "",
    siblings: "",
    childhood: "",
    adulthood: "",
    allergies: "",
    prefferedHospital: "",
});

const toggleEditMode = () => {
    isReadOnly.value = !isReadOnly.value;
    if (isReadOnly.value) {
        location.reload();
    }
};

const handleSubmit = () => {
    console.log(formData.value);
};
</script>
