<template>
    <div>
        <section
            class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg"
        >
            <header
                class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md"
            >
                Menu
            </header>

            <div class="w-full p-6">
                <div class="grid grid-cols-4 gap-4">
                    <menu-item
                        v-for="product in products"
                        :product="product"
                        :key="product.id"
                        @show-modal="displayModal"
                    ></menu-item>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import MenuItem from "./MenuItem.vue";

export default {
    name: "MenuGrid",
    components: { MenuItem },
    data() {
        return {
            products: {},
            showModal: false,
            selectedProduct: {}
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.axios.get("/products").then(({ data }) => {
                this.products = data;
            });
        }
    }
};
</script>
