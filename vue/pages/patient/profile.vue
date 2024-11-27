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
        <div v-if="isLoading" class="mx-auto mt-12 w-1/4 lg:w-1/6">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 150">
                <path
                    fill="none"
                    stroke="#347956"
                    stroke-width="15"
                    stroke-linecap="round"
                    stroke-dasharray="300 385"
                    stroke-dashoffset="0"
                    d="M275 75c0 31-27 50-50 50-58 0-92-100-150-100-28 0-50 22-50 50s23 50 50 50c58 0 92-100 150-100 24 0 50 19 50 50Z"
                >
                    <animate
                        attributeName="stroke-dashoffset"
                        calcMode="spline"
                        dur="2"
                        values="685;-685"
                        keySplines="0 0 1 1"
                        repeatCount="indefinite"
                    ></animate>
                </path>
            </svg>
        </div>
        <div v-if="!isLoading" class="mx-auto mt-12 grid max-w-5xl">
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
                                    :disabled="isEditing"
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="id"
                                    v-model="formData.id_number"
                                />
                                <p
                                    v-if="
                                        submitErrorMessages &&
                                        submitErrorMessages.id_number
                                    "
                                    class="text-red-500"
                                >
                                    {{ submitErrorMessages.id_number[0] }}
                                </p>
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="course"
                                    >Course:</label
                                >
                                <select
                                    :disabled="isEditing"
                                    required
                                    class="w-full rounded-md border border-black"
                                    id="course"
                                    v-model="formData.department_id"
                                >
                                    <option
                                        v-for="department in departments"
                                        :value="department.id"
                                        :key="department.id"
                                    >
                                        {{ department.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="year_level"
                                    >Year Level:</label
                                >
                                <select
                                    :disabled="isEditing"
                                    required
                                    class="w-full rounded-md border border-black"
                                    id="year_level"
                                    v-model="formData.year_level"
                                >
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                </select>
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
                                    :disabled="isEditing"
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="lastname"
                                    v-model="formData.last_name"
                                />
                                <p
                                    v-if="
                                        submitErrorMessages &&
                                        submitErrorMessages.last_name
                                    "
                                    class="text-red-500"
                                >
                                    {{ submitErrorMessages.last_name[0] }}
                                </p>
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-2/6">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="firstname"
                                    >First Name:</label
                                >
                                <input
                                    :disabled="isEditing"
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="firstname"
                                    v-model="formData.first_name"
                                />
                                <p
                                    v-if="
                                        submitErrorMessages &&
                                        submitErrorMessages.first_name
                                    "
                                    class="text-red-500"
                                >
                                    {{ submitErrorMessages.first_name[0] }}
                                </p>
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label
                                    class="block font-normal"
                                    for="middle_initial"
                                    >Middle Initial:</label
                                >
                                <input
                                    :disabled="isEditing"
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="middle_initial"
                                    maxlength="1"
                                    v-model="formData.middle_initial"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label
                                    class="block font-normal"
                                    for="name_extension"
                                    >Name Extension:</label
                                >
                                <select
                                    :disabled="isEditing"
                                    class="w-full rounded-md border border-black"
                                    id="name_extension"
                                    v-model="formData.name_extension"
                                >
                                    <option value="Jr.">Sr.</option>
                                    <option value="Sr.">Jr.</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
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
                                    :disabled="isEditing"
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
                                    :disabled="isEditing"
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="date"
                                    id="datebirth"
                                    v-model="formData.date_of_birth"
                                    :max="maxDate"
                                />
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-1/6">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="age"
                                    >Age:</label
                                >
                                <input
                                    :disabled="isEditing"
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="age"
                                    disabled
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
                                    :disabled="isEditing"
                                    required
                                    class="w-full rounded-md border border-black"
                                    id="gender"
                                    v-model="formData.gender"
                                >
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
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
                                    :disabled="isEditing"
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
                                    :disabled="isEditing"
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
                                    :disabled="isEditing"
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
                                    :disabled="isEditing"
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="contact"
                                    placeholder="Ex. 09232323212"
                                    v-model="formData.contact_number"
                                />
                                <p
                                    v-if="
                                        submitErrorMessages &&
                                        submitErrorMessages.contact_number
                                    "
                                    class="text-red-500"
                                >
                                    {{ submitErrorMessages.contact_number[0] }}
                                </p>
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
                                    :disabled="isEditing"
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="text"
                                    id="contactPerson"
                                    v-model="formData.contact_person"
                                />
                                <p
                                    v-if="
                                        submitErrorMessages &&
                                        submitErrorMessages.contact_person
                                    "
                                    class="text-red-500"
                                >
                                    {{ submitErrorMessages.contact_person[0] }}
                                </p>
                            </div>
                            <div class="mb-2 w-full px-3 md:mb-0 md:w-2/5">
                                <label
                                    class="block font-normal after:text-red-500 after:content-['*']"
                                    for="contactPersonNumber"
                                    >Parent / Guardian Contact Number:</label
                                >
                                <input
                                    :disabled="isEditing"
                                    required
                                    class="w-full rounded-md border border-black"
                                    type="number"
                                    id="contactPersonNumber"
                                    placeholder="Ex. 09232323212"
                                    v-model="formData.contact_person_number"
                                />
                                <p
                                    v-if="
                                        submitErrorMessages &&
                                        submitErrorMessages.contact_person_number
                                    "
                                    class="text-red-500"
                                >
                                    {{
                                        submitErrorMessages
                                            .contact_person_number[0]
                                    }}
                                </p>
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
                                    :disabled="isEditing"
                                    required
                                    type="text"
                                    id="email"
                                    class="w-full rounded-md border border-black"
                                    v-model="formData.email"
                                    maxlength="20"
                                    @input="validateEmail"
                                />
                                <p>@tua.edu.ph</p>
                            </div>
                            <p
                                v-if="
                                    submitErrorMessages &&
                                    submitErrorMessages.email
                                "
                                class="text-red-500"
                            >
                                {{ submitErrorMessages.email[0] }}
                            </p>
                            <p v-if="emailErrorMessage" class="text-red-500">
                                {{ emailErrorMessage }}
                            </p>
                        </div>
                        <div>
                            <label class="font-bold" for="re-enter-email"
                                >Re-enter Email</label
                            >
                            <div
                                class="mb-2 flex w-full items-center gap-3 md:mb-0"
                            >
                                <input
                                    :disabled="isEditing"
                                    required
                                    type="text"
                                    id="re-enter-email"
                                    class="w-full rounded-md border border-black"
                                    v-model="formData.email_confirmation"
                                    @input="validateConfirmEmail"
                                />
                                <p>@tua.edu.ph</p>
                            </div>
                            <p
                                v-if="emailConfirmationErrorMessage"
                                class="text-red-500"
                            >
                                {{ emailConfirmationErrorMessage }}
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
                                :disabled="isEditing"
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
                                :disabled="isEditing"
                                required
                                class="w-full rounded-md border border-black"
                                type="password"
                                id="confirmPassword"
                                v-model="formData.password_confirmation"
                            />
                            <p v-if="passwordErrorMessage" class="text-red-500">
                                {{ passwordErrorMessage }}
                            </p>
                            <p
                                v-if="
                                    submitErrorMessages &&
                                    submitErrorMessages.password
                                "
                                class="text-red-500"
                            >
                                {{ submitErrorMessages.password[0] }}
                            </p>
                        </div>
                    </div>
                </div>
                <button
                    v-if="!isEditing"
                    class="mt-16 rounded-md bg-[#347956] py-3 text-xl font-bold text-white hover:bg-emerald-900"
                    type="submit"
                >
                    Update
                </button>
                <button
                    @click="toggleEditing()"
                    class="mt-2 rounded-md py-3 text-xl font-bold text-white "
                    :class="{
                        'bg-red-500 hover:bg-red-700': !isEditing,
                        'bg-[#347956] hover:bg-emerald-900': isEditing,
                    }"
                    type="button"
                >
                    {{ isEditing ? "Edit" : "Cancel" }}
                </button>
            </form>
        </div>
    </div>
</template>
<script setup>
import { useAuthStore } from "~/stores/auth";
import axios from "axios";

definePageMeta({
    layout: "patient",
});
const passwordErrorMessage = ref("");
const emailErrorMessage = ref("");
const emailConfirmationErrorMessage = ref("");
const submitErrorMessages = ref();
const departments = ref([]);
const isLoading = ref(false);
const isEditing = ref(false);

const authStore = useAuthStore();
const formData = ref({
    id_number: "",
    department_id: 0,
    year_level: "",
    last_name: "",
    first_name: "",
    middle_initial: "",
    name_extension: "",
    place_of_birth: "",
    date_of_birth: "",
    age: "",
    gender: "",
    nationality: "",
    address: "",
    zip_code: "",
    contact_number: "",
    contact_person: "",
    contact_person_number: "",
    email: "",
    email_confirmation: "",
    password: "",
    password_confirmation: "",
    type: "Student",
});

watch(
    () => ({
        department_id: formData.value.department_id,
        middle_initial: formData.value.middle_initial,
        date_of_birth: formData.value.date_of_birth,
    }),
    (newValues) => {
        formData.value.department_id = Number(newValues.department_id);
        formData.value.middle_initial = newValues.middle_initial.toUpperCase();
        formData.value.age = calculateAge(newValues.date_of_birth);
    },
);

const validateEmail = () => {
    const emailPattern = /^[a-zA-Z]+$/;
    const email = formData.value.email;

    if (!emailPattern.test(email)) {
        emailErrorMessage.value = "Please enter a valid email address.";
    } else {
        emailErrorMessage.value = "";
    }
};

const validateConfirmEmail = () => {
    const emailPattern = /^[a-zA-Z]+$/;
    const email_confirmation = formData.value.email_confirmation;

    if (!emailPattern.test(email_confirmation)) {
        emailConfirmationErrorMessage.value =
            "Please enter a valid email address.";
    } else {
        emailConfirmationErrorMessage.value = "";
    }
};

const calculateAge = (dateOfBirth) => {
    if (!dateOfBirth) return "";
    const today = new Date();
    const birthDate = new Date(dateOfBirth);
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDifference = today.getMonth() - birthDate.getMonth();
    if (
        monthDifference < 0 ||
        (monthDifference === 0 && today.getDate() < birthDate.getDate())
    ) {
        age--;
    }
    return age;
};

const maxDate = computed(() => {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, "0");
    const day = String(today.getDate()).padStart(2, "0");
    return `${year}-${month}-${day}`;
});

