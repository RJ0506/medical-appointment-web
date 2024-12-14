<template>
    <div>
        <div class="mx-auto max-w-md rounded-lg bg-white p-6 shadow-md">
            <h2 class="mb-4 text-center text-2xl font-bold">Manage Accounts</h2>
            <form @submit.prevent="handleSubmit" class="space-y-4">
                <div>
                    <label for="first_name" class="block text-gray-700"
                        >First Name</label
                    >
                    <input
                        type="text"
                        maxlength="25"
                        id="first_name"
                        v-model="formData.first_name"
                        class="w-full rounded-lg border px-4 py-2 focus:outline-emerald-400"
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
                <div>
                    <label for="last_name" class="block text-gray-700"
                        >Last Name</label
                    >
                    <input
                        type="text"
                        maxlength="25"
                        id="last_name"
                        v-model="formData.last_name"
                        class="w-full rounded-lg border px-4 py-2 focus:outline-emerald-400"
                    />
                    <p
                        v-if="
                            submitErrorMessages && submitErrorMessages.last_name
                        "
                        class="text-red-500"
                    >
                        {{ submitErrorMessages.last_name[0] }}
                    </p>
                </div>
                <div>
                    <label for="email" class="block text-gray-700">Email</label>
                    <input
                        type="email"
                        maxlength="25"
                        id="email"
                        v-model="formData.email"
                        class="w-full rounded-lg border px-4 py-2 focus:outline-emerald-400"
                    />
                    <p
                        v-if="submitErrorMessages && submitErrorMessages.email"
                        class="text-red-500"
                    >
                        {{ submitErrorMessages.email[0] }}
                    </p>
                </div>
                <div>
                    <label for="password" class="block text-gray-700"
                        >Password</label
                    >
                    <input
                        type="password"
                        maxlength="25"
                        id="password"
                        v-model="formData.password"
                        class="w-full rounded-lg border px-4 py-2 focus:outline-emerald-400"
                    />
                    <p
                        v-if="
                            submitErrorMessages && submitErrorMessages.password
                        "
                        class="text-red-500"
                    >
                        {{ submitErrorMessages.password[0] }}
                    </p>
                </div>
                <!-- <div>
                    <label for="confirm_password" class="block text-gray-700"
                        >Confirm Password</label
                    >
                    <input
                        type="password"
                        maxlength="25"
                        id="confirm_password"
                        v-model="formData.confirm_password"
                        class="w-full rounded-lg border px-4 py-2 focus:outline-emerald-400"
                    />
                    <p
                        v-if="
                            submitErrorMessages &&
                            submitErrorMessages.confirm_password
                        "
                        class="text-red-500"
                    >
                        {{ submitErrorMessages.confirm_password[0] }}
                    </p>
                </div> -->
                <div>
                    <label for="role_id" class="block font-medium text-gray-700"
                        >Role</label
                    >
                    <select
                        id="role_id"
                        v-model="formData.role_id"
                        class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-purple-500"
                    >
                        <option value="" disabled>Select a role type</option>
                        <option
                            v-for="role in role_types"
                            :key="role.id"
                            :value="role.id"
                        >
                            {{ role.name }}
                        </option>
                    </select>
                    <p
                        v-if="
                            submitErrorMessages && submitErrorMessages.role_id
                        "
                        class="text-red-500"
                    >
                        {{ submitErrorMessages.role_id[0] }}
                    </p>
                </div>
                <button
                    :disabled="isAdding"
                    type="submit"
                    class="w-full rounded-lg bg-[#1E3D2C] px-4 py-2 text-white hover:bg-emerald-900"
                >
                    {{ isAdding ? "Adding..." : "Submit" }}
                </button>
            </form>
        </div>
        <!-- SEARCH -->
        <div class="relative mt-7">
            <input
                type="text"
                v-model="searchTerm"
                class="search-input rounded-md border border-gray-300 py-2 pl-10 pr-4 focus:outline-none focus:ring-2"
                placeholder="Search day..."
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
        <div class="mt-7 overflow-x-auto">
            <table class="w-full table-auto text-left">
                <thead class="text-white">
                    <tr class="bg-[#1e3d2c]">
                        <th class="p-5">Name</th>
                        <th class="p-5">Email</th>
                        <th class="p-5">Role</th>
                        <!-- <th class="p-5">Doctor</th> -->
                        <th class="p-5">Action</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    <template v-if="isLoading">
                        <tr>
                            <td colspan="6" class="text-center"><Spinner /></td>
                        </tr>
                    </template>
                    <template v-else>
                        <template v-if="filteredRecords.length > 0">
                            <tr
                                class="odd:bg-[#D9D9D9] even:bg-white"
                                v-for="(item, index) in filteredRecords"
                                :key="index"
                            >
                                <td class="p-5 font-medium">
                                    <!-- {{ item.day_of_week }} -->
                                    {{ item.first_name }} {{ item.last_name }}
                                </td>
                                <td class="p-5 font-medium">
                                    {{ item.email }}
                                </td>
                                <td class="p-5 font-medium">
                                    {{ item.roles[0].name }}
                                </td>
                                <!-- <td class="p-5 font-medium"> -->
                                <!-- {{ item.schedule.service_type.name }} -->
                                <!-- doctor name -->
                                <!-- </td> -->
                                <td class="pl-7">
                                    <button @click="deleteSchedule(item.id)">
                                        <Icon
                                            class="text-red-500 hover:text-red-900"
                                            name="ep:delete"
                                            style="font-size: 2rem"
                                        />
                                    </button>
                                </td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr>
                                <td
                                    colspan="6"
                                    class="p-5 text-center text-gray-500"
                                >
                                    No Records Found
                                </td>
                            </tr>
                        </template>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { useAuthStore } from "~/stores/auth";

