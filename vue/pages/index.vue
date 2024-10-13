<template>
    <NuxtLayout>
        <NuxtPage />
        <h1>home index is working</h1>
    </NuxtLayout>
</template>

<script setup>
import { ref } from "vue";
const count = ref(0);

const increment = () => {
    count.value++;
};
</script>
