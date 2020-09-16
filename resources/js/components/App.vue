<template>
    <div>
      <div v-if="$auth.ready()">
        <header class="bg-orange-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
              <nav>
                    <ul class="flex">
                        <li class="text-lg font-semibold text-gray-100 no-underline mr-6">
                            <router-link :to="{ name: 'menu' }">Menu</router-link>
                        </li>
                        <li v-if="$auth.check(1)" class="text-lg font-semibold text-gray-100 no-underline mr-6">
                            <router-link :to="{ name: 'profile' }">Profile</router-link>
                        </li>
                        <li v-if="$auth.check(2)" class="text-lg font-semibold text-gray-100 no-underline mr-6">
                            <router-link :to="{ name: 'admin' }">Admin Dashboard</router-link>
                        </li>
                        <li v-if="!$auth.check()" class="text-lg font-semibold text-gray-100 no-underline mr-6">
                            <router-link :to="{ name: 'login' }">Login</router-link>
                        </li>
                        <li v-if="!$auth.check()" class="text-lg font-semibold text-gray-100 no-underline mr-6">
                            <router-link :to="{ name: 'register' }">Register</router-link>
                        </li>
                        <li v-if="$auth.check()" class="text-lg font-semibold text-gray-100 no-underline mr-6">
                            <a href="#" @click.prevent="$auth.logout()">Logout</a>
                        </li>
                    </ul>
                </nav>
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
    export default {
      mounted() {
      }
    }
</script>