const handleSubmit = async () => {
    passwordErrorMessage.value = "";
    emailErrorMessage.value = "";

    if (formData.value.password !== formData.value.password_confirmation) {
        passwordErrorMessage.value = "Password do not match";
        return;
    }

    if (formData.value.email !== formData.value.email_confirmation) {
        emailErrorMessage.value = "Email do not match";
        return;
    }

    if (!formData.value.email.includes("@tua.edu.ph")) {
        formData.value.email = `${formData.value.email}@tua.edu.ph`;
    }

    if (!formData.value.email_confirmation.includes("@tua.edu.ph")) {
        formData.value.email_confirmation = `${formData.value.email_confirmation}@tua.edu.ph`;
    }

    isLoading.value = true;

    await axios
        .post(
            `${useRuntimeConfig().public.laravelURL}patient/register`,
            formData.value,
        )
        .then((response) => {
            if (response) {
                isLoading.value = false;
                navigateTo("/register-success");
            }
        })
        .catch((error) => {
            isLoading.value = false;
            submitErrorMessages.value = error.response.data.errors;
            console.log("Registration failed:", error.response.data);
        });
};

const toggleEditing = () => {
    isEditing.value = !isEditing.value;
};

const fetchDepartments = async () => {
    try {
        const response = await axios.get(
            `${useRuntimeConfig().public.laravelURL}patient/departments`,
        );
        departments.value = response.data;
    } catch (error) {
        console.log(error);
    }
};

const apiFetchMe = async () => {
    try {
        const { data } = await axios.get(
            `${useRuntimeConfig().public.laravelURL}patient/me`,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        formData.value = data;
    } catch (error) {
        console.log(error);
    }
};

// onMounted(async () => {
//     await apiFetchMe();
//     await fetchDepartments();
// });
</script>
