<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="table-auto divide-y divide-gray-200 border">
                            <thead>
                                <tr>
                                    <th class="p-4">Product</th>
                                    <th class="p-4">Price</th>
                                    <th class="p-4">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-4">Kertas</td>
                                    <td class="p-4">1000</td>
                                    <td class="p-4">1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
