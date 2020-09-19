<template>
    <div class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div v-if="error">
            <p>It looks like those credentials are not working.</p>
        </div>
        <div class="flex">
            <div class="w-full">
                <section
                    class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg"
                >
                    <header
                        class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md"
                    >
                        Login
                    </header>
                    <form
                        class="w-full p-6 space-y-6 sm:px-10 sm:space-y-8"
                        autocomplete="off"
                        method="POST"
                        @submit.prevent="login"
                    >
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
                                placeholder="user@example.com"
                                required
                                autofocus
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
                            <button
                                type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-orange-500 hover:bg-orange-600 sm:py-4"
                            >
                                Login
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            email: null,
            password: null,
            error: false
        };
    },
    methods: {
        login() {
            var app = this;
            this.$auth.login({
                params: {
                    email: app.email,
                    password: app.password
                },
                success: function() {},
                error: function() {
                    this.error = true;
                },
                rememberMe: true,
                redirect: "/",
                fetchUser: true
            });
        }
    }
};
</script>
