<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { CheckIcon, XMarkIcon, QueueListIcon } from '@heroicons/vue/24/outline';
import { isObject } from '@vue/shared';

const props = defineProps({
    totalRequests: Number,
    totalDone: Number,
    totalCancele: Number,

});
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <h1 class="font-bold text-2xl text-white">Dashboard</h1>

        <div class="flex flex-row">

            <div class="m-5 bg-gray-900 shadow-xl rounded-2xl">
                <div class="p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 text-white font-semibold leading-normal uppercase text-sm">Total Requests
                                </p>
                                <h5 class="mb-2 font-bold text-white">+{{ props.totalRequests }}</h5>
                                <p class="mb-0 dark:text-white dark:opacity-60">
                                    <span class="font-bold leading-normal text-sm text-emerald-500">+60%</span>
                                    than yesterday
                                </p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <QueueListIcon class="ml-10 w-7 h-7 shrink-0 text-yellow-500" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="m-5 bg-gray-900 shadow-xl rounded-2xl">
                <div class="p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 text-white font-semibold leading-normal uppercase text-sm">Done Requests
                                </p>
                                <h5 class="mb-2 font-bold text-white">+{{ props.totalDone }}</h5>
                                <p class="mb-0 dark:text-white dark:opacity-60">
                                    <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                                    than yesterday
                                </p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <CheckIcon class="ml-10 w-7 h-7 shrink-0 text-green-600" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="m-5 bg-gray-900 shadow-xl rounded-2xl">
                <div class="p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 text-white font-semibold leading-normal uppercase text-sm">Canceled
                                    Requests</p>
                                <h5 class="mb-2 font-bold text-white">+{{ props.totalCancele }}</h5>
                                <p class="mb-0 dark:text-white dark:opacity-60">
                                    <span class="font-bold leading-normal text-sm text-emerald-500">+2.1%</span>
                                    than yesterday
                                </p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <XMarkIcon class="ml-10 w-7 h-7 shrink-0 text-rose-600" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
