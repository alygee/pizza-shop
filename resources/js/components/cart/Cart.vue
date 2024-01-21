<template>
    <nav>
        <ul class="personal-menu">
            <li v-if="$auth.check(1)">
                <router-link :to="{ name: 'profile' }">Profile</router-link>
            </li>
            <li v-if="$auth.check(2)">
                <router-link :to="{ name: 'admin.dashboard' }"
                    >Admin Dashboard</router-link
                >
            </li>
            <li v-if="!$auth.check()">
                <router-link :to="{ name: 'login' }">
                    <svg
                        width="13"
                        height="15"
                        viewBox="0 0 13 15"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            id="Vector"
                            d="M6.64744 7.95349C4.7307 7.95349 3.1707 6.39349 3.1707 4.47674C3.1707 2.56 4.7307 1 6.64744 1C8.56419 1 10.1242 2.56 10.1242 4.47674C10.1242 6.39349 8.56419 7.95349 6.64744 7.95349ZM6.64744 1.90698C5.96639 1.90857 5.31368 2.17983 4.83211 2.66141C4.35053 3.14299 4.07927 3.79569 4.07767 4.47674C4.07927 5.1578 4.35053 5.8105 4.83211 6.29208C5.31368 6.77366 5.96639 7.04491 6.64744 7.04651C7.3285 7.04491 7.9812 6.77366 8.46278 6.29208C8.94436 5.8105 9.21561 5.1578 9.21721 4.47674C9.21561 3.79569 8.94436 3.14299 8.46278 2.66141C7.9812 2.17983 7.3285 1.90857 6.64744 1.90698ZM11.8414 14C11.5935 14 11.3879 13.7944 11.3879 13.5465C11.3879 11.4605 9.25953 9.76744 6.64744 9.76744C4.03535 9.76744 1.90698 11.4605 1.90698 13.5465C1.90698 13.7944 1.7014 14 1.45349 14C1.20558 14 1 13.7944 1 13.5465C1 10.9647 3.53349 8.86047 6.64744 8.86047C9.7614 8.86047 12.2949 10.9647 12.2949 13.5465C12.2949 13.7944 12.0893 14 11.8414 14Z"
                            fill="currentColor"
                            stroke="currentColor"
                            stroke-width="0.5"
                        />
                    </svg>
                </router-link>
            </li>
            <li>
                <a
                    href="/checkout"
                    v-tooltip="{
                        content: content,
                        placement: 'bottom-start',
                        delay: { hide: 3000 },
                        offset: 12,
                        autoHide: false,
                        show: false,
                    }"
                >
                    <svg
                        width="16"
                        height="14"
                        viewBox="0 0 16 14"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            id="shopping-cart"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M1 0C0.585786 0 0.25 0.335786 0.25 0.75C0.25 1.16421 0.585786 1.5 1 1.5H2.88524L3.38431 3.99348C3.38746 4.01335 3.39139 4.03295 3.39607 4.05227L4.43937 9.26486L4.43952 9.26559C4.53108 9.72569 4.78147 10.139 5.14692 10.4332C5.51048 10.7258 5.96487 10.8821 6.43137 10.875H12.4936C12.9601 10.8821 13.4145 10.7258 13.7781 10.4332C14.1437 10.1388 14.3942 9.72526 14.4856 9.26486L14.4857 9.26487L14.4867 9.25925L15.4867 4.0155C15.5286 3.79593 15.4704 3.56914 15.3279 3.39692C15.1854 3.2247 14.9735 3.125 14.75 3.125H4.74023L4.23541 0.602807C4.16526 0.252289 3.85747 0 3.5 0H1ZM5.91041 8.97156L5.04045 4.625H13.8435L13.0139 8.97478C12.9907 9.08902 12.9283 9.19159 12.8375 9.26471C12.7461 9.3383 12.6317 9.37739 12.5144 9.37514L12.5 9.375H6.425L6.41063 9.37514C6.2933 9.37739 6.17893 9.3383 6.08752 9.26471C5.99611 9.19113 5.93349 9.08774 5.91063 8.97264L5.91041 8.97156ZM6 14C6.55228 14 7 13.5523 7 13C7 12.4477 6.55228 12 6 12C5.44772 12 5 12.4477 5 13C5 13.5523 5.44772 14 6 14ZM13.25 14C13.8023 14 14.25 13.5523 14.25 13C14.25 12.4477 13.8023 12 13.25 12C12.6977 12 12.25 12.4477 12.25 13C12.25 13.5523 12.6977 14 13.25 14Z"
                            fill="currentColor"
                        />
                    </svg>
                    <span class="cart-qty">{{ cartQty }}</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
import CartItems from "./CartItems.vue";

