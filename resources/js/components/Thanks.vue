<template>
    <div class="w-full text-center p-10" v-if="$route.params.id">
        <span class="text-4xl font-bold"
            >Thank You! Your order
            <span class="text-orange-500"
                ><a :href="link">#{{ $route.params.id }}</a></span
            >
            has started to be prepared</span
        >
    </div>
</template>

<script>
export default {
    name: "ThankYou",
    computed: {
        link() {
            return `/items/${this.$route.params.id}`;
        }
    }
};
</script>
