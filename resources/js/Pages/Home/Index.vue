<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import MovieListLayout from '@/Layouts/Movies/MovieListLayout.vue';

defineProps({
    movies: Array,
    page: Number,
    canLogin: Boolean,
    canRegister: Boolean,
})
</script>

<template>
    <HomeLayout :canLogin="canLogin" :canRegister="canRegister">
        <MovieListLayout :movies="movies" :page="page" />
    </HomeLayout>
</template>
