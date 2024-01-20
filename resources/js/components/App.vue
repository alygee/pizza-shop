<template>
    <div>
        <div v-if="$auth.ready()">
            <header>
                <nav>
                    <ul class="main-menu">
                        <li class="text-lg font-semibold no-underline mr-6">
                            <router-link :to="{ name: 'menu' }"
                                >
                                <img src="/images/logo.svg" />
                            </router-link>
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
body {
  background-color: #090909;
  color: #fff;
  font-family: Montserrat;
}

ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

h1 {
  text-align: center;
  font-size: 24px;
  font-weight: 700;
}

main h1 {
  margin: 62px 0 48px;
}

h2 {
  font-size: 20px;
  font-weight: 700;
}

main.terms h2 {
  margin: 31px 0 14px;
}

h3, .h3 {
  font-size: 16px;
  font-weight: 600;
}

main {
  width: 920px;
  margin: 0 auto;
}
header {
  width: 920px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

header nav ul {
  display: flex;
  align-items: center;
}

header nav ul.main-menu li {
  margin-right: 30px;
  padding-bottom: 2px;
  border-bottom: 1px solid transparent;
}

header nav ul.personal-menu li {
  padding: 10px 12px;
}

header nav ul.personal-menu {
  margin-right: 12px;
}

header nav ul.main-menu li:last-child {
  margin-right: 0;
}

header nav ul.main-menu li a {
  color: inherit;
  font-size: 12px;
  text-decoration: none;
}

header nav .main-menu li a:first-child:hover {
  padding-bottom: 2px;
  border-bottom: 1px solid transparent;
}

header nav .personal-menu li a svg {
  color: #fff;
}

header nav .personal-menu li svg:hover {
  color: #ffbd19;
}

header nav ul.main-menu li a.router-link-exact-active,
header nav ul.main-menu li a:hover {
  color: #ffbd19;
  padding-bottom: 2px;
  border-bottom: 1px solid #ffbd19;
}
.authenticated {
  color: #ffbd19;
  cursor: pointer;
}
.authenticated svg {
  border: 1px solid #ffbd19;
  border-radius: 100%;
  padding: 5px 6px;
}
</style>
