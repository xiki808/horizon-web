<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import MovieListLayout from '@/Layouts/Movies/MovieListLayout.vue';

defineProps({
    movies: Object,
    page: Number,
    filtered: Boolean,
    canLogin: Boolean,
    canRegister: Boolean,
    isLoggedIn: Boolean,
    userMovies: Array
})
</script>

<template>
    <HomeLayout :canLogin="canLogin" :canRegister="canRegister">
        <MovieListLayout :movies="movies" :page="page" :filtered="filtered" :isLoggedIn="isLoggedIn"
            :userMovies="userMovies" />
    </HomeLayout>
</template>