export default {
    name: "Cart",
    components: { CartItems },
    props: {
        items: Array,
    },
    mounted() {
        this.$store.dispatch("cart");
    },
    computed: {
        cartQty() {
            return this.$store.getters.cartQty;
        },
        currency: {
            get() {
                return this.$store.state.currency;
            },
        },
        sign() {
            return this.$store.getters.currencySign;
        },
        amount() {
            return Number(
                this.$store.getters.amount *
                    this.$store.getters.currencyMultiplier
            ).toFixed(2);
        },
        content() {
            if (!this.cartQty) {
                return `
                  <div class="px-6 bg-white border shadow rounded-lg">
                    <div class="font-bold py-6 bg-white">Oops, it’s empty here!</div>
                  </div>`;
            }
            const start = `<div class="px-6 bg-white border shadow rounded-lg">
              <table class="table-auto">
              <thead>
                <tr>
                  <th class="px-4 py-2">Name</th>
                  <th class="px-4 py-2">Qty</th>
                  <th class="px-4 py-2">Price</th>
                </tr>
              </thead>
              <tbody>
            `;
            const end = `</tbody></table>`;
            const amount = `
              <div class="flex justify-between w-full p-4 font-bold">
                <p class="py-4">Amount: ${this.sign} ${this.amount}</p>
                <a href="/checkout" class="py-4 text-orange-500 hover:text-orange-600">
                  Checkout
                </a>
              </div>
            `;
            let items = "";
            _.forEach(this.$store.getters.cartItems, (item) => {
                if (!item) return;
                items += `<tr>
                <td class="border px-4 py-2">${item.name}</td>
                <td class="border px-4 py-2">${item.quantity}</td>
                <td class="border px-4 py-2">${this.price(item)}</td>
              </tr>`;
            });
            return start + items + end + amount;
        },
    },
    methods: {
        price(item) {
            return Number(
                item.price *
                    item.quantity *
                    this.$store.getters.currencyMultiplier
            ).toFixed(2);
        },
    },
};
</script>

<style>
header nav ul.personal-menu li {
    padding: 10px 12px;
}
header nav .personal-menu li a {
    color: #fff;
    text-decoration: none;
    position: relative;
}
header nav .personal-menu li a:hover span,
header nav .personal-menu li a:hover svg {
    color: #ffbd19;
}

header nav .personal-menu li span,
header nav .personal-menu li svg {
    color: #fff;
}

header nav .personal-menu li span {
    font-size: 12px;
    font-weight: 500;
    position: absolute;
    bottom: 3px;
    left: 20px;
}

header nav ul.personal-menu {
    margin-right: 12px;
}

header .cart::before {
    border-left: 15px solid transparent;
    border-bottom: 15px solid #504d5b;
    content: "";
    position: absolute;
    top: -15px;
    right: 20px;
}

header .cart {
    position: absolute;
    right: 24px;
    width: 310px;
    border-radius: 10px;
    background: #504d5b;
    top: 60px;
    padding-bottom: 30px;
}

header .cart .footer {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    color: #fff;
    text-align: center;
    font-family: Montserrat;
    font-size: 18px;
    font-style: normal;
    font-weight: 700;
    line-height: 150%; /* 27px */
    padding: 10px 14px;
    margin: 0 35px;
    border-top: 1px solid rgba(255, 255, 255, 0.3);
}

header .cart .items {
    margin-bottom: 8px;
    max-height: 235px;
    overflow-y: auto;
    padding: 20px 35px 0;
}

header .cart .items .item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 78px;
}

header .cart .items .item img {
    width: 78px;
}

header .cart .items .item .product-name {
    color: #fff;
    font-family: Montserrat;
    font-size: 11px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    width: 100px;
}

header .cart .items .item .product-price {
    color: #fff;
    text-align: right;
    font-family: Montserrat;
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    margin-right: 14px;
}

header .cart .items .item .product-remove {
    cursor: pointer;
    color: #ffffff4d;
}

header .cart .items .item .product-remove:hover svg {
    color: #fff;
}

header .cart .footer .amount {
    text-align: right;
    color: #ffbd19;
}

header .cart .footer .amount .tax-label {
    color: rgba(255, 255, 255, 0.3);
    text-align: center;
    font-family: Montserrat;
    font-size: 8px;
    font-style: normal;
    font-weight: 500;
    line-height: 150%; /* 12px */
}

header .cart .action {
    text-align: center;
    margin-top: 10px;
}

header .cart .action .yellow-button {
    font-family: Montserrat;
    color: #fff;
    text-align: center;
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    text-transform: uppercase;
    border-radius: 5px;
    background: #ffbd19;
    border: none;
    cursor: pointer;
    padding: 6px 28px;
    background: linear-gradient(0deg, #ffbd19 0%, #ffbd19 100%), #ff8a00;
}

header .cart .action .yellow-button:hover {
    background-color: #ff8a00;
}
</style>
