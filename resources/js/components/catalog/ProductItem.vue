<template>
    <div class="product-card">
        <div class="product-card-image">
            <img :src="product.image" :alt="product.name" />
        </div>
        <div>
            <div class="product-card-description">
                <p class="product-card-name">{{ product.name }}</p>
                <p class="product-card-label">{{ product.description }}</p>
            </div>
            <div class="product-card-action">
                <button type="button" @click="add">Add to cart</button>
                <div class="product-card-price">
                    {{ $store.getters.currencySign }}
                    {{ price() }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MenuItem",
    props: {
        product: Object,
    },
    methods: {
        add() {
            this.$store.dispatch("addToCart", this.product);
        },
        price() {
            return Number(
                this.product.price * this.$store.getters.currencyMultiplier
            ).toFixed(2);
        },
    },
};
</script>
