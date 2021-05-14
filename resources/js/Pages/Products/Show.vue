<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <list-products v-if="token" :products="products" />
                        <div class="text-xl" v-else>
                            You need to connect shopify on profile page.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import ListProducts from './ListProducts'
export default {
    components: {
        AppLayout,
        ListProducts,
    },
    props: ['token', 'products'],
}
</script>
