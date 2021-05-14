<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200" >
                        <div class="mb-5 text-xl">
                            <span v-if="shopify_token">You can disconnect your shopify account.</span>
                            <span v-else>Please connect your shopify account to list products.</span>
                        </div>

                        <button
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded"
                            @click="configShopify"
                        >
                            <span v-if="shopify_token">Disconnect</span>
                            <span v-else>Connect to Shopify</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
    components: {
        AppLayout
    },
    data() {
        return {
            shopify_token: null
        }
    },
    props: ['user', 'shopify'],
    mounted() {
        this.shopify_token = this.shopify ? this.shopify.shopify_token : null;
    },
    methods: {
        configShopify() {
            const _this = this;

            if(this.shopify_token) {
                axios.get('/shopify/disconnect')
                    .then(function(response) {
                        _this.shopify_token = null;
                        console.log(response)
                    })
                    .catch(function(error) {
                        console.log(error)
                    });
            } else {
                axios.get('/shopify/connect')
                    .then(function(response) {
                        location.href = response.data.url;
                    })
                    .catch(function(error) {
                        console.log(error)
                    });
            }

        }
    }
}
</script>
