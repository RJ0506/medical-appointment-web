<template>
    <div>
        <div>Physical</div>
        <form @submit.prevent="handleSubmit">
            <button type="submit">Submit</button>
        </form>
    </div>
</template>

<script setup>
import axios from "axios";
import { useAuthStore } from "~/stores/auth";


definePageMeta({
    layout: "patient",
    middleware: [
        function (to, from) {
            const authStore = useAuthStore();
            const role = authStore.role;
            
            if (role !== "Employee") {
                return navigateTo("/patient");
            }
        },
    ],
});

const authStore = useAuthStore();
const formData = ref({
    isAuthorized: false,
    purpose: "",
    scheduled_date: "",
    time_slot: "",
});

const handleSubmit = async () => {
    try {
        const result = await axios.post(
            `${useRuntimeConfig().public.laravelURL}patient/physical-exams`,
            formData.value,
            {
                headers: {
                    Authorization: `Bearer ${authStore.token}`,
                },
            },
        );
        // dialogRef.value?.showModal();
    } catch (error) {
        console.log("Error Creating appointment");
    }
};
</script>
