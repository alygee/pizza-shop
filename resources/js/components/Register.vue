<template>
    <div>
        <div v-if="error && !success">
            <p>There was an error.</p>
        </div>
        <div v-if="success">
            <p>
                Registration successful. You can now
                <router-link :to="{ name: 'login' }">login.</router-link>
            </p>
        </div>
        <div class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
            <div class="flex">
                <div class="w-full">
                    <section
                        class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg"
                    >
                        <header
                            class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md"
                        >
                            Register
                        </header>

                        <form
                            class="w-full p-6 space-y-6 sm:px-10 sm:space-y-8"
                            method="POST"
                            autocomplete="off"
                            @submit.prevent="register"
                            v-if="!success"
                        >
                            <div class="flex flex-wrap">
                                <label
                                    for="name"
                                    class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4"
                                >
                                    Name
                                </label>

                                <input
                                    id="name"
                                    type="text"
                                    class="form-input w-full"
                                    name="name"
                                    v-model="name"
                                    required
                                    autofocus
                                />
                            </div>

                            <div class="flex flex-wrap">
                                <label
                                    for="email"
                                    class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4"
                                >
                                    E-Mail Address
                                </label>

                                <input
                                    id="email"
                                    type="email"
                                    class="form-input w-full"
                                    name="email"
                                    v-model="email"
                                    required
                                />
                            </div>

                            <div class="flex flex-wrap">
                                <label
                                    for="password"
                                    class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4"
                                >
                                    Password
                                </label>

                                <input
                                    id="password"
                                    type="password"
                                    class="form-input w-full"
                                    name="password"
                                    v-model="password"
                                    required
                                />
                            </div>

                            <div class="flex flex-wrap">
                                <label
                                    for="password-confirm"
                                    class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4"
                                >
                                    Confirm Password
                                </label>

                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-input w-full"
                                    name="password_confirmation"
                                    v-model="password_confirmation"
                                    required
                                />
                            </div>

                            <div class="flex flex-wrap">
                                <button
                                    type="submit"
                                    class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-orange-500 hover:bg-orange-700 sm:py-4"
                                >
                                    Register
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            error: false,
            errors: {},
            success: false
        };
    },
    methods: {
        register() {
            var app = this;
            this.$auth.register({
                params: {
                    name: app.name,
                    email: app.email,
                    password: app.password,
                    password_confirmation: app.password_confirmation
                },
                success: function() {
                    app.success = true;
                },
                error: function(resp) {
                    app.error = true;
                    app.errors = resp.response.data.errors;
                },
                redirect: '/login'
            });
        }
    }
};
</script>
