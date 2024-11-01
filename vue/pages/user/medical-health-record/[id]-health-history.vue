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
                to="#"
                >Health History</NuxtLink
            >
            <NuxtLink
                class="rounded-md border border-black bg-[#a6a6a6] px-4 py-2 font-bold text-black hover:bg-[#d9d9d9]"
                to="/user/medical-health-record/1-physical-examination"
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
                    class="grid gap-4 border border-black bg-white px-4 py-8 shadow-lg"
                >
                    <div class="flex flex-col items-center justify-center">
                        <img src="/tua-logo.png" alt="logo" />
                        <h1 class="text-2xl uppercase">
                            Trinity University of Asia
                        </h1>
                        <p>Medical and Dental Unit</p>
                    </div>
                    <h2 class="bg-black text-center font-bold text-white">
                        HEALTH HISTORY
                    </h2>
                    <form
                        @submit.prevent="handleSubmit"
                        class="grid rounded-md border border-[#928F8F] bg-[#D9D9D9] p-3"
                    >
                        <h3 class="text-center font-bold">Immunization</h3>
                        <div class="mt-5 grid gap-5 sm:grid-cols-2">
                            <div class="grid">
                                <div
                                    class="flex flex-wrap justify-between gap-5"
                                >
                                    <label class="font-bold" for="dpt/opv">
                                        <input
                                            type="checkbox"
                                            id="dpt/opv"
                                            value="DPT/OPV"
                                            v-model="formData.isDptOpv"
                                        />
                                        DPT/OPV
                                    </label>

                                    <div class="flex gap-3">
                                        <label class="font-bold">
                                            <input
                                                name="dptClassified"
                                                type="radio"
                                                value="1"
                                                v-model="formData.dptClassified"
                                            />
                                            1
                                        </label>
                                        <label class="font-bold">
                                            <input
                                                name="dptClassified"
                                                type="radio"
                                                value="2"
                                                v-model="formData.dptClassified"
                                            />
                                            2
                                        </label>
                                        <label class="font-bold">
                                            <input
                                                name="dptClassified"
                                                type="radio"
                                                value="3"
                                                v-model="formData.dptClassified"
                                            />
                                            3
                                        </label>
                                        <label class="font-bold">
                                            <input
                                                name="dptClassified"
                                                type="radio"
                                                value="B"
                                                v-model="formData.dptClassified"
                                            />
                                            B
                                        </label>
                                    </div>
                                </div>
                                <div
                                    class="flex flex-wrap justify-between gap-5"
                                >
                                    <label class="font-bold" for="hib">
                                        <input
                                            type="checkbox"
                                            id="hib"
                                            value="HiB"
                                            v-model="formData.isHiB"
                                        />
                                        HiB
                                    </label>

                                    <div class="flex gap-3">
                                        <label class="font-bold">
                                            <input
                                                name="hibClassified"
                                                type="radio"
                                                value="1"
                                                v-model="formData.hiBClassified"
                                            />
                                            1
                                        </label>
                                        <label class="font-bold">
                                            <input
                                                name="hibClassified"
                                                type="radio"
                                                value="2"
                                                v-model="formData.hiBClassified"
                                            />
                                            2
                                        </label>
                                        <label class="font-bold">
                                            <input
                                                name="hibClassified"
                                                type="radio"
                                                value="3"
                                                v-model="formData.hiBClassified"
                                            />
                                            3
                                        </label>
                                    </div>
                                </div>

                                <label class="font-bold">
                                    <input
                                        type="checkbox"
                                        value="Measles Vaccine"
                                    />
                                    Measles Vaccine
                                </label>
                                <label class="font-bold">
                                    <input
                                        type="checkbox"
                                        value="MMR"
                                        v-model="formData.isMMR"
                                    />
                                    MMR
                                </label>
                            </div>
                            <div class="grid">
                                <div
                                    class="flex flex-wrap justify-between gap-5"
                                >
                                    <label class="font-bold" for="hepaA">
                                        <input
                                            type="checkbox"
                                            id="hepaA"
                                            value="Hepa A"
                                            v-model="formData.isHepaA"
                                        />
                                        Hepa A
                                    </label>

                                    <div class="flex gap-3">
                                        <label class="font-bold">
                                            <input
                                                name="hepaAClassified"
                                                type="radio"
                                                value="1"
                                                v-model="
                                                    formData.hepaAClassified
                                                "
                                            />
                                            1
                                        </label>
                                        <label class="font-bold">
                                            <input
                                                name="hepaAClassified"
                                                type="radio"
                                                value="2"
                                                v-model="
                                                    formData.hepaAClassified
                                                "
                                            />
                                            2
                                        </label>
                                        <label class="font-bold">
                                            <input
                                                name="hepaAClassified"
                                                type="radio"
                                                value="3"
                                                v-model="
                                                    formData.hepaAClassified
                                                "
                                            />
                                            3
                                        </label>
                                    </div>
                                </div>
                                <div
                                    class="flex flex-wrap justify-between gap-5"
                                >
                                    <label class="font-bold" for="hepaB">
                                        <input
                                            type="checkbox"
                                            id="hepaB"
                                            value="Hepa B"
                                            v-model="formData.isHepaB"
                                        />
                                        Hepa B
                                    </label>

                                    <div class="flex gap-3">
                                        <label class="font-bold">
                                            <input
                                                name="hepaBClassified"
                                                type="radio"
                                                value="1"
                                                v-model="
                                                    formData.hepaBClassified
                                                "
                                            />
                                            1
                                        </label>
                                        <label class="font-bold">
                                            <input
                                                name="hepaBClassified"
                                                type="radio"
                                                value="2"
                                                v-model="
                                                    formData.hepaBClassified
                                                "
                                            />
                                            2
                                        </label>
                                        <label class="font-bold">
                                            <input
                                                name="hepaBClassified"
                                                type="radio"
                                                value="3"
                                                v-model="
                                                    formData.hepaBClassified
                                                "
                                            />
                                            3
                                        </label>
                                    </div>
                                </div>

                                <label class="font-bold">
                                    <input
                                        type="checkbox"
                                        value="Typhoid Vaccine"
                                        v-model="formData.isTyphoid"
                                    />
                                    Typhoid Vaccine
                                </label>
                                <label class="font-bold">
                                    <input
                                        type="checkbox"
                                        value="Influenza"
                                        v-model="formData.isInfluenza"
                                    />
                                    Influenza
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="block font-bold" for="other"
                                >Other specify:</label
                            >
                            <input
                                class="w-full rounded border border-black"
                                type="text"
                                id="other"
                                v-model="formData.other"
                            />
                        </div>
                        <div class="mt-5 grid gap-5 sm:grid-cols-2">
                            <div>
                                <p class="text-center font-bold">
                                    Family Health History
                                </p>
                                <div>
                                    <label class="block font-bold" for="father"
                                        >Father:</label
                                    >
                                    <input
                                        class="w-full rounded border border-black"
                                        type="text"
                                        id="father"
                                        v-model="formData.father"
                                    />
                                </div>
                                <div>
                                    <label class="block font-bold" for="mother"
                                        >Mother:</label
                                    >
                                    <input
                                        class="w-full rounded border border-black"
                                        type="text"
                                        id="mother"
                                        v-model="formData.mother"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block font-bold"
                                        for="siblings"
                                        >Siblings:</label
                                    >
                                    <input
                                        class="w-full rounded border border-black"
                                        type="text"
                                        id="siblings"
                                        v-model="formData.siblings"
                                    />
                                </div>
                            </div>
                            <div>
                                <p class="text-center font-bold">
                                    Previous Illness
                                </p>
                                <div>
                                    <label
                                        class="block font-bold"
                                        for="childhood"
                                        >Childhood:</label
                                    >
                                    <input
                                        class="w-full rounded border border-black"
                                        type="text"
                                        id="childhood"
                                        v-model="formData.childhood"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block font-bold"
                                        for="adulthood"
                                        >Adulthood:</label
                                    >
                                    <input
                                        class="w-full rounded border border-black"
                                        type="text"
                                        id="adulthood"
                                        v-model="formData.adulthood"
                                    />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block font-bold" for="allergies"
                                >Allergies:</label
                            >
                            <input
                                class="w-full rounded border border-black"
                                type="text"
                                id="allergies"
                                v-model="formData.allergies"
                            />
                        </div>
                        <div>
                            <label
                                class="block font-bold"
                                for="prefferedHospital"
                                >Preffered Hospital in case of emergency:</label
                            >
                            <input
                                class="w-full rounded border border-black"
                                type="text"
                                id="prefferedHospital"
                                v-model="formData.prefferedHospital"
                            />
                        </div>
                        <button class="mt-5 bg-emerald-900 py-2 text-white">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
definePageMeta({
    layout: "user",
});

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

const handleSubmit = () => {
    console.log(formData.value);
};
</script>
