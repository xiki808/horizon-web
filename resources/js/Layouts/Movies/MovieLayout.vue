<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps(['movie'])
</script>

<template>
  <div class="flex flex-col items-center">
    <div class="flex justify-center w-1/2 my-8">
      <div class="w-1/2 flex justify-center">
        <img :src="'https://image.tmdb.org/t/p/w500' +movie.poster_path" />
      </div>
      <table
        class="w-1/2 border-separate border-spacing-2 border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
        <tbody>
          <tr>
            <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              Title</td>
            <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{movie.title}}</td>
          </tr>
          <tr>
            <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              Release Date</td>
            <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{movie.release_date}}</td>
          </tr>
          <tr>
            <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              Score</td>
            <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{movie.vote_average}}</td>
          </tr>
          <tr>
            <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              Votes</td>
            <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{movie.vote_count}}</td>
          </tr>
          <tr>
            <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              Description</td>
            <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{movie.overview}}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div
      class="prev border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400 w-1/2 text-center">
      <Link :href="route('home')" class="text-sm text-gray-700 dark:text-gray-500 underline">
      Back</Link>
    </div>
  </div>
</template>