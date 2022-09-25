<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import MovieFavourites from '@/Layouts/Movies/MovieFavourites.vue';

defineProps({
    userMovies: Array,
})
</script>

<template>
    <DashboardLayout>
        <MovieFavourites :userMovies="userMovies" />
    </DashboardLayout>
</template>