definePageMeta({
    layout: "user",
    middleware: ["doctor"],
});

const authStore = useAuthStore();
const submitErrorMessages = ref("");
const searchTerm = ref("");
const role_types = ref([]);
const users = ref([]);
const isLoading = ref(true);
const isAdding = ref(false);
const formData = ref({
    first_name: "",
    last_name: "",
    email: "",
    password: "",
    // password_confirmation: "",
    role_id: "",
});

const filteredRecords = computed(() => {
    if (!searchTerm.value) {
        return users.value;
    }
    return users.value.filter((item) => {
        return item.first_name
            .toLowerCase()
            .includes(searchTerm.value.toLowerCase());
    });
});

const fetchUsers = async () => {
    isLoading.value = true;
    try {
        const { data } = await axios.get(
            `${useRuntimeConfig().public.laravelURL}user/users`,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        users.value = data;
    } catch (error) {
        console.log("Error Fetching Users");
    } finally {
        isLoading.value = false;
    }
};

const fetchRoleTypes = async () => {
    try {
        const { data } = await axios.get(
            `${useRuntimeConfig().public.laravelURL}user/roles`,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        role_types.value = data;
    } catch (error) {
        console.log("Failed to fetch role types");
    }
};

const handleSubmit = async () => {
    isAdding.value = true;
    try {
        const result = await axios.post(
            `${useRuntimeConfig().public.laravelURL}user/users`,
            formData.value,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        await fetchSchedule();
        submitErrorMessages.value = "";
    } catch (error) {
        submitErrorMessages.value = error.response.data.errors;
        console.log("Error Submitting");
    } finally {
        isAdding.value = false;
    }
};

const deleteSchedule = async (id) => {
    try {
        const result = await axios.delete(
            `${useRuntimeConfig().public.laravelURL}user/appointment-schedules/${id}`,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        await fetchSchedule();
    } catch (error) {
        console.log("Error Deleting");
    }
};

onMounted(async () => {
    await fetchUsers();
    await fetchRoleTypes();
});
</script>
