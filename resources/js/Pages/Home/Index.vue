<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';

defineProps({
    movies: Array,
    page: Number,
    canLogin: Boolean,
    canRegister: Boolean,
})
</script>

<template>
    <HomeLayout canLogin="{{canLogin}}" canRegister="{{canRegister}}">
        <div class="flex flex-col justify-center w-1/2 my-8">
            <table
                class="border-separate border-spacing-2 border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
                <thead class="bg-slate-50 dark:bg-slate-700">
                    <tr>
                        <th
                            class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                            Title</th>
                        <th
                            class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                            Release Date</th>
                        <th
                            class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                            Score</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="movie in movies">
                        <td
                            class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                            <Link :href="route('home-show', {id: movie.id})"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">
                            {{movie.title}}
                            </Link>
                        </td>
                        <td
                            class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                            {{movie.release_date}}</td>
                        <td
                            class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                            {{movie.vote_average}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="flex">
                <div
                    class="prev border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400 w-1/2 text-center">
                    <Link v-if="page != 1" :href="route('home', {page: page - 1})"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Prev</Link>
                </div>
                <div
                    class="next border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400 w-1/2 text-center">
                    <Link v-if="page != 5" :href="route('home', {page: page + 1})"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Next</Link>
                </div>
            </div>
        </div>
    </HomeLayout>
</template>
