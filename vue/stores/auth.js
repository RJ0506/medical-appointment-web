export const useAuthStore = defineStore("auth", {
    state: () => ({
        token: null,
        role: null,
    }),
    actions: {
        loadFromCookies() {
            const current_user = useCookie("current_user");
            const storedToken = current_user.value;
            if (storedToken) {
                this.token = storedToken.token;
                this.role = storedToken.patient
                    ? storedToken.patient.roles[0].name
                    : storedToken.user.roles[0].name;
            }
        },
        setToken(token) {
            this.token = token;
            //initial set and of role but will change later when user is logged in 
            //because loadfromcookis will run on every page
            this.role = token.patient ? "patient" : "user";
            const current_user = useCookie("current_user");
            current_user.value = JSON.stringify(token);
        },
        logout() {
            this.token = null;
            this.user = null;
            const current_user = useCookie("current_user");
            current_user.value = null;
        },
    },
    getters: {
        isAuthenticated(state) {
            return !!state.token;
        },
        isAdmin(state) {
            return (
                state.role !== "Employee" &&
                state.role !== "Student" &&
                state.role !== "Medical Personnel"
            );
        },
        isDoctor(state) {
            return state.role === "Doctor";
        },
    },
});
