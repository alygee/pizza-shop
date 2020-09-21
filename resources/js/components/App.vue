<template>
    <div>
        <div v-if="$auth.ready()">
            <header class="py-6 border-b-2">
                <div
                    class="container mx-auto flex justify-between items-center px-6"
                >
                    <nav>
                        <ul class="flex">
                            <li class="text-lg font-semibold no-underline mr-6">
                                <router-link :to="{ name: 'menu' }"
                                    ><img
                                        src="/images/pizza.png"
                                        class="w-10 -my-4"
                                /></router-link>
                            </li>
                            <li class="text-lg font-semibold no-underline mr-6">
                                <router-link :to="{ name: 'menu' }"
                                    >Menu</router-link
                                >
                            </li>
                            <li
                                v-if="$auth.check(1)"
                                class="text-lg font-semibold no-underline mr-6"
                            >
                                <router-link :to="{ name: 'profile' }"
                                    >Profile</router-link
                                >
                            </li>
                            <li
                                v-if="$auth.check(2)"
                                class="text-lg font-semibold no-underline mr-6"
                            >
                                <router-link :to="{ name: 'admin.dashboard' }"
                                    >Admin Dashboard</router-link
                                >
                            </li>
                            <li
                                v-if="!$auth.check()"
                                class="text-lg font-semibold no-underline mr-6"
                            >
                                <router-link :to="{ name: 'login' }"
                                    >Login</router-link
                                >
                            </li>
                            <li
                                v-if="!$auth.check()"
                                class="text-lg font-semibold no-underline mr-6"
                            >
                                <router-link :to="{ name: 'register' }"
                                    >Register</router-link
                                >
                            </li>
                            <li
                                v-if="$auth.check()"
                                class="text-lg font-semibold no-underline mr-6"
                            >
                                <a href="#" @click.prevent="$auth.logout()"
                                    >Logout</a
                                >
                            </li>
                        </ul>
                    </nav>
                    <cart></cart>
                </div>
            </header>
            <main class="sm:container sm:mx-auto sm:mt-10">
                <div class="w-full sm:px-6">
                    <router-view></router-view>
                </div>
            </main>
        </div>
        <div v-if="!$auth.ready()">
            Loading...
        </div>
    </div>
</template>
<script>
import Cart from "./cart/Cart";

export default {
    name: "App",
    components: { Cart }
};
</script>

<style>
.router-link-exact-active {
    color: #ff5a1f !important;
}
.router-link-exact-active:hover {
    color: #d03801 !important;
}
</style>
