<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import Add from './Tables/add.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const showEmail = ref(false);
function showEmailInput(){
    showEmail.value = !showEmail.value;
}
const form = useForm({
    name: '',
    email: '',
    phone_number: '',
    persons_number: '',
});

// function add(){
   
//     Inertia.put(route('request.add'),{
//     name: form.name,
//     email: form.email,
//     phone_number: form.phone_number,
//     persons_number: form.persons_number,
//     });
//     form.reset();

// }

</script>

<template>

    <Head title="Welcome" />

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <!-- <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline"
                >Dashboard</Link
            >

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"
                    >Register</Link
                >
            </template>
        </div> -->
        <div class="w-full min-h-screen bg-black flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <svg class="w-10 h-10 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M11.757 2.034a1 1 0 01.638.519c.483.967.844 1.554 1.207 2.03.368.482.756.876 1.348 1.467A6.985 6.985 0 0117 11a7.002 7.002 0 01-14 0c0-1.79.684-3.583 2.05-4.95a1 1 0 011.707.707c0 1.12.07 1.973.398 2.654.18.374.461.74.945 1.067.116-1.061.328-2.354.614-3.58.225-.966.505-1.93.839-2.734.167-.403.356-.785.57-1.116.208-.322.476-.649.822-.88a1 1 0 01.812-.134zm.364 13.087A2.998 2.998 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879.586.585.879 1.353.879 2.121s-.293 1.536-.879 2.121z"
                                clip-rule="evenodd" />
                        </svg>
            <div class="w-full sm:max-w-md p-5 mx-auto">
                <h2 class="mb-12 text-center text-5xl font-extrabold">Welcome.</h2>
                <form>
                    <div class="mb-4">
                        <label class="block text-white font-bold mb-1" >Name</label>
                        <input  type="text"
                        v-model="form.name"
                            class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                    </div>

                    <div class="flex flex-row">
                        <div>
                        <label v-if="!showEmail" class="block text-white font-bold mb-1" >Phone Number</label>
                        <label v-if="showEmail" class="block text-white font-bold mb-1" >Email</label>
                    </div>
                    <div class="pl-2">
                        <a v-if="!showEmail" class="text-sm text-blue-500 mb-1 font-bold hover:cursor-pointer" @click="showEmailInput">or email</a>
                        <a v-if="showEmail" class="text-sm text-blue-500 mb-1 font-bold hover:cursor-pointer" @click="showEmailInput">or phone number</a>

                    </div>
                     </div>
                     <input v-if="!showEmail" type="text" 
                     v-model="form.phone_number"
                            class="mb-4 py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                           
                            <input v-if="showEmail" type="email" 
                            v-model="form.email"
                            class="mb-4 py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                   

                    <div class="mb-4">
                        <label class="block text-white font-bold mb-1" >Persons Number</label>
                        <input type="text" 
                        v-model="form.persons_number"
                            class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                    </div>
                    <div class="mt-6">
                        <Link
                        :href="
                              route('request.add', {
                            name: form.name,
                            email: form.email,
                            phone_number: form.phone_number,
                            persons_number: form.persons_number,
                              })"
                        method="put"
                        as="button"
                        :preserve-state="false"
                        class="w-full inline-flex items-center justify-center px-4 py-2">
                    
                        <button class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600  rounded-md  text-white">Start</button>
               </Link> 
                    </div>
                </form>
            </div>
        </div>
        <!-- 
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="w-8 h-8 text-gray-500"
                            >
                                <path
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                ></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white"
                                    >Documentation</a
                                >
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laravel has wonderful, thorough documentation covering every aspect of the framework.
                                Whether you are new to the framework or have previous experience with Laravel, we
                                recommend reading all of the documentation from beginning to end.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="w-8 h-8 text-gray-500"
                            >
                                <path
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                                ></path>
                                <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="https://laracasts.com" class="underline text-gray-900 dark:text-white"
                                    >Laracasts</a
                                >
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript
                                development. Check them out, see for yourself, and massively level up your development
                                skills in the process.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="w-8 h-8 text-gray-500"
                            >
                                <path
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                                ></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white"
                                    >Laravel News</a
                                >
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laravel News is a community driven portal and newsletter aggregating all of the latest
                                and most important news in the Laravel ecosystem, including new package releases and
                                tutorials.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="w-8 h-8 text-gray-500"
                            >
                                <path
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
                                Vibrant Ecosystem
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laravel's robust library of first-party tools and libraries, such as
                                <a href="https://forge.laravel.com" class="underline">Forge</a>,
                                <a href="https://vapor.laravel.com" class="underline">Vapor</a>,
                                <a href="https://nova.laravel.com" class="underline">Nova</a>, and
                                <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects
                                to the next level. Pair them with powerful open source libraries like
                                <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>,
                                <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>,
                                <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>,
                                <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>,
                                <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>,
                                <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <svg
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="-mt-px w-5 h-5 text-gray-400"
                        >
                            <path
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                            ></path>
                        </svg>

                        <a href="https://laravel.bigcartel.com" class="ml-1 underline"> Shop </a>

                        <svg
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            class="ml-4 -mt-px w-5 h-5 text-gray-400"
                        >
                            <path
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                            ></path>
                        </svg>

                        <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline"> Sponsor </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div> -->
    </div>
</template>
