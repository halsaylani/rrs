<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps({
  tables: String,
});

const num = ref(props.tables);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <h1 class="font-bold text-2xl text-gray-700">Tables</h1>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">{{num}}</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>