<template>
    <div class="mx-auto mt-16 max-w-7xl">
        <div class="flex">
            <NuxtLink
                class="rounded-md border border-black bg-[#a6a6a6] px-4 py-2 font-bold text-black hover:bg-[#d9d9d9]"
                to="#"
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
            <form class="mt-5 grid">
                <div
                    class="grid gap-4 border border-black bg-white px-4 py-8 shadow-md"
                >
                    <h2 class="bg-black text-center font-bold text-white">
                        MEDICAL HEATH RECORD
                    </h2>
                    <div class="border border-black bg-[#d9d9d9] p-3">
                        <div class="-mx-3 flex flex-wrap">
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-3/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="id"
                                    >ID Number:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="id"
                                    v-model="formData.id"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="course"
                                    >Course:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="course"
                                    v-model="formData.course"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="year_level"
                                    >Year Level:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="year_level"
                                    v-model="formData.year_level"
                                />
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-2/6">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="lastname"
                                    >Lastname:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="lastname"
                                    v-model="formData.last_name"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-2/6">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="firstname"
                                    >First Name:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="firstname"
                                    v-model="formData.first_name"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label
                                    class="block font-normal"
                                    for="middleName"
                                    >Middle Name:</label
                                >
                                <input
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="middleName"
                                    v-model="formData.middle_name"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label
                                    class="block font-normal"
                                    for="name_extension"
                                    >Name Extension:</label
                                >
                                <select
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    id="name_extension"
                                    v-model="formData.name_extension"
                                >
                                    <option value="jr">Sr</option>
                                    <option value="sr">Jr</option>
                                </select>
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-2/6">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="place_of_birth"
                                    >Place of Birth:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="place_of_birth"
                                    v-model="formData.place_of_birth"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-2/6">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="datebirth"
                                    >Date of Birth:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="date"
                                    id="datebirth"
                                    v-model="formData.birthday"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="age"
                                    >Age:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="age"
                                    v-model="formData.age"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="gender"
                                    >Gender:</label
                                >
                                <select
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    id="gender"
                                    v-model="formData.gender"
                                >
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-2/6">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="nationality"
                                    >Nationality:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="nationality"
                                    v-model="formData.nationality"
                                />
                            </div>
                        </div>

                        <div class="-mx-3 flex flex-wrap">
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-3/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="address"
                                    >Address:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="address"
                                    v-model="formData.address"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="zip_code"
                                    >Zip Code:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="zip_code"
                                    v-model="formData.zip_code"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="contact"
                                    >Contact Number:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="contact"
                                    v-model="formData.contact_number"
                                />
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-3/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="contactPerson"
                                    >Name of Parent/Guardian:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="contactPerson"
                                    v-model="formData.contact_person"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-2/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="contactPersonNumber"
                                    >Parent / Guardian Contact Number:</label
                                >
                                <input
                                    required
                                    :disabled="isReadOnly"
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="contactPersonNumber"
                                    placeholder="Ex. +639232123111"
                                    v-model="formData.contact_person_number"
                                />
                            </div>
                        </div>
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
            </form>
        </div>
    </div>
</template>
<script setup lang="ts">
definePageMeta({
    layout: "user",
});

const isReadOnly = ref(true);

const formData = ref({
    id: "",
    course: "",
    year_level: "",
    last_name: "",
    first_name: "",
    middle_name: "",
    name_extension: "",
    place_of_birth: "",
    birthday: "",
    age: "",
    gender: "",
    nationality: "",
    address: "",
    zip_code: "",
    contact_number: "",
    contact_person: "",
    contact_person_number: "",
    email: "",
    confirm_email: "",
    password: "",
    confirm_password: "",
});

const toggleEditMode = () => {
    isReadOnly.value = !isReadOnly.value;
    if (isReadOnly.value) {
        location.reload();
    }
};

const handleSubmit = () => {
    console.log("Submit form data");
};
</script>
