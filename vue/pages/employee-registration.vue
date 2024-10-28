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
            <div
                class="my-2 border border-l-[1rem] border-black border-l-[#ffeb3b] bg-[#ffffcc] px-2 py-2 text-lg text-black shadow-md"
            >
                <span class="font-bold"> NOTE: </span>
                Fields with asterisk (
                <span class="text-xl text-red-500">*</span>
                ) are required.
            </div>
            <form @submit.prevent="handleSubmit" class="mt-5 grid">
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
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="id"
                                    v-model="formData.id"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="department"
                                    >Department:</label
                                >
                                <input
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="department"
                                    v-model="formData.department"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="classification"
                                    >Classification:</label
                                >
                                <input
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="classification"
                                    v-model="formData.classification"
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
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="middleName"
                                    v-model="formData.middle_name"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="name_extension"
                                    >Name Extension:</label
                                >
                                <select
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
                                    >Contact Person:</label
                                >
                                <input
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="contactPerson"
                                    v-model="formData.contact_person"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="relation"
                                    >Relation:</label
                                >
                                <input
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="relation"
                                    v-model="formData.relation"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="contactPersonNumber"
                                    >Contact Number:</label
                                >
                                <input
                                    required
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
                <div
                    class="mt-5 grid gap-4 bg-[#d9d9d9] px-4 py-2 md:grid-cols-2 md:divide-x-2 md:divide-black"
                >
                    <div class="px-4 md:px-6">
                        <div>
                            <label
                                class="font-bold after:text-red-500 after:content-['*']"
                                for="email"
                                >Email</label
                            >
                            <div
                                class="mb-2 flex w-full items-center gap-3 md:mb-0"
                            >
                                <input
                                    required
                                    type="email"
                                    id="email"
                                    class="w-full rounded-md border border-black"
                                    v-model="formData.email"
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
                                    required
                                    type="email"
                                    id="re-enter-email"
                                    class="w-full rounded-md border border-black"
                                    v-model="formData.confirm_email"
                                />
                                <p>@tua.edu.ph</p>
                            </div>
                            <p v-if="emailErrorMessage" class="text-red-500">
                                {{ emailErrorMessage }}
                            </p>
                        </div>
                    </div>
                    <div class="px-4 py-2 md:px-10">
                        <div class="mb-2 md:mb-0">
                            <label
                                class="block font-bold after:text-red-500 after:content-['*']"
                                for="password"
                                >Password</label
                            >
                            <input
                                required
                                class="w-full rounded-md border border-black"
                                type="password"
                                id="password"
                                v-model="formData.password"
                            />
                        </div>
                        <div class="mb-2 md:mb-0">
                            <label class="block font-bold" for="confirmPassword"
                                >Confirm Password</label
                            >
                            <input
                                required
                                class="w-full rounded-md border border-black"
                                type="password"
                                id="confirmPassword"
                                v-model="formData.confirm_password"
                            />
                            <p v-if="passwordErrorMessage" class="text-red-500">
                                {{ passwordErrorMessage }}
                            </p>
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

const passwordErrorMessage = ref("");
const emailErrorMessage = ref("");

const formData = ref({
    id: "",
    department: "",
    classification: "",
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
    relation: "",
    contact_person_number: "",
    email: "",
    confirm_email: "",
    password: "",
    confirm_password: "",
});

const handleSubmit = () => {
    passwordErrorMessage.value = "";
    emailErrorMessage.value = "";

    if (formData.value.password !== formData.value.confirm_password) {
        passwordErrorMessage.value = "Password do not match";
        return;
    } else if (formData.value.email !== formData.value.confirm_email) {
        emailErrorMessage.value = "Email do not match";
        return;
    } else {
        console.log(formData.value);
    }
};
</script>
