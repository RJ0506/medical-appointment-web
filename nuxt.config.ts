// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    compatibilityDate: "2024-04-03",
    devtools: { enabled: true },
    postcss: {
        plugins: {
            tailwindcss: {},
            autoprefixer: {},
        },
    },
    srcDir: "./vue",
    runtimeConfig: {
        public: {
            laravelURL: process.env.LARAVEL_URL,
            nuxtURL: process.env.NUXT_URL,
        },
    },

    modules: ["@nuxtjs/tailwindcss", "@nuxt/icon"],
});