<template>
    <div>
        <div v-if="$auth.ready()">
            <header>
                <nav>
                    <ul class="main-menu">
                        <li>
                            <a href="/">
                                <img src="/images/logo.svg" alt="logo" />
                            </a>
                        </li>
                        <li>
                            <router-link :to="{ name: 'menu' }">
                                Menu
                            </router-link>
                        </li>
                    </ul>
                </nav>
                <cart />
            </header>
            <main>
                <div class="w-full sm:px-6">
                    <router-view></router-view>
                </div>
            </main>
        </div>
        <div v-if="!$auth.ready()">Loading...</div>
    </div>
</template>
<script>
import Cart from "./cart/Cart";

export default {
    name: "App",
    components: { Cart },
};
</script>

<style>
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
