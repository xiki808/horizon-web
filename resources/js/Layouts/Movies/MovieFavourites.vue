<script setup>
defineProps([
    'userMovies'
])
</script>

<template>
  <div class="flex flex-col justify-center w-full my-8">
    <table
      class="border-separate border-spacing-2 border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm my-8">
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
        <tr v-for="userMovie in userMovies" :key="userMovie.id">
          <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
            {{userMovie.title}}
          </td>
          <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
            {{userMovie.release_date}}</td>
          <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
            {{userMovie.vote_average}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>