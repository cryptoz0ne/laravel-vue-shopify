<template>
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Detail
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="product in products" :key="product.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex-shrink-0 h-100 w-100">
                            <img class="h-100 w-100" :src="product.image.src" alt="">
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-md text-gray-900">{{ product.title }}</div>
                        <div class="text-sm text-gray-500">{{ product.vendor }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm" v-html="product.body_html"></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-md capitalize leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          {{ product.status }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['products'],
}
</script>
